<?php
include("db_connect.php");

$task = '';
$statuses = [];
$volunteers = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['sort_field'] ?? '';
    $statuses = array_keys($_POST); // Get all the keys from the POST array

    // Remove the 'sort_field' key from the statuses array
    if (($key = array_search('sort_field', $statuses)) !== false) {
        unset($statuses[$key]);
    }

    // If no status is selected, set $volunteers to an empty array and skip the rest of the script
    if (empty($statuses)) {
        $volunteers = [];
    } else {
        // Create a string of question marks, one for each status
        $statusPlaceholders = implode(',', array_fill(0, count($statuses), '?'));

        // If 'all' is selected in the sort_field or no task is selected, ignore the task condition
        if ($task == 'all' || $task == '') {
            $sql = "SELECT volunteerdetails.* FROM addvolunteer1 LEFT JOIN volunteerdetails ON addvolunteer1.user_id = volunteerdetails.id WHERE volunteerdetails.status IN ($statusPlaceholders) ORDER BY status";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(str_repeat('s', count($statuses)), ...$statuses);
        } else {
            $sql = "SELECT volunteerdetails.* FROM addvolunteer1 LEFT JOIN volunteerdetails ON addvolunteer1.user_id = volunteerdetails.id WHERE task_name = ? AND volunteerdetails.status IN ($statusPlaceholders) ORDER BY status";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(str_repeat('s', count($statuses) + 1), $task, ...$statuses);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        //close statement
        $stmt->close();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $volunteers[] = $row;
            }
        }
    }
}
?>