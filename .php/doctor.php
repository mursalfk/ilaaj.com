<?php
$Full_Name = $_POST['Full_Name'];
$Specialization= $_POST['Specialization'];
$Address = $_POST['Address'];
$Timing =   $_POST['Timing'];
$Disease1 = $_POST['Disease1'];
$Disease2 = $_POST['Disease2'];
$Disease3 = $_POST['Disease3'];
if(!empty($M_name) || !empty($Dosage) ||!empty($Use_for) ||!empty($Price) ||!empty($Symptom1)){
$host = 'localhost';
$dbuserame ='root';
$dbpassword='';
$dbname='ilaaj_db';
$conn = new mysqli($host, $dbuserame, $dbpassword , $dbname);
if (mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
	$SELECT="SELECT Full_Name FROM doctor WHERE Full_Name = ? ";
	$INSERT="INSERT Into doctor (Full_Name, Specialization, Address, Timing, Disease1, Disease2, Disease3) values(?, ?, ?, ?, ?, ?, ?)";

$rnum = $stmt ->num_rows;

$stmt = $conn ->prepare($SELECT);
$stmt->bind_param("s", $Full_Name);
$stmt->execute();
$stmt->bind_result($Full_Name);
$stmt->store_result();
$rnum = $stmt ->num_rows;

if($rnum==0){
	$stmt->close();
	
	$stmt=$conn->prepare($INSERT);
	$stmt->bind_param("sssssss", $Full_name, $Specialization, $Adddress, $Timing, $Disease1, $Disease2, $Disease3);
	$stmt->execute();
	echo "Doctor record Added";
}else{
	echo "Sorry try again";
}
$stmt ->close();
$conn ->close();
}
} else {
echo "Fill the required field";
die(); 
}
?>

