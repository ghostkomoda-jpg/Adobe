<?php
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])){ $ipaddress = $_SERVER['HTTP_CLIENT_IP'];}
   elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];}
   elseif(isset($_SERVER['HTTP_X_FORWARDED'])){$ipaddress = $_SERVER['HTTP_X_FORWARDED'];}
    elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){ $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];}
    elseif(isset($_SERVER['HTTP_FORWARDED'])){$ipaddress = $_SERVER['HTTP_FORWARDED'];}
    elseif(isset($_SERVER['REMOTE_ADDR'])){$ipaddress = $_SERVER['REMOTE_ADDR'];}
    else{ $ipaddress = 'UNKNOWN';}
    
    return $ipaddress;
}
$ip2 = $_SERVER['REMOTE_ADDR'];
$ip = get_client_ip();
echo $ip."<br>";
echo $ip2."<br>";
?>