<html>
<head>
        <meta charset="UTF-8">
        <link href="../css/carousel.css" rel="stylesheet" type="text/css"/>
        <link href="../css/index.css" rel="stylesheet" type="text/css" title="normal"/>
        <link href="../css/alternate.css" rel="alternate stylesheet" type="text/css" title="alternate"/>
        <script src="../javascript/switch.js" type="text/javascript"></script>
        <script src="../javascript/booking.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <title>Project Laurea</title>
          <script src="js/daypilot/daypilot-all.min.js"></script>
</head>
<body>



<?php error_reporting(0); 
// to hide the errors because we are handling them ourselves


// including the database connection file
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


  
  
//script when update button is clicked
if(isset($_POST['update']))	
{
	
		//giving the variables to all the input fields and sanitize it
	 $id = $_POST['id'];
 $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
 $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $house = filter_var($_POST['house'], FILTER_SANITIZE_NUMBER_INT);
  $start_date = filter_var($_POST['firstdate'], FILTER_SANITIZE_STRING);
  $end_date = filter_var($_POST['lastdate'], FILTER_SANITIZE_STRING);

 // checking empty fields
 if(empty($name) || empty($house) || empty($email) ) {
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
 echo "<br/><button id='button_add'><a href='javascript:self.history.back();'>Go Back</a></button>";
 } else {
	 
 //updating the table using function from config.php
	 data_update($name,$email,$house,$start_date,$end_date, $id, $mysqli);

	//closing the connection
	$mysqli->close();
	
 //redirectig to the display page. In our case, it is table.php
 header("Location: table.php");
 }
}


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM booking WHERE id=$id");

//putting the info from the database to the variables
while($res = mysqli_fetch_array($result))
{
 $name = $res['name'];
 $email = $res['email'];
 $house = $res['house'];
 $start_date = $res['start_date'];
 $end_date = $res['end_date'];
}
?>


<header>
            <navbar>
                <nav><a href="../index.php">Home page</a></nav>
                <nav><a href="contact.php" >Contact</a></nav>
                <nav><a class="active" href="#" >Booking</a></nav>


            </navbar>
        </header>
	<br>	


<br><br>
 <button id="button_small"><a  href="table.php">Back to the table</a></button>
 <br/><br/>


<!-- Adding the fetched data to the table -->
 <form name="form1" method="post" action="edit.php">
 <table id="booking_table" width="50%" border="0">
 <tr>
 <td>Name</td>
 <td><input type="text" name="name" value="<?php echo $name;?>"></td>
 </tr>
<tr>
 <td>Email</td>
 <td><input type="text" name="email" value="<?php echo $email;?>"></td>
 </tr>
 <tr>
 <td>House number</td>
 <td> <input type="number" min="1" max="3" name="house" value="<?php echo $house;?>" ></td>
 </tr>
 <tr>
 <td>Start date</td>
 <td><input type="date" id="firstdate" name="firstdate"  value="<?php echo $first_date;?>"></td>
 </tr>
 <tr>
 <td>End number</td>
 <td><input type="date" id="lastdate" name="lastdate"  value="<?php 
 echo $last_date;?>"></td>
 </tr>
 <tr>
 <td><input type="hidden" name="id" value=<?php echo
$_GET['id'];?>></td>
 <td><input type="submit" name="update" value="Update"></td>
 </tr>
 </table>
 </form>
 
 



</body>
</html>