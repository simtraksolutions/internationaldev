
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page for volunteers</title>
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
    </style>
</head>

<body>
    <div id="content">
        <h1>Welcome to ADORE</h1>
        <div class="container">

            <a href="addvolunteerform.html" class="button" onclick="addVolunteer()">Add Volunteer</a>
            <table class="table" id="volunteerTable">
                <thead>
                    <th width="110px"> Volunteer ID</th>
                    <th>Name</th>
                    <th>Task Name</th>
                    <th>Action</th>
                    <th>Status</th>
                    <!--<th></th>-->
                </thead>
                <tbody>
                    <tr>
                        <td data-label=" s.no">32565</td>
                        <td data-label=" name">prachi</td>
                        <td data-label=" task name"></td>
                        <td data-label=" action"></td>
                        <td data-label=" status"></td>
                        <!--<td data-label="  "></td>-->
                    </tr>
                    <tr>
                        <td data-label=" s.no"></td>
                        <td data-label=" name"></td>
                        <td data-label=" task name"></td>
                        <td data-label=" action"></td>
                        <td data-label=" status"></td>
                        <!--<td data-label="  "></td>-->
                    </tr>


                    
                </tbody>
            </table>


        </div>
    </div>
    <script>
        function addVolunteer() {
            var table = document.getElementById("volunteerTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            // Add cells
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            //var cell5 = newRow.insertCell(5);


            // Populate cells with default values or input fields
            cell1.innerHTML = ""; // Volunteer ID
            cell2.innerHTML = ""; // Name
            cell3.innerHTML = ""; // Task Name
            cell4.innerHTML = ""; // Action
            cell5.innerHTML = ""; // Status
            // cell6.innerHTML = "";
        }
    </script>
   
    

</body>

</html>