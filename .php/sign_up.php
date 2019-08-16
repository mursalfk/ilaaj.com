<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password =   $_POST['password'];
$cell = $_POST['cell'];
$email = $_POST['email'];
$gender =$_POST['gender'];
$c_password = $_POST['c_password'];
if(!empty($first_name) || !empty($last_name) ||!empty($username) ||!empty($password) ||!empty($email) ||!empty($cell) || !empty($c_password) || !empty($gender)){
$host = 'localhost';
$dbuserame ='root';
$dbpassword='';
$dbname='ilaaj_db';
$conn = new mysqli($host, $dbuserame, $dbpassword , $dbname);
if (mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
	$SELECT="SELECT email FROM sign_up WHERE email = ? Limit 1";
	$INSERT="INSERT Into sign_up (first_name, last_name, username, password, cell, email) values(?, ?, ?, ?, ?, ?)";

$stmt = $conn ->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt ->num_rows;

if($rnum==0){
	$stmt->close();
	
	$stmt=$conn->prepare($INSERT);
	$stmt->bind_param("ssssis", $first_name, $last_name, $username, $password, $cell, $email);
	$stmt->execute();
	echo "You are registered Now";
}else{
	echo "Email should be different";
}
$stmt ->close();
$conn ->close();
}
} else {
echo "All fields required";
die(); 
}
?>

