<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $country_code = $_POST['country_code'];
    list($country, $country_code) = explode(' ', $country_code, 2);
    $country_code = str_replace(array('(',')'), '', $country_code); // Remove parentheses
    $phoneNumber = $_POST["phone_number"];
    $city = $_POST["city"];
    $sourceOfJoining = $_POST["source_of_joining"];


if($_GET['user_id']){
    echo "User ID: " . $_GET['user_id'];

    // Update data in the database for the following user ID using prepared statement or paramertized queries
    $sql = "UPDATE volunteerdetails SET first_name = ?, middle_name = ?, last_name = ?, email = ?, country_code = ?, phone_number = ?, country = ?, city = ?, source_of_joining = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $fname, $mname, $lname, $email, $country_code, $phoneNumber, $country, $city, $sourceOfJoining, $_GET['user_id']);
    $stmt->execute();
    $stmt->close();
    header("Location:volunteerdetails2.php?user_id=" . $_GET['user_id']);
}

else
{// Process form data

    // Insert data into the database
    $sql = "INSERT INTO volunteerdetails (first_name, middle_name, last_name, email, country_code, phone_number, country, city, source_of_joining)
            VALUES ('$fname','$mname','$lname', '$email', '$country_code', '$phoneNumber', '$country', '$city', '$sourceOfJoining')";

    if (mysqli_query($conn, $sql)) {
        header("Location:volunteerdetails2.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Close connection
$conn->close();}
?>