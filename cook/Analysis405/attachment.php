<?php
include("db_connect.php");
if(isset($_GET["tb"])){
	$tb = "clicked";
}else{
	$tb = "visitors";
}


$check_save = false;
$ips = $_SERVER['REMOTE_ADDR'];
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully to ". $ips . "<br>";

//===================GETTING DATA
$sql2 = "SELECT ip_no FROM ".$tb;
$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result) and $check_save == false) { 
    if ($ips == $row["ip_no"]){ $check_save = true ; 
    //echo "Saved already"; 
        
    }
  }
  
} else {
 // echo "No Match on file <br>";
}

if($check_save == false){
	//===================INSERTING DATA
	
		$sql = "INSERT INTO ". $tb ." (ip_no) VALUES ('". $ips ."')";

		if (mysqli_query($conn, $sql)) {
		  //echo " <br> New record created successfully";
		} else {
		 // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}

mysqli_close($conn); 
?> 

