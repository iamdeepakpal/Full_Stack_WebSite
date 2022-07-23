<?php

$username="root";
$servername="localhost";
$dbname="amazone";
$dbpassword='';
$y="";
$p="";
$x = $z= $a= "";
$x=$_POST["name"];
$y=$_POST["email"];
$z=$_POST["password"];
$conn=mysqli_connect($servername,$username,$dbpassword,$dbname);

if(!$conn){
	echo "Connection failure";
}
// echo "Connected to db";

$c = mysqli_query($conn, "SELECT * FROM `employees` WHERE email='$y'");
if (mysqli_num_rows($c)>0){
	echo "User already exists!";
	header("Refresh:1;url=index.php");
}

else{
	if($_SERVER["REQUEST_METHOD"]==="POST"){
	
	$a = password_hash($z, PASSWORD_DEFAULT);
	// echo $x."<br>";
	// echo $y."<br>";
	// echo $a."<br>";

	$temp="INSERT INTO employees( name, email, password) VALUES ('$x', '$y', '$a')";
	echo "data entered successfully";

	mysqli_query($conn,$temp) or die ("Not connected");
}
}


?>