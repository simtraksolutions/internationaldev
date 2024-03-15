<?php
include("db_connect.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a table named 'your_table' with columns 'id', 'name', 'task_name', 'action', 'status'
$sql = "SELECT * FROM addvolunteer";
$result = $conn->query($sql);

?>


