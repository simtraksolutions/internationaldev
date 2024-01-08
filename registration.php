<?php
include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$teamname = $_POST['teamname'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO  `registration`(name, teamname, email, password) VALUES ('$name', '$teamname', '$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successful!";
    // header("Location: homepage.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: homepage.html");
    exit();
}

$conn->close();
?>
