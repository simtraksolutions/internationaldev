<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<meta http-equiv="X-UA-Compatible" content="ie=edge" />-->
    <title> Volunteer details pg-2</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* background-image: linear-gradient(rgba(74, 71, 116, 0.8), rgba(71, 71, 116, 0.8)), url(https://img.freepik.com/free-photo/people-stacking-hands-together-park_53876-63293.jpg?t=st=1701355602~exp=1701356202~hmac=eadd99e04541987aece0dee4794014aca6aa165431007e545a2c78028856e84f);*/
            background-position: center;
            background-image: url(//www.presentationmagazine.com/images3/subtle-waves468.jpg);
            background-image: url(https://www.imageshine.in/uploads/gallery/geometric-Blue-Wallpaper-Free-Download.jpg);
            /*background-image:url(https://static.vecteezy.com/system/resources/previews/003/127/954/non_2x/abstract-template-blue-background-white-squares-free-vector.jpg);*/
            background-color: #f8f6f6;
            background-size: cover;
        }
        
        .container {
            position: relative;
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border: 2px;
            border-color: black;
            border-radius: 8px;
            /* box-shadow: 0px 4px 18px rgba(254, 254, 254, 0.958);*/
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
            border-bottom-width: 2px;
            overflow-y: auto;
            /* Enable vertical scrolling */
            max-height: 90vh;
        }
        
        .container::-webkit-scrollbar {
            width: 10px;
            display: view;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        
        .container {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
        }
        
        .header1 {
            font-size: 30px;
            color: #0b0b0b;
            font-weight: 500;
            /*text-align: left;*/
            width: auto;
        }
        
        .header2 {
            font-size: 20px;
            color: #0b0b0b;
            font-weight: 500;
            text-align: right;
            width: auto;
        }
        
        .container .form {
            margin-top: 30px;
        }
        
        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }
        
        .input-box label {
            color: black;
        }
        
        .form :where(.input-box input, .select-box) {
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
        
        .form .column {
            display: flex;
            column-gap: 15px;
        }
        
        .input-box input:focus {
            border-color: #363535;
            /*border color for input boxes at filling datails*/
        }
        
        .form button {
            height: 40px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #4caf50;
            border-radius: 5px;
        }
        
        .form button:hover {
            background: #45a049;
        }
        /*Responsive*/
        
        @media screen and (max-width: 500px) {
            .form.column {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<?php

//include the database connection file
include("db_connect.php");
if(isset($_REQUEST['user_id'])){
    //php query to fetch the data from the volunteerdetails table for the given user id using prepared statement or paramertized query
    $sql = "SELECT * FROM volunteer_details_two WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_REQUEST['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    //assign the values to the variables
    $college = $row['college'];
    $course = $row['course'];
    $linkedin = $row['linkedin'];
    $facebook = $row['facebook'];

}
else{
    //if the user id is not set remove the values from the variables
    $college = '';
    $course = '';
    $linkedin = '';
    $facebook = '';
}
?>
<body>
    <section class="container">
        <header>

            <div class="header1">Volunteer Additional details
                <a id='skip' style="float:right;">
                    <button onclick="skip()" style="padding-left:2px; padding-right:2px; padding-bottom:2px ; padding-top:5px">skip for now</button></a>
            </div>  

        </header>
        <hr>
        <form class="form" method="POST">

            <div class="input-box">
                <label>College/University</label>
                <input value="<?php echo $college ?>" type="text" placeholder="Enter college/university name" name="college" id="college"  required />
            </div>
            <div class="input-box">
                <label>Course</label>
                <input value="<?php echo $course?>" type="text" placeholder="Enter course" id="course" name="course" required />
            </div>


            <div class="column">
                <div class="input-box">
                    <label>Linkedin link</label>
                    <input value="<?php echo $linkedin?>" type="link" placeholder="Enter Id link" id="linkedin" name="linkedin" required/>
                </div>
            </div>

            <div class="input-box">
                <label>Facebook link</label>
                <input value="<?php echo $facebook?>" type="link" placeholder="Enter id link" id="facebook" name="facebook" required/>
            </div>



            <a href="#"><button type="submit" onclick="submitVolunteerDetailsPg2()">submit</button></a>
        </form>
    </section>

    <script>

//script to update the user inforamtion and prevent the default form submission
    function submitVolunteerDetailsPg2() {
       //check if the user id is set in the url parameter
        if (window.location.search) {
            //get the user id from the url parameter
            let destination = 'insertVolunteerdetails2.php';
            const urlParams = new URLSearchParams(window.location.search);
            const userId = urlParams.get('user_id');
             //if the user id  is set then prevent the default form submission
            if (userId) {
               destination = 'insertVolunteerdetails2.php?user_id=' + userId;
            }   
            //get the form element
            const form = document.querySelector('.form');
            //change the action attribute of the form to the destination
            form.action = destination; 
        // console.log('Form submitted!');
    }
}

//function to skip the form submission
function skip() {
    //redirect to the home page
    if (window.location.search) {
        //get the user id from the url parameter
        let destination = 'insertVolunteerdetails2.php?check=skipped';
            const urlParams = new URLSearchParams(window.location.search);
            const userId = urlParams.get('user_id');
             //if the user id  is set then prevent the default form submission
            if (userId) {
               destination = 'insertVolunteerdetails2.php?user_id=' + userId + '&check=skipped';
            }   

            //get the anchor tag of the skip button
            const skip = document.querySelector('#skip');
            //change the href attribute of the anchor tag to the destination
            skip.href = destination;


    }
}
   
</script>



</body>

</html>