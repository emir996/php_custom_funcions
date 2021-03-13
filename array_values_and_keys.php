<?php


function arr_keys($arr){
	
	$counter = -1;
	foreach($arr as $arrKey => $arrVal){
		$counter += 1;
		unset($arr[$arrKey]);
		$arr[$counter] = $arrKey;
	}
	
	return $arr;
}

arr_keys(["bmw"=>"x6","audi"=>"a7","mercedes"=>"s class"]);

function arr_values($arr){
	$counter = -1;
	
	foreach($arr as $arrKey => $arrVal){
		$counter += 1;
		unset($arr[$arrKey]);
		$arr[$counter] = $arrVal;
	}
	
	return $arr;
}

arr_values(["bmw"=>"x6","audi"=>"a7","mercedes"=>"s class"]);