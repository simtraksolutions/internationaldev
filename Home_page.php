<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page for volunteers</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
        include('db_connect.php');
        include("fetch_data.php");
        include("sortData.php")
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(231, 233, 234);
            background-image: url(https://as2.ftcdn.net/v2/jpg/03/88/34/91/1000_F_388349109_Rq6f7ZqP7NKitbkCkdfm8sSJd1rnb9ls.jpg);
            /*background-image: url(https://www.imageshine.in/uploads/gallery/geometric-Blue-Wallpaper-Free-Download.jpg);*/
            /*background-image: url(https://media.istockphoto.com/id/1419766496/photo/abstract-concepts-of-cybersecurity-technology-and-digital-data-protection-protect-internet.webp?b=1&s=612x612&w=0&k=20&c=mMG_-IOsy9IOupqSDvEbeqduD-LGZ3bBp1fZ5pXoIwA=);
            /*background-image: url(https://www.imageshine.in/uploads/gallery/Free-photo-abstract-luxury-gradient-blue-Wallpaper-Free-Download.jpg);*/
            font-family: Arial, sans-serif;
            /* make background image cover the entire scrren */
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
        /*.container_cards {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }*/
        /*.row {
            margin-right: px;
            margin-left: 20px;
        }*/
        /*.col-lg-3 {
            float: left;
            width: 23%;
            height: 180px;
            padding-left: 10px;
            padding-right: 10px;
        }*/
        
        .cards {
            padding: 20px;
            background: #fff;
            border-color: #000000;
            height: 160px;
            width: 300px;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* items will be evenly spread with space between them */
            padding-right: 120px;
        }
        
        .col-lg-3 {
            flex-basis: calc(25% - 20px);
            /* Adjusting the width of each column */
            margin-bottom: 20px;
            /* Add margin to create space between the cards */
        }
        
        .cards img {
            width: 70%;
            height: auto;
            object-fit: cover;
            /* This property ensures the image covers the entire space while maintaining its aspect ratio */
        }
        
        #content {
            margin-left: 60px;
            /* Adjust according to sidebar width */
            padding: 20px;
            padding-top: 50px;
        }
        
        #content h1 {
            text-align: center;
            font-weight: bold;
            margin-top: 25px;
            /*creating space on top of welcome to adore for any requirements needed*/
        }
        
        .container {
            background-color: #f4f4f4;
            /*background-image: url(https://www.imageshine.in/uploads/gallery/Free-photo-abstract-luxury-gradient-blue-Wallpaper-Free-Download.jpg);*/
            padding: 20px;
            margin-top: 20px;
            overflow-x: auto;
            /*max-height: 800px;*/
            max-width: 1350px;
            height: 75  0px;
            /* overflow-y: auto; */
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
        
        .status-dropdown {
            width: 100%;
            height: 100%;
            /* background-color: rgb(235, 240, 240);*/
            background-color: solid #dedada;
            border: 0px;
        }
        
        .search-container {
            float: right;
            /* Float the container to the right */
            margin-top: 10px;
            /* A
            djust the margin as needed */
        }
        
        .search-container label {
            margin-left: 10px;
            /* Add some space between the label and input field */
        }
        
        .search-container input[type="text"] {
            height: 30px;
            padding: 5px;
        }

          .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 450px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .close {
            color: #aaa;
            float: right;
            margin-left: 380px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
        
        .modal-content p {
            margin-bottom: 15px;
        }
        
        .modal-content button {
            background-color: #13960c;
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .modal-content button:hover {
            background-color: #0d7709;
        }
        
        .action-button1:hover {
            background-color: #3b65af;
        }
        
        .action-button1:hover img {
            filter: brightness(80%);
        }

        #taskSelect{
            margin: 10px;
        }

        .sorted{
            background-color: #efeeee !important;
        }

        .status{
            margin: 2px;
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

            <a class="button" onclick="addVolunteer()">Add Volunteer</a>

            <a class="button" onclick="addVolunteerTask()">Add Task</a>

            <div class="search-container" style="display: flex; align-items: center; justify-content: center;">
                <label>
                    <div class="search">
                        Search:
                        <input type="text" name="search" id="searchInput" onkeyup="filterTable()">
                    </div>
                </label>
                <label>
                <div>
                <form method="POST" id="statusForm">
                <div class="status">
        Active <input type="checkbox" name="active" id="active" class="status" <?php echo isset($_POST['active']) ? 'checked' : ''; ?>>
        Dormant <input type="checkbox" name="dormant" id="dormant" class="status" <?php echo isset($_POST['dormant']) ? 'checked' : ''; ?>>
        Suspended<input type="checkbox" name="suspended" id="suspended" class="status" <?php echo isset($_POST['suspended']) ? 'checked' : ''; ?>>
    </div>
                <select name="sort_field" id="sort" style="height:30px;width:200px; padding: 5px;" onchange="this.form.submit()">
                    <option></option>
                    <option value="1 Article-own" <?php echo (isset($_POST['sort_field']) && $_POST['sort_field'] == '1 Article-own') ? 'selected' : ''; ?>>1 Article-own</option>
                    <option value="1 webinar-own" <?php echo (isset($_POST['sort_field']) && $_POST['sort_field'] == '1 webinar-own') ? 'selected' : ''; ?>>1 webinar-own</option>
                    <option value="5 Articles" <?php echo (isset($_POST['sort_field']) && $_POST['sort_field'] == '5 Articles') ? 'selected' : ''; ?>>5 Articles</option>
                    <option value="Organise young leader activites" <?php echo (isset($_POST['sort_field']) && $_POST['sort_field'] == 'Organise young leader activites') ? 'selected' : ''; ?>>Organise young leader activites</option>
                    <option value="Volunteer Team to be created" <?php echo (isset($_POST['sort_field']) && $_POST['sort_field'] == 'Volunteer Team to be created') ? 'selected' : ''; ?>>Volunteer Team to be created</option>
                    <option value="20 participants for any program" <?php echo (isset($_POST['sort_field']) && $_POST['sort_field'] == '20 participants for any program') ? 'selected' : ''; ?>>20 participants for any program</option>
                </select>
            </form>
                </div>
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
                    <th width="150px">Status</th>
                    <!--<th></th>-->
                </thead>
                <tbody>

                <?php foreach ($volunteers as $volunteer): ?>
                    <tr class='sorted'>
                        <!-- Add your table data here -->
                    <td class='sorted' data-label=" s.no"><a href="#" class="profileLink"><?php echo $volunteer['id']?></a></td>
                        <td class='sorted'><?php echo $volunteer['first_name']; ?></td>
                        <td class='sorted' data-label=" task">
                            <button type="button" class="btn btn-outline-primary"><a href="#"><i class="ri-list-check-3"></i></a></button>
                        </td>
                        <td class='sorted'>
                            <button type="button" class="action-button1" style="padding: 0px;border-radius: 5px;" onclick="openPopup()">
                                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/update-2473968-2057919.png?f=webp"
                                    style="width:38px; height:30px; background-color:#262697; "
                                    title="Update Status">
                            </button>
                        </td>
                        <td class='sorted' data-label=" status"><?php echo $volunteer['user_status']?></td>
                        <!-- Add more table data here -->
                    </tr>
                <?php endforeach; ?>


                    <?php
                        if($registeredUser->num_rows > 0)
                        {  while($row = $registeredUser->fetch_assoc()){?>
                  
                    <tr role="row" class="row-1">
                    <td data-label=" s.no"><a href="#" class="profileLink"><?php echo $row['id']?></a></td>
                        <td data-label=" name"><?php echo $row['first_name']?></td>
                        <td data-label=" task">
                            <button type="button" class="btn btn-outline-primary task-btn"><a href="#" ><i class="ri-list-check-3"></i></a></button>
                        </td>
                        <td>
                            <button type="button" class="action-button1" style="padding: 0px;border-radius: 5px;" onclick="openPopup()">
                                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/update-2473968-2057919.png?f=webp"
                                    style="width:38px; height:30px; background-color:#262697; "
                                    title="Update Status">
                            </button>
                            <!--<button type="button" class="action-button2" style="padding: 0px;border-radius: 5px;" onclick="window.location.href='http://127.0.0.1:5500/volunteers_tasks.html'" title="Task update">
                                <img
                                    src="https://www.shutterstock.com/image-vector/update-icon-web-refresh-sign-260nw-1281047068.jpg"
                                    style="width:38px; height:30px; background-color:#4f6f4e;">
                            </button>-->
                        </td>
                        <td data-label=" status"><?php echo $row['user_status']?></td>
                        <!--<td data-label="  "></td>-->
                    </tr>


                    <?php }}?>

                    
                
                </tbody>
            </table>


        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2 style="margin-bottom:15px;">Update Status</h2>


            <select name="task" id="userStatus" style="width: 400px; height: 48px; border-radius:4px;">
                <option value="task0">Dormant</option>
            </select>
            <br>
            <select name="task" id="updatedStatus" style="width: 400px; height: 48px; border-radius:4px;">
                <option value="Active">Active</option>
                <option value="Dormant">Dormant</option>
                <option value="Suspended">Suspended</option>
                
            </select>
            <br><br>

            <button onclick="submitStatus()">Update</button>
        </div>
    </div>


    <script>
        //adding volunteer
        function addVolunteer() {
            window.location.href = "volunteer_details-1.php?loc=Home_page";
        }
        //adding task for a particular volunteer
        function addVolunteerTask() {
            window.location.href = "addvolunteer_pagenew.php?loc=Home_page";
        }
    </script>

<script>
        function openPopup() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';
        }

        function closePopup() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }

        function submitStatus() {
            // Perform actions like updating status
            // For example, you can fetch data from inputs or perform an AJAX request
            alert('Status updated successfully!');
            closePopup(); // Close the modal after the action is performed
        }
    </script>


<!-- auto submit the form when the user changes checkboxes -->
<script>
// Get all checkboxes with the class "status"
const checkboxes = document.querySelectorAll('.status');

// Add a click event listener to each checkbox
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
        // Submit the form
        document.getElementById('statusForm').submit();
    });
});
</script>

    

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


//add event listener to the task button and open the task page of that particular user
// Get all table rows
const tableRows = document.querySelectorAll('tr');
//add event listener to each row
tableRows.forEach((row) => {
    row.addEventListener('click', (e) => {
        e.preventDefault();
        //get the user id from the row which is there in the second column
        const userId = row.querySelector('td').textContent;
        console.log(userId);

        // loadTasks(userId);
        // Get the task button from the row
        const taskButton = row.querySelector('.task-btn');
        // Add a click event listener to the task button
        taskButton.addEventListener('click', (e) => {
            e.preventDefault();
            // Get the user ID from the row
            console.log(userId);
            loadTasks(userId);

        
        });


        //get the action button from the row
        const actionButton = row.querySelector('.action-button1');  
        //add event listener to the action button
        actionButton.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(userId);
        });

    });
   
});



//Javascritp function to redirect the user to the profile page
        function loadProfile(volunteerId) {

    location.href = './profile.php?user_id=' + volunteerId ;
    }


//javascript function to redirect the user to the task page
        function loadTasks(volunteerId) {
            location.href = './volunteers_tasks.php?user_id=' + volunteerId;
        }
    </script>


<script>
    //make the rows with class row-1 hidden when the option is selected
    // Get the select element
    const selectElement = document.querySelector('#sort');
    selectElement.addEventListener('change', (e) => {
        const rows = document.querySelectorAll('.row-1');
        // Loop through each row
        rows.forEach((row) => {
            // Check if the selected value is "All"
            if (selectedValue === 'All') {
                // Show the row
                row.style.display = 'table-row';
            } else {
                // Hide the row
                row.style.display = 'none';
            }
        });
    });


</script>

<script>
    
    function updateStatus(userId){
        console.log(userId);
    }
</script>
       
<!-- <script>
    function changeUserStatus(task_status, task_id) {
        if(task_status == "Purged/Cancelled")
        task_status = "cancelled";
        window.location.href = `changeStatus.php?status=${task_status}&task_id=${task_id}&user_id=<?php echo $userId ?>`;
    }
</script> -->

<?php include('closeConnection.php'); ?>


</body>

</html>