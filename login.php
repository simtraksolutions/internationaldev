<?php
include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

//check if the admin is trying to login
   $admin = "SELECT * FROM admin_details WHERE email='$email'";
    $result = mysqli_query($conn, $admin);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {
            // Password is correct, set session variables
            $_SESSION["email"] = $row["email"];

            // Set a cookie if "Remember Me" is checked
            if (isset($_POST["remember"])) {
                setcookie("email", $row["email"], time() + (86400 * 30), "/"); // 30 days
            }

           //redirect admin to home page
            header("Location: ./Home_page.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    } else {
        
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

            //fetch the user id from the database and redirect the user to it's profile page
            $sql = "SELECT id FROM volunteerdetails WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);
            $user_id = $result['id'];
            header("Location: ./profile.php?user_id={$user_id}");
            exit();
        } else {
            // Invalid password
            header("Location: ./login.html?message=Invalid password!");
            echo "Invalid password!";
        }
    } else {
        // User not found
        header("Location: ./login.html?message=User not found!");
        echo "User not found!";
    }
}
}
mysqli_close($conn);


?>
  