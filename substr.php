<?php 
function substr_custom(String $str, Int $offset, Int $len = null){
	$length = strlen($str);
	$arr = [];
	
	for($i = 0; $i<$length; $i++){
		$arr[] = $str[$i];
	}
	
	if($len == NULL){
		$len = $length;
	}
	
	if($offset >= 0 && $len >= 0){
	
		for($j = $offset; $j < $len; $j++){
			echo $arr[$j];
		}
		
	}
	
	if($offset < 0){
		
		$offset = abs($offset);
		$len = abs($len);
		
		if($len == $length){
			$len = 0;
		}
		
		for($o = $length - $offset; $o < $length - $len ; $o++){
			 
			echo $arr[$o];
			//echo $o . "<br/>";
			 
		}
	}
	
	if($offset >= 0 && $len < 0 && $offset > $len){
		
		$len = abs($len);
		for($p = $offset; $p < $length - $len; $p++){
			echo $arr[$p];
		}
		
	}
	
	
	
}

substr_custom("Hello world", -5, -2);