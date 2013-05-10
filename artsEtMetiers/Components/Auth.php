<?php 
class Auth{

	static $session;



	public function load($user = array()){
		debug(current($user));
		//echo 'load !';

		foreach(current($user) as $k => $v){
			$_SESSION['auth'][$k] = $v;
		}
	}


	static public function start($sessionauth){
		echo 'start';
		$array = array();
		foreach($sessionauth as $k => $v){
			$array[$k] = $v;
		}	
		self::$session = $array;

		//debug(self::$session);
	}
	
}
?>