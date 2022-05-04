<?php
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$att_name = $_GET['att_name'];
$att_city = $_GET['att_loc_id'];

$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');

if(empty($att_name) or empty($att_city)){
	echo '<script>alert("Please enter all values. Failed to update!");window.location.href = "Admin.php";</script>';
}else{
	if($conn->connect_error){
	die($conn->connect_error);
}else{
$sql1 = "SELECT * FROM postal_codes WHERE code_city_name=?";
$result1 = $pdo->prepare($sql1);
$result1->bindParam(1, $att_city);
$result1->execute();
$city = $result1->fetch();

$sql = "SELECT * FROM tourist_attractions WHERE att_name=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $att_name);
$result->execute();
$place = $result->fetch();

if(empty($place)){
	echo '<script>alert("Could not find place. Failed to Update! Make sure of name");window.location.href = "Admin.php";</script>';
}else{
	$stmt = $conn->prepare("UPDATE tourist_attractions SET postal_code_id = ? WHERE att_name= ?");
	$stmt->bind_param("is", $city['code_id'], $att_name);
	$stmt->execute(); 
		echo '<script>alert("City Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}
}
}
?>