<?php
include_once('Tour.inc.php');
include('header.php');
include('Mobile_Detect.php');
$code = $_REQUEST['code'];
$dir = $_REQUEST['dir'];
?>
<html>
<head>
	<title> <?php echo Tour::getMetaTitle($code) ?></title>
	<meta name="description" content="<?php echo Tour::getMetaDescription($code) ?>">
	<meta name="keywords" content="davao city, davao city tours, tours in davao city, davao city package tours, davao hotel, davao city tourist spots, philippine tourist spots, davao hotels, davao package tour, tour in davao city, davao city hotels, davao city tourist spots, davao city tourism, davao city tourist attractions, davao city tourist destination, davao city tourism office, davao city tourist spot philippines, davao city tour guide, davao city tour itinerary, pearl farm, abreeza mall davao, pinnacle hotel davao, zest air, cebu pacific, affordable hotels in davao, recommended hotels in davao, budget hotels in davao, cheap hotels in davao, getting around davao city, places to go in davao city, davao restaurants, davao accommodations, recommended restaurants in davao city, tours in davao, philippine tour package, samal beach, samal resorts, samal island, samal island hopping, durian, philippine eagle, pec, pef, eden nature park, river rafting, educational tour, philippines, philippine travel, davao travel, philippine destinations, kublai, davao hotels, davao car rental, davao tourism, things to do in davao, davao zipline, davao rafting, camp sabros, crocodile park, marco polo hotel, pearl farm beach resort, samal, igacos, island hopping, talikud island, kadayawan festival, tourist spots in davao, malagos garden resort, davao package tour, davao day tour">	
	<script src="scripts/jquery-2.0.3.min.js"></script>
	<link rel="stylesheet" href="css/pure.css">

	<?php 
		//$detect = new Mobile_Detect;
		//if ($detect->isMobile()){

		//} elseif($detect->isTablet()) {

		//} else {
			echo "<link id=\"stylesheet\" rel=\"stylesheet\" href=\"css/desktop.css\"\/>";			
		//}		
	?>
</head>

<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="wrapper" class="center">
		<?php echo $header ?>	
		<div class="left-aside float-left">
			<div class="white left-nav">
				<p class="on-this-page header">On this page</p>
				<ul class="no-left-pad nine-em">
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#davao-city-samal-tour-link">Davao tour packages</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#davao-day-tour-link">Davao day tours</a></li>
										<li class="no-list-style"><a class="left-link no-text-decoration" href="#samal-day-tour-link">Samal island day tours</a></li>
				</ul>										
			</div>
			<div>
				<p class="center-align mid-grey">If you wish to get in touch with us, please fill out our <a class="lightbox-93333534118" style="cursor:pointer;color:blue;">Contact Form</a> or email us at<br><img src="images/info@eto.png"><br><br>Call us or send us an SMS:<br>+63 922 867 4779<br><br>Office hours:<br>Monday - Friday<br>9:00 am - 5:00 pm</p>
			</div>	
		</div>

		<div class="main-content float-left nine-em">
			<div>
				<h2 id="davao-city-samal-tour-link" class="index-headers">Davao City and Samal Island Tour Packages</h2>
				<?php echo Product::getProductsByCat('DST'); ?>
			</div>
			<div>
				<h2 id="davao-city-samal-escapdes-link" class="index-headers">Davao City and Samal Island Escapades</h2>
				<?php echo Product::getProductsByCat('DVET'); ?>
			</div>
			<div>
				<h2 id="davao-city-samal-getaway-link" class="index-headers">Davao City and Samal Island Getaways</h2>
				<?php echo Product::getProductsByCat('DVGT'); ?>
			</div>
			<div>
				<h2 id="davao-day-tour-link" class="index-headers">Davao City One Day Tours</h2>
				<?php echo Product::getProductsByCat('DDT'); ?>
			</div>
			<div>
				<h2 id="samal-day-tour-link" class="index-headers">Samal Island Day Tours</h2>
				<?php echo Product::getProductsByCat('SDT'); ?>
			</div>							
		</div>
		<div>
			<div class="float-left"><a href="davaotours.php"><img id="davaobanner" src="/images/banner/davao-tour-banner.jpg"></a></div>	
		</div>
		<div class="spacer"></div>
</div>

<script src="scripts/myscript.js"></script>
<script src="scripts/jquery-ui-1.10.3.custom.min.js"></script>
<script src="scripts/magnific-popup/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css"> 
<link rel="stylesheet" href="scripts/magnific-popup/magnific-popup.css">  	
<script>
$( "#intended-tour-date" ).datepicker({ minDate: "+3d", maxDate:"12/31/2014"}); 
// setter
$( "#intended-tour-date" ).datepicker( "option", "minDate", "+3d");
</script>
<script src="http://cdn.jotfor.ms/static/feedback2.js?3.2.616" type="text/javascript">
new JotformFeedback({
formId:'93333534118',
base:'http://www.jotform.com/',
windowTitle:'Contact us',
background:'#0096FF',
fontColor:'#FFFFFF',
type:false,
height:500,
width:700
});
</script>
</body>