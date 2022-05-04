<?php
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$att_name = $_GET['att_name'];
$att_budget_opening_hours = $_GET['att_budget_opening_hours'];
$att_budget_closing_hours = $_GET['att_budget_closing_hours'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');

if(empty($att_name) or empty($att_budget_closing_hours) or empty($att_budget_opening_hours)){
	echo '<script>alert("Please enter all values. Failed to update!");window.location.href = "Admin.php";</script>';
}else{
	if($conn->connect_error){
	die($conn->connect_error);
}else{
	$sql = "SELECT * FROM tourist_attractions WHERE att_name=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $att_name);
$result->execute();
$place = $result->fetch();

if(empty($place)){
	echo '<script>alert("Could not find place. Failed to Update! Make sure of name");window.location.href = "Admin.php";</script>';
}else{
	$stmt1 = $conn->prepare("UPDATE tourist_attractions SET att_budget_opening_hours = ? WHERE att_name= ?");
	$stmt2 = $conn->prepare("UPDATE tourist_attractions SET att_budget_closing_hours = ? WHERE att_name= ?");
	$stmt1->bind_param("ss", $att_budget_opening_hours, $att_name);
	$stmt2->bind_param("ss", $att_budget_closing_hours, $att_name);
	$stmt1->execute(); 
	$stmt2->execute(); 
		echo '<script>alert("Hours Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt1->close();
	$stmt2->execute(); 
	$conn->close();
	}
}
}
?>