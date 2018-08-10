<?php 
$header ="<header>";
$header .="<div class=\"logo\"></div>";
$header .="	<span id=\"mobi-search\"></span>";
$header .="	<span id=\"mobi-menu\"></span>";
$header .="</header>";
$header .=" <nav class=\"rounded-corners\">";
$header .="	<ul class=\"no-pad no-margin\">";
$header .="		<li class=\"menu-nav\"><a class=\"no-text-decoration rounded-corners\" href=\"index.php\">Home</a></li>";
$header .="		<li class=\"menu-nav\"><a class=\"no-text-decoration rounded-corners\" href=\"davaotours.php\">Davao City Tours</a></li>";
$header .="		<li class=\"menu-nav\"><a class=\"no-text-decoration rounded-corners\" href=\"#\">Educational Tours</a></li>";
$header .="		<li class=\"menu-nav\"><a class=\"no-text-decoration rounded-corners\" href=\"#\">About Davao</a></li>";
$header .="		<li class=\"menu-nav\"><a class=\"no-text-decoration rounded-corners\" href=\"#\">Contact us</a></li>";
$header .="	</ul>";
$header .="</nav>";
$header .="<div id=\"search-container\">";
$header .="<form class=\"pure-form\">";
$header .="<input type=\"search\" id=\"search\" name=\"search\" placeholder=\"What are you looking for?\" size=\"40\">";
$header .="</form></div>";
return $header;
?>