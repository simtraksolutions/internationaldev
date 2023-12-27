<?php
//session_start(); // Start a session to manage user authentication
 include("db_connect.php");
 
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
     echo "Sign in successful!";
 } else {
     echo "Invalid email or password. Please try again.";
 }
 
 $conn->close();
 ?>
 
?>
 