<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page for volunteers</title>
    <?php
    include("Home.php");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
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
        
        #sidebar a:hover {
            background-color: #e9e3e3;
            text-decoration: underline;
            text-decoration-color: #000000;
        }
        
        #sidebar a.active {
            text-decoration: underline;
            text-decoration-color: #000000;
        }
        
        #sidebar a {
            text-decoration: none;
            color: #fff;
            margin-bottom: 40px;
            cursor: pointer;
        }
        
        .container_cards {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        
        .cards {
            padding: 20px;
            background: #fff;
            border-color: #000000;
            height: 160px;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* items will be evenly spread with space between them */
        }
        
        .col-lg-3 {
            flex-basis: calc(25% - 20px);
            /* Adjust the width of each column */
            margin-bottom: 20px;
            /* Add margin to create space between the cards */
        }
        
        .cards img {
            width: 90%;
            height: auto;
            object-fit: cover;
            /* This property ensures the image covers the entire space while maintaining its aspect ratio */
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
            max-height: 450px;
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
        /*styling for popup
        
        .userinputs {
            justify-content: center;
            /*padding: 0px;*
            font-size: 20px;
            border-color: black;
            display: absolute;
        }*/
        
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
            width: 450px;
            height: 450px;
            top: 2%;
            left: 4%;
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
        /*.table td {
            height: 30px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
        }
        
        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            /*border-top: 1px solid #ddd;*
        }*/
        
        .status-dropdown {
            width: 100%;
            height: 100%;
            /* background-color: rgb(235, 240, 240);*/
            background-color: solid #ddd;
            border: 0px;
        }
        
        .search-container {
            float: right;
            /* Float the container to the right */
            margin-top: 10px;
            /* Adjust the margin as needed */
        }
        
        .search-container label {
            margin-left: 10px;
            /* Add some space between the label and input field */
        }
        
        .search-container input[type="text"] {
            height: 30px;
            padding: 5px;
        }
    </style>
</head>

<body>

    <div id="sidebar">

        <a href="http://127.0.0.1:5500/Home_page.html" title="Home"><img src="https://www.freeiconspng.com/uploads/home-house-silhouette-icon-building--public-domain-pictures--20.png"></a>
        <!--<a href="http://127.0.0.1:5500/profiles.html" title="Volunteer Profile"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>-->
        <a href="masterpage.html" title="Master page"><img src=https://cdn4.iconfinder.com/data/icons/project-management-72/70/group__team__management__employees_-512.png></a>
        <a href="http://127.0.0.1:5500/sign_in.html" title="Logout"><img src=https://www.dlf.pt/dfpng/middlepng/356-3564451_a-shutdown-restart-icons-transparent-background-logout-icon.png></a>
    </div>


    <div id="content">
        <div class="">
            <div class="container_cards">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="cards">
                            <div class="card-1">
                                <h4 style="color:#331c4d;"><strong>Welcome <br><hr>korlagunta pallavi</strong></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="cards">
                            <center><img src="https://adore.simtrak.in/data/sys/com_logo.png"><br>
                                <strong>International  Volunteer management System</strong></center>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="cards">
                            Powered By<br>
                            <img src="https://adore.simtrak.in/data/sys/logo_min.png"><br><br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="cards">
                            Today is
                            <h3>27/02/2024</h3><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">

            <a href="volunteerdetails.php" class="button" onclick="addVolunteer()">Add Volunteer</a>

            <a href="addvolunteer_page.html" class="button" onclick="addVolunteerTask()">Add Task</a>

            <!--<a href="#" class="button" id="Add task" onclick="openPopup()">Add Task</a> /// by this add volunteer button acts as an popup


            !--<a href="#" class="button" id="Add task" onclick="openPopup()">Add task </a> ///by this an oter button will be displayed for popup of adding task-->

            <!--<label><div class="search_button" style="float: right"> Search: 
                <input type="text" name="search"  id="volunteer_task" onkeyup="filterFunction()" style="float:right">
                </div>
            </label>-->

            <!--<label>   for now
                <div class="search_button" style="float: right"> Search: 
                    <input type="text" name="search" id="searchInput" onkeyup="filterTable()" style="float:right">
                </div>
            </label>-->

            <div class="search-container">
                <label>
                    Search:
                    <input type="text" name="search" id="searchInput" onkeyup="filterTable()">
                </label>
            </div>




            <br>
            <br>

            <div id="popup-container" class="popup">
                <div class="popup-content">
                    <span id="close-popup" class="close-icon">X</span>
                    <h1>Task form</h1>
                    <hr>

                    <form>

                        <div class="input-box">
                            <label>Task Name</label>
                            <input type="text" placeholder="Enter city name" style="height: 35px;">
                        </div>

                        <br>
                        <a href="#" class="button" id="close-popup" onclick="closePopup()" display="">Submit </a>
                        <br>
                    </form>

                </div>
            </div>


            <table class="table" id="volunteer_tasktable">
                <thead>
                    <th width="110px"> Volunteer ID</th>
                    <th width="200px">Name</th>
                    <th width="200px">Task</th>
                    <th width="200px">Action</th>
                    <th width="150px">Status
                        <!--<select class="status-dropdown" style="width:100%; height:35px">
                        <option value="ongoing">Active</option>
                        <option value="purged">Progressive</option>
                        <option value="completed">Dormant</option>
                        </select>--></th>
                    <!--<th></th>-->
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td>

                                <a class="text-heading font-semibold" href="#">
                                    #
                                    <?php echo $row ["id"] ?>
                            </td>
                            <td>
                                <?php echo $row["name"] ?>
                            </td>
                            <td>
                                
                <button type="button" class="btn btn-outline-primary"><a href="UserTasks1.php?user_id=<?php echo $row["user_id"] ?>"  > <i class="ri-list-check-3"></i></a></button>
                                
                            </td>
                            <td>
                                <?php echo $row["action"] ?>
                            </td>
                            <td>
                                <?php echo $row["status"] ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>


        </div>
    </div>
    <script>
        function addVolunteerTask() {
            var table = document.getElementById("volunteer_tasktable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            // Add cells
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);



            // Populate cells with default values or input fields
            cell1.innerHTML = ""; // Volunteer ID
            cell2.innerHTML = ""; // Name
            cell3.innerHTML = ""; // Task Name
            cell4.innerHTML = ""; // Action
            cell5.innerHTML = ""; // Status
            // cell6.innerHTML = "";
        }
    </script>

    <!--<script>
                  // javascript functionality for searching by volunteer id
        function filterFunction(event) {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("volunteer_task");
            filter = input.value.toUpperCase();
            table = document.getElementById("volunteer_tasktable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>-->
    <!--<script>
        //javascript functionality for searching by volunteer name
        function filterFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("volunteer_task");
            filter = input.value.toUpperCase();
            table = document.getElementById("volunteer_tasktable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Change the index to 1 for name column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>-->

    <script>
        // Function to open the popup
        function openPopup() {
            document.getElementById("popup-container").style.display = "block";
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("popup-container").style.display = "none";
        }

        // Event listener to open the popup when Sign In button is clicked
        document.getElementById("Add task").addEventListener("click", openPopup);

        // Event listener to close the popup
        document.getElementById("close-popup").addEventListener("click", closePopup);
    </script>

    <!--<script>
        function filterByTask(selectedTask) {
            var table = document.getElementById("volunteer_tasktable").getElementsByTagName('tbody')[0];
            var tr = table.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[2]; // Index 2 for Task Name column
                if (td) {
                    var taskName = td.textContent || td.innerText;
                    if (selectedTask === "All" || taskName === selectedTask) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>-->

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
            // Get the home page icon element
            var homePageIcon = document.querySelector("#sidebar a[href='http://127.0.0.1:5500/Home_page.html']");

            // Add a click event listener to the home page icon
            homePageIcon.addEventListener("click", function() {
                // Remove the "active" class from all sidebar links
                var sidebarLinks = document.querySelectorAll("#sidebar a");
                sidebarLinks.forEach(function(link) {
                    link.classList.remove("active");
                });

                // Add the "active" class to the home page icon
                homePageIcon.classList.add("active");
            });
        });
    </script>



</body>

</html>