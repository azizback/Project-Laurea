<?php

//databasse log in info
$databaseHost = 'localhost';
$databaseName = 'localdb';
$databaseUsername = 'root';
$databasePassword = '';

//connecting to the database
$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//show error in case of failure
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

//function to add data into database using prepared statements
function data_write ($name,$email,$house,$start_date,$end_date,$mysqli) {
	$stmt = $mysqli->prepare("INSERT INTO booking (name,email,house,start_date,end_date) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("ssdss",$name, $email, $house, $start_date, $end_date);
		$stmt->execute();

	 $stmt->close();
}

//function to update data into database using prepared statements

function data_update ($name,$email,$house,$start_date,$end_date,$id,$mysqli) {
	$stmt = $mysqli->prepare("UPDATE booking SET name=?,email=?,house=?,start_date=?,end_date=? WHERE id=?");
	$stmt->bind_param("ssdssd",$name, $email, $house, $start_date, $end_date, $id);
		$stmt->execute();
	if ($stmt->error) {
	echo "FAILURE!!! " . $stmt->error;
		}
	else echo "Updated {$stmt->affected_rows} rows";
	 $stmt->close();
}


//function to delete data from database using prepared statements

function data_delete ($id,$mysqli) {
	$stmt = $mysqli->prepare("DELETE FROM booking WHERE id=?");
	$stmt->bind_param("d",$id);
		$stmt->execute();

	 $stmt->close();
}
?>
