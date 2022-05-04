<?php
session_start();
include("connection.php");
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
$email = $_GET['email'];
$pass = $_GET['pass'];
$hashPass = password_hash($pass, PASSWORD_DEFAULT);

if(empty($email)){
	echo '<script>alert("Please enter email");window.location.href = "index.php";</script>';
}else if(empty($pass)){
	echo '<script>alert("Please enter password");window.location.href = "index.php";</script>';
}ELSE{


$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');


$checkMail = "SELECT * FROM users WHERE email='$email'"; 
$resultMail = mysqli_query($conn, $checkMail);
$exists =  mysqli_fetch_assoc($resultMail); 
 

$sql = "SELECT * FROM users WHERE email=?"; 
$result = $pdo->prepare($sql);
$result->bindParam(1, $email);
$result->execute();

$user = $result->fetch();

if($exists){
if(password_verify($pass, $user['pass'])){
//echo "Sign up successful";
if($user['user_types_id'] == 0){
	$_SESSION['name'] = $user['user_firstname'];
	$_SESSION['email'] = $user['email'];
	echo '<script>window.location.replace("http://localhost/startbootstrap-agency-gh-pages/Browse/web/browse.php");</script>';
}else{
	$_SESSION['name'] = $user['user_firstname'];
	$_SESSION['email'] = $user['email'];
	echo '<script>window.location.replace("http://localhost/startbootstrap-agency-gh-pages/Admin.php");</script>';
}
}else{
	echo '<script>alert("Wrong password. Please try again.");window.location.href = "index.php";</script>';
}
}else{
	echo '<script>alert("User not found. Redirecting to sign up page...");window.location.href = "index.php";</script>';
}
}
?>