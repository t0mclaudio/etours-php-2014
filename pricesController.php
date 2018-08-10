<?php
require('Document.php');
$id = $_REQUEST['code'];
$tour = Document::getJsonFile($id);
$accommodation = Document::getJsonFile("accommodation");
$obj = $tour[price];
$count = count($obj);
$hotelCount = count($accommodation);
$nights = $tour['nights'];
$output = '<h1>'.$id.'</h1>';
$output .= '<table border=1 style="border-collapse:collapse">';
$output .='<tr>';
$output .='<th></th>';
$output .='<th>Tour Only</th>';
if((preg_match('#^'.DST.'#i',$id))||(preg_match('#^'.DVGT.'#i',$id))||(preg_match('#^'.DVET.'#i',$id))){
for ($x=0;$x<$hotelCount;$x++){
	$hotelName = $accommodation[$x]['code'];
	$output .= '<th>'.$hotelName.'</th>';
}}
$output .='</tr>';
for ($i=2;$i<$count;$i++){
	$tourOnlyPrice = $obj[$i][0];	
	$output .='<tr>';
	$output .='<td>'.($i).' pax</td>';
	$output .='<td>'.number_format($tourOnlyPrice).'</td>';
	if((preg_match('#^'.DST.'#i',$id))||(preg_match('#^'.DVGT.'#i',$id))||(preg_match('#^'.DVET.'#i',$id))){
	for ($h=0;$h<$hotelCount;$h++){
		$hotelPrice = $accommodation[$h]['price'];
		$tourPlusHotel = $tourOnlyPrice+($hotelPrice*$nights);
		$output .='<td>'.number_format($tourPlusHotel).'</td>';
	}}
	$output .='</tr>';

}
	$output .='</table>';
	echo $output;
?>