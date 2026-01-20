<?php
// task.php
// This file handles all database operations related to tasks

require_once 'db.php';

// Fetch all tasks from database
function fetchAllTasks() {
    $conn = getDbConnection();

    $sql = "SELECT id, title, status FROM tasks ORDER BY id DESC";
    $result = $conn->query($sql);

    $tasks = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }

    return $tasks;
}

// Save a new task to database
function saveTask($title) {
    $conn = getDbConnection();

    $stmt = $conn->prepare(
        "INSERT INTO tasks (title, status) VALUES (?, 'pending')"
    );
    $stmt->bind_param("s", $title);
    $stmt->execute();
}
