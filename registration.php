
<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $coordinator = mysqli_real_escape_string($conn, $_POST['coordinator']);
    $teamname = mysqli_real_escape_string($conn, $_POST['teamname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email already exists
    $checkEmail = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmail);
    if (mysqli_num_rows($result) > 0) {
        // Email already exists, redirect to login page
        header("Location: ./login.html?message=Email already exists. Please login.");
        exit();
    }

    // Your SQL query to insert data into the database
    $sql = "INSERT INTO registration (name, coordinator, teamname, email, password) VALUES ('$name','$coordinator', '$teamname', '$email', '$password')";
    if(mysqli_query($conn,$sql)){
        //redirect the user to it's profile page after registration by fetching the user id from the database 
        $sql = "SELECT id FROM volunteerdetails WHERE email='$email' AND first_name='$name'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        $user_id = $result['id'];
        header("Location: ./profile.php?user_id={$user_id}");
        exit();
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }

  
    // Close connection
    mysqli_close($conn);

}
?>

