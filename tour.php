<?php
include_once('Tour.inc.php');
include('header.php');
include('Mobile_Detect.php');
$code = $_REQUEST['code'];
$dir = $_REQUEST['dir'];
$count = Tour::countPrice($code)-1;
?>
<html>
<head>
	<title> <?php echo Tour::getMetaTitle($code) ?></title>
	<meta name="description" content="<?php echo Tour::getMetaDescription($code) ?>">
	<meta name="keywords" content="davao city, davao city tours, tours in davao city, davao city package tours, davao hotel, davao city tourist spots, philippine tourist spots, davao hotels, davao package tour, tour in davao city, davao city hotels, davao city tourist spots, davao city tourism, davao city tourist attractions, davao city tourist destination, davao city tourism office, davao city tourist spot philippines, davao city tour guide, davao city tour itinerary, pearl farm, abreeza mall davao, pinnacle hotel davao, zest air, cebu pacific, affordable hotels in davao, recommended hotels in davao, budget hotels in davao, cheap hotels in davao, getting around davao city, places to go in davao city, davao restaurants, davao accommodations, recommended restaurants in davao city, tours in davao, philippine tour package, samal beach, samal resorts, samal island, samal island hopping, durian, philippine eagle, pec, pef, eden nature park, river rafting, educational tour, philippines, philippine travel, davao travel, philippine destinations, kublai, davao hotels, davao car rental, davao tourism, things to do in davao, davao zipline, davao rafting, camp sabros, crocodile park, marco polo hotel, pearl farm beach resort, samal, igacos, island hopping, talikud island, kadayawan festival, tourist spots in davao, malagos garden resort, davao package tour, davao day tour">	
	<script src="scripts/jquery-2.0.3.min.js"></script>
	<link rel="stylesheet" href="css/pure.css">
	<link rel="stylesheet" href="scripts/magnific-popup/magnific-popup.css">  
	<?php 
		/*$detect = new Mobile_Detect;
		if ($detect->isMobile()){

		} elseif($detect->isTablet()) {

		} else {*/
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
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#tourpackagename">Tour package name</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#duration">Duration</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#summary">Summary</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#itinerary">Itinerary</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#price">Price</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#inclusions">What is included?</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#exclusions">What are not included?</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#notes">Some extra notes</a></li>
					<li class="no-list-style"><a class="left-link no-text-decoration" href="#inquire">Inquire</a></li>
				</ul>										
			</div>
			<div>
				<p class="center-align mid-grey">If you wish to get in touch with us, please fill out our <a class="lightbox-93333534118" style="cursor:pointer;color:blue;">Contact Form</a> or email us at<br><img src="images/info@eto.png"><br><br>Call us or send us an SMS:<br>+63 922 867 4779<br><br>Office hours:<br>Monday - Friday<br>9:00 am - 5:00 pm</p>
			</div>	
		</div>

		<div class="main-content float-left nine-em">
			<h1 class="header">Davao city and Samal Island Tour Package</h1>			
			<h2 class="title"><?php echo Tour::getProductName($code); ?></h2>
			<h2 class="large-grey"><a name="tourpackagename">Product code: <span id="tourcode"><?php echo Tour::getProductCode($code); ?></span></a></h2>	
			<h2><a name="duration">Duration: <span><?php echo Tour::getProductDuration($code); ?></span></a></h2>
			<h2><a name="summary">Summary</a></h2>
			<ul class="checkmark">
				<?php	 	
					$arr = Tour::displaySummary($code);
					foreach($arr as $value){
						echo "<li>".$value."</li>";
					}
				?>
		</ul>
		<h2><a name="itinerary">Itinerary</a></h2>
		<?php Tour::displayItinerary($code); ?>
		<h2><a name="inclusions">What are included?</a></h2>
		<ul class="checkmark">
			<?php	 	
				$arr = Tour::displayInclusions($code);
				foreach($arr as $value){
					echo "<li>".$value."</li>";
				}
			?>
	</ul>
	<!-- PRICE DIV STARTS HERE -->
	<div id="price" class="action-call">
		<form class="pure-form" id="form_price" method="POST" action="getTourPrice.php">
			<fieldset class="no-border no-pad">
				<input type="hidden" name="code" value=<?php echo $code ?>>
				<input class="noSelect" name="adults" id="priceSelectAdults" size=1 min="1">								
				<p class="form-header"for="adults">Please enter number of persons to see prices<br><span id="priceAvailable" class="mid-grey no-margin">Prices available are from 2 persons to <span id="upperlimit"><?php echo $count ?></span> persons</span></p>	 
			
				<!--<p class="form-header">Children</p>						
				<input class="noSelect" name="kids05" id="priceSelectkids05" size=1>
				<label for="kids05"><small>(0-5 yrs old)</small></label><br>				
				<input class="noSelect" name="kids612" id="priceSelectkids612" size=1>
				<label for="kids612"><small>(6-12 yrs old)</small></label>-->
				<input class="submit pure-button pure-button-primary" type="submit" value="View Price">
				<span id="error"></span>								
			</fieldset>
		</form>	
	</div>
	<div class="price-result">
	</div>

<div class="spacer"></div>		
<h2><a name="exclusions">What are not included?</a></h2>
<ul  class="xmark checkmark">
	<?php	 	
		$arr = Tour::displayExclusions($code);
		foreach($arr as $value){
			echo "<li>".$value."</li>";
		}
	?>
</ul>

<h2><a name="conditions">Conditions</a></h2>
<ul>
	<?php	 	
		$arr = Tour::displayConditions($code);
		foreach($arr as $value){
			echo "<li>".$value."</li>";
		}
	?>
</ul>

<h2><a name="notes">Some extra notes</a></h2>
<ul class="doubleArrow">
	<?php	 	
		$arr = Tour::displayNotes($code);
		foreach($arr as $value){
			echo "<li class=\"no-list-style\">".$value."</li>";
		}
	?>
</ul>
<div id="reservation" class="white-popup mfp-hide">	
	<h2><a name="inquire">Reservation Form</a></h2>
			<p class="large-grey">You have selected the following</p>
			<div>
				<div><img id="form-thumbnail"></div>
			</div>	
			<div class="spacer"></div>
			<div class="reserve-adults">
				<p class="reserve-title left-align mid-grey"><?php echo Tour::getMetaTitle($code)  ?></p>
				<p class="reserve-accommodation mid-grey">Accommodation: <span id="form-user-choice"></span><p>
				<p class="reserve-nopersons left-align mid-grey">Number of persons: <span class="showprice no_of_adults"></span></p>			
				<p class="mid-grey"><span class="showprice adultprice"></span><small>/person</small></p>	
			</div>
			<!--<div class="reserve-child1 float-left">
				<p class="left-align mid-grey">Number of Child: <span class="bdr-btm showprice no_of_child05"></span><br><small class="small-grey">(0-5 yrs old)</small></p> 		
				<p class="left-align mid-grey">Price: <span class="bdr-btm showprice kid05price"></span></p>
			</div>
			<div class="reserve-child2 float-left">	
				<p class="left-align mid-grey">Number of Child: <span class="bdr-btm showprice no_of_child612"></span><br><small class="small-grey">(6-12 yrs old)</small></p>	
				<p class="left-align mid-grey">Price: <span class="bdr-btm showprice kid612price"></span></p>		
			</div>-->
	<div class="spacer"></div>				
	<?php include("tour_reservation_form.php") ?>
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
	
<script>
$( "#intended-tour-date-from,#intended-tour-date-to").datepicker({ minDate: "+3d", maxDate:"12/31/2014"}); 
// setter
$("#intended-tour-date-from,#intended-tour-date-to").datepicker( "option", "minDate", "+3d");
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