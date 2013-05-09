<?php
/**
* classe de configuration du model de connexion aux bases de données et des routes de l'application
**/
class Config{

	static $debug_level = 1; // définit le niveau d'information affiché en cas d'erreur dans vos interactions en base de données : 
	//									0 = aucune info, juste un message générique du type "service momentanément indisponnible (mode production),
	//									1 = affiche les erreurs sql ou de connexion à PDO.

	static $database_name = 'artsetmetiers';  // C'est ici qu'il faut changer défault par le nom de la base souhaité apres l'avoir rajouté au tableau ci-dessous.

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
}