<?php include 'backend/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>To-Do List Manager</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">To-Do List Manager</h1>
    <a href="add.php" class="btn btn-success my-3">Add Task</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
            while ($task = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$task['title']}</td>
                    <td>{$task['description']}</td>
                    <td>
                        <a href='edit.php?id={$task['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete.php?id={$task['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
