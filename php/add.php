<html>
<head>
 <title>Add Data</title>
         <meta charset="UTF-8">
        <link href="../css/carousel.css" rel="stylesheet" type="text/css"/>
        <link href="../css/index.css" rel="stylesheet" type="text/css" title="normal"/>
        <link href="../css/alternate.css" rel="alternate stylesheet" type="text/css" title="alternate"/>
        <script src="../javascript/switch.js" type="text/javascript"></script>
        <script src="../javascript/booking.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
</head>
<body>
<?php error_reporting(0); 
// to hide the errors because we are handling them ourselves


//including the database connection file
include_once("config.php");

//error handling function to check the length
function length_check($name) {
echo "<p style='text-align: center><font color='red'>$name value is too long.</font></p>";
}

//Error handling function to check the dates
function date_check() {
echo "<p style='text-align: center><font color='red'>Choose the right dates.</font></p>";
}

//error handling function to check is empty
function value_check($value) {
echo "<p style='text-align: center><font color='red'>$value is empty.</font></p>";
}

//error handling to check if the value int is valid
function valid_int($value){
	echo "<p style='text-align: center><font color='red'>$value number is not valid</font></p>";
}

//actions if we press the "submit" button
if(isset($_POST['Submit'])) {

	

//creating the variables for every input and sanitize it
 $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
 $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $house = filter_var($_POST['house'], FILTER_SANITIZE_NUMBER_INT);
  $start_date = filter_var($_POST['firstdate'], FILTER_SANITIZE_STRING);
  $end_date = filter_var($_POST['lastdate'], FILTER_SANITIZE_STRING);



 // checking empty fields
 if(empty($name) || empty($house) || empty($email) || $start_date>=$end_date) {
 if(empty($name)) {
 value_check("Name");
 }
 
 //check whether the date is correct
  if($start_date>=$end_date) {
 date_check();
 }
 
   //validate the length of name
   if(strlen($name)>20) {
 length_check($name);
 }
 
  //validate the length of email
   if(strlen($email)>25) {
 length_check($email);
 }
 
 //check if the house is a valid number_format
   if(!filter_var($house, FILTER_VALIDATE_INT) === true) {
 valid_int("House");
 }
 
 //check if email is empty
 if(empty($email)) {
 value_check("Email");
 }

 //link to the previous page
 echo "<br/><button id='button_add' width=50px><a href='javascript:self.history.back();'>Go Back</a></button>";
 } else {
	 
 // if all the fields are filled (not empty)
 //insert data to database using function from config.php
 data_write($name,$email,$house,$start_date,$end_date, $mysqli);
 
  //display success message
 echo "<p><font color='green'>Data added successfully.</p>";
 echo "<br/><button id='button_add' width=50px><a href='table.php'>View Result</a></button>";
 }

//closing the connection
$mysqli->close();
}
?>
</body>
</html>
