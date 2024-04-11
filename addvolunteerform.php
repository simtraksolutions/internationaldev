<?php
// Database connection parameters
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $task_name = $_POST["task_name"];
    $action = $_POST["action"];
    $status = $_POST["status"];

    // TODO: Validate and sanitize input data as needed

    // Insert data into the database
    $sql = "INSERT INTO  addvolunteer( name,task_name, action, status) VALUES ( '$name', '$task_name', '$action', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: homepage.html");
    exit();
}

// Close connection
$conn->close();
?>
