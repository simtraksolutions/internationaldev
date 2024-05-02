<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunteerProfile</title>
    <?php
include('db_connect.php');
include('fetch_data.php');
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(235, 237, 238);
            background-image: url(https://www.imageshine.in/uploads/gallery/Free-photo-abstract-luxury-gradient-blue-Wallpaper-Free-Download.jpg);
            font-family: Arial, sans-serif;
            background-size: cover;
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
            justify-content: space-between;
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
        
        .content1 {
            display: flex;
        }
        
        .container {
            background-color: white;
            width: 70%;
            padding: 20px;
            margin-top: 80px;
            margin-right: 50px;
            overflow-x: auto;
            max-height: 500px;
            max-width: 1400px;
            overflow-y: auto;
            border-radius: 3px;
            display: flex;
            justify-content: space-between;
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
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            /* margin: 4px 2px; */
            /* margin-bottom: 15px; */
            cursor: pointer;
        }
        
        .content_tasks {
            background-color: white;
            height: 180px;
            width: 1050px;
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        
        button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: white;
        }

        .button_dormant{
            background-color: #ffb300;
            color: black;
        }
        .button_suspend{
            background-color: red;
        }
        .all-tasks {
            background-color: blue;
            color: white;
        }
        
        .ongoing-tasks {
            background-color: orange;
            color: white;
        }
        
        .completed-tasks {
            background-color: green;
            color: white;
        }
        
        .ongoing-tasks {
            background-color: orange;
            color: white;
        }
        
        .completed-tasks {
            background-color: green;
            color: white;
        }
        
        #photo-container {
            width: 300px;
            height: 300px;
            /* Adjust container size as needed *
            border: 2px dashed #ccc;
            /*margin-left: 1100px;*/
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        #photo-preview {
            max-width: 100%;
            max-height: 100%;
            /* Adjust the size of the photo within the container */
            width: auto;
            height: auto;
        }
        
        .volunteer_photo {
            height: fit-content;
            width: fit-content;
            padding-top: 80px;
        }
        
        .content1 {
            flex-direction: row;
            display: flex;
        }

        
        #photo-upload {
         color: white;}


         /* Table styles */
         table {
            width: 100%;
            border-collapse: collapse;
            
        }

        /* Header row styles */
        th {
            background-color: #041065;
            color: white;
            padding: 10px;
            text-align: left;
        }

        /* Data row styles */
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Alternate row color */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .content_tasks {
        overflow: scroll;
        border-radius: 5px;
        }
    </style>
</head>

<body>

    <div id="sidebar">
        <a href="http://127.0.0.1:5500/Home_page.html" title="Home"><img src="https://www.freeiconspng.com/uploads/home-house-silhouette-icon-building--public-domain-pictures--20.png"></a>
        <!--<a href="http://127.0.0.1:5500/profiles.html" title="Volunteer Profile"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>-->
        <a href="http://127.0.0.1:5500/masterpage.html" title="Master page"><img src=https://cdn4.iconfinder.com/data/icons/project-management-72/70/group__team__management__employees_-512.png></a>
        <a href="http://127.0.0.1:5500/Admin_page.html#" title=" DeputyAdmin_page"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>
        <a href="http://127.0.0.1:5500/sign_in.html" title="Logout"><img src=https://www.dlf.pt/dfpng/middlepng/356-3564451_a-shutdown-restart-icons-transparent-background-logout-icon.png></a>

    </div>

    <div id="content" style="padding-left:50px;">
        <div class="content1">
            <div class="container" style="padding-left:40px; padding-right:40px;">
                <div class="container1">
<?php
    if ($personalDetails->num_rows > 0) $personal = $personalDetails->fetch_assoc();
    if ($eduDetails->num_rows > 0) $edu = $eduDetails->fetch_assoc();
 ?>
                    <h2 style="font-weight:bold; margin-top:0; margin-bottom: 2px;"><?php echo $personal['first_name']?></h2>
                    <h2 style="font-weight:100; margin-top:0">NIN - 0000 (yet-to-connect with backend)</h2>
                    <br>
                    <br>

                    <div class="row">
                        <div class="container11">
                            <div class="lrow">
                                <label><strong>Status:</strong></label>
                            </div>
                        </div>
                        <div class="container12">
                            <div class="rrow">
                            <a href="#" id="status" class="button">backend-yet-to-connect</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="container11">
                            <div class="lrow">
                                <label><strong>Name:</strong></label>
                            </div>
                        </div>
                        <div class="container12">
                            <div class="rrow">
                            <label><?php echo $personal['first_name']?></label>
                            </div>
                        </div>
                    </div>--


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
                            <label><?php echo $personal['email']?></label>                            </div>
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
                            <label><?php echo $personal['country_code']?></label>
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
                            <label><?php echo $personal['phone_number']?></label>
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
                            <label><?php echo $personal['country']?></label>
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
                            <label><?php echo $personal['city']?></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="container11">
                            <div class="lrow">
                                <label><strong>Source of joining:</strong></label>
                            </div>
                        </div>
                        <div class="container12">
                            <div class="rrow">
                            <label><?php echo $personal['source_of_joining']?></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>

                <div class="container2" style="margin-top: 105px;">
                    <div class="row">
                        <div class="container11">
                            <div class="lrow">
                                <label><strong>College/University:</strong></label>
                            </div>
                        </div>
                        <div class="container12">
                            <div class="rrow">
                            <label><?php echo $edu['college']?></label>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="container11">
                            <div class="lrow">
                                <label><strong>Course:</strong></label>
                            </div>
                        </div>
                        <div class="container12">
                            <div class="rrow">
                            <label><?php echo $edu['course']?></label>
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
                            <label><?php echo $edu['facebook']?></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="container11">
                            <div class="lrow">
                                <label><strong>linkedin link:</strong></label>
                            </div>
                        </div>
                        <div class="container12">
                            <div class="rrow">
                            <label><?php echo $edu['linkedin']?></label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <br>
            <br>
            <div class="volunteer_photo">
                <input type="file" id="photo-upload" accept="image/*" style="padding-left: 00px;">
                <div id="photo-container" style="background-color: white;">
                    <img id="photo-preview" src="" alt="Uploaded Photo">
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="task_section">

<button id="all-tasks" onclick="loadTasks('all')">All Tasks</button>
<button id="just-allotted" onclick="loadTasks('just_allotted')">Just Allotted</button>
<button id="started" onclick="loadTasks('started')">Started </button>
<button id="under-progress" onclick="loadTasks('under_progress')">Under Progress</button>
<button id="completed" onclick="loadTasks('completed')">completed</button>
<button id="purged-cancelled" onclick="loadTasks('purged')">Purged / Cancelled</button>
<button id="about-to-be-completed" onclick="loadTasks('about_to_complete')">About to be completed</button>

<br>
<br>

<div class="content_tasks">
    <table id="task-table">
        <tr>
            <th>Task ID</th>
            <th>Assigned date</th>
            <th>Task Details</th>
            <th>Status</th>
        </tr>
        <!-- PHP code to fetch data and display rows ...-->
        <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // if($row['user_id'] == 3)
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["allotment"]. "</td><td>" . $row["task_name"]. "</td><td>" . $row["status"]. "</td></tr>";
                }
            } else {
                echo "No tasks found";
            }
        ?> 

        
    </table>
</div>
</div>



    </div>

    <script>

           //show the status of the user 
       
    const statusButton = document.getElementById('status');
    if (statusButton.textContent.trim() === 'dormant') statusButton.classList.add('button_dormant');
    else if (statusButton.textContent.trim() === 'suspended') statusButton.classList.add('button_suspend');

    // Function to handle photo upload and preview 
        const photoUpload = document.getElementById('photo-upload');
        const photoPreview = document.getElementById('photo-preview');

        photoUpload.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    photoPreview.src = this.result;
                });

                reader.readAsDataURL(file);
            } else {
                photoPreview.src = '';
            }
        });

         // Function to load tasks based on status
    function loadTasks(status) {

const userId = <?php echo $personal['id']?>;
location.href = window.location.pathname + '?task_status=' + status +'&user_id=' + userId;}
    </script>


<?php include('closeConnection.php'); ?>

</body>

</html>