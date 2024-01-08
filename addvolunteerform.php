<?php
// Database connection parameters
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $volunteerId = $_POST["volunteerId"];
    $name = $_POST["name"];
    $taskName = $_POST["taskName"];
    $action = $_POST["action"];
    $status = $_POST["status"];

    // TODO: Validate and sanitize input data as needed

    // Insert data into the database
    $sql = "INSERT INTO  addvolunteers(volunteerId, name, taskName, action, status) VALUES ('$volunteerId', '$name', '$taskName', '$action', '$status')";

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
