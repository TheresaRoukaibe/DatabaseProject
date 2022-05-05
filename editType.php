<?php
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$att_name = $_GET['att_name'];
$attraction_type_id = $_GET['attraction_type_id'];

$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');

if(empty($att_name) or empty($attraction_type_id)){
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
	//updating type id based on type
	if($attraction_type_id == "Restaurant"){
		$type1 = 1;
	$stmt = $conn->prepare("UPDATE tourist_attractions SET attraction_type_id = ? WHERE att_name= ?");
	$stmt->bind_param("is", $type1, $att_name);
	$stmt->execute(); 
	echo '<script>alert("Type Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}else if($attraction_type_id == "Night Life"){
		$type2 = 2;
	$stmt = $conn->prepare("UPDATE tourist_attractions SET attraction_type_id  = ? WHERE att_name= ?");
	$stmt->bind_param("is", $type2, $att_name);
	$stmt->execute(); 
	echo '<script>alert("Type Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}
	else if($attraction_type_id == "Indoor Entertainment"){
		$type3 = 3;
	$stmt = $conn->prepare("UPDATE tourist_attractions SET attraction_type_id = ? WHERE att_name= ?");
	$stmt->bind_param("is", $type3, $att_name);
	$stmt->execute(); 
	echo '<script>alert("Type Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}else if($attraction_type_id == "Outdoor Entertainment"){
		$type4 = 4;
	$stmt = $conn->prepare("UPDATE tourist_attractions SET attraction_type_id = ? WHERE att_name= ?");
	$stmt->bind_param("is", $type4, $att_name);
	$stmt->execute(); 
	echo '<script>alert("Type Updated. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}
}
}
}
?>