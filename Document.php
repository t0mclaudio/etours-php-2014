<?php
class Document {
	static function isFileExist($id,$fileDIR="./json/"){
		$dir = $fileDIR;
		$file = scandir($dir);
		foreach($file as $value){					
			if ($value == strtoupper($id).".json"){
				return true;			
				break;
			} 		
		} 
	}

	static function isFileTypeExist($id,$fileDIR="./json/"){
		$dir = $fileDIR;
		$file = scandir($dir);
		foreach($file as $value){					
			if (preg_match('#^'.$id.'#i',$value)){
				return true;			
				break;
			} 		
		} 
	}

	static function getJsonFile($id,$fileDIR="./json/"){
		$dir = $fileDIR;		
		$filename = $dir.$id.'.json';
		$file = file_get_contents($filename);	
		return $obj = json_decode($file,true);
	}
}
?>