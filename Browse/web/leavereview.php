<?php 
session_start();
include("connection.php");
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
$email = $_GET['email'];
$att_name = $_GET['att_name'];
$review = $_GET['review'];
$visit_time = $_GET['visit_time'];
$visit_date = $_GET['visit_date'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');
if(empty($att_name) or empty($email) or empty($review) or empty($visit_time) or empty($visit_date)){
	echo '<script>alert("All values should be filled to validate review. Click OK and Lets try again!");window.location.href = "browse.php";</script>';
}else{
	
if($conn->connect_error){
	die($conn->connect_error);
}else{
	
	if($_SESSION['email'] == $email){
	$sql = "SELECT * FROM users WHERE email=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $email);
$result->execute();
$user = $result->fetch();

$sql2 = "SELECT * FROM tourist_attractions WHERE att_name=?"; 
$result2 = $pdo->prepare($sql2);
$result2->bindParam(1, $att_name);
$result2->execute();
$place = $result2->fetch();

	$stmt = $conn->prepare("INSERT INTO reviews(review_user_id, review_opinion) VALUES(?,?)");
	$stmt->bind_param("is", $user['user_id'], $review);
	$stmt->execute(); 

$stmt2 = $conn->prepare("INSERT INTO user_visits(visit_user_id, visit_loc_id, visit_time, visit_date) VALUES(?,?,?,?)");
	$stmt2->bind_param("iiss", $user['user_id'], $place['att_id'], $visit_time, $visit_date);
	$stmt2->execute();
	echo '<script>alert("Review Added. Click OK to refresh"); window.location.href = "browse.php";</script>';
	
	$stmt->close();
	$conn->close();
  }else{
	 echo '<script>alert("Not your email. Make sure of email"); window.location.href = "browse.php";</script>'; 
  }
}
}
?>