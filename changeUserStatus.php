<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include('db_connect.php');

    if(isset($_GET['status']) && isset($_GET['user_id']))
    {
        $status = $_GET['status'];
        $user_id = $_GET['user_id'];
        $sql = "UPDATE addvolunteer1 SET status = '$status' WHERE id = $task_id";
        if ($conn->query($sql) === TRUE) {
            echo "Status Changed Successfully";
            header("Location: volunteers_tasks.php?user_id=$user_id");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

include('closeConnection.php'); 

?>