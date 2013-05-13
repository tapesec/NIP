<?php
$time_start = microtime(true); //récuperation du timestamp au début de l'execution de la page

 

define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('BASE_URL', (isset($_SERVER['SCRIPT_NAME']))? dirname(dirname($_SERVER['SCRIPT_NAME'])) : '');
define('TEST', dirname(dirname($_SERVER['PHP_SELF'])));


require_once ROOT.DS.'core'.DS.'includes.php';


new Dispatcher();
//$_SESSION = array();
if(isset($_SESSION)){
	debug($_SESSION);
};
debug($_SERVER);


$time_stop = microtime(true); // récupération du timestamp en fin d'éxécution de la page

$time_exec = round($time_stop - $time_start, 5); ?> <!-- Diférence entre le temps de fin et le temps de début -->

<!-- bloc d'affichage du mode dev-->
<div style="position:static;bottom:0;background-color:red;padding:10px;color:white;">
	<?php echo 'Page executé en '.$time_exec.' secondes'; ?>
</div>

