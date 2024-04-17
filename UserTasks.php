<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tasks</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Bootstrap Style Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
                    <div class="btn btn-success"><a href="">Add Tasks</a></div>
                </li>
                <li>
                    <span style="font-size: 1.1rem;">Search:</span>
                    <input type="text" placeholder="">
                </li>
            </ul>


        </div>
        </div>
    </section>

    <?php
        include("db_connect.php");
        include("fetch_data.php");
    ?>


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
    if($task->num_rows > 0){
        while($row = $task->fetch_assoc()){  
            //to check test if the query is working and fetching the correct data
            // echo var_dump($row)
        ?>
                    
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['task_name']?></td>
            <td><?php echo $row['status']?></td>
            <td><?php echo $row['allotment']?></td>
            <td><?php echo $row['deadline']?></td>
            <td><?php echo $row['task_date']?></td>

          </tr>
          <?php } }?>
        </tbody>
      </table>

      
      




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>