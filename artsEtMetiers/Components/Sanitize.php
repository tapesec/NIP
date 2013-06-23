<?php
class Sanitize{

	//static $magic_quotes = true;
	
	
	/**
	*@param les donn�es � nettoyer de toute tentative de hack
	*@return les donn�es netoy�es
	**/
	static function clean($data){
		$data = (is_array($data))? array_map('Sanitize::clean', $data) : htmlspecialchars($data);
		return $data;
	}
	
		
	/**
	*@param les donn�es � traiter contre les antislash avant affichage
	*@return les donn�es trait�es
	**/
	static function show($value){
		$value = (is_array($value)) ? array_map('Sanitize::show', $value) : stripslashes($value);
	    return $value;
	}



}