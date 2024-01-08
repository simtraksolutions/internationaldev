<?php
include("db_connect.php");

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $countryCode = $_POST["country_code"];
    $phoneNumber = $_POST["phone_number"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $sourceOfJoining = $_POST["source_of_joining"];

    // Insert data into the database
    $sql = "INSERT INTO VolunteerDetails (name, email, country_code, phone_number, country, city, source_of_joining)
            VALUES ('$name', '$email', '$countryCode', '$phoneNumber', '$country', '$city', '$sourceOfJoining')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
