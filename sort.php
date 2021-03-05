<?php 

include 'implode.php';

$numbers = [45, 23, 83, 12, 5, 60, 33];

function arr_sort(Array $arr, String $order = null){
	
	switch(strtoupper($order)){
		case "L":
		  $sign = '>';
		 break;
		case "H":
		  $sign = '<';
		 break;
		default:
		  $sign = '>';
	}

	$comparisons = 0;
	for($i = 0; $i < count($arr); $i++){
		
		for($j = 0; $j < count($arr) - 1; $j++){
			
			if($sign == ">" || $order == null){
			 
				if($arr[$j] > $arr[$j + 1]){
					$tmp = $arr[$j + 1];
					$arr[$j + 1] = $arr[$j];
					$arr[$j] = $tmp;
				}
				
			}
			
			if($sign == "<"){
				if($arr[$j] < $arr[$j + 1]){
					$tmp = $arr[$j + 1];
					$arr[$j + 1] = $arr[$j];
					$arr[$j] = $tmp;
				}
			}
			
		}
	}
	implode_custom(",", $arr);
}

arr_sort($numbers, "H");