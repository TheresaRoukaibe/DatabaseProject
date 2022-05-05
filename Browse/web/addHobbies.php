<?php 
session_start();

$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$hobby_name = $_GET['hobby_name'];
$email = $_GET['email'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');
if(empty($hobby_name)){
	echo '<script>alert("All values should be filled for a personalized experience. Click OK and Lets try again!");window.location.href = "browse.php";</script>';
}else{
	
if($conn->connect_error){
	die($conn->connect_error);
}else{
	
if($_SESSION['email'] == $email){	
	
$sql = "SELECT * FROM hobbies WHERE hobby_name=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $hobby_name);
$result->execute();
$hobby = $result->fetch();

$sql2 = "SELECT * FROM users WHERE email=?"; 
$result2 = $pdo->prepare($sql2);
$result2->bindParam(1, $email);
$result2->execute();
$user = $result2->fetch();

if($user){
	if($hobby){
		//check if hobby already exists 
$stmt2 = $conn->prepare("INSERT INTO user_enjoys(enjoys_user_id, enjoys_hobby_id) VALUES(?,?)");
	$stmt2->bind_param("ii", $user['user_id'], $hobby['hobby_id']);
	$stmt2->execute();
	
	
	echo '<script>alert("Hobby Added. Click OK to refresh"); window.location.href = "browse.php";</script>';
	
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
	$stmt3 = $conn->prepare("INSERT INTO user_enjoys(enjoys_user_id, enjoys_hobby_id) VALUES(?,?)");
	$stmt3->bind_param("ii", $user['user_id'], $hobby2['hobby_id']);
	$stmt3->execute();
	echo '<script>alert("Hobby Added. Click OK to refresh"); window.location.href = "browse.php";</script>';
	}
}else{
	echo '<script>alert("User not found. Make sure of email"); window.location.href = "browse.php";</script>';
}
  }else{
	  echo '<script>alert("Not your email. Make sure of email"); window.location.href = "browse.php";</script>';
  }
}
}


?>