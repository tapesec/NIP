<?php

function debug($var, $dump=false){
	if($dump){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}else{
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}