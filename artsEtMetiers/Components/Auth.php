<?php 
class Auth{

	static $session; //array faisant référence à toutes les variables de session d'un utilisateur connecté


	/**
	*@param $user les informations issues d'une base de données d'un utilisateurs venant de se connecté
	*@return crée et hydrate la super variable de sessions 'auth' de chaques attributs de l'utilisateur connecté
	**/
	public function load($user = array()){
		debug(current($user));
		//echo 'load !';

		foreach(current($user) as $k => $v){
			$_SESSION['auth'][$k] = $v;
		}
	}


	/**
	*@param $sessionauth la super variable de session 'auth'
	*@return hydrate le tableau static $session avec la session auth 
	**/
	static public function start($sessionauth){
		//echo 'start';
		$array = array();
		foreach($sessionauth as $k => $v){
			$array[$k] = $v;
		}	
		self::$session = $array;
	}

	/**
	*@return detruit la variable de session auth
	**/
	static public function destroy(){
		unset($_SESSION['auth']);
		
	}
	
}