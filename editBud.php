<?php
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$att_name = $_GET['att_name'];
$att_budget = $_GET['att_budget'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');

if(empty($att_name) or empty($att_budget)){
	echo '<script>alert("Please enter all values. Failed to update!");window.location.href = "Admin.php";</script>';
}else{
	if($conn->connect_error){
	die($conn->connect_error);
}else{
	
	//checking if place exists 
	$sql = "SELECT * FROM tourist_attractions WHERE att_name=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $att_name);
$result->execute();
$place = $result->fetch();

if(empty($place)){
	echo '<script>alert("Could not find place. Failed to Update! Make sure of name");window.location.href = "Admin.php";</script>';
}else{
	//updating budget
	$stmt = $conn->prepare("UPDATE tourist_attractions SET att_budget = ? WHERE att_name= ?");
	$stmt->bind_param("is", $att_budget, $att_name);
	$stmt->execute(); 
		echo '<script>alert("Budget Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}
}
}
?>