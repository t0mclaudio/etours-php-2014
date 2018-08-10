<?php
include('header.php');
include('Mobile_Detect.php');
?>
<html>
<head>
	<title>Inquiry Sent</title>
	<link rel="stylesheet" href="css/pure.css">
	<?php 
		$detect = new Mobile_Detect;
		if ($detect->isMobile()){

		} elseif($detect->isTablet()) {

		} else {
			echo "<link id=\"stylesheet\" rel=\"stylesheet\" href=\"css/desktop.css\"\/>";			
		}		
	?>
	<style>
		#wrapper{
			width:700px;
		}
		p{
			text-align:center;
			color:gray;
			width:90%;
			margin:0 auto;
		}
	</style>
</head>

<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="wrapper" class="center">
		<?php echo $header ?>
		<div>
			<p class="mid-grey">Your message has been sent. We will be glad if we can reply to your request on the same day or<br> on the soonest possible time. If you need our assistance please don't hesitate to email us at<br>  
			<img src="images/info@eto.png"><br>or get in touch with us through our contact number<br>+63 922 867 4779<br>and we will be glad to assist you.<br><br>HAVE A NICE DAY!!! :-)</p>
		</div>	
	</div>	
</body>		