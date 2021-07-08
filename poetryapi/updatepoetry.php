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
$ID = $_POST['id'];

$query = "UPDATE poetry SET poetry_data='$POETRY_DATA' WHERE id = '$ID'";

$result = $conn->query($query);
//request part complete - UPDATE query's result is true or false based on update operation: true if successfully updated otherwise 0

if($result){
	$response = array("status"=>"1","message"=>"poetry successfully updated");
} else {
	$response = array("status"=>"0","message"=>"poetry not successfully updated");
}
//decision making/response part complete

echo json_encode($response);
?>