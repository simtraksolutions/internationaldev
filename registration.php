
<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $teamname = mysqli_real_escape_string($conn, $_POST['teamname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    // Your SQL query to insert data into the database
    $sql = "INSERT INTO registration (name, teamname, email, password) VALUES ('$name', '$teamname', '$email', '$password')";

    // if (mysqli_query($conn, $sql)) {
        // echo "Record added successfully";
        if(mysqli_query($conn,$sql)){
            header("Location: Home_page.php");
            exit();
          }
    else {
        echo "Error adding record: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);

}
?>

