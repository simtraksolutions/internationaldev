<?php
include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to fetch user data from the database
    $sql = "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {
            // Password is correct, set session variables
            $_SESSION["email"] = $row["email"];

            // Set a cookie if "Remember Me" is checked
            if (isset($_POST["remember"])) {
                setcookie("email", $row["email"], time() + (86400 * 30), "/"); // 30 days
            }

            header("Location: Home_page.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    } else {
        // User not found
        echo "User not found!";
    }
}
mysqli_close($conn);


?>
  