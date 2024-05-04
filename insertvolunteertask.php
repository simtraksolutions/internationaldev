


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    // Include your database connection script
include 'db_connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'] ?? null;
    $userId = 0;
    if($name != 'Other' && strpos($name, '.') !== false) {
        list($userId, $name) = explode('.', $name, 2);
    } else {
        $name = $_POST['nameOther'] ?? null;

        // Check if the user already exists
        $stmt = $conn->prepare("SELECT id FROM volunteerdetails WHERE first_name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['id'];

            // Close statement
            $stmt->close();
        } else {
            // Prepare an SQL statement
            $sql = "INSERT INTO volunteerdetails (first_name) VALUES (?)";
            // Initialize prepared statement
            $stmt = $conn->prepare($sql);

            // Bind parameters to the prepared statement
            $stmt->bind_param("s", $name);

            // Execute the prepared statement
            if ($stmt->execute()) {
                $userId = $stmt->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement
            $stmt->close();

            //insert the user educational details in volunteer_details_two table
             //insert empty values into the database
            $sql = "INSERT INTO volunteer_details_two(college, course, linkedin, facebook) VALUES ('N/A', 'N/A', 'N/A', 'N/A')";
            if(mysqli_query($conn,$sql)){
               //query executed successfully
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $task_name = $_POST['task'] ?? null;
    if($task_name == 'other') {
        $task_name = $_POST['taskOther'] ?? null;
    }
    $action = $_POST['action'] ?? null;
    $status = $_POST['status'] ?? null;
    $deadline = $_POST['deadline'] ?? null;

    if($name !== null && $task_name !== null && $action !== null && $status !== null && $deadline !== null) {
        // Prepare an SQL statement
        $sql = "INSERT INTO addvolunteer1 (user_id, name, task_name, action, status, deadline) VALUES (?, ?, ?, ?, ?, ?)";
        // Initialize prepared statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssss", $userId, $name, $task_name, $action, $status, $deadline);

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
    } else {
        echo "Error: Missing required fields";
    }
}
?>