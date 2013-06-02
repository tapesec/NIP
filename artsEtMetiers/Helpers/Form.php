<?php

class Form{

	static public $id_value;
	//static public $tokken_id =1;

	/**
	*@param $url, $type, $class l'url de la cible du formulaire, la méthode d'envoie du formulaire, éventuellement la classe css
	*@return une balise ouvrante form configuré
	**/
	public function create($url, $param = array()){
		$type = (isset($param['type']))? $param['type'] : 'text';
		$class = (isset($param['class']))? $param['class'] : '';
		$name = (isset($param['name']))? $param['name'] :'';
		$value = (isset($param['value']))? $param['value'] : '';
		$size = (isset($param['size']))? $param['size'] : Config::$maxFileSize; 
		$enctype='';
		if($param['type'] == 'FILE'){
			$type ='POST';
			$enctype = 'enctype="multipart/form-data"';
		}
		
		$tokken = rand(1, 20) * 3333;
		$tk = $tokken;
		$tn = explode('/', $url);
		$tokken_name = $tn[1];

		$_SESSION[$tokken_name] = $tk;
		
		echo '<form action="'.BASE_URL.'/'.$url.'" method="'.$type.'" class="'.$class.'" '.$enctype.'>'.PHP_EOL;
		echo '<input type="hidden" name="'.$tokken_name.'" value="'.$tk.'">'.PHP_EOL;
		if($param['type'] == 'FILE'){
			echo '<input type="hidden" name="max_size" value="'.$size.'">'.PHP_EOL;
		}
		if(isset($name) && isset($value)){
			echo '<input type="hidden" name="put'.$name.'" value="'.$value.'">'.PHP_EOL;
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
		$rows = (isset($param['rows']))? 'rows="'.$param['rows'].'"' : '';
		$message = (isset($param['message']))? $param['message'] : '';
		$suffixe = (isset($param['suffixe']))? md5(rand(1,100) + rand(1,100) + rand(1,100)) : false;
		$name = $name.$suffixe;
		if(is_array($list)){
			if(is_array(current($list))){
				debug(current($list));
			}
		}
		
		if($type !== 'checkbox'){
			echo '<label>'.$label.'</label>'.PHP_EOL;
		}
		if($type == 'textarea'){
			echo '<textarea name="'.$name.'" '.$rows.' class="'.$class.'">'.$value.'</textarea>'.PHP_EOL;
				
		}elseif($type == 'select'){
			echo '<select name="'.$name.'" class="'.$class.'">';

			foreach ($list as $k => $v) {
				$this->parse($k, $v, $value);
			}

			echo '</select>'.PHP_EOL;

		}elseif($type == 'checkbox'){
			$checked = ($value == 1)? 'checked' : '';
			$value = ($value ==0)? 1 : $value;
			echo '<label class="'.$class.'">';
			//echo '<input type="hidden" name="'.$name.'" value="0"/>';
			echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" '.$checked.'>'.$label.PHP_EOL;	
			echo '</label>';
		}elseif($type == 'file'){
			echo '<input type="'.$type.'" name="'.$name.'" class="'.$class.'">'.PHP_EOL;
		}else{
			echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" class="'.$class.'">'.PHP_EOL;	
		}if($message){
			if(isset($message['class'])){
				echo (isset($_SESSION[$name]))? '<span class="'.$message['class'].'">'.$_SESSION[$name].'</span>' : '';
			}else{
				echo (isset($_SESSION[$name]))? '<span>'.$_SESSION[$name].'</span>' : '';
			}
			
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
	public function parse($k, $v, $value){
		if(is_array($v)){
			foreach ($v as $kk => $vv) {
				$this->parse($kk, $vv, $value);
			}		
		}
		else{
			if(preg_match('/id/', $k)){
				self::$id_value = $v;//echo '<option value="'.$array.'">qzdqzdqz</option>';
			}elseif(preg_match('/name|title|content/i', $k)){
				if(self::$id_value == $value){
					echo '<option value="'.self::$id_value.'" selected >'.$v.'</option>';	
				}else{
					echo '<option value="'.self::$id_value.'" >'.$v.'</option>';
				}
			
			}elseif(is_int($k)){
				if($k == $value){
					echo '<option value="'.$k.'" selected>'.$v.'</option>';
				}else{
					echo '<option value="'.$k.'" >'.$v.'</option>';
				}
				
			}else{
				if($v == $value){
					echo '<option value="'.$v.'" selected>'.$v.'</option>';
				}else{
					echo '<option value="'.$v.'">'.$v.'</option>';	
				}
				
			}
										
		}
	}

	
}