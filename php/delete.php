<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table using config.php function
data_delete($id,$mysqli);

//closing the database connection
$mysqli->close();

//redirecting to the display page (index.php in our case)
header("Location:table.php");

?>