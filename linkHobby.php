<?php 

$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$hobby_name = $_GET['hobby_name'];
$att_name = $_GET['att_name'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');
if(empty($att_name) or empty($hobby_name)){
	echo '<script>alert("All values should be filled for a personalized experience. Click OK and Lets try again!");window.location.href = "Admin.php";</script>';
}else{
	
if($conn->connect_error){
	die($conn->connect_error);
}else{


$sql = "SELECT * FROM hobbies WHERE hobby_name=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $hobby_name);
$result->execute();
$hobby = $result->fetch();

$sql2 = "SELECT * FROM tourist_attractions WHERE att_name=?"; 
$result2 = $pdo->prepare($sql2);
$result2->bindParam(1, $att_name);
$result2->execute();
$att = $result2->fetch();

if($att){
	if($hobby){
$stmt2 = $conn->prepare("INSERT INTO attraction_involves(inv_hobby_id, inv_att_id) VALUES(?,?)");
	$stmt2->bind_param("ii", $hobby['hobby_id'], $att['att_id']);
	$stmt2->execute();
	
	
	echo '<script>alert("Hobby Linked. Click OK to refresh"); window.location.href = "Admin.php";</script>';
	
	$stmt->close();
	$conn->close();
	}else{
	$stmt = $conn->prepare("INSERT INTO hobbies(hobby_name) VALUES(?)");
	$stmt->bind_param("s", $hobby_name);
	$stmt->execute(); 
	$sql3 = "SELECT * FROM hobbies WHERE hobby_name=?"; 
$result3 = $pdo->prepare($sql3);
$result3->bindParam(1, $hobby_name);
$result3->execute();
$hobby2 = $result3->fetch();

	$stmt4 = $conn->prepare("INSERT INTO attraction_involves(inv_hobby_id, inv_att_id) VALUES(?,?)");
	$stmt4->bind_param("ii", $hobby2['hobby_id'], $att['att_id']);
	$stmt4->execute();
	echo '<script>alert("Hobby Linked. Click OK to refresh"); window.location.href = "Admin.php";</script>';
	}
}else{
	echo '<script>alert("Place not found. Make sure of name"); window.location.href = "Admin.php";</script>';
}
  }
}


?>