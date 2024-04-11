<?php
include("db_connect.php");



$email = "kk@gmail.com"; // Replace with the actual Gmail address

$sql_registration = "SELECT * FROM registration WHERE email = '$email'";
$result_registration = mysqli_query($conn, $sql_registration);
$profile_registration = mysqli_fetch_assoc($result_registration);

// Fetch data from volunteer_details_page_one
$sql_page_one = "SELECT * FROM volunteerdetails WHERE id = 9"; // Adjust the condition as needed
$result_page_one = mysqli_query($conn, $sql_page_one);
$profile_page_one = mysqli_fetch_assoc($result_page_one);

// Fetch data from volunteer_details_page_two
$sql_page_two = "SELECT * FROM volunteer_details_two WHERE id = 5"; // Adjust the condition as needed
$result_page_two = mysqli_query($conn, $sql_page_two);
$profile_page_two = mysqli_fetch_assoc($result_page_two);



// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunteerProfile</title>
    <style>
        /* Your existing styles remain unchanged */
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(204, 207, 210);
            font-family: Arial, sans-serif;
        }
        
        #sidebar {
            position: fixed;
            width: 60px;
            height: 100%;
            background-color: #fffefe;
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }
        /*#sidebar a:hover {
            width: 10px;
            height: 15px;
        }*/
        
        #sidebar a {
            text-decoration: none;
            color: #fff;
            margin-bottom: 40px;
            cursor: pointer;
        }
        
        #sidebar a:hover {
            background-color: #e9e3e3;
            text-decoration: underline;
            text-decoration-color: #000000;
        }
        
        #sidebar a.active {
            text-decoration: underline;
            text-decoration-color: #000000;
        }
        
        img {
            height: 25px;
            width: 28px;
        }
        
        #content {
            margin-left: 60px;
            /* Adjust according to sidebar width */
            padding: 20px;
        }
        
        #content h1 {
            text-align: center;
            font-weight: bold;
            margin-top: 25px;
            /*creating space on top of container for any requirements needed*/
        }
        
        .container11 {
            width: 49%;
            float: left;
        }
        
        .container12 {
            width: 49%;
            float: right;
        }
        
        .lrow {
            text-align: left;
        }
        
        .container {
            background-color: #f4f4f4;
            /*width: 70%;*/
            padding: 20px;
            margin-top: 20px;
            overflow-x: auto;
            max-height: 500px;
            max-width: 1400px;
            overflow-y: auto;
            border-radius: 3px;
            display: flex;
            /* Use flexbox for layout */
            justify-content: space-between;
            /* Distribute space between children */
        }
        
        .container1,
        .container2 {
            width: 48%;
            /* Adjust width as needed */
        }
        
        .lrow {
            text-align: right;
        }
        
        .button {
            background-color: #13960c;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 8px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            margin-bottom: 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div id="sidebar">
        <a href="Home_page.php" title="Home"><img src="https://www.freeiconspng.com/uploads/home-house-silhouette-icon-building--public-domain-pictures--20.png"></a>
        <!--<a href="http://127.0.0.1:5500/profiles.html" title="Volunteer Profile"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>-->
        <a href="volunteerdetails1.html" title="Master page"><img src=https://cdn4.iconfinder.com/data/icons/project-management-72/70/group__team__management__employees_-512.png></a>
        <a href="login.html" title="logout"><img src="https://www.dlf.pt/dfpng/middlepng/356-3564451_a-shutdown-restart-icons-transparent-background-logout-icon.png"></a>
        <!-- Sidebar content remains unchanged -->
    </div>
    
    <div id="content">
        <div class="container">

            <div class="container1">
                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Name:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?= $profile_page_one["name"] ?></label>
                        </div>
                    </div>
                </div>
                <!-- Add other profile information for container1 -->
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Email Address:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_registration["email"]  ?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Country code:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_one["country_code"]?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Phone number:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_one["phone_number"]?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Country:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_one["country"]?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>City:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_one["city"]?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>College:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label> <?=$profile_page_two["college"]?> </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>

            <div class="container2">
                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Course:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_two["course"]?></label>
                        </div>
                    </div>
                </div>
                <!-- Add other profile information for container2 -->
                <br>
                <br>
                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Source of Joining:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_two["linkedin"]?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="container11">
                        <div class="lrow">
                            <label><strong>Facebook link:</strong></label>
                        </div>
                    </div>
                    <div class="container12">
                        <div class="rrow">
                            <label><?=$profile_page_two["facebook"]?></label>
                        </div>
                    </div>
                </div>
                <br>
                <br>


            </div>

        </div>
    </div>

</body>

</html>