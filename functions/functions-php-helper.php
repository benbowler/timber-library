<?php
/*
 * THIS FILE IS DEPRECATED AND WILL BE REMOVED AT SOME POINT */

	class PHPHelper {

		function is_array_assoc($arr){
			if (!is_array($arr)){
				return false;
			}
    		return (bool)count(array_filter(array_keys($arr), 'is_string'));
		}

		function is_true($property){
			if (isset($property)){
				if ($property == 'true' || $property == 1 || $property == '1' || $property == true){
					return true;
				}
			}
			return false;
		}

		function array_truncate($array, $len){
			if (sizeof($array) > $len) { 
   				$array = array_splice($array, 0, $len); 
 			}
 			return $array;
		}

		function array_to_object($array) {
			$obj = new stdClass;
			foreach($array as $k => $v) {
				if(is_array($v)) {
					$obj->{$k} = array_to_object($v); //RECURSION
				} else {
					$obj->{$k} = $v;
				}
			}
		  	return $obj;
		} 

		function get_object_index_by_property($array, $key, $value){
			if (is_array($array)){
				$i = 0;
				foreach($array as $arr){
					if ($arr->$key == $value || $arr[$key] == $value){
						return $i;
					}
					$i++;
				}
			}
			return false;
		}

		function get_object_by_property($array, $key, $value){
			if (is_array($array)){
				foreach($array as $arr){
					if ($arr->$key == $value){
						return $arr;
					}
				}
			} else {
				echo $array;
				echo 'not an array'.$key.' = '.$value;
			}
		}

		function iseven($i){
			return ($i % 2) == 0;
		}

		function isodd($i){
			return ($i % 2) != 0;
		}

	}
?>