<?php
// Flag to check if the task was added
$taskAdded = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
    $stmt->execute([$title, $description]);

    // Set flag to true if task is successfully added
    $taskAdded = true;
}
?>