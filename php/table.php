<?php
//including the database connection file
include_once("config.php");


//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM booking ORDER BY id DESC"); 
?>
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
        <header>
            <navbar>
                <nav><a href="../index.php">Home page</a></nav>
                <nav><a href="contact.php" >Contact</a></nav>
                <nav><a class="active" href="#" >Booking</a></nav>

            </navbar>
        </header>
	<br>	


<br><br>
 <button id="button_add"> <a href="add.html">Add New Data</a> </button>  
 <table id="booking_table">
 <tr>
 <td>Name</td>
 <td>Email</td>
  <td>House number</td>
   <td>Start date</td>
  <td>End date</td>
 <td>Update</td>
 </tr>
 <?php

//Putting the database info to the table
 while($res = mysqli_fetch_array($result)) {
	 echo "<tr color='black'>";
	 echo "<td>".$res['name']."</td>";
	 echo "<td>".$res['email']."</td>";
	 echo "<td>".$res['house']."</td>";
	 echo "<td>".$res['start_date']."</td>";
	 echo "<td>".$res['end_date']."</td>";
	 
	 //links to edit and delete scripts
	 echo "<td><button><a href=\"edit.php?id=$res[id]\">Edit</a></button>  <button><a
	href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want
	to delete?')\">Delete</a></td></button>";
 }
 
 //closing the connection
	$mysqli->close();
	
 ?>
 </table>



 
</body>
</html>
