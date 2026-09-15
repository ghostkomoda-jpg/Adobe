<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ANALYSIS</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script >
			//let ball =0;

			setInterval( function(){ //ball++;
								//document.getElementById("numt").innerHTML = ball;
								$("#get_visitors").load("counter.php");
								$("#get_clicked").load("counter.php?tb=1");
							   }, 300000);	
	</script>
	
	
<style>

.container {
		height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Montserrat,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji"!important;
		background-color:#F1F1F1;

}

.card_box {
  width: 120px;
  height: 150px;
  border-radius: 12px;
  background: linear-gradient(170deg, rgba(58, 56, 56, 0.623) 0%, rgb(31, 31, 31) 100%);
  position: relative;
  box-shadow: 0 15px 30px rgba(0,0,0,0.55);
  cursor: pointer;
  transition: all .3s;
 margin: 15px;
 float: left;
	font-size: 15px;
}

.card_box:hover {
  transform: scale(0.9);
}

.card_box span {
  position: absolute;
  overflow: hidden;
  width: 90px;
  height: 90px;
  top: -6px;
  left: -6px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.card_box span::before {
  content: 'Premium';
  position: absolute;
  width: 150%;
  height: 24px;
  background-image: linear-gradient(45deg, #ff6547 0%, #ffb144  51%, #ff7053  100%);
  transform: rotate(-45deg) translateY(-12px);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  box-shadow: 0 3px 6px rgba(0,0,0,0.23);
}

.card_box span::after {
  content: '';
  position: absolute;
  width: 6px;
  bottom: 0;
  left: 0;
  height: 6px;
  z-index: -1;
  box-shadow: 84px -84px #cc3f47;
  background-image: linear-gradient(45deg, #FF512F 0%, #F09819  51%, #FF512F  100%);

}	
	.value{
	text-align: center;
	line-height: 150px;
	font-size: 30px;
	font-weight: 600;
	color: #F7F1F1;
	}
	#visitor::before{
		content: 'Visitors';
		
	}
		#clicked::before{
		content: 'Clicked';
		
	}
	
.button {
 background-color: #E41B1F;
  padding: 7px 10px;
  border: 1px solid #bbb;
  color: #FFF;
  font-weight: 600;
  cursor: pointer;
  border-radius: 4px;
  box-shadow: 0 10px 20px rgba(0,0,0,0.2);
  transition: all .3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
	font-size: 12px;
}

.button:hover {
  background-color: #E41B1F;
  color: #fff;
  box-shadow: -20px 50px 50px rgba(0,0,0,0.2);
  border: none;
  padding: 10px 20px;
}
	
	
	
@media screen and (min-width:540px){
	.card_box {
  	width: 200px;
	height: 250px;
	font-size: 18px;
	margin: 20px;
	border-radius: 20px;
	box-shadow: 0 25px 50px rgba(0,0,0,0.55);
		}
	.card_box span {
	  width: 150px;
	  height: 150px;
	  top: -10px;
	  left: -10px;
	}
	.card_box span::before {
  	content: 'Premium';
  	position: absolute;
  	height: 40px;
	transform: rotate(-45deg) translateY(-20px);
	box-shadow: 0 5px 10px rgba(0,0,0,0.23);
	

}	
	.card_box span::after {
 	 width: 10px;
 	 height: 10px;
 	 box-shadow: 140px -140px #cc3f47;
		}
	.value{
	line-height: 250px;
	font-size: 50px;
	}
	.button {
  		background-color: #E4E4E4;
		color: #222;
		font-size: 14px;
	}
}

</style>
	
</head>
<body>
    
<div class="container">
	<table >
		<tr><td>
			<div class="card_box">
				<span id="visitor"></span>
				<div class="value" id="get_visitors">-</div>
			</div>
			<div class="card_box">
				<span id="clicked"></span>
				<div class="value" id="get_clicked">-</div>
			</div>
		</td></tr>
		<tr><td style="text-align: center; margin:0px auto; vertical-align: middle; padding-top: 30px;">
	<form action="" method="post">
				<button class="button" type="submit" name="sub" >C L E A R</button>
	</form>

		</td></tr>
	</table>

</div>
   

	<script>
			$("#get_visitors").load("counter.php");
			$("#get_clicked").load("counter.php?tb=1");	
	</script>
	<br>


	<?php
	//===================CEARING DATA
	if (isset($_POST['sub'])){
		include("db_connect.php"); 
		$sql3 = "DELETE FROM visitors";
		$sql4 = "DELETE FROM clicked";
		mysqli_query($conn, $sql3);
		mysqli_query($conn, $sql4);
		mysqli_close($conn);
	}
	?>

</body>
</html>

