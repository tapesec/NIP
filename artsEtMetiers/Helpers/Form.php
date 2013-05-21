<?php

class Form{

	static public $id_value;

	/**
	*@param $url, $type, $class l'url de la cible du formulaire, la méthode d'envoie du formulaire, éventuellement la classe css
	*@return une balise ouvrante form configuré
	**/
	public function create($url, $param = array()){
		$type = (isset($param['type']))? $param['type'] : 'text';
		$class = (isset($param['class']))? $param['class'] : '';
		$name = (isset($param['name']))? $param['name'] :'';
		$value= (isset($param['value']))? $param['value'] : ''; 
		
		$tokken = rand(1, 20) * 3333;
		$tn = explode('/', $url);
		$tokken_name = $tn[1];
		$_SESSION[$tokken_name] = $tokken;
		echo'<form action="'.BASE_URL.'/'.$url.'" method="'.$type.'" class="'.$class.'">';
		echo '<input type="hidden" name="'.$tokken_name.'" value="'.$tokken.'">';
		if(isset($name) && isset($value)){
			echo '<input type="hidden" name="'.$name.'" value="'.$value.'">';
		}
		
	}

	/**
	*@param $name, $type, $label, $class, $message les diférents paramètres necessaire à la définition d'un couple label input dans un formulaire
	*@return un champ de formulaire
	**/
	public function input($param = array()){
		$name = (isset($param['name']))? $param['name'] : '';
		$type = (isset($param['type']))? $param['type'] : '';
		$label = (isset($param['label']))? $param['label'] : '';
		$value= (isset($param['value']))? $param['value'] : '';
		$list = (isset($param['list']))? $param['list'] : '';
		$class = (isset($param['class']))? $param['class'] : '';
		$message = (isset($pram['message']))? $param['message'] : '';
		if(is_array($list)){
			if(is_array(current($list))){
				debug(current($list));
			}
		}
		
		if($type !== 'checkbox'){
			echo '<label>'.$label.'</label>'.PHP_EOL;
		}
		if($type == 'textarea'){
			echo '<textarea name="'.$name.'" class="'.$class.'">'.$value.'</textarea>';
				
		}elseif($type == 'select'){
			echo '<select name="'.$name.'" class="'.$class.'">';

			foreach ($list as $k => $array) {
				$this->parse($k, $array, $value);
			}
			

			echo '</select>';

		}elseif($type == 'checkbox'){
			$checked = ($value == 1)? 'checked' : '';
			echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" class="'.$class.'" '.$checked.'>'.$label;	
		}else{
			echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" class="'.$class.'">';	
		}if($message){
			echo (isset($_SESSION[$name]))? $_SESSION[$name] : '';
		}
		
	}

	/**
	*@param $type, $class le type d'input submit par exemple, la class pour le css
	*@return un input de type submit et une balise fermante form
	**/
	public function end($param = array()){
		$type = (isset($param['type']))? $param['type'] : '';
		$value= (isset($param['value']))? $param['value'] : '';
		$class = (isset($param['class']))? $param['class'] : '';
		
		echo '<input type="'.$type.'" value="'.$value.'" class="'.$class.'">';
		echo '</form>';
	}


	/**
	*@param
	*@return fonction récursive pour afficher des données dans un menu déroulant
	**/
	public function parse($k, $array, $value){
		if(is_array($array)){
			foreach ($array as $k => $v) {
				$this->parse($k, $v, $value);
			}		
		}
		else{
			if(preg_match('/id/', $k)){
				self::$id_value = $array;//echo '<option value="'.$array.'">qzdqzdqz</option>';
			}elseif(preg_match('/name|title|content/i', $k)){
				if(self::$id_value == $value){
					echo '<option value="'.self::$id_value.'" selected >'.$array.'</option>';	
				}else{
					echo '<option value="'.self::$id_value.'" >'.$array.'</option>';
				}
			
			}elseif(is_int($k)){
				echo '<option value="'.$k.'" selected>'.$array.'</option>';
			}else{
				if($array == $value){
					echo '<option value="'.$array.'" selected>'.$array.'</option>';
				}else{
					echo '<option value="'.$array.'">'.$array.'</option>';	
				}
				
			}
										
		}
	}

	
}