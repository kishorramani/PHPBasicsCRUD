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

//request part is not needed here

$query = "SELECT * FROM poetry";

$result = $conn->query($query);

//decision making part is start
$row = $result->fetch_all(MYSQLI_ASSOC);		//store array in row variable

if(!empty($row)){
	$response = array("status"=>"1","message"=>"Record available","data"=>$row);
} else {
	$response = array("status"=>"0","message"=>"Record is empty","data"=>"$row");
}
//decision making/response part complete

echo json_encode($response);
?>