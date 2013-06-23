<?php

function debug($var, $dump=false){
	
	/*
	if($dump){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}else{
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}*/
}


function write($var){
	if(Config::$debug_level == 1){
		echo $var;
	}
	else{
		echo '';
	}
}


