<?php
$M_name = $_POST['M_name'];
$Dosage = $_POST['Dosage'];
$Use_for = $_POST['Use_for'];
$Price =   $_POST['Price'];
$Symptom1 = $_POST['Symptom1'];
$Symptom2 = $_POST['Symptom2'];
$Symptom3 = $_POST['Symptom3'];
if(!empty($M_name) || !empty($Dosage) ||!empty($Use_for) ||!empty($Price) ||!empty($Symptom1)){
$host = 'localhost';
$dbuserame ='root';
$dbpassword='';
$dbname='ilaaj_db';
$conn = new mysqli($host, $dbuserame, $dbpassword , $dbname);
if (mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
	$SELECT="SELECT M_name FROM medicine WHERE M_name = ? ";
	$INSERT="INSERT Into medicine (M_name, Dosage, Use_for, Price, Symptom1, Symptom2, Symptom3) values(?, ?, ?, ?, ?, ?, ?)";

$rnum = $stmt ->num_rows;

$stmt = $conn ->prepare($SELECT);
$stmt->bind_param("s", $M_name);
$stmt->execute();
$stmt->bind_result($M_name);
$stmt->store_result();
$rnum = $stmt ->num_rows;

if($rnum==0){
	$stmt->close();
	
	$stmt=$conn->prepare($INSERT);
	$stmt->bind_param("sssisss", $M_name, $Dosage, $Use_for, $Price, $Symptom1, $Symptom2, $Symptom3);
	$stmt->execute();
	echo "Medicine Added";
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

