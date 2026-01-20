<?php
// taskController.php
// This file controls the application logic

require_once 'task.php';

// Get all tasks
function getAllTasks() {
    return fetchAllTasks();
}

// Add a new task
function addTask($title) {
    if (!empty(trim($title))) {
        saveTask($title);
    }
}
