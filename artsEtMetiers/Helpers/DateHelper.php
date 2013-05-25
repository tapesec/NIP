<?php
class DateHelper extends DateTime{

	
	/**
	*@param $date la date à formater et les paramètres à appliquer
	*@return la date formaté
	**/
	static function fr($date, $param=null){
		setlocale(LC_ALL, "fr_FR.utf8", 'fra');
		$obj = new DateTime($date, new DateTimeZone('EUROPE/Paris'));

		$js = (isset($param['Jsemaine']))? $param['Jsemaine'] : '';
		$m = (isset($param['mois']))? $param['mois'] : '';
		$delay = (isset($param['delay']))? $param['delay'] : false;
		$short = (isset($param['short']))? $param['short'] : '';

		$now = time();
		$strdate = strtotime($obj->format('Y-m-d H:i:s'));

		
		if($delay){
			$diff = $now - $strdate;
			$diff = round($diff/(3600*24));
			if($diff > 30){
				$dateFinale = 'Il y a '.round($diff/(3600*24*30)).' mois';
			}elseif($diff <= 30 && $diff > 1){
				$dateFinale = 'Il y a '.round($diff/(3600*24)).' jours';
			}else{
				$dateFinale = ucfirst(strftime('%a %d %b %Y', $strdate));
			}
		}else{
			$dateFinale = ucfirst(strftime('%a %d %b %Y', $strdate));
		}
		return $dateFinale;

	}

	/**
	*@return la date et l'heure actuelle au format us pret à être inserer en base de données
	**/
	static function now(){
		$date = new DateTime('NOW', new DateTimeZone('EUROPE/Paris'));
		return $date->format('Y-m-d H:i');
	}
}