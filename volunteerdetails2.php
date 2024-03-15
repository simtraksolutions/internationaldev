<?php
include("db_connect.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape user inputs to prevent SQL injection
    $college = mysqli_real_escape_string($conn, $_POST['college']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);

    // Insert data into the database
    $sql = "INSERT INTO volunteer_details_two(college, course, linkedin, facebook) VALUES ('$college', '$course', '$linkedin', '$facebook')";

    if ($conn->query($sql) === TRUE) {
<<<<<<< HEAD

        if(mysqli_query($conn,$sql)){
            header("Location: Home_page.php");
            exit();
          }
=======
>>>>>>> 39c9ff466592edb622e55a0beb35c02c01ade2f3
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>
