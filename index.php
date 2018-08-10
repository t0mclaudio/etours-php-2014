<?php
include_once('Tour.inc.php');
include('header.php');
include('Mobile_Detect.php');
$code = $_REQUEST['code'];
$dir = $_REQUEST['dir'];
?>
<html>
<head>
	<title>Davao City Package Tours - Experience the Best of Davao City</title>
	<meta name="google-site-verification" content="e_BYFcRW9IK3iLTGdc7oV4YbGq1A0zJ-fMXsdTzdsd8" />
	<meta name="description" content="ETOURS DAVAO offers the best tour packages of Davao City. Our package tours lets you see the best tourist attractions of Davao City, we have activities for family vacations, adventure and thrill seekers, and educational tour packages.">
	<meta name="keywords" content="davao city, davao city tours, tours in davao city, davao city package tours, davao hotel, davao city tourist spots, philippine tourist spots, davao hotels, davao package tour, tour in davao city, davao city hotels, davao city tourist spots, davao city tourism, davao city tourist attractions, davao city tourist destination, davao city tourism office, davao city tourist spot philippines, davao city tour guide, davao city tour itinerary, pearl farm, abreeza mall davao, pinnacle hotel davao, zest air, cebu pacific, affordable hotels in davao, recommended hotels in davao, budget hotels in davao, cheap hotels in davao, getting around davao city, places to go in davao city, davao restaurants, davao accommodations, recommended restaurants in davao city, tours in davao, philippine tour package, samal beach, samal resorts, samal island, samal island hopping, durian, philippine eagle, pec, pef, eden nature park, river rafting, educational tour, philippines, philippine travel, davao travel, philippine destinations, kublai, davao hotels, davao car rental, davao tourism, things to do in davao, davao zipline, davao rafting, camp sabros, crocodile park, marco polo hotel, pearl farm beach resort, samal, igacos, island hopping, talikud island, kadayawan festival, tourist spots in davao, malagos garden resort, davao package tour, davao day tour">	
	<script src="scripts/jquery-2.0.3.min.js"></script>
	<link rel="stylesheet" href="css/pure.css">
	<link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
	<?php 
		/*$detect = new Mobile_Detect;
		if ($detect->isMobile()){

		} elseif($detect->isTablet()) {

		} else {*/
			echo "<link id=\"stylesheet\" rel=\"stylesheet\" href=\"css/index.css\"\/>";			
		//}		
	?>
	<?php
	date_default_timezone_set('Asia/Manila');
	$date = getdate();
	//echo $date['year']."-".$date['yday']."-".$date['hours'].":".$date['minutes'];
	?>
	<script src="scripts/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="scripts/jquery.slides.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css">
	<?php include_once("analyticstracking.php") ?>
</head>

<body>
	<div id="wrapper" class="center">
	<?php echo $header ?>
	<div id="left">
		<div id="special">
			<?php $package = Product::getProductHeader('DST-01'); 
			echo '<div id="premium1" data-package="'.$package[code].'">'			
			?>	
				<h3 class="h2-title">Featured Davao tour package</h3>			
				<div id="slides">
					<?php
						$arr = Product::getProductSlideshow('DST-01');
						foreach($arr as $value){
							echo '<img src="images/slideshow/DST-01/'.$value.'">';
						}
					?>
					<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="fa fa-chevron-circle-left fa-2x"></i></a>
					<a href="#" class="slidesjs-next slidesjs-navigation"><i class="fa fa-chevron-circle-right fa-2x"></i></a>
				</div>					
				<div id="premium-package-name">
					<?php

						echo '<h2><a class="left-link no-text-decoration" href="tour.php?code='.$package[code].'">'.$package[name].'</a></h2>';
					?>
					
				</div>	
			</div>
			<div id="second">
				<?php
				$package2 = Product::getProductHeader('DST-02');
				echo '<div id="premium2" data-package="'.$package2[code].'">'				
				?>
					<h2 class="h2-title">Special tour package</h2>
					<?php
						$arr = Product::getProductSlideshow('DST-02');
						foreach($arr as $value){
							echo '<img src="images/tours/280x170/'.$value.'">';
						}
						
						echo '<h2><a class="left-link no-text-decoration" href="tour.php?code='.$package2[code].'">'.$package2[name].'</a></h2>';
					?>
				</div>
				<?php
				$package3 = Product::getProductHeader('DVET-02');
				echo '<div id="premium3" data-package="'.$package3[code].'">'				
				?>
					<h2 class="h2-title">Standard tour package</h2>
					<?php
						$arr = Product::getProductSlideshow('DVET-02');
						foreach($arr as $value){
							echo '<img src="images/tours/280x170/'.$value.'">';
						}
						$package = Product::getProductHeader('DVET-02');
						echo '<h2><a class="left-link no-text-decoration" href="tour.php?code='.$package3[code].'">'.$package3[name].'</a></h2>';
					?>
				</div>
				<div class="spacer"></div>
			</div>
			<div class="spacer"></div>
			<div id="third">
				<h2 class="h2-title">Davao city and Samal island one(1) day tours</h2>
				<?php
					$daytour1 = Product::getProductIndex('DDT-01');
					$daytour2 = Product::getProductIndex('DDT-02');
					$daytour3 = Product::getProductIndex('SDT-02');
					echo '<div>';
					echo '<h3 class="daytours" data-package="'.$daytour1[code].'" style="background-image: url(images/tours/280x170/'.$daytour1[thumbnail].'); background-size:182px 132px"><a class="left-link no-text-decoration" href="tour.php?code='.$daytour1[code].'">'.$daytour1[name].'</a></h3>';
					echo '<h3 class="daytours" data-package="'.$daytour2[code].'" style="background-image: url(images/tours/280x170/'.$daytour2[thumbnail].'); background-size:182px 132px"><a class="left-link no-text-decoration" href="tour.php?code='.$daytour2[code].'">'.$daytour2[name].'</a></h3>';
					echo '<h3 class="daytours" data-package="'.$daytour3[code].'" style="background-image: url(images/tours/280x170/'.$daytour3[thumbnail].'); background-size:182px 132px"><a class="left-link no-text-decoration" href="tour.php?code='.$daytour3[code].'">'.$daytour3[name].'</a></h3>';  
					echo '</div>';
				?>
				<div class="spacer"></div>
			</div>
		</div>	
	</div>
	<div id="right">
		<div id="premium4">
			<h3 class="h2-title">Featured Samal tour package</h3>
			<a href="tour.php?code=SDT-01"><img data-package="SDT-01" src="images/tours/samal-island-hopping.jpg"></a>
			<span class="small-grey">Conditions apply</span>
		</div>
		<div id="right2">
			<?php echo Product::getProductsByCat('DVET'); ?>
		</div>
	</div>
	<div class="spacer"></div>
	<div id="footer">
		<p class="small-grey no-margin">Quick links</hp>
		<div class="footercol">
			<h2 class="h2-title">Davao and Samal tour packages</h2>
			<?php echo Product::getProductsListByCat('DST'); ?>
			<h2 class="h2-title">Davao and Samal getaway</h2>
			<?php echo Product::getProductsListByCat('DVGT'); ?>
		</div>	
		<div class="footercol">
			<h2 class="h2-title">Davao and Samal Escapades</h2>
			<?php echo Product::getProductsListByCat('DVET'); ?>
		</div>
		<div class="footercol">
			<h2 class="h2-title">Davao city day tours</h2>
			<?php echo Product::getProductsListByCat('DDT'); ?>
			<h2 class="h2-title">Samal day tours</h2>
			<?php echo Product::getProductsListByCat('SDT'); ?>
		</div>
		<div class="spacer"></div>
	</div>
</div>

<script src="scripts/myscript.js"></script>
	
<script>
$(function(){
  $("#slides").slidesjs({
    width: 574,
    height: 366,
	pagination: false,
	navigation: {
		active:false,
		effect: "slide"
	},	
	play: {
		auto: true,
		interval: 3000,
		pauseOnHover: true
	}
  });
});

$('#premium1,#premium2,#premium3,.daytours, #premium4 img').click(function(event){
	var clicked = $(this).data('package');
	link = 'tour.php?code='+clicked;
	window.location = link;
});
</script>
</body>