<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeputyAdmin_page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(204, 207, 210);
            background-image: url(https://www.imageshine.in/uploads/gallery/Free-photo-abstract-luxury-gradient-blue-Wallpaper-Free-Download.jpg);
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
        
        #content {
            margin-left: 60px;
            /* Adjust according to sidebar width */
            padding: 20px;
        }
        
        #content h1 {
            text-align: center;
            font-weight: bold;
            margin-top: 25px;
            /*creating space on top of welcome to adore for any requirements needed*/
        }
        
        .container {
            background-color: #f4f4f4;
            padding: 20px;
            margin-top: 20px;
            overflow-x: auto;
            max-height: 700px;
            max-width: 1400px;
            overflow-y: auto;
            border-radius: 3px;
            /* Enable vertical scrolling */
        }
        
        img {
            height: 25px;
            width: 28px;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table td,
        .table th {
            height: 30px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
        }
        
        .table th {
            color: #241c1c;
        }
        
        .table tbody tr:nth-child(even) {
            background-color: rgb(235, 240, 240);
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
        
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }
        
        .popup-content {
            background: rgb(229, 233, 231);
            padding: 20px;
            border-radius: 5px;
            position: relative;
            width: 400px;
            height: 250px;
            top: 25%;
            left: 40%;
        }
        
        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        
        .input-box {
            width: 100%;
            margin-top: 20px;
        }
        
        .input-box {
            color: black;
        }
        
        .fa-angle-right {
            float: right;
        }
        
        .fa-angle- .form :where(.input-box) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #000000;
            margin-top: 2px;
            border: 1px solid #ddd;
            border-bottom-width: 3px;
            border-radius: 6px;
            padding: 0 15px;
        }
        
        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }
        
        .status-dropdown {
            width: 100%;
            height: 100%;
            /* background-color: rgb(235, 240, 240);*/
            background-color: solid #ddd;
            border: 0px;
        }
    </style>
</head>

<body>

<div id="sidebar">
        <a href="http://127.0.0.1:5501/Home_page.html" title="Home"><img src="https://www.freeiconspng.com/uploads/home-house-silhouette-icon-building--public-domain-pictures--20.png"></a>
        <a href="http://127.0.0.1:5501/masterpage.html" title="Master page"><img src="https://cdn4.iconfinder.com/data/icons/project-management-72/70/group__team__management__employees_-512.png"></a>
        <a href="http://127.0.0.1:5501/Admin_page.html#" title=" DeputyAdmin_page"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>
        <a href="http://127.0.0.1:5501/sign_in.html" title="Logout"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFvB6_NT7_HiGoWadFTjXVTOmOqrtII8V4jTrlJLInxg&s"></a>
    </div>

    <div id="content">

        <div class="container">

            <a  class="button" onclick="addVolunteer()">Add Volunteer</a>

            <a  class="button" onclick="addVolunteerTask()">Add Task</a>



            <label>
                <div class="search_button" style="float: right"> Search: 
                    <input type="text" name="search" id="searchInput" onkeyup="filterTable()" style="float:right">
                </div>
            </label>

            <br>
            <br>

            <div id="popup-container" class="popup">
                <div class="popup-content">
                    <span id="close-popup" class="close-icon">X</span>
                    <a href="#" id="close-popup" class="close-icon" onclick="closePopup()" display="" text-decoration="none">X</a>
                    <h1>Task form</h1>
                    <hr>

                    <form>

                        <div class="input-box">
                            <label>Name</label>

                        </div>

                        <div class="input-box">
                            <label>Task Name</label>

                        </div>

                    </form>

                </div>
            </div>


            <table class="table" id="volunteer_tasktable">
                <thead>
                    <!--<th width="110px"> Volunteer ID</th>
                    <th width="200px">Name</th>
                    <th>Coordinator Name</th>
                    <th width="250px">Team Name</th>
                    <th width="150px">Status</th>-->

                    <th width="120px"> Volunteer ID</th>
                    <th>Name</th>
                    <th>Coordinator Name</th>
                    <th>Team Name</th>
                    <th>Status</th>

                </thead>
                <tbody>
                    <?php 
                    include("db_connect.php");
                    include("fetch_data.php");
                    if($registeredUser->num_rows>0){
                     while($user = $registeredUser->fetch_assoc()){ 
                        // take user email and fetch the coordinator name and team name from the registration table
                        $email = $user['email'];
                        $sql = "SELECT * FROM registration WHERE email = '$email'";
                        if($conn->query($sql)){
                            $result = $conn->query($sql);
                            $result = $result->fetch_assoc();
                            
                            if($result == null)
                            $result = array('coordinator'=>'N/A','teamname'=>'N/A');
                        }
                       
                        ?>
                    <tr role="row" class="row-1">
                        <td data-label=" s.no"><a href="#" class="profileLink"><?php echo $user['id']?></a></td>
                        <td class="name-cell" data-label=" name"><?php echo $user['first_name']?></td>
                        <td data-label=" coordinator name"><?php echo $result['coordinator']?></td>
                        <td data-label=" team name"><?php echo $result['teamname']?></td>
                        <td data-label=" status"><?php echo $user['user_status']?></td>
                        <!--<td data-label="  "></td>-->
                    </tr>
                    <?php }} ?>

                </tbody>
            </table>


        </div>
    </div>

    <script>
        //adding volunteer
        function addVolunteer() {
            window.location.href = "volunteer_details-1.php?loc=Admin_page";
        }
        //adding task for a particular volunteer
        function addVolunteerTask() {
            window.location.href = "addvolunteer_pagenew.php?loc=Admin_page";
        }
    </script>

    <!-- <script>
        function addVolunteerTask() {
            var table = document.getElementById("volunteer_tasktable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            // Add cells
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);




            cell1.innerHTML = ""; // Volunteer ID
            cell2.innerHTML = ""; // Name
            cell3.innerHTML = ""; // Coordinator name
            cell4.innerHTML = ""; // Team name
            cell5.innerHTML = ""; // Status
            // cell6.innerHTML = "";
        }
    </script> -->



    <script>
        // JavaScript function to filter the table based on input value
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("volunteer_tasktable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                var tdArray = tr[i].getElementsByTagName("td");

                for (var j = 0; j < tdArray.length; j++) {
                    td = tdArray[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break; // Break the inner loop if a match is found in any cell
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get all elements with the class "name-cell"
            var nameCells = document.querySelectorAll(".name-cell");

            // Add a click event listener to each name cell
            nameCells.forEach(function(nameCell) {
                nameCell.addEventListener("click", function() {
                    // Show the popup
                    openPopup();
                });
            });
        });

        // Function to open the popup
        function openPopup() {
            document.getElementById("popup-container").style.display = "block";
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("popup-container").style.display = "none";
        }
    </script>

    <script>
            //collect the userIDs from the table and redirect the user to the profile page
            // Get all anchor elements with the class "profileLink"
            const anchorElements = document.querySelectorAll('.profileLink');

            // Add a click event listener to each anchor tag
            anchorElements.forEach((anchor) => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const userId = anchor.textContent;
                loadProfile(userId);
            });
        });


            //Javascritp function to redirect the user to the profile page
            function loadProfile(volunteerId) {

        location.href = './profile.php?user_id=' + volunteerId ;
        }
        </script>

<?php include('closeConnection.php'); ?>

</body>

</html>