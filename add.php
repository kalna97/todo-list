<?php  
include 'backend/database.php'; 
?>

<?php
$taskAdded = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');
    $data = json_decode($rawData, true); // Decode JSON into an associative array

    // Check if data was successfully decoded
    if ($data === null) {
        echo json_encode(["error" => "Invalid JSON format"]);
        exit;
    }

    // Extract values from JSON
    $title = isset($data['title']) ? $data['title'] : null;
    $description = isset($data['description']) ? $data['description'] : null;

    // Check if required fields are set
    if ($title && $description) {
        try {
            $stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
            $stmt->execute([$title, $description]);
            $taskAdded = true;
            echo json_encode(["message" => "Task added successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["error" => "Database error: " . $e->getMessage()]);
        }
    } else {
        echo json_encode(["error" => "Missing title or description"]);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Add Task</title>
</head>
<body>

<?php if ($taskAdded): ?>
    <script>
        window.onload = function() {
            Swal.fire({
                icon: 'success',
                title: 'Task Added',
                text: 'The task has been successfully added!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php';
            });
        };
    </script>
<?php endif; ?>

<div class="container mt-5">
    <h1 class="text-center">Add Task</h1>
    <form id="taskForm">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Task</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('taskForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var title = document.getElementById('title').value;
        var description = document.getElementById('description').value;

        var data = {
            title: title,
            description: description
        };

        fetch('add.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Task Added',
                    text: data.message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location = 'index.php';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.error,
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</body>
</html>