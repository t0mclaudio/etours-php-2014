<?php
include('Product.inc.php');
$id = $_REQUEST['code'];
$no_of_adults = $_REQUEST['adults'];

$json = Document::getJsonFile($id);
$json2 = Document::getJsonFile("accommodation");
$obj = $json[price][$no_of_adults];
$nights = $json[nights];
//$price = [];

$count = count($json2);
if ((preg_match('#^'.DST.'#i',$id))||(preg_match('#^'.DVGT.'#i',$id))||(preg_match('#^'.DVET.'#i',$id))){
	$match = 1;
} else {
	$match = 0;
}

$price[0][id] = $match; 	
$price[0][adult] = htmlspecialchars_decode('&#8369;').number_format($obj[0]);
$price[0][nights] = $nights;	
for ($i=0;$count>$i; $i++){
	$adult = htmlspecialchars_decode('&#8369;').number_format($obj[0]+($nights*$json2[$i][price]));
	$price[$i+1][code] = $json2[$i][code];
	$price[$i+1][notes] = $json2[$i][notes];
	$price[$i+1][hotelname] = $json2[$i][name];
	$price[$i+1][category] = $json2[$i][category];
	$price[$i+1][roomtype] = $json2[$i][roomtype];
	$price[$i+1][adult] = $adult;
	$price[$i+1][thumbnail] = $json2[$i][thumbnail];
	$price[$i+1][nights] = $nights;	
}		
echo $data = json_encode($price);
?>