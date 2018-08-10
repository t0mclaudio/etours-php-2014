<?php
require('Document.php');
class Product {

	public $productCode;
	public $productName;
	public $productDuration;
	public $productDescription;
	public $price;
	public static $fileDIR= "./json/";
		
	static function getProductsByCat($id=""){
		$dir = self::$fileDIR;
		$directory = opendir($dir);		
		if(Document::isFileTypeExist($id)){
			while (false!==($entry=readdir($directory))){
				if (preg_match('#^'.$id.'#i',$entry)){
					$file = file_get_contents($dir.$entry);
					$obj = json_decode($file,true);
					$text =	'<div data-package="'.$obj[code].'"class="index-package">';
					$text .= '<div><a href="tour.php?code='.$obj[code].'"><img class="index-thumb" src="images/tours/115x71/'.$obj[thumbnail].'"></a></div>';
					$text .= "<h3><a class=\"no-text-decoration index-name\" href=\"tour.php?code=".$obj[code]."\">".$obj[name]."</a></h3>";
					$text .= '<p class="index-desc">'.$obj[metadescription].'</p>';
					$text .= "</div>";					
					echo $text;
				}
			}		
		} else {
			return "File does not exist";
		}
	}
	static function getProductsListByCat($id=""){
		$dir = self::$fileDIR;
		$directory = opendir($dir);		
		if(Document::isFileTypeExist($id)){
			while (false!==($entry=readdir($directory))){
				if (preg_match('#^'.$id.'#i',$entry)){
					$file = file_get_contents($dir.$entry);
					$obj = json_decode($file,true);
					$text = "<h3><a class=\"no-text-decoration index-list\" href=\"tour.php?code=".$obj[code]."\">".$obj[name]."</a></h3>";
					echo $text;
				}
			}		
		} else {
			return "File does not exist";
		}
	}
	
	static function getProductHeader($id=""){
		$obj = Document::getJsonFile($id);
		$header['code'] = $obj[code];
		$header['name'] = $obj[name];
		$header['duration'] = $obj[duration];
		return $header;
	}
	static function getProductIndex($id=""){
		$obj = Document::getJsonFile($id);
		$header['code'] = $obj[code];
		$header['name'] = $obj[name];
		$header['duration'] = $obj[duration];
		$header['description'] = $obj[metadescription];
		$header['thumbnail'] = $obj[thumbnail];	
		return $header;
	}
	static function getMetaTitle($id=""){
		$obj = Document::getJsonFile($id);
		return $code = $obj[title];
	}
	static function getMetaDescription($id=""){
		$obj = Document::getJsonFile($id);
		return $code = $obj[metadescription];
	}
	/*static function getMetaKeywords($id=""){
		$obj = Document::getJsonFile($id);
		return $code = $obj[metaKeywords];
	}*/			
	static function getProductCode($id=""){
		$obj = Document::getJsonFile($id);
		return $code = $obj[code];
	}
	static function getProductName($id=""){
		$obj = Document::getJsonFile($id);
		return $name = $obj[name];
	}
	static function getProductDuration($id=""){
		$obj = Document::getJsonFile($id);
		return $duration = $obj[duration];
	}	
	
	static function getProductThumbnail($id=""){
		$obj = Document::getJsonFile($id);
		return $thumbnail = $obj[thumbnail];
	}
		
	static function getProductSlideshow($id=""){
		$obj = Document::getJsonFile($id);
		//$arr = [];
		foreach($obj[slideshow] as $value){
			$arr[] = $value;
		}
		return $arr;
	}	
}
?>