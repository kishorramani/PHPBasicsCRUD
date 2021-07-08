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

$ID = $_POST['poetry_id'];

$query = "DELETE FROM poetry WHERE id = '$ID'";

$result = $conn->query($query);
//request part complete - DELETE query's result is true for successfully delete otherwise it's false

if($result){
	$response = array("status"=>"1","message"=>"poetry successfully deleted");
} else {
	$response = array("status"=>"0","message"=>"poetry not successfully deleted");
}
//decision making/response part complete

echo json_encode($response);
?>