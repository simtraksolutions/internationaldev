<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sorting form</title>
    <style>
    /* General Form Styling */
#sortingForm {
  font-family: 'Arial', sans-serif;
  color: #333;
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 500px;
  margin: auto;
}

/* Form Group Styling */
.form-group {
  margin-bottom: 15px;
}

/* Dropdown Styling */
.sort-dropdown select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 5px;
  border: 1px solid #ddd;
  border-radius: 4px;
  background-color: white;
}

/* Button Styling */
#addParamBtn, #sortingForm button[type="submit"] {
  background-color: #39ab52;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 10px;
}

#addParamBtn:hover, #sortingForm button[type="submit"]:hover {
  background-color: #39ab52da;
}

/* Responsive Design */
@media (max-width: 600px) {
  #sortingForm {
    width: 100%;
    padding: 15px;
  }
}

    </style>

<!-- php script to fetch all the data available in the backend using prepared statement or parameterized query -->
<?php

include("db_connect.php");

//query to fetch the all the user detials from the volunteerdetails table and volunteer_details_two table  in a single prepared statement
$personal_detials = "SELECT volunteerdetails.*, volunteer_details_two.* FROM volunteerdetails LEFT JOIN volunteer_details_two ON volunteerdetails.id = volunteer_details_two.id";
$stmt = $conn->prepare($personal_detials);
$stmt->execute();
$result = $stmt->get_result();  // get the result from the executed statement

//close the statement
$stmt->close();

//create multiple arrays to store the fetched data
$name = [];
$task_name = [];
$action = [];
$country = [];
$city = [];
$college = [];
$course = [];
$user_status = [];
$task_status = [];
$joining_source = [];
$joining_date = [];
$coordinator = [];
$team = [];

//filling the arrays with available data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $country[] = $row['country'];
        $city[] = $row['city'];
        $college[] = $row['college'];
        $course[] = $row['course'];
        $user_status[] = $row['user_status'];
        //task_name[] = $row['task_name'];
        // $task_status[] = $row['task_status'];
        $joining_source[] = $row['source_of_joining'];
        // $joining_date[] = $row['joining_date'];
        // $coordinator[] = $row['coordinator'];
        // $team[] = $row['team'];
    }
}


//paramerized query to fetch the all data from addvounteer1 table
$task_detials = "SELECT * FROM addvolunteer1";
$stmt = $conn->prepare($task_detials);
$stmt->execute();
$result = $stmt->get_result();  // get the result from the executed statement
//close the statement
$stmt->close();

//filling the arrays with available data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $task_name[] = $row['task_name'];
        $action[] = $row['action'];
        $task_status[] = $row['status'];
    }
}


//paramerized query to fetch the all data from registration table 
$registration_detials = "SELECT * FROM registration";
$stmt = $conn->prepare($registration_detials);
$stmt->execute();
$result = $stmt->get_result();  // get the result from the executed statement
//close the statement
$stmt->close();

//filling the arrays with available data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coordinator[] = $row['coordinator'];
        $team[] = $row['teamname'];
    }
}


//remove duplicate values form the arrays using array_unique() function 

$task_name = array_unique($task_name);
$action = array_unique($action);
$country = array_unique($country);
$city = array_unique($city);
$college = array_unique($college);
$course = array_unique($course);
$user_status = array_unique($user_status);
$task_status = array_unique($task_status);
$joining_source = array_unique($joining_source);
$coordinator = array_unique($coordinator);
$team = array_unique($team);

//convert the data in each array into following format ['Fundraising', 'Marketing']
$task_name = array_values($task_name);
$action = array_values($action);
$country = array_values($country);
$city = array_values($city);
$college = array_values($college);
$course = array_values($course);
$user_status = array_values($user_status);
$task_status = array_values($task_status);
$joining_source = array_values($joining_source);
$coordinator = array_values($coordinator);
$team = array_values($team);


//print the arrays in json form
// echo json_encode($name);
// echo json_encode($task_name);
// echo json_encode($action);
// echo json_encode($country);
// echo json_encode($city);
// echo json_encode($college);
// echo json_encode($course);
// echo json_encode($user_status);
// echo json_encode($task_status);
// echo json_encode($joining_source);
// echo json_encode($joining_date);
// echo json_encode($coordinator);
// echo json_encode($team);


?>
</head>
<body>
    <form id="sortingForm" method="POST">
        <div class="form-group" id="sortParameters">
          <!-- Dynamic dropdowns will be appended here -->
        </div>
        <button type="button" id="addParamBtn">Add more fields</button>
        <button type="submit" name="sort_data">Submit</button>
      </form>



      <script>
     document.addEventListener('DOMContentLoaded', function() {
  const formGroup = document.getElementById('sortParameters');
  const addParamBtn = document.getElementById('addParamBtn');

  // Function to create a new sorting parameter dropdown
  function createSortDropdown() {
    const div = document.createElement('div');
    div.className = 'sort-dropdown';
    div.innerHTML = `
      <select class="field-dropdown" name='parameter[]'>
        <option value="">Select Field</option>
        <option value="task_name">Task</option>
        <option value="action">Action</option>
        <option value="country">Country</option>
        <option value="city">City</option>
        <option value="college">College</option>
        <option value="course">Course</option>
        <option value="user_status">User Status</option>
        <option value="status">Task Status</option>
        <option value="source_of_joining">Source of Joining</option>
        <option value="coordinator">Coordinator</option>
        <option value="teamname">Team</option>
      </select>
      <select class="value-dropdown" style="display:none;" name="values[]">
        <!-- Available data will be populated here -->
      </select>
    `;
    formGroup.appendChild(div);

    // Event listener for field selection
    div.querySelector('.field-dropdown').addEventListener('change', function(e) {
      const valueDropdown = div.querySelector('.value-dropdown');
      const selectedField = e.target.value;

      // Populate the second dropdown with available data fetched form the backend based on the selected field usig php 
      const sampleData = {
        task_name: <?php echo json_encode($task_name); ?>,
        country: <?php echo json_encode($country); ?>,
        city: <?php echo json_encode($city); ?>,
        college: <?php echo json_encode($college); ?>,
        course: <?php echo json_encode($course); ?>,
        user_status: <?php echo json_encode($user_status); ?>,
        source_of_joining: <?php echo json_encode($joining_source); ?>,
        coordinator: <?php echo json_encode($coordinator); ?>,
        team: <?php echo json_encode($team); ?>,
        status: <?php echo json_encode($task_status); ?>,
        action: <?php echo json_encode($action); ?>,

        
        // Add other fields and sample data as needed
      };

      if (sampleData[selectedField]) {
        valueDropdown.innerHTML = sampleData[selectedField].map(value => `<option value="${value}">${value}</option>`).join('');
        valueDropdown.style.display = 'block';
      } else {
        valueDropdown.style.display = 'none';
      }
    });
  }

  // Initial dropdown
  createSortDropdown();

  // Add new dropdown on button click
  addParamBtn.addEventListener('click', createSortDropdown);


});


      </script>
      
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"]=='POST'){
  //print all the data that is selected in the form when the form gets submitted
 
  // print_r($_POST['parameter']);
  // print_r($_POST['values']);

 
 //create fetching query based on the selected fields in the form
  $query = "SELECT d1.* FROM volunteerdetails d1 LEFT JOIN addvolunteer1 d3 ON d1.id = d3.user_id LEFT JOIN volunteer_details_two d2 ON d1.id = d2.id  LEFT JOIN registration d4 ON d1.email = d4.email";

   // Loop through the $_POST['parameter'] array
for ($i = 0; $i < count($_POST['parameter']); $i++) {
  // Get the parameter and the corresponding value
  $parameter = $_POST['parameter'][$i];
  $value = $_POST['values'][$i];

  // Determine the table for the parameter
  $table = '';
  if ($parameter == 'team' || $parameter == 'coordinator') {
      $table = 'd4';
  } elseif ($parameter == 'task_name' || $parameter == 'action' || $parameter == 'status') {
      $table = 'd3';
  } elseif ($parameter == 'country' || $parameter == 'city' || $parameter == 'user_status' || $parameter == 'source_of_joining') {
      $table = 'd1';
  } elseif ($parameter == 'college' || $parameter == 'course') {
      $table = 'd2';
  }

  // Create a condition string and add it to the conditions array
  $conditions[] = "$table.$parameter = '$value'";


}
  // Join the conditions array into a string using the AND operator
$conditionsString = implode(' AND ', $conditions);

// Append the conditions string to the query
$query .= " WHERE $conditionsString";


//print the prepared query
// echo $query;

//execute the query
$stmt = $conn->prepare($query);
$stmt->execute();
$sort_result = $stmt->get_result();  // get the result from the executed statement
//close the statement
$stmt->close();

}

 



?>