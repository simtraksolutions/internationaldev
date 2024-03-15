<?php
include("db_connect.php");
// Fetch existing volunteer data
$sqlFetchData = "SELECT * FROM `tasks` where `user_id`= '".$_GET["user_id"]."'";
$result = $conn->query($sqlFetchData);

// Close connection
$conn->close();
?>
