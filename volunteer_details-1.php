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
            padding: 15px;
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
            padding: 20px;
            border: 2px;
            border-color: black;
            border-radius: 8px;
            /* box-shadow: 0px 4px 18px rgba(254, 254, 254, 0.958);*/
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
            border-bottom-width: 2px;
            overflow-y: auto;
            /* Enable vertical scrolling */
            max-height: 95vh;
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
            font-size: 25px;
            color: #0b0b0b;
            font-weight: 500;
            text-align: center;
        }
        
        .container .form {
            margin-top: 20px;
        }
        
        .form .input-box {
            width: 100%;
            margin-top: 15px;
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
            margin-top: 20px;
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
        /*stling for drop downs*/
        
        .input-box select {
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
        /* Style for when the select box is focused */
        
        .input-box select:focus {
            border-color: #363535;
        }
        /* Style for when the select box is hovered */
        
        .input-box select:hover {
            border-color: #ccc;
        }
    </style>
</head>
<?php 
//php scripts to print the server errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db_connect.php');
    
// check if the user id is set
if(isset($_REQUEST['user_id'])){
    //php query to fetch the data from the volunteerdetails table for the given user id using prepared statement or paramertized query
    $sql = "SELECT * FROM volunteerdetails WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_REQUEST['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $fname = $row['first_name'];
    $mname = $row['middle_name'];
    $lname = $row['last_name'];
    $email = $row['email'];
    $country = $row['country'].' ('.$row['country_code'].')';
    $phone_number = $row['phone_number'];
    $city = $row['city'];
    $source_of_joining = $row['source_of_joining'];
}
else{
    //if the user id is not set remove the values from the variables
    $fname = ' ';
    $mname = ' ';
    $lname = ' ';
    $email = ' ';
    $country = ' ';
    $phone_number = ' ';
    $city = ' ';
    $source_of_joining = ' ';

}
?>
<body>
    <section class="container">
        <header>International Volunteer details</header>
        <hr>
        <form method="POST"  action="insertVolunteerdetials1.php" class="form">
            <div class="input-box">
                <label> First Name</label>
                <input value="<?php echo $fname?>" type="text" name='fname' placeholder="Enter name" required />
            </div>
            <div class="input-box">
                <label>Middle Name</label>
                <input value="<?php echo $mname?>" type="text" name='mname' placeholder="Enter name" />
            </div>
            <div class="input-box">
                <label>Last Name</label>
                <input value="<?php echo $lname?>" type="text" name='lname' placeholder="Enter name" required />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input value="<?php echo $email?>" type="email" name='email' placeholder="Enter email address" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Country/ Country code</label>
                    <select id='countrySelect' name="country_code" >
                        <option  value="<?php echo $country?>"><?php echo $country?></option>
                        <option  value="American Samao (+1684)">American Samao (+1684)</option>
                        <option  value="Albania (+335)">Albania (+335)</option>
                        <option  value="Algeria  (+213)">Algeria  (+213)</option>
                        <option  value="Angola (+244)">Angola (+244)</option>
                        <option  value="Afghanistan (+93)">Afghanistan (+93)</option>
                        <option  value="Andorra (+376)">Andorra (+376)</option>
                        <option  value="Anguilla (+1264)">Anguilla (+1264)</option>
                        <option  value="Antarctica  (+672)">Antarctica  (+672)</option>
                        <option  value="Antigua and Barbuda  (+1268)">Antigua and Barbuda  (+1268)</option>
                        <option  value="Argentina (+54)">Argentina (+54)</option>
                        <option  value="America (+374)">America (+374)</option>
                        <option  value="Aruba (+297)">Aruba (+297)</option>
                        <option  value="Australia (+61)">Australia (+61)</option>
                        <option  value="Austria (+994)">Austria (+994)</option>
                        <option  value="Bahamas (+1242)">Bahamas (+1242)</option>
                        <option  value="Bahrain (+973)">Bahrain (+973)</option>
                        <option  value="Bangladesh (+880)">Bangladesh (+880)</option>
                        <option  value="Barbados (+1246)">Barbados (+1246)</option>
                        <option  value="Belarus (+375)">Belarus (+375)</option>
                        <option  value="Belgium (+32)">Belgium (+32)</option>
                        <option  value="Belize (+501)">Belize (+501)</option>
                        <option  value="Benin (+229)">Benin (+229)</option>
                        <option  value="Bermuda (+1441)">Bermuda (+1441)</option>
                        <option  value="Bhutan (+975)">Bhutan (+975)</option>
                        <option  value="Bolivia (+591)">Bolivia (+591)</option>
                        <option  value="Bosnia and Herzegovina (+387)">Bosnia and Herzegovina (+387)</option>
                        <option  value="Bouvet Island (+47)">Bouvet Island (+47)</option>
                        <option  value="Brazil (+55)">Brazil (+55)</option>
                        <option  value="Botswana (+267)">Botswana (+267)</option>
                        <option  value="British Idian Ocean Territory (+246)">British Idian Ocean Territory (+246)</option>
                        <option  value="Brunei Darussalam> (+673)">Brunei Darussalam> (+673)</option>
                        <option  value="Bulgaria (+359)">Bulgaria (+359)</option>
                        <option  value="Burundi (+257)">Burundi (+257)</option>
                        <option  value="Burkina Faso (+226)">Burkina Faso (+226)</option>
                        <option  value="Cape Verde (+238)">Cape Verde (+238)</option>
                        <option  value="Cameroon (+855)">Cameroon (+855)</option>
                        <option  value="Canada (+1)">Canada (+1)</option>
                        <option  value="Cayman islands (+1345)">Cayman islands (+1345)</option>
                        <option  value="Central African Republic (+236)">Central African Republic (+236)</option>
                        <option  value="Chad (+235)">Chad (+235)</option>
                        <option  value="Chile (+56)">Chile (+56)</option>
                        <option  value="China (+86)">China (+86)</option>
                        <option  value="Christmas Island (+61)">Christmas Island (+61)</option>
                        <option  value="Cocos(keeling)Islands (+)">Cocos(keeling)Islands (+)</option>
                        <option  value="Colombia (+57)">Colombia (+57)</option>
                        <option  value="Comros (+269)">Comros (+269)</option>
                        <option  value="Republic of the Congo(Cong0-Kinshasa) (+243)">Republic of the Congo(Cong0-Kinshasa) (+243)</option>
                        <option  value="Cook Islands (+682)">Cook Islands (+682)</option>
                        <option  value="Costa Rica (+506)">Costa Rica (+506)</option>
                        <option  value="Croatia (+385)">Croatia (+385)</option>
                        <option  value="Cuba (+53)">Cuba (+53)</option>
                        <option  value="Cyprus (+357)">Cyprus (+357)</option>
                        <option  value="Czech Republic(Czechia) (+420)">Czech Republic(Czechia) (+420)</option>
                        <option  value="Denmark (+45)">Denmark (+45)</option>
                        <option  value="Djibouti (+253)">Djibouti (+253)</option>
                        <option  value="Dominica (+1767)">Dominica (+1767)</option>
                        <option  value="Dominican Republic (+1809, +1829, +1849)">Dominican Republic (+1809, +1829, +1849)</option>
                        <option  value="Ecuador (+593)">Ecuador (+593)</option>
                        <option  value="Egypt (+20)">Egypt (+20)</option>
                        <option  value="El Salvador (+503)">El Salvador (+503)</option>
                        <option  value="Equatorial Guinea (+240)">Equatorial Guinea (+240)</option>
                        <option  value="Eritrea (+291)">Eritrea (+291)</option>
                        <option  value="Estonia (+372)">Estonia (+372)</option>
                        <option  value="Ethipia (+251)">Ethipia (+251)</option>
                        <option  value="East Timor (+670)">East Timor (+670)</option>
                        <option  value="Falkland islands(Malvinas) (+500)">Falkland islands(Malvinas) (+500)</option>
                        <option  value="Faroe Islands (+298)">Faroe Islands (+298)</option>
                        <option  value="Fiji (+679)">Fiji (+679)</option>
                        <option  value="Finland (+358)">Finland (+358)</option>
                        <option  value="France (+33)">France (+33)</option>
                        <option  value="French Guiana (+594)">French Guiana (+594)</option>
                        <option  value="French Southern Territories(+262)">French Southern Territories(+262)</option>
                        <option  value="Gabon (+241)">Gabon (+241)</option>
                        <option  value="Gambia (+220)">Gambia (+220)</option>
                        <option  value="Georgia(Geogia) (+995)">Georgia(Geogia) (+995)</option>
                        <option  value="Germany (+49)">Germany (+49)</option>\
                        <option  value="Ghana (+233)">Ghana (+233)</option>
                        <option  value="Gibraltar (+350)">Gibraltar (+350)</option>
                        <option  value="Great Britian (+44)">Great Britian (+44)</option>
                        <option  value="Greece  (+30)">Greece  (+30)</option>
                        <option  value="Grrenland (+299)">Grrenland (+299)</option>
                        <option  value="Grenada (+1473)">Grenada (+1473)</option>
                        <option  value="Guadeloupe(French) (+590)">Guadeloupe(French) (+590)</option>
                        <option  value="Guam(USA) (+1671)">Guam(USA) (+1671)</option>
                        <option  value="Guatemala (+502)">Guatemala (+502)</option>
                        <option  value="Guernsey (+44-1481)">Guernsey (+44-1481)</option>
                        <option  value="Guinea (+224)">Guinea (+224)</option>
                        <option  value="Guinea Bissau (+245)">Guinea Bissau (+245)</option>
                        <option  value="Guyana (+592)">Guyana (+592)</option>
                        <option  value="Haiti (+509)">Haiti (+509)</option>
                        <option  value="Heard Island And McDonald Islands (+672)">Heard Island And McDonald Islands (+672)</option>
                        <option  value="Honduras (+504)">Honduras (+504)</option>
                        <option  value="Honduras (+504)">Honduras (+504)</option>
                        <option  value="Hungary (+36)">Hungary (+36)</option>
                        <option  value="Iceland (+354)">Iceland (+354)</option>
                        <option  value="Indonesia (+62)">Indonesia (+62)</option>
                        <option  value="Iran (+98)">Iran (+98)</option>
                        <option  value="Iraq (+964)">Iraq (+964)</option>
                        <option  value="Ireland (+353)">Ireland (+353)</option>
                        <option  value="Isle of Man (+44-1684)">Isle of Man (+44-1684)</option>
                        <option  value="Israel (+972)">Israel (+972)</option>
                        <option  value="Italy (+39)">Italy (+39)</option>
                        <option  value="Ivory Coast (Cote d'Ivoire) (+225)">Ivory Coast (Cote d'Ivoire) (+225)</option>
                        <option  value="Jamaica (+1876)">Jamaica (+1876)</option>
                        <option  value="Japan (+81)">Japan (+81)</option>
                        <option  value="Jersey (+44-1534)">Jersey (+44-1534)</option>
                        <option  value="Jordan (+962)">Jordan (+962)</option>
                        <option  value="Kazakhstan (+7)">Kazakhstan (+7)</option>
                        <option  value="Kenya (+254)">Kenya (+254)</option>
                        <option  value="Kiribati (+686)">Kiribati (+686)</option>
                        <option  value="North Korea (+850)">North Korea (+850)</option>
                        <option  value="South Korea (+82)">South Korea (+82)</option>
                        <option  value="Kuwait (+965)">Kuwait (+965)</option>
                        <option  value="Kyrgyzstan (+996)">Kyrgyzstan (+996)</option>
                        <option  value="Laos (+856)">Laos (+856)</option>
                        <option  value="Latvia (+371)">Latvia (+371)</option>
                        <option  value="Lebanon (+961)">Lebanon (+961)</option>
                        <option  value=" Lesotho (+266)"> Lesotho (+266)</option>
                        <option  value="Liberia (+231)">Liberia (+231)</option>
                        <option  value="Libya (+218)">Libya (+218)</option>
                        <option  value="Liechtenstein (+423)">Liechtenstein (+423)</option>
                        <option  value="Lithuania (+370)">Lithuania (+370)</option>
                        <option  value="Luxembourg (+352)">Luxembourg (+352)</option>
                        <option  value="Macao (Macau) (+853)">Macao (Macau) (+853)</option>
                        <option  value="North Macedonia (Macedonia) (+389)">North Macedonia (Macedonia) (+389)</option>
                        <option  value="Madagascar (+261)">Madagascar (+261)</option>
                        <option  value="Malawi (+265)">Malawi (+265)</option>
                        <option  value="Malaysia (+60)">Malaysia (+60)</option>
                        <option  value="Maldives (+960)">Maldives (+960)</option>
                        <option  value="Mali (+223)">Mali (+223)</option>
                        <option  value="Malta (+356)">Malta (+356)</option>
                        <option  value="Marshall Islands (+692)">Marshall Islands (+692)</option>
                        <option  value="Martinique (French) (+596)">Martinique (French) (+596)</option>
                        <option  value="Mauritania (+222)">Mauritania (+222)</option>
                        <option  value="Mauritius (+230)">Mauritius (+230)</option>
                        <option  value="Mayotte (+262)">Mayotte (+262)</option>
                        <option  value="Moldova (+373)">Moldova (+373)</option>
                        <option  value="Micronesia (+691)">Micronesia (+691)</option>
                        <option  value="Mexico (+52)">Mexico (+52)</option>
                        <option  value="Monaco (+377)">Monaco (+377)</option>
                        <option  value="Mongolia (+976)">Mongolia (+976)</option>
                        <option  value="Montenegro (+382)">Montenegro (+382)</option>
                        <option  value="Montserrat (+1664)">Montserrat (+1664)</option>
                        <option  value="Morocco (+212)">Morocco (+212)</option>
                        <option  value="Mozambique (+258)">Mozambique (+258)</option>
                        <option  value="Myanmar (+95)">Myanmar (+95)</option>
                        <option  value="Namibia (+264)">Namibia (+264)</option>
                        <option  value="Nauru (+674)">Nauru (+674)</option>
                        <option  value="Nepal (+977)">Nepal (+977)</option>
                        <option  value="Netherlands (+31)">Netherlands (+31)</option>
                        <option  value="Netherlands Antilles (+599)">Netherlands Antilles (+599)</option>
                        <option  value="New Caledonia (French) (+687)">New Caledonia (French) (+687)</option>
                        <option  value="New Zealand (+64)">New Zealand (+64)</option>
                        <option  value="Nicaragua (+505)">Nicaragua (+505)</option>
                        <option  value="Niger (+227)">Niger (+227)</option>
                        <option  value="Nigeria (+234)">Nigeria (+234)</option>
                        <option  value="Niue (+683)">Niue (+683)</option>
                        <option  value="Norfolk Islands (+672)">Norfolk Islands (+672)</option>
                        <option  value="Northern Mariana Islands (+1670)">Northern Mariana Islands (+1670)</option>
                        <option  value="Norway (+47)">Norway (+47)</option>
                        <option  value="Oman (+968)">Oman (+968)</option>
                        <option  value="Pakistan (+92)">Pakistan (+92)</option> 
                        <option  value="Palau (+680)">Palau (+680)</option> 
                        <option  value="Panama (+507)">Panama (+507)</option> 
                        <option  value="Papua New Guinea (+675)">Papua New Guinea (+675)</option> 
                        <option  value="Paraguay (+595)">Paraguay (+595)</option>
                        <option  value="Peru (+51)">Peru (+51)</option>
                        <option  value="Philippines (+63)">Philippines (+63)</option> 
                        <option  value="Pitcairn Islands (+64)">Pitcairn Islands (+64)</option> 
                        <option  value="Poland (+48)">Poland (+48)</option> 
                        <option  value="Polynesia (French) (+689)">Polynesia (French) (+689)</option> 
                        <option  value="Portugal (+351)">Portugal (+351)</option>  
                        <option  value="Puerto Rico (+1787,+1939)">Puerto Rico (+1787,+1939)</option>
                        <option  value="Qatar (+974)">Qatar (+974)</option> 
                        <option  value="Reunion (French) (+262)">Reunion (French) (+262)</option> 
                        <option  value="Romania (+40)">Romania (+40)</option> 
                        <option  value="Russia (+7)">Russia (+7)</option> 
                        <option  value="Rwanda (+250)">Rwanda (+250)</option>  
                        <option  value="Saint Helena (+290)">Saint Helena (+290)</option>
                        <option  value="Saint Kitts and Nevis Anguilla (+1869)">Saint Kitts and Nevis Anguilla (+1869)</option> 
                        <option  value="Saint Lucia (+1758)">Saint Lucia (+1758)</option> 
                        <option  value="Saint Pierre and Miquelon (+508)">Saint Pierre and Miquelon (+508)</option> 
                        <option  value="Saint Vincent And Grenadines (+1784)">Saint Vincent And Grenadines (+1784)</option> 
                        <option  value="Samoa (+684)">Samoa (+684)</option>  
                        <option  value="San Marino (+378)">San Marino (+378)</option>
                        <option  value="Sao Tome And Principe (+239)">Sao Tome And Principe (+239)</option> 
                        <option  value="Saudi Arabia (+966)">Saudi Arabia (+966)</option> 
                        <option  value="Senegal (+221)">Senegal (+221)</option> 
                        <option  value="Serbia (+381)">Serbia (+381)</option> 
                        <option  value="Seychelles (+248)">Seychelles (+248)</option>
                        <option  value="Sierra Leone (+232)">Sierra Leone (+232)</option> 
                        <option  value="Singapore (+65)">Singapore (+65)</option> 
                        <option  value="Slovakia (+421)">Slovakia (+421)</option> 
                        <option  value="Slovenia (+386)">Slovenia (+386)</option>  
                        <option  value="Solomon Islands (+677)">Solomon Islands (+677)</option>
                        <option  value="Somalia (+252)">Somalia (+252)</option> 
                        <option  value="South Africa (+27)">South Africa (+27)</option> 
                        <option  value="South Georgia and South Sandwich Islands (+500)">South Georgia and South Sandwich Islands (+500)</option> 
                        <option  value="South Sudan (+211)">South Sudan (+211)</option> 
                        <option  value="Spain (+34)">Spain (+34)</option>
                        <option  value="Sri Lanka (+94)">Sri Lanka (+94)</option> 
                        <option  value="Sudan (+249)">Sudan (+249)</option> 
                        <option  value="Suriname (+597)">Suriname (+597)</option> 
                        <option  value="Svalbard Jan Mayen Islands (+47)">Svalbard Jan Mayen Islands (+47)</option>  
                        <option  value="Swaziland (Eswatini) (+268)">Swaziland (Eswatini) (+268)</option>
                        <option  value="Sweden (+46)">Sweden (+46)</option> 
                        <option  value="Switzerland (+41)">Switzerland (+41)</option> 
                        <option  value="Syria (+963)">Syria (+963)</option> 
                        <option  value="Taiwan (+886)">Taiwan (+886)</option> 
                        <option  value="Tajikistan (+992)">Tajikistan (+992)</option>
                        <option  value="Tanzania (+255)">Tanzania (+255)</option> 
                        <option  value="Thailand (+66)">Thailand (+66)</option> 
                        <option  value="Togo (+228)">Togo (+228)</option> 
                        <option  value="Tokelau (+690)">Tokelau (+690)</option>  
                        <option  value="Tongo (+676)">Tongo (+676)</option>
                        <option  value="Trinidad and Tobago (+1868)">Trinidad and Tobago (+1868)</option> 
                        <option  value="Tunisia (+216)">Tunisia (+216)</option> 
                        <option  value="Turkey (+90)">Turkey (+90)</option> 
                        <option  value="Turkmenistan (+993)">Turkmenistan (+993)</option> 
                        <option  value="Turks and Caicos Islands (+1649)">Turks and Caicos Islands (+1649)</option>
                        <option  value="Tuvalu (+688)">Tuvalu (+688)</option> 
                        <option  value="United States of America(USA) (+1)">United States of America(USA) (+1)</option> 
                        <option  value="United Kingdom (+44)">United Kingdom (+44)</option> 
                        <option  value="United States Minor Outlaying Islands (+246)">United States Minor Outlaying Islands (+246)</option>  
                        <option  value="Uganda (+256)">Uganda (+256)</option>
                        <option  value="Ukraine (+380)">Ukraine (+380)</option> 
                        <option  value="United Arab Emirates (+971)">United Arab Emirates (+971)</option> 
                        <option  value="Uruguay (+598)">Uruguay (+598)</option> 
                        <option  value="Uzbekistan (+998)">Uzbekistan (+998)</option> 
                        <option  value="Vanuatu (+678)">Vanuatu (+678)</option>
                        <option  value="Vatican City (+379)">Vatican City (+379)</option> 
                        <option  value="Venezuela (Bolivarian Republic) (+58)">Venezuela (Bolivarian Republic) (+58)</option> 
                        <option  value="Vietnam (+84)">Vietnam (+84)</option> 
                        <option  value="Virgin Islands (British) (+1284)">Virgin Islands (British) (+1284)</option>  
                        <option  value="Virgin Islands (USA) (+1340)">Virgin Islands (USA) (+1340)</option>
                        <option  value="Wallis and Futuna Islands (+681)">Wallis and Futuna Islands (+681)</option> 
                        <option  value="Western Sahara (+212)">Western Sahara (+212)</option> 
                        <option  value="Yemen (+967)">Yemen (+967)</option> 
                        <option  value="Zambia (+260)">Zambia (+260)</option> 
                        <option  value="Zimbabwe (+263)">Zimbabwe (+263)</option>
                        <option  value="India (+91)">India (+91)</option> 
                        <option  value="Sint Maarten (+1721)">Sint Maarten (+1721)</option> 
                        <option  value="Curacao (+599)">Curacao (+599)</option>
                        <option  value="Kosovo (+383)">Kosovo (+383)</option> 
                        <option  value="Palestine (+970)">Palestine (+970)</option> 
                        <option  value=""></option>
                        

                        
                    </select>
                </div>
                <div class="input-box">
                    <label>Phone number</label>
                    <input value="<?php echo $phone_number?>" type="phone number" name='phone_number' maxlength="10" placeholder="Enter phone number" required />
                </div>
            </div>



            <div class="input-box">
                <label>City</label>
                <input value="<?php echo $city?>" id="city" name='city' type="text">

            </div>

            <div class="column">
                <div class="input-box">
                    <label>Source of joining</label>
                    <input value="<?php echo $source_of_joining?>" type="text" name="source_of_joining" placeholder="Enter source of joining" required />
                </div>
            </div>
            <button onclick="submitVolunteerDetailsPg1()" id="submit">Submit</button>
        </form>
    </section>


    <script>

    //script to update the user inforamtion and prevent the default form submission
        function submitVolunteerDetailsPg1() {
           //check if the user id is set in the url parameter
            if (window.location.search) {
                //get the user id from the url parameter
                let destination = 'insertVolunteerdetials1.php';
                const urlParams = new URLSearchParams(window.location.search);
                const userId = urlParams.get('user_id');
                 //if the user id  is set then prevent the default form submission
                if (userId) {
                   destination = 'insertVolunteerdetials1.php?user_id=' + userId;
                }   
                //get the form element
                const form = document.querySelector('.form');
                //change the action attribute of the form to the destination
                form.action = destination; 
            // console.log('Form submitted!');
        }
    }
        // function sendDataToServer(form) {
        //     // Use AJAX or other methods to send data to the server
        //     // Example using Fetch API:
        //     fetch('/api/submitVolunteerDetails', {
        //             method: 'POST',
        //             body: new FormData(form),
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             // Handle the response from the server if needed
        //             console.log(data);
        //         })
        //         .catch(error => {
        //             // Handle errors
        //             console.error('Error:', error);
        //         });
        // }
</script>

    <script>
        // Populate cities based on the selected country
        const citySelect = document.getElementById('citySelect');
        const countrySelect = document.querySelector('input[placeholder="Enter country name"]');

        countrySelect.addEventListener('input', () => {
            const selectedCountry = countrySelect.value;
            // Here, you can fetch cities based on the selected country from a database or predefined list
            // For demonstration purposes, let's assume we have a static list of cities for some countries
            const citiesByCountry = {
                'United States': ['New York', 'Los Angeles', 'Chicago'],
                'United Kingdom': ['London', 'Manchester', 'Birmingham']
                    // Add more countries and cities as needed
            };
            const cities = citiesByCountry[selectedCountry] || [];
            citySelect.innerHTML = '';
            cities.forEach(city => {
                const option = document.createElement('option');
                option.text = city;
                option.value = city;
                citySelect.appendChild(option);
            });
        });


        
    </script>


<?php include('closeConnection.php'); ?>



</body>

</html>