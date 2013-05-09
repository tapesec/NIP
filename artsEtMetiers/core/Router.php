<?php
class Router{

	/**
	*@param $url Url à parser
	*@return tableau contenant les paramètres
	**/
	static function parse($url, $request){
		$url = trim($url,'/');
		$k = explode('/', $url);
			
		$request->controller = (isset($k[0]))? $k[0] : 'demo';
		$request->action = (isset($k[1]))? $k[1] : 'index';
		$request->param = array_slice($k, 2);
		return true;
		
	}


}