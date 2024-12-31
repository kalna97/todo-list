<?php include 'database.php'; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "<script>
        window.onload = function() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('delete_task.php?id={$id}')
                        .then(() => {
                            Swal.fire(
                                'Deleted!',
                                'The task has been deleted.',
                                'success'
                            ).then(() => {
                                window.location = '../index.php';
                            });
                        })
                        .catch(() => {
                            Swal.fire('Error', 'Task could not be deleted.', 'error');
                        });
                } else {
                    window.location = '../index.php';
                }
            });
        };
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Delete Task</title>
</head>
<body>
</body>
</html>
