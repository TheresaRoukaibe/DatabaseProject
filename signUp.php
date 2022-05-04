<?php 

include("connection.php");
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
$user_firstname = $_GET['user_firstname'];
$user_lastname = $_GET['user_lastname'];
$user_gender = $_GET['user_gender'];
$user_age = $_GET['user_age'];
$user_types_id = $_GET['user_types_id'];
$city_name = $_GET['city_name'];

$email = $_GET['email'];
$pass = $_GET['pass'];

$hashPass = password_hash($pass, PASSWORD_DEFAULT);
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');
if(empty($user_firstname) or empty($user_lastname) or empty($user_gender) or empty($user_age)  or empty($email) or empty($pass) or empty($user_types_id)){
	echo '<script>alert("All values should be filled for a personalized experience. Click OK and Lets try again!");window.location.href = "index.php";</script>';
}else{
	
if($conn->connect_error){
	die($conn->connect_error);
}else{
	$user_check_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    echo '<script>alert("Account with this email already exists! Click OK to try again!");window.location.href = "index.php";</script>';
  }else{
	  if($user_types_id == 'Tourist'){
		  $sql = "SELECT * FROM postal_codes WHERE code_city_name=?";
$result = $pdo->prepare($sql);
$result->bindParam(1, $city_name);
$result->execute();
$city = $result->fetch();
$type = 0;
		  $stmt = $conn->prepare("INSERT INTO users(user_gender, user_firstname, user_lastname, user_age, user_types_id, postal_code, email, pass) VALUES(?,?,?,?,?,?,?,?)");
	      $stmt->bind_param("sssiiiss", $user_gender, $user_firstname, $user_lastname, $user_age, $type, $city['code_id'], $email, $hashPass);
	      $stmt->execute();
		  echo '<script>alert("Registration successful. Please proceed to log in.");window.location.replace("http://localhost/startbootstrap-agency-gh-pages/index.php");</script>';
		  $stmt->close();
	$conn->close();
	  }else if($user_types_id == 'Business Owner'){
		   $sql = "SELECT * FROM postal_codes WHERE code_city_name=?";
$result = $pdo->prepare($sql);
$result->bindParam(1, $city_name);
$result->execute();
$city = $result->fetch();
		  $type2 = 1;
		 $stmt = $conn->prepare("INSERT INTO users(user_gender, user_firstname, user_lastname, user_age, user_types_id, postal_code, email, pass) VALUES(?,?,?,?,?,?,?,?)");
	      $stmt->bind_param("sssiiiss", $user_gender, $user_firstname, $user_lastname, $user_age, $type2, $city['code_id'], $email, $hashPass);
	      $stmt->execute();
		  echo '<script>alert("Registration successful. Please proceed to log in.");window.location.replace("http://localhost/startbootstrap-agency-gh-pages/index.php");</script>';
		  $stmt->close();
	}
	
  }
}
}







	

?>
