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
    <title>Sign up</title>
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
            width: 100%;
            display: block;
            margin-bottom: 2px;
        }
        
        input {
            width: 100%;
            padding: 10px;
            font-size: medium;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
            cursor: pointer;
        }
        
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">

        <form id="signupForm" action="addvolunteerform.php"   method="POST">

        <?php
        include('db_connect.php');
        include('fetch_data.php');
        ?>

            <label for="name" >Name</label>
            <select style="width: 330px; padding-top: 14px; padding-bottom: 14px; border-left: 2px solid black ; border-top:2px solid black; border-right: 2px solid grey; border-bottom: 2px solid grey; border-radius: 5px;" name="name" id="dog-names"> 

          <?php  if($registeredUser->num_rows > 0) {
                while($row = $registeredUser->fetch_assoc()) {
                    echo "<option value='".$row['id'].'.'.$row['first_name']."'>".$row['id'].'. '.$row['first_name']."</option>";
                }}?>
                 <!-- <option value='Aishwarya'>Aishwarya</option>
                 <option value='Kajal'>Kajal</option>
                 <option value='Amita'>Amita</option>
                 <option value='Pallavi'>Pallavi</option>
                 <option value='Rupak'>Rupak</option>
                 <option value='Jadeja'>Jadeja </option>
                 <option value='Vipul'>Vipul</option>
                 <option value='Summit'>Summit</option>
                 <option value='Neha'>Neha</option>
                 <option value='Nitish'>Nitish</option>
                 <option value='Sachin'>Sachin</option>
                 <option value='soniya'>soniya</option>
                 <option value='kittu'>kittu</option>
                 <option value='Rahul'>Rahul</option>
                 <option value='Fun'>Fun</option>
                 <option value='Competitive'>Competitive</option>
                 <option value='Translation'>Translation</option>
                 <option value='Collaboration'>Collaboration</option>
      -->
               </select>



            <label for="dog-names"  >Task Name:</label>
            <select style="width: 330px; padding-top: 14px; padding-bottom: 14px; border-left: 2px solid black ; border-top:2px solid black; border-right: 2px solid grey; border-bottom: 2px solid grey; border-radius: 5px;" name="task_name" id="dog-names"> 
                <option value="task0"></option>
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
                <option value="Empathee">Empathee</option>
                <option value="Gypse">Gypse</option>
                <option value="Synergy">Synergy</option>
                <option value="Interesting educational module">Interesting educational module</option>
                <option value="Young leader-college">Young leader-college</option>
                <option value="Workshops organise">Workshops organise</option>
                <option value="Wisetalk(translation)-q/a">Wisetalk(translation)-q/a</option>
                <option value="Global Indian">Global Indian</option>
                <option value="Inspirit">Inspirit</option>
                <option value="Spring">Spring</option>
                <option value="Prograce:career">Prograce:career</option>
                <option value="Coding Workshop">Coding Workshop</option>
                <option value="Sunshine offline">Sunshine offline</option>
                <option value="Fun n learn">Fun n learn</option>
                <option value="Competitive exam/logical">Competitive exam/logical</option>
                <option value="IELTS(classes)">IELTS(classes)</option>
                <option value="Translation/PDF..millions-both ways">Translation/PDF..millions-both ways</option>
                <option value="Collaboration with ngos">Collaboration with ngos</option>
                <option value="Documentary sessions">Documentary sessions</option>
                <!--<option value="task30"></option>
                <option value="task31"></option>
                <option value="task32"></option>-->
            
        
                
              </select>


            <label style="margin-top: 10px;" for="password" >Action</label>
            <input type="text"  name="action" required>


            <label for="status" >Status:</label>
            <select style="width: 330px; padding-top: 14px; padding-bottom: 14px; border-left: 2px solid black ; border-top:2px solid black; border-right: 2px solid grey; border-bottom: 2px solid grey; border-radius: 5px;" name="status" id="dog-names"> 
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
</body>

</html>