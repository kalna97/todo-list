<?php 
include 'database.php'; 
include 'backend/add.php';
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
    <form method="POST">
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
</body>
</html>
