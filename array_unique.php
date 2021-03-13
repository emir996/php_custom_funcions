<?php 

function arr_unique(Array $arr){
	$results = [];
	
	foreach($arr as $element){
		//set values of array to key and prevent duplicate
		$results[$element] = $element;
		
	}
	//empty passed array and fill with unique keys and values
	$arr = [];
	$counter = -1;
	
	//fill passed array with unique keys and values
	foreach($results as $resultKey => $resultValue){
		$counter += 1;
		$arr[$counter] = $resultKey;
	}
	
	return $arr;
		
}

print_r(arr_unique([1,2,3,4,5,3,4,5,2,1]));