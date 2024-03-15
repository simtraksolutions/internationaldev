<?php
// Database connection parameters
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
<<<<<<< HEAD
    $name = $_POST["name"];
    $task_name = $_POST["task_name"];
=======
    $volunteerId = $_POST["volunteerId"];
    $name = $_POST["name"];
    $taskName = $_POST["taskName"];
>>>>>>> 39c9ff466592edb622e55a0beb35c02c01ade2f3
    $action = $_POST["action"];
    $status = $_POST["status"];

    // TODO: Validate and sanitize input data as needed

    // Insert data into the database
<<<<<<< HEAD
    $sql = "INSERT INTO  addvolunteer( name,task_name, action, status) VALUES ( '$name', '$task_name', '$action', '$status')";
=======
    $sql = "INSERT INTO  addvolunteers(volunteerId, name, taskName, action, status) VALUES ('$volunteerId', '$name', '$taskName', '$action', '$status')";
>>>>>>> 39c9ff466592edb622e55a0beb35c02c01ade2f3

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
