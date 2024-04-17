


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    // Include your database connection script
include 'db_connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
     // Split the name into user ID and name
     list($userId, $name) = explode('.', $name, 2);
    $task_name = $_POST['task_name'];
    $action = $_POST['action'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];

    // Prepare an SQL statement
    $sql = "INSERT INTO addvolunteer1 (user_id, name, task_name, action, status, deadline) VALUES (?, ?, ?, ?, ?, ?)";
    // Initialize prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssss",$userId, $name, $task_name, $action, $status, $deadline);

    // Execute the prepared statement
    if ($stmt->execute()) {
        header("Location: Home_page.php");
        echo "New record created successfully";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>