<?php
function getDbConnection() {
    $conn = mysqli_connect(
        "mysql-db",
        "taskuser",
        "taskpass",
        "taskdb",
        3306
    );

    if (!$conn) {
        die("DB connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
