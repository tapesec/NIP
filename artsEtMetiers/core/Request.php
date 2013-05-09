<?php

Class Request{

	public $url; // l'url tapé par l'internaute dans son navigateur
	public $data = array(); // les données issues de requêtes GET ou POST


	public function __construct(){
		$this->url = (isset($_SERVER['PATH_INFO']))? $_SERVER['PATH_INFO'] : '';
		$data = (isset($_GET))? $_GET : '';
		$data = (isset($_POST))? $_POST : '';
		$this->data = $data;
	}

	
	/**
	*@param $POST, GET ou PUT
	*@return true ou false en fonction du paramètre donné à la fonction
	**/
	public function is($type){
		return (array_key_exists('REQUEST_METHOD', $_SERVER) && strtolower($_SERVER['REQUEST_METHOD']) == strtolower($type))? true : false;
	}

	/**
	*@return true si requete ajax ou false le cas contraire
	**/
	public function isAjax(){
		return (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )? true : false;
	}

	
}

