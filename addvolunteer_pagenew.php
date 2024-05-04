<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add volunteer form</title>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Task form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-position: center;
            background-size: cover;
            padding: 0;
            display: flex;
            justify-content: center;
            background-image: url(https://www.imageshine.in/uploads/gallery/geometric-Blue-Wallpaper-Free-Download.jpg);
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            width: 380px;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 8px;
        }
        
        input,
        select {
            width: 100%;
            padding: 10px;
            font-size: medium;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            background-color: #45a049;
        }
        /* Additional style for "other" input */
        
        .other-input {
            display: none;
            /* Initially hide the "other" input */
        }
    </style>
</head>

<body>

    <div class="container">

        <form id="signupForm" action="insertvolunteertask.php"   method="POST">

        <?php
        include('db_connect.php');
        include('fetch_data.php');
        ?>

            <label for="name" >Name</label>
            <select name="name" id="nameSelect" onchange="toggleOtherInput('nameSelect', 'nameOther')">
            <option value="task0"></option>  
            <option value="other">Other</option>
          <?php  if($registeredUser->num_rows > 0) {
                while($row = $registeredUser->fetch_assoc()) {
                    echo "<option value='".$row['id'].'.'.$row['first_name']."'>".$row['first_name']."</option>";
                }}?>
            </select>
            <input type="text" id="nameOther" name="nameOther" class="other-input" placeholder="Enter name">


            <label for="task"  >Task Name:</label>
            <select name="task" id="taskSelect" onchange="toggleOtherInput('taskSelect', 'taskOther')">
                <option value="task0"></option>
                <option value="other">Other</option>
                <option value="1 Article-own">1 Article-own</option>
                <option value="1 webinar-own">1 webinar-own</option>
                <option value="5 Articles">5 Articles</option>
                <option value="Organise young leader activites">Organise young leader activites</option>
                <option value="Volunteer Team to be created">Volunteer Team to be created</option>
                <option value="20 participants for any program">20 participants for any program</option>
                <option value="Organise webinars:soaring wing">Organise webinars:soaring wing</option>
                <option value="Counducting Sessions">Counducting Sessions</option>
                <option value="Centre onboarding">Centre onboarding</option>
                <option value="Social survey-issues/traning">Social survey-issues/traning</option>
                <option value="Wisetalk">Wisetalk</option>
            </select>
            <input type="text" id="taskOther" name="taskOther" class="other-input" placeholder="Enter task name">


            <label style="margin-top: 10px;" for="password" >Action</label>
            <input type="text"  name="action" required>


            <label for="status" >Status:</label>
            <select name="status" id="status">
                <option value="just Allotted">Just Allotted</option> 
                <option value="Started">Started</option> 
                <option value="Under Progress" >Under progress</option> 
                <option  value="About to be Completed ">About to be completed</option> 
                <option  value="completed">completed</option>
                <option value="Cancelled">Cancelled</option>
 
            </select>

            <label style="margin-top: 10px;" for="name" > Deadline:</label>
            <input type="date" name="deadline" required>



            <br>

            <button style="margin-top: 10px;" type="submit">Submit</button>
            <br>

        </form>


<?php include('closeConnection.php'); ?>

<!-- JavaScript to toggle "other" input fields -->
<script>
    function toggleOtherInput(selectId, inputId) {
        var selectElement = document.getElementById(selectId);
        var otherInput = document.getElementById(inputId);

        if (selectElement.value === 'other') {
            otherInput.style.display = 'block';
        } else {
            otherInput.style.display = 'none';
        }
    }
</script>     

</body>

</html>