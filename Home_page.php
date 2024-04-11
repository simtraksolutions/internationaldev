<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page for Volunteers</title>
    <?php
    include("db_connection.php");
    include("fetch_data.php");
    ?>
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
           
            margin: 0;
            padding: 0;
            background-color: rgb(204, 207, 210);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          
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
            max-height: 500px;
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

        a{
            color:black;
        }
        a i:hover{
            color:white;
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

        .search_button{
            margin-left: 900px ;
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

        <a href="Home_page.php"><img
                src="https://www.freeiconspng.com/uploads/home-house-silhouette-icon-building--public-domain-pictures--20.png"></a>
        <a href="user.php"><img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU"
                style="height: 28px; width:28px"></a>
        <a href="volunteerdetails.php"><img
                src=https://cdn4.iconfinder.com/data/icons/project-management-72/70/group__team__management__employees_-512.png></a>
        <a href="login.html"><img
                src=https://www.dlf.pt/dfpng/middlepng/356-3564451_a-shutdown-restart-icons-transparent-background-logout-icon.png></a>
    </div>

    <div id="content">
        <h1>Welcome to ADORE</h1>
        <div class="container">

            <a href="addvolunteer_page.html" class="button" onclick="addVolunteerTask()">Add Task</a>

            <label>
                <div class="search_button"> Search:
                    <input type="text" name="search" id="searchInput" onkeyup="filterTable()" style="float:right ; ">
                </div>
            </label>

            <br>
            <br>

            <div id="popup-container" class="popup">
                <div class="popup-content">
                    <span id="close-popup" class="close-icon">X</span>
                    <h1>Task form</h1>
                    <hr>


                </div>
            </div>


            <table class="table">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tasks</th>
                        <th scope="col">Action </th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td>

                                <a class="text-heading font-semibold" href="#">
                                    #
                                    <?php echo $row["id"] ?>
                            </td>
                            <td>
                                <?php echo $row["name"] ?>
                            </td>
                            <td>
                                
                <button type="button" class="btn btn-outline-primary"><a href="UserTasks.html" ><i class="ri-list-check-3"></i></a></button>
                                
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
        // document.addEventListener('click', function (event) {
        //     var popupContainer = document.getElementById('popup-container');
        //     var targetElement = event.target; // clicked element

        //     // Close popup if click is outside the popup container
        //     if (!popupContainer.contains(targetElement)) {
        //         popupContainer.style.display = 'none';
        //     }
        // });
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
        // Function to open the popup
        //    function addVolunteerTask() {
        //     var popupContainer = document.getElementById('popup-container');
        //     popupContainer.style.display = 'flex';
        //    }

        // Function to close the popup
        //  function closePopup() {
        //     var popupContainer = document.getElementById('popup-container');
        //     popupContainer.style.display = 'none';
        // }
        // document.getElementById('close-popup').addEventListener('click', closePopup);
    </script>



</body>

</html>