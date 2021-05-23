<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
				<nav><a href="update.php" >Update</a></nav>
                <nav id="switch">
                    css
                    <a class="btn-switch" id="btn-id">
                        <span><button onclick="Switch('alternate')" >Alternate</button></span>
                        <br>
                        <span><button onclick="Switch('normal')" >Normal</button></span>
                    </a>
                </nav>
            </navbar>
        </header>
		 <a href="add.html">Add New Data</a><br/><br/>
		 <table width='80%' border=0>
		 <tr bgcolor='#CCCCCC'>
		 <td>Name</td>
		 <td>Age</td>
		 <td>Email</td>
		 <td>Update</td>
		 </tr>
        
        <?php


		
		include_once("db.php");
		$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); 


while($res = mysqli_fetch_array($result)) {
	 echo "<tr>";
	 echo "<td>".$res['name']."</td>";
	 echo "<td>".$res['age']."</td>";
	 echo "<td>".$res['email']."</td>";
	 echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a
	href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want
	to delete?')\">Delete</a></td>";
 }

 ?>
        
        
        
      
	 </table>
    </body>
</html>
