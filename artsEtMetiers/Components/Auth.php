<?php 
class Auth{

	static $session = array();



	public function load($user = array()){
		debug(current($user));
		//echo 'auth !';

		foreach(current($user) as $k => $v){
			$_SESSION['auth'][$k] = $v;
			$value = $_SESSION['auth'][$k];
			//echo $k.'<br>';

			$array[$k] = $value;
		}
		self::$session = $array;
	}

	public function test(){
		echo $_SESSION['auth'][0]['use_login'];
	}
}
?>