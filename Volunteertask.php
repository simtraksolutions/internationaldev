<?php
include("db_connect.php");
// Fetch existing volunteer data
$sqlFetchData = "SELECT * FROM `addvolunteer1` where `user_id`= '".$_GET["user_id"]."'";
$result = $conn->query($sqlFetchData);
// Close connection
$conn->close();
?>
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
        
        .top-bar {
            height: 8vh;
            width: 100%;
            background-color: gainsboro;
            text-align: center;
        }
        
        #Tasks {
            margin: 5px 6px;
            height: 15vh;
            width: 100%;
            /* background: rebeccapurple; */
        }
        
        #Tasks ul {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        #Tasks ul li {
            list-style: none;
        }
        
        a {
            text-decoration: none;
            color: black;
        }
    </style>

</head>

<body>
    <!-- Top-Section Starts  -->
    <div class="top-bar">
        <span>
            <h2>User Tasks</h2>
        </span>
    </div>
    <section id="Tasks">
        <div class="container">
            <ul>
                <li>
                    <div class="btn btn-success"><a href="http://127.0.0.1:5500/add_volunteer_form.html">Add Tasks</a></div>
                </li>
                <!--- <li>
                    <span style="font-size: 1.1rem;">Search:</span>
                    <input type="text" placeholder="">
                </li>-->
                <div class="search-container">
                    <label>
                        Search:
                        <input type="text" name="search" id="Input" onkeyup="filrTable()">
                    </label>
                </div>
            </ul>


        </div>
        </div>
    </section>

    <!-- Top-Section Ends  -->

    <!-- Table Tasks  -->
    <table class="table table-striped">
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
            while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <th scope="row">1</th>
                <td><
                    <p><button style="border: 2px solid grey; padding: 1px; margin-top: 30px;" type="button" class="btn btn-secondary" disabled>ongoing</button> </p>

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
                                                <select style="width: 450px; padding-top: 14px; padding-bottom: 14px; border-left: 2px solid black ; border-top:2px solid black; border-right: 2px solid grey; border-bottom: 2px solid grey; border-radius: 5px;" name="dog-names" id="dog-names"> 
                                 <option>Completed</option> 
                                 <option >Ongoing</option> 
                                 <option >Cancelled</option> 
                                 <!--<option >Alumini</option> 
                                 <option >Backburner</option>-->
                                 
                             </select>

                                            </div>
                                            <br>
                                            <a href="#" class="btn btn-primary">Submit</a>
                                        </div>
                                    </div>



                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>

                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob
                    <p><button style="border: 2px solid grey; padding: 1px; margin-top: 30px; box-shadow: 2px solid;" type="button" class="btn btn-secondary" disabled>ongoing</button> </p>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Popup Title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                          </button>
                                    </div>
                                    <div class="modal-body">
                                        hello world.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>


                <td>@fat</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>lorem
                    <p><button style="border: 2px solid grey; padding: 1px; margin-top: 30px;" type="button" class="btn btn-secondary" disabled>ongoing</button> </p>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Popup Title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                          </button>
                                    </div>
                                    <div class="modal-body">
                                        hello world.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>

                <td>@twitter</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
        
        </tbody>
        <?php
            } ?>
    </table>

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
</body>

</html>