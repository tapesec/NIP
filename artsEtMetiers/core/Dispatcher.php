<?php

class Dispatcher{

	/**
	*@var instance de la class Request
	**/
	public $request;
	private $error_event = false;

	public function __construct(){
		$this->request = new Request();
		Router::parse($this->request->url, $this->request);
		echo 'dispatcher';
		
		$controller = $this->loadController();
		Auth::start($_SESSION['auth']);
		if(!method_exists(get_class($controller), $this->request->action)){
			if($this->error_event){
				$this->error('Le controlleur '.$this->request->controller. ', n\'a pas de méthode '.$this->request->action);
			}	
		}else{
			call_user_func_array(array($controller, $this->request->action), $this->request->param);
			$controller->render($this->request->action);		
		}
		//if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
			
		//}
	}
	/**
	*@return instance du controlleur appelé par l'utilisateur dans l'url sous le format 
	*wwww.nomdedomaine.com/controlleur/action/parametres exemple : ppol.dopc.mi/reportage/voir/1 ou,
	*en cas d'erreur d'url, la fonction error.
	**/
	public function loadController(){
		if(!empty($this->request->controller)){
			$name = ucfirst($this->request->controller).'Controller';
			$file = ROOT.DS.'Controllers'.DS.$name.'.php';
			if(!file_exists($file)){
				return $this->error('Le controlleur '.$this->request->controller.' n\'existe pas.');
				$this->error_event = true;
			}else{
				require $file;
				$this->error_event = true;

				$controller = new $name($this->request);
				$controller->session = new Session();
				return $controller;
			}
		}else{
			$this->request->controller = 'demo';
			require ROOT.DS.'Controllers'.DS.'DemoController.php';
			return new DemoController($this->request);
		}	
	}
	/**
	*@return une vue error 404 avec le message personnalisé à l'erreur
	**/
	public function error($message){
		$controller = new Controller($this->request);
		$controller->e404($message);
	}

}