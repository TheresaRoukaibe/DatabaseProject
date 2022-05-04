<?php 
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
include("connection.php");
$pdo = new PDO ("mysql:host=localhost;dbname=touristhelper.db","root", "");
$att_name = $_GET['att_name'];
$att_capacity = $_GET['att_capacity'];
$att_budget = $_GET['att_budget'];
$att_budget_opening_hours = $_GET['att_budget_opening_hours'];
$att_budget_closing_hours = $_GET['att_budget_closing_hours'];
$att_description = $_GET['att_description'];
$att_loc_id = $_GET['att_loc_id'];
$attraction_type = $_GET['attraction_type'];
$url = $_GET['url'];
$db = mysqli_connect('localhost', 'root', '', 'touristhelper.db');
$conn = new mysqli('localhost', 'root', '', 'touristhelper.db');
if(empty($att_name) or empty($url) or empty($att_capacity) or empty($att_budget) or empty($att_budget_opening_hours) or empty($att_budget_closing_hours) or empty($att_description) or empty($att_loc_id) or empty($attraction_type)){
	echo '<script>alert("All values should be filled for a personalized experience. Click OK and Lets try again!");window.location.href = "Admin.php";</script>';
}else{
	
if($conn->connect_error){
	die($conn->connect_error);
}else{
	$sql = "SELECT * FROM postal_codes WHERE code_city_name=?";
$result = $pdo->prepare($sql);
$result->bindParam(1, $att_loc_id);
$result->execute();
$city = $result->fetch();

if($attraction_type == "Restaurant"){
	$type1 = 1;
	$stmt = $conn->prepare("INSERT INTO tourist_attractions(att_name, att_capacity, att_budget, att_budget_opening_hours, att_budget_closing_hours, att_description, postal_code_id, attraction_type_id, url) VALUES(?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("siisssiis", $att_name, $att_capacity, $att_budget, $att_budget_opening_hours, $att_budget_closing_hours, $att_description, $city['code_id'], $type1, $url);
	$stmt->execute(); 
	echo '<script>alert("Place Added. Click OK to refresh"); window.location.href = "Admin.php";</script>';
	
	$stmt->close();
	$conn->close();
}else if($attraction_type == "Night Life"){
	$type1 = 2;
	$stmt = $conn->prepare("INSERT INTO tourist_attractions(att_name, att_capacity, att_budget, att_budget_opening_hours, att_budget_closing_hours, att_description,postal_code_id, attraction_type_id, url) VALUES(?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("siisssiis", $att_name, $att_capacity, $att_budget, $att_budget_opening_hours, $att_budget_closing_hours, $att_description, $city['code_id'], $type1, $url);
	$stmt->execute(); 
	echo '<script>alert("Place Added. Click OK to refresh"); window.location.href = "Admin.php";</script>';
	
	$stmt->close();
	$conn->close();
	
  }else if($attraction_type == "Indoor Entertainment"){
	$type1 = 3;
	$stmt = $conn->prepare("INSERT INTO tourist_attractions(att_name, att_capacity, att_budget, att_budget_opening_hours, att_budget_closing_hours, att_description, postal_code_id, attraction_type_id, url) VALUES(?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("siisssiis", $att_name, $att_capacity, $att_budget, $att_budget_opening_hours, $att_budget_closing_hours, $att_description, $city['code_id'], $type1, $url);
	$stmt->execute(); 
	echo '<script>alert("Place Added. Click OK to refresh"); window.location.href = "Admin.php";</script>';
	
	$stmt->close();
	$conn->close();
	
  }else if($attraction_type == "Outdoor Entertainment"){
	$type1 = 4;
	$stmt = $conn->prepare("INSERT INTO tourist_attractions(att_name, att_capacity, att_budget, att_budget_opening_hours, att_budget_closing_hours, att_description, postal_code_id, attraction_type_id, url) VALUES(?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("siisssiis", $att_name, $att_capacity, $att_budget, $att_budget_opening_hours, $att_budget_closing_hours, $att_description, $city['code_id'], $type1, $url);
	$stmt->execute(); 
	echo '<script>alert("Place Added. Click OK to refresh"); window.location.href = "Admin.php";</script>';
	
	$stmt->close();
	$conn->close();
	
  }
}
}
?>