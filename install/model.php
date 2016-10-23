<?php

@set_time_limit(0);
@ini_set('max_execution_time', '0');
// setting the memory limit to 128M only if current is lower
$memory_limit = ini_get('memory_limit');
if (substr($memory_limit,-1) != 'G' 
	AND ((substr($memory_limit,-1) == 'M' AND substr($memory_limit,0,-1) < 128) 
	OR is_numeric($memory_limit) AND (intval($memory_limit) < 131072))
){
	@ini_set('memory_limit','128M');
}

define('INSTALL_VERSION', '1.0');
define('INSTALL_PATH', dirname(__FILE__));
define('SETTINGS_FILE', INSTALL_PATH.'/../config/dbconf.php');
define('INSTALLER_BASE_URI', substr($_SERVER['REQUEST_URI'], 0, -1 * (strlen($_SERVER['REQUEST_URI']) - strrpos($_SERVER['REQUEST_URI'], '/')) - strlen(substr(dirname($_SERVER['REQUEST_URI']), strrpos(dirname($_SERVER['REQUEST_URI']), '/')+1))));

// XML Header
header('Content-Type: text/xml');

// Switching method
if(isset($_GET['method'])) {
	switch($_GET['method']) {
		case 'checkConfig' :
			include_once('xml/checkConfig.php');
		break;

		case 'checkDB' :
			include_once('xml/checkDB.php');
		break;

		case 'createDB' :
			include_once('xml/createDB.php');
		break;

		case 'checkSiteInfos' :
			include_once('xml/checkSiteInfos.php');
		break;
	}
}

?>