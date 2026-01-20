<?php
require_once 'taskController.php';

/* Handle form submission */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['task_title'])) {
        addTask($_POST['task_title']);
        header("Location: index.php");
        exit;
    }
}

/* Fetch all tasks */
$tasks = getAllTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internal Task Manager</title>

    <!-- IMPORTANT: Absolute path to CSS -->
    <link rel="stylesheet" href="/internal-task-project/style.css">
</head>
<body>

<div class="container">

    <h2>Internal Task & Workflow Management</h2>

    <form method="POST" class="task-form">
        <input
            type="text"
            name="task_title"
            placeholder="Enter task name"
            required
        >
        <button type="submit">Add Task</button>
    </form>

    <hr>

    <h3>Task List</h3>

    <?php if (empty($tasks)) : ?>
        <p class="empty">No tasks found.</p>
    <?php else : ?>
        <ul class="task-list">
            <?php foreach ($tasks as $task): ?>
                <li class="task-item">
                    <span class="task-title">
                        <?= htmlspecialchars($task['title']) ?>
                    </span>
                    <span class="task-status">
                        (<?= htmlspecialchars($task['status']) ?>)
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>

</body>
</html>
