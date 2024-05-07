<?php
include("db_connect.php");


// Process form data
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

    // Insert data into the database
    $sql = "INSERT INTO volunteerdetails (first_name, middle_name, last_name, email, country_code, phone_number, country, city, source_of_joining)
            VALUES ('$fname','$mname','$lname', '$email', '$country_code', '$phoneNumber', '$country', '$city', '$sourceOfJoining')";

    if (mysqli_query($conn, $sql)) {
        header("Location:volunteerdetails2.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch existing volunteer data
$sqlFetchData = "SELECT * FROM Volunteerdetails";
$result = $conn->query($sqlFetchData);

// Close connection
$conn->close();
?>