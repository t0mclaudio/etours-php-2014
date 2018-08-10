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
		#sent{
			text-align:center;
			color:gray;
			font-size:.8em;
		}
		#notes,ol{
			width:80%;
			margin:0 auto;
		}
	</style>
</head>

<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="wrapper" class="center">
		<?php echo $header ?>
		<div>
			<p id="sent">Your reservation request has been sent. We will be glad if we can reply to your request on the same day or<br> on the soonest possible time. If you need our assistance please don't hesitate to email us at<br>  
			<img src="images/info@eto.png"><br>or get in touch with us through our contact number<br>+63 922 867 4779<br>and we will be glad to assist you.<br><br></p>
			
			<p id="notes" class="large-grey no-margin">Some important notes</p>
			<ol>
				<li class="mid-grey">Our staff will get in touch with you once he/she receives your booking request </li>
				<li class="mid-grey">Please do not deposit payment without go signal from us. Wait for our go signal </li>
				<li class="mid-grey">Please deposit payment to ETOURS DAVAO INC Banco de Oro and Bank of Philippine Islands ONLY. We will not honor payments done in other accounts other than what is stated. </li>
				<li class="mid-grey">Our staff may request additional information from you like flight details and other related information</li>
			</ol>	
			<p style="width:50%;margin:0 auto;text-align:center;margin-top:30px">HAVE A NICE DAY!!! :-)</p>
		</div>	
	</div>	
</body>