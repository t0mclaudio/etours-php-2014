<?php
include('Product.inc.php');
class Tour extends Product { 
	public $tourSummary;
	public $itinerary;
	public $inclusions;
	public $exclusions;
	public $notes;
	
	static function displaySummary($id){// this functions returns an array
		$obj = Document::getJsonFile($id);
		//$arr = [];
		foreach($obj[summary] as $value){
			$arr[] = $value;
		}
		return $arr;
	}

	static function displayItinerary($id){
		$obj = Document::getJsonFile($id);
		$size = count($obj[itinerary]);

			for ($i = 0; $i<$size; $i++){
				if ((preg_match("#^DST#i", $id)) || (preg_match("#^DVGT#i", $id)) || (preg_match("#^DVET#i", $id)) ){
					echo "<strong>Day ".($i+1)."</strong>";
				}
				echo "<ul class=\"capitalize no-list-style\">";
				foreach($obj[itinerary][$i] as $value){
					if(is_array($value)){		
						foreach($value as $key=>$val){			
							echo "<li><strong>".$key."</strong>";
							if(is_array($val)){
								echo "<ul class=\"doubleArrow\">";
								foreach($val as $value){			
									echo "<li class=\"no-list-style\">".$value."</li>";
								}
								echo"</ul></li>";	
							}
						}
					} else {
						echo "<li><strong>".$value."</strong></li>";
					}
				}
			echo "</ul>";
			}		
	}

	static function displayInclusions($id){
		$obj = Document::getJsonFile($id);
		//$arr = [];
		foreach($obj[inclusions] as $value){
			$arr[] = $value;
		}
		return $arr;
	}
	static function displayExclusions($id){
		$obj = Document::getJsonFile($id);
		//$arr = [];
		foreach($obj[exclusions] as $value){
			$arr[] = $value;
		}
		return $arr;
	}
	static function displayNotes($id){
		$obj = Document::getJsonFile($id);
		//$arr = [];
		foreach($obj[notes] as $value){
			$arr[] = $value;
		}
		return $arr;
	}
	static function displayConditions($id){
		$obj = Document::getJsonFile($id);
		//$arr = [];
		foreach($obj[conditions] as $value){
			$arr[] = $value;
		}
		return $arr;
	}	
	static function countPrice($id){
		$obj = Document::getJsonFile($id);
		$count = count($obj[price]);
		return $count;
	}
	static function displayPrice($id){// this functions returns an array
		$product = Document::getJsonFile($id);
		$accommodation = Document::getJsonFile("accommodation");
		$price = $product[price];
		$nights = $product[nights];

		$count = count($accommodation);
		$count2 = count($price);

		for ($i=0;$count>$i; $i++){
			$accomprice[$i+1][code] = $accommodation[$i][code];
			$accomprice[$i+1][hotelname] = $accommodation[$i][name];
			$accomprice[$i+1][price] = $accommodation[$i][price];
		}
	 	$table = '<table id="pricetable"class="mid-grey" border=1>';
		$table .= "<tr>";
		$table .=	'<td rowspan=2>No of persons</td>';
		$table .=	"<td rowspan=2>Tour Only</td>";
		$table .=	"<th colspan=8>3 DAYS TOUR PACKAGE WITH 2 NIGHTS ACCOMMODATION</th>";
		$table .="</tr>";
		$table .="<tr>";
		for($i=1;$count>$i;$i++){
			$table .= "<td>".$accomprice[$i][hotelname]."</td>";
		}	
		$table .= "</tr>";
			for($i=0;$count2>$i;$i++){
				$key = key($price[$i]);
				$val = $price[$i][$key];
				$table .= "<tr><td>".$key."</td><td>".htmlspecialchars_decode('&#8369;').number_format($val)."</td>";
				for($j=1;$count>$j;$j++){
					$total = $val+($accomprice[$j][price]*$nights);
					$table .= "<td>".htmlspecialchars_decode('&#8369;').number_format($total)."</td>";
				}
				$table .= "</tr>";	
			}
		$table .='<tr id="table_footer">';
		$table .="<td colspan=10><li>For dormitory accommodation: 3 to 4 persons in a room (bunk beds)</li> <li>Separate dorm for boys and separate dorm for girls </li> <li>Common TV area</li><li>Towels for rent at P30.00 each</li> <li>Common CR and shower room (20 cubicles toilet and 24 cubicle shower for girls / 28 cubicles shower and 20 cubicles toilet for boys)</li><li>WIFI hotspot</li><li>Daily breakfast</li>
		<li>50 persons above, please send us an email</li></td></tr>";										
		$table .= "</table>";
		return $table;
	}

}

?>