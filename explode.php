<?php 



function explode_custom($separator, string $string, $limit = null){
	
	$arr = [];
	$str = "";
	$ignored = "";
	$count = 0;
	
	for($i = 0; $i< strlen($string); $i++){
		
		for($k = 0; $k < strlen($separator); $k++){
			
			for($j = $i; $j < $i + strlen($separator); $j++){
				
				if(isset($string[$j])){
					$ignored .= $string[$j];
				}	
			}
			if($ignored == $separator){  
				
				$arr[$count] = $str;
				$str="";
				$count++;
				$ignored="";
				$i = $i+strlen($separator) - 1;
				
			} else {
				
				$str .= $string[$i];
				$ignored = "";
				if($i==strlen($string)-1){
					$arr[$count] = $str;
				}
				
			}
	
		}

	}
	
	print_r($arr);

 }

$str = "ja sam ja jeremija prezivam se krstic";

explode_custom(" ", $str);
echo "<br/>";

for($i = 0; $i < 20; $i++){
	for($j = 0; $j < 1; $j++){
	
	}
}











