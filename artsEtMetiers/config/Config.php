<?php
/**
* classe de configuration du model de connexion aux bases de données et des routes de l'application
**/
class Config{

	/**
	* configurer ici l'adresse de votre site internet.
	**/
	static $website_adress = 'http://localhost/artsetmetiers/blog';

	static $debug_level = 1; // définit le niveau d'information affiché en cas d'erreur dans vos interactions en base de données : 
	//									0 = aucune info, juste un message générique du type "service momentanément indisponnible (mode production),
	//									1 = affiche les erreurs sql ou de connexion à PDO.

	static $database_name = 'artsetmetiers';  // C'est ici qu'il faut changer défault par le nom de la base souhaité apres l'avoir rajouté au tableau ci-dessous.


	/**
	*configurer ici votre connexion à PDO et votre compte mysql
	**/
	static $database = array('default' => array(
						'type'		=> 'mysql',
						'host' 		=> 'localhost',
						'database'	=> 'test',
						'user'		=> '',
						'password'	=> '')
	     				#decommenter le code ci dessous pour creer une connexion à une nouvelle base de donnée
		   			    ,'artsetmetiers' => array(
		   			     'type'		=> 'mysql',
						'host' 		=> 'localhost',
						'database'	=> 'artsetmetiers',
						'user'		=> 'root',
						'password'	=> '')

	);

	/**
	* la proprieté statique Config::$acces permet de configurer les droits des utilisateurs pour chaque action de chaque
	* controlleur, completer le tableau ci dessous pour chaque action necessitant un niveau d'authentification, ne remplissez pas
	*pour les actions ouvertes au public comme la page d'accueil etc .. Il faudra dans votre table utilisateur créer un champ "statut"
	*et lui donner des possibilités de valeur identique à ce tableau. Pour l'exemple le controlleur mycontrollerController laisse
	*tous les utilisateurs ayant le champ statut qui a comme valeur membre acceder à l'action1. 
	*
	*
	*
	**/
	static $access  = array(/*'mycontroller' (Nom du controller sans le suffixe Controller) => array(
								'action1' => 'membre,
								'action2' => 'niveau necessaire pour acceder au service'),*/
							'auth' => array(
								'edit' => 1,
								'logout' => 1),
							'backoff' => array(
								'index' => 10,
								'addArticle' => 10,
								'listArticle' => 10));

	
	/**
	*@param le niveau d'acces de l'utilisateur sous forme numérique
	*@return son niveau d'acces sous forme de chaine de caractère explicite
	*Configurer le nom explicite du rang de vos utilisateur en fonction du rang numérique que vous avez configuré ci dessus
	*sachant que celui qui a le niveau le plus haut peut faire tout ce que fait le niveau d'en dessous
	**/
	static function accessShow($lvl){
		$rank[1] = 'membre';
		$rank[2] = 'modérateur';
		$rank[10] = 'administrateur';
		
		return $rank[$lvl];
	}
}