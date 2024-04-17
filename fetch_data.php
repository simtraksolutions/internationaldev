<?php

//query to get all the registered users
$sql = "SELECT * from volunteerdetails";
$registeredUser = $conn->query($sql);



//query to get all user detials
if(isset($_GET['user_id']))
{
    $userId = $_GET['user_id'];
    $sql = "SELECT * FROM volunteerdetails WHERE id = $userId";
    $personalDetails = $conn->query($sql);
    $sql = "SELECT * FROM volunteer_details_two WHERE id = $userId";
    $eduDetails = $conn->query($sql);
    
    //query to get the tasks of the user
    $sql = "SELECT * FROM addvolunteer1 WHERE user_id = $userId";
    $task = $conn->query($sql);

   //test to if the query is working and fetching the correct data

   
    //test to see if the query is working and fetching the correct data
    // if ($eduDetails->num_rows > 0) {
    //     $row = $eduDetails->fetch_assoc();
    //     echo $row['college'];
    // }


    //query to get task based on user id and status
    $all_task = "SELECT * FROM addvolunteer1 WHERE user_id = $userId";
    $just_allotted = "SELECT * FROM addvolunteer1 WHERE status = 'just allotted' AND user_id = $userId";
    $started = "SELECT * FROM addvolunteer1 WHERE status = 'started' AND user_id = $userId";
    $under_progress = "SELECT * FROM addvolunteer1 WHERE status = 'under progress' AND user_id = $userId";
    $completed = "SELECT * FROM addvolunteer1 WHERE status = 'completed' AND user_id = $userId";
    $cancelled = "SELECT * FROM addvolunteer1 WHERE status = 'cancelled' AND user_id = $userId";
    $about_to_complete = "SELECT * FROM addvolunteer1 WHERE status = 'about to be completed' AND user_id = $userId";



    // Set default task query to all task
    $task_query = $all_task;

    if (isset($_GET['task_status'])) {
        switch ($_GET['task_status']) {
            case 'just_allotted':
                $task_query = $just_allotted;
                break;
            case 'started':
                $task_query = $started;
                break;
            case 'under_progress':
                $task_query = $under_progress;
                break;
            case 'completed':
                $task_query = $completed;
                break;
            case 'purged':
                $task_query = $cancelled;
                break;
            case 'about_to_complete':
                $task_query = $about_to_complete;
                break;
            default:
                $task_query = $all_task;
                break;
        }
    }
    $result = $conn->query($task_query);
}

$conn->close();
?>
