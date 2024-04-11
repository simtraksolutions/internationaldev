<?php
// Include your database connection or any other necessary files
include("db_connect.php");
$sql = "SELECT * FROM `registration`";
$result = $conn->query($sql);
?>