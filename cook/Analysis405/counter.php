<?php
include("db_connect.php");

if(isset($_GET["tb"])){
	$tb = "clicked";
}else{
	$tb = "visitors";
}

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully <br>";

//===================GETTING DATA
$sql2 = "SELECT ip_no FROM ". $tb ;
$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
  echo mysqli_num_rows($result); 
} else {
  echo "0";
}

mysqli_close($conn);
?>