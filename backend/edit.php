<?php include 'database.php'; ?>
<?php


$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);
    // Success Alert
    echo "<script>
        window.onload = function() {
            Swal.fire({
                icon: 'success',
                title: 'Task Updated',
                text: 'The task has been successfully updated!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = '../index.php';
            });
        };
    </script>";
    exit;
}
?>