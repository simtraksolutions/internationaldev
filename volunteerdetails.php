<?php

include("db_connect.php");
session_start();
$name = '';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["name"]) && !empty($_SESSION["name"])) {
    $name = $_SESSION["name"];

  }


// Assuming you have a table named 'your_table' with columns 'id', 'name', 'task_name', 'action', 'status'
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<meta http-equiv="X-UA-Compatible" content="ie=edge" />-->
    <title> Volunteer details pg-1</title>

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
            background-position: center;
            background-image: url(//www.presentationmagazine.com/images3/subtle-waves468.jpg);
            background-image: url(https://www.imageshine.in/uploads/gallery/geometric-Blue-Wallpaper-Free-Download.jpg);
            background-color: #f8f6f6;
            background-size: cover;
        }
        
        .container {
            position: relative;
            max-width: 650px;
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
        
        .container header {
            font-size: 30px;
            color: #0b0b0b;
            font-weight: 500;
            text-align: center;
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
        
        .form .gender-box {
            margin-top: 20px;
        }
        
        .gender-box h3 {
            color: #020202;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }
        
        .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 130px;
            flex-wrap: wrap;
        }
        
        .form .gender {
            column-gap: 5px;
        }
        
        .gender input {
            accent-color: rgb(0, 0, 0);
        }
        
        .form :where(.gender input, .gender label) {
            cursor: pointer;
        }
        
        .gender label {
            color: #000000;
        }
        
        .address :where(input, .select-box) {
            margin-top: 5px;
        }
        
        .select-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #6b6565;
            font-size: 1rem;
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
            .form .column {
                flex-wrap: wrap;
            }
            .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
        }
    </style>
</head>

<body>
    <section class="container">
        <header>International Volunteer details</header>
        <hr> 
      
        <form  method="POST" class="form" action="volunteerdetails1.php">
            <div class="input-box">
                <label> Name</label>
              
                <input type="text"  name="name"  id="name" placeholder="Enter name" onkeydown="return /[a-z]/i.test(event.key)"  required />
            </div>

            <div class="input-box">
                <label>Email Address *</label>
                <input type="email" name="email" id="email" placeholder="Enter email address"  required />
            </div>

         

            <div class="column">
                <div class="input-box">
                    <label>Country code </label>
                    <input type="text" name="country_code" id="country_code" placeholder="Enter country code"  onkeydown="return /[0-9 ]/i.test(event.key)" required />
                </div>
                <div class="input-box">
                    <label>Phone number</label>
                    <input type="text"  name="phone_number" id="phone_number"  placeholder="Enter phone number"  onkeydown="return /[0-9]/i.test(event.key)" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Country</label>
                    <input type="text" name="country" placeholder="Enter country name" id="country" onkeydown="return /[a-z]/i.test(event.key)"  required />
                </div>

                <div class="input-box">
                    <label>City</label>
                    <input type="text" name="city" placeholder="Enter city name" id="city"  onkeydown="return /[a-z]/i.test(event.key)"   required>


                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Source of joining</label>
                    <input type="text" placeholder="Enter source of joining" id="source_of_joining" name="source_of_joining"  required />
                </div>
            </div>
            </div>
            <button type="submit">Submit</button>
        </form>
        
    </section>
   

</script>

<!-- // data ko charcter me show krne ke liye -->
<script>
    function alphaOnly(event) {


alert(event);
var key;



if (window.event) {

key = window.event.key;

} else if (e) {

key = e.which;

}

//var key = window.event.key || event.key;

alert(key.value);

return ((key >= 65 && key <= 90) || (key >= 95 && key <= 122));



}
</script>
</body>

</html>