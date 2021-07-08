<?php
//This devide into 4 part
//1: connection
//2: request
//3: decision making
//4: response

$servername = "localhost";
$username = "root";
$password = "";
$db = "poetrydb";

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error) {
	die("Connection failed".$conn->connect_error);
}
//connection part complete

$POETRY_DATA = $_POST['poetry'];
$POET_NAME = $_POST['poet_name'];

$query = "INSERT INTO poetry(poetry_data,poet_name)VALUES('$POETRY_DATA','$POET_NAME')";

$result = $conn->query($query);
//request part complete - INSERT query's result of n record is int value 'n' if successfully inserted

if($result==1){
	$response = array("status"=>"1","message"=>"poetry successfully inserted");
} else {
	$response = array("status"=>"0","message"=>"poetry not successfully inserted");
}
//decision making/response part complete

echo json_encode($response);

//My query - Data like this is not inserted in database [It's kishor ramani's poetry](it's include "'" special character)
?>