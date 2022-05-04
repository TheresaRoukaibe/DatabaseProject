<?php
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$att_name = $_GET['att_name'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');

if(empty($att_name)){
	echo '<script>alert("Please enter name. Failed to delete!");window.location.href = "Admin.php";</script>';
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
	echo '<script>alert("Could not find place. Failed to delete! Make sure of name");window.location.href = "Admin.php";</script>';
}else{
	//$stmt = $conn->prepare("DELETE FROM tourist_attractions WHERE att_name= ?");
	//$stmt->bind_param("s", $att_name);
	//$stmt->execute(); 
	
	$sql2 = "SELECT * FROM tourist_attractions WHERE att_name=?"; 
$result2 = $pdo->prepare($sql2);
$result2->bindParam(1, $att_name);
$result2->execute();
$att = $result2->fetch();
 $stmt2 = $conn->prepare("DELETE FROM attraction_involves WHERE inv_att_id = ?");
	$stmt2->bind_param("i", $att['att_id']);
	$stmt2->execute(); 
	
   $stmt3 = $conn->prepare("DELETE FROM tourist_attractions WHERE att_id = ?");
	$stmt3->bind_param("i", $att['att_id']);
	$stmt3->execute(); 

		echo '<script>alert("Place deleted. Refreshing...");window.location.href = "Admin.php";</script>';
	$stmt->close();
	$conn->close();
	}
}
}
?>