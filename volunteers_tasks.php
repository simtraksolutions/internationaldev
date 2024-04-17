<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tasks</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- //bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Bootstrap Style Link  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

    <!-- Style Tag  -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            /*background-image: url(//www.presentationmagazine.com/images3/subtle-waves468.jpg);*/
            background-image: url(https://www.imageshine.in/uploads/gallery/geometric-Blue-Wallpaper-Free-Download.jpg);
        }
        
        .top-bar {
            height: 8vh;
            width: 100%;
            background-color: gainsboro;
            text-align: center;
        }
        
        #Tasks {
            margin: 5px 2px;
            width: 100%;
            /* background: rebeccapurple; */
        }
        
        #Tasks ul {
            display: flex;
            /*justify-content: space-between;*/
            align-items: flex-start;
        }
        
        #Tasks ul li {
            list-style: none;
        }
        
        a {
            text-decoration: none;
            color: black;
        }
        
        .table-container {
            margin-left: 30px;
            margin-right: 30px;
        }
    </style>

</head>

<body>
    <!-- Top-Section Starts  -->
<?php 
    include('db_connect.php');
    include('fetch_data.php');
    ?>
    <section id="Tasks">
        <div class="container" style="margin-top: 60px;">
            <ul>
                <li style="color: white; margin-right:10px; width: fit-content;">
                    <h1><?php echo $name['first_name']?></h1>
                </li>
                <li>
                    <div class="btn btn-success" style="padding:5px; margin-top:10px; margin-left:10px; "><a href="http://127.0.0.1:5500/add_volunteer_form.html">Add Tasks</a></div>
                </li>

                <div class="search-container" style="display: flex; width: 100%; justify-content: end;">
                    <label style="color: white; margin-top:10px; ">
                        Search:
                        <input type="text" name="search" id="searchInput" onkeyup="filterTable()">
                    </label>
                </div>


            </ul>


        </div>
        </div>
    </section>

    <div class="table-container">
        <table class="table table-striped  ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Task Details</th>
                    <th scope="col">Status</th>
                    <th scope="col">Allotment Date</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Task-Date</th>

                </tr>
            </thead>
            <tbody>
                
                
            <?php
                if($task->num_rows > 0){
                    while($row = $task->fetch_assoc()){
            ?>
                <tr>
                    <th scope="row" name="task-id"><?php echo $row['id']?></th>
                    <td name = "volunteer-name"><?php echo $row['task_name']?>
                        <p name = "status"><button style="border: 2px solid grey; padding: 1px; margin-top: 30px;" type="button" class="btn btn-secondary" disabled><?php echo $row['status']?></button> </p>

                    </td>
                    <td>

                        <div class="container mt-5">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      <i class="ri-list-check-3"></i>
                            </button>


                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <h5 class="modal-title" id="exampleModalLabel">Alter Data</h5> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times</span>
                            </button>
                                        </div>

                                        <div class="card">
                                            <h5 class="card-header">Alter data</h5>
                                            <div class="card-body">
                                                <div>
                                                    <label style="width: 450px; padding-top: 14px; padding-bottom: 14px; border-left: 2px solid black ; border-top:2px solid black; border-right: 2px solid grey; border-bottom: 2px solid grey; border-radius: 5px;" for="name">Ongoing</label>
                                                    <!-- <input type="text" required> -->
                                                    <!-- <label for="dog-names">Status:</label> -->
                                                    <select style="width: 450px; padding-top: 14px; padding-bottom: 14px; border-left: 2px solid black ; border-top:2px solid black; border-right: 2px solid grey; border-bottom: 2px solid grey; border-radius: 5px;" name="task_status" id="task_status"> 
                                <option>Just allotted</option> 
                                <option >started</option>
                                <option >under progress</option>
                                <option>Completed</option> 
                                <option >Purged/Cancelled</option> 
                                <option >About to be completed</option> 
                                 
                                 
                             </select>

                                                </div>
                                                <br>
                                                <a href="#" class="btn btn-primary" id="change_status">Submit</a>
                                            </div>
                                        </div>



                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>

                    <td name="alltoment-date"><?php echo $row['allotment']?></td>
                    <td name="deadline"><?php echo $row['deadline']?></td>
                    <td name="task-date"><?php echo $row['task_date']?></td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, j;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Start iterating from the second row to skip the header row
            for (i = 1; i < tr.length; i++) {
                var found = false;
                td = tr[i].getElementsByTagName("td");

                // Loop through all table columns in the current row
                for (j = 0; j < td.length; j++) {
                    var txtValue = td[j].textContent || td[j].innerText;

                    // Check if the current column's text matches the search filter
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }

                // Show or hide the row based on whether a match was found
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script>
        //get all the table rows
        const rows = document.querySelectorAll('tr');
        let click = true;
        //add event listener to each row
        rows.forEach(row => {
            row.addEventListener('click', function(e) {
                e.preventDefault();
                if(!click){ return; }
                const task_id = row.querySelector('[name="task-id"]').textContent;
                console.log(task_id+"   "+task_status);
                click = false;
                
                //change the task status
                const status = document.getElementById('change_status');
                status.addEventListener('click', function() {
                    //send the task status to the server
                    click = true;
                    const task_status = document.getElementById('task_status').value;
            changeTaskStatus(task_status, task_id);
        });

                
            });
        });
    </script>

    <script>
        function changeTaskStatus(task_status, task_id) {
            window.location.href = `changeStatus.php?status=${task_status}&task_id=${task_id}&user_id=<?php echo $userId ?>`;
        }
    </script>
</body>

</html>