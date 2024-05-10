<?php
include("db_connect.php");

$task = '';
$volunteers = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['sort_field'];
// query to select all volunteers with the given task name form addvolunteer1 table and also fetch their volunteer status from volunteerdetails table using prepared statement
    $sql = "SELECT addvolunteer1.*, volunteerdetails.status FROM addvolunteer1 LEFT JOIN volunteerdetails ON addvolunteer1.user_id = volunteerdetails.id WHERE task_name = ? ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $task);
    $stmt->execute();
    $result = $stmt->get_result();
    //close statement
    $stmt->close();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $volunteers[] = $row;
        }
    }

    //print the fetched data
    // echo json_encode($volunteers);
   
    
}
?>