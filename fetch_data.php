<?php
$sql = "SELECT * from addvolunteer";
$registeredUser = $conn->query($sql);



//query to get all user detials
if(isset($_GET['user_id']))
{
    $userId = $_GET['user_id'];
    $sql = "SELECT * FROM volunteerdetails WHERE id = $userId";
    $personalDetails = $conn->query($sql);
    $sql = "SELECT * FROM volunteer_details_two WHERE id = $userId";
    $eduDetails = $conn->query($sql);
    

    $sql = "SELECT status FROM addvolunteer WHERE user_id = $userId";
    $statusResult = $conn->query($sql);

    // Check if the query returned a result
    if ($statusResult->num_rows > 0) {
        // Fetch the first (and only) row from the result
        $row = $statusResult->fetch_assoc();

        // Store the status in a variable
        $userStatus = $row['status'];
    } else {
        // Handle the case where the user was not found in the addvolunteer table
        echo "User not found in addvolunteer table";
    }

   
    //test to see if the query is working and fetching the correct data
    // if ($eduDetails->num_rows > 0) {
    //     $row = $eduDetails->fetch_assoc();
    //     echo $row['college'];
    // }


    //query to get tasks based on user id and status
    $all_tasks = "SELECT * FROM tasks WHERE user_id = $userId";
    $ongoing_tasks = "SELECT * FROM tasks WHERE status = 'ongoing' AND user_id = $userId";
    $completed_tasks = "SELECT * FROM tasks WHERE status = 'completed' AND user_id = $userId";
    $paused_tasks = "SELECT * FROM tasks WHERE status = 'paused' AND user_id = $userId";
    



    // Set default task query to all tasks
    $task_query = $all_tasks;

    if (isset($_GET['task_status'])) {
        switch ($_GET['task_status']) {
            case 'ongoing':
                $task_query = $ongoing_tasks;
                break;
            case 'completed':
                $task_query = $completed_tasks;
                break;
            case 'paused':
                $task_query = $paused_tasks;
                break;
            default:
                $task_query = $all_tasks;
                break;
        }
    }
    
    $result = $conn->query($task_query);
}

$conn->close();
?>
