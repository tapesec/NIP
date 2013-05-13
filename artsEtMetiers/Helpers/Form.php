<?php

class Form{

	
	/**
	*@param $url, $type, $class l'url de la cible du formulaire, la méthode d'envoie du formulaire, éventuellement la classe css
	*@return une balise ouvrante form configuré
	**/
	public function create($url, $type, $key=null, $id=null, $class=null){
		$tokken = rand(1, 20) * 3333;
		$name = explode('/', $url);
		$tokken_name = $name[1];
		$_SESSION[$tokken_name] = $tokken;
		echo'<form action="'.BASE_URL.'/'.$url.'" method="'.$type.'" class="'.$class.'">';
		echo '<input type="hidden" name="'.$tokken_name.'" value="'.$tokken.'">';
		echo '<input type="hidden" name="'.$key.'" value="'.$id.'">';
	}

	/**
	*@param $name, $type, $label, $class, $message les diférents paramètres necessaire à la définition d'un couple label input dans un formulaire
	*@return un champ de formulaire
	**/
	public function input($name, $type, $label=null, $value=null, $class=null, $message=null){
		echo '<label>'.$label.'</label>'.PHP_EOL;
		echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" class="'.$class.'">';
		if($message){
			echo (isset($_SESSION[$name]))? $_SESSION[$name] : '';
		}
	}

	/**
	*@param $type, $class le type d'input submit par exemple, la class pour le css
	*@return un input de type submit et une balise fermante form
	**/
	public function end($type, $value, $class=null){
		echo '<input type="'.$type.'" value="'.$value.'" class="'.$class.'">';
		echo '</form>';
	}

	
}