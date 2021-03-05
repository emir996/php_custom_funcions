<?php 


function implode_custom($separator, Array $arr){
	$str = "";
	if(is_array($arr)){
		foreach($arr as $value){
			$str.= $value . $separator;
		}
		echo substr($str, 0, "-" . strlen($separator));
	}
}

// $list = ['1','asdqwe','skola', 4, 'kuca'];
// implode_custom(", ",$list);
