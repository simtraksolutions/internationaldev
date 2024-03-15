<?php
 include("db_connect.php");
$name = $_POST['name'];
$teamname = $_POST['teamname'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO  registration(name, teamname, email, password) VALUES ('$name', '$teamname', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
