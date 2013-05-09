<?php
class Session{
	
	

	/**
	*@return ouvre une session
	**/
	public  function __construct(){
		session_start(); 
		
	}


	/**
	*@param $attr , $value le nom de la variable de session et sa valeur
	*@return crée une variable de session
	**/
	public function set($attr, $value){
		$_SESSION[$attr] = $value;
	}


	/**
	*@param $message le message flash a afficher
	**/
	public function setFlash($message){
		$this->set('flash', $message);
	}

	/**
	*@return $_SESSION['flash'], le message flash dans la vue
	**/
	public function flash(){
		if(!empty($_SESSION['flash'])){
			echo $_SESSION['flash'];
		}
		$_SESSION['flash'] ='';		
	}

}