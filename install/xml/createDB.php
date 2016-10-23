<?php

if (function_exists('date_default_timezone_set'))
	date_default_timezone_set('Europe/Paris');

//delete settings file if it exist
if (file_exists(SETTINGS_FILE))
	if (!unlink(SETTINGS_FILE))
		die('<action result="fail" error="17" />'."\n");

include(INSTALL_PATH.'/classes/AddConfToFile.php');

//check db access
include_once(INSTALL_PATH.'/classes/ToolsInstall.php');
$resultDB = ToolsInstall::checkDB($_GET['server'], $_GET['login'], $_GET['password'], $_GET['name'], true, $_GET['engine']);
if ($resultDB !== true){
	die("<action result='fail' error='".$resultDB."'/>\n");
}


// Check POST data...
$data_check = array(
	!isset($_GET['tablePrefix']) OR !ToolsInstall::isMailName($_GET['tablePrefix']) OR !preg_match('/^[a-z0-9_]*$/i', $_GET['tablePrefix'])
);
foreach ($data_check AS $data)
	if ($data)
		die('<action result="fail" error="8"/>'."\n");

// Writing data in settings file
$oldLevel = error_reporting(E_ALL);
$_BASE_URI_ = str_replace(' ', '%20', INSTALLER_BASE_URI);
$datas = array(
	array('_DB_SERVER_', trim($_GET['server'])),
	array('_DB_TYPE_', trim($_GET['type'])),
	array('_DB_NAME_', trim($_GET['name'])),
	array('_DB_USER_', trim($_GET['login'])),
	array('_DB_PASSWD_', trim($_GET['password'])),
	array('_DB_PREFIX_', trim($_GET['tablePrefix'])),
	array('_MYSQL_ENGINE_', $_GET['engine']),
	array('_BASE_URI_', $_BASE_URI_),
	array('_CREATION_DATE_', date('Y-m-d')),
	array('_VERSION_', INSTALL_VERSION),
	array('_SALT_', 'm4d3!N|2U$$!4bYg!o7$4|2')
);

error_reporting($oldLevel);
$confFile = new AddConfToFile(SETTINGS_FILE, 'w');
if ($confFile->error)
	die('<action result="fail" error="'.$confFile->error.'" />'."\n");

foreach ($datas AS $data){
	$confFile->writeInFile($data[0], $data[1]);
}

$confFile->writeEndTagPhp();

if ($confFile->error != false)
	die('<action result="fail" error="'.$confFile->error.'" />'."\n");

//load new settings
include(SETTINGS_FILE);

//-----------
//import SQL data
//-----------
switch (_DB_TYPE_) {
	case "MySQL" :

		$filePrefix = 'PREFIX_';
		$engineType = 'ENGINE_TYPE';
		//send the SQL structure file requests
		$structureFile = dirname(__FILE__)."/../db.sql";
		if (!file_exists($structureFile)) {
			die('<action result="fail" error="10" />'."\n");
		}
		$db_structure_settings ="";
		if ( !$db_structure_settings .= file_get_contents($structureFile) ) {
			die('<action result="fail" error="9" />'."\n");
		}
		$db_structure_settings = str_replace(array($filePrefix, $engineType), array($_GET['tablePrefix'], $_GET['engine']), $db_structure_settings);
		$db_structure_settings = preg_split("/;\s*[\r\n]+/",$db_structure_settings);
		
		$link = mysql_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_);
		mysql_select_db(_DB_NAME_, $link);
		
		foreach($db_structure_settings as $query){
			$query = trim($query);
			if (!empty($query)){
				if (!mysql_query($query, $link)){
					if (mysql_errno($link) == 1050){
						die('<action result="fail" error="14" />'."\n");
					} else {
						die(
							'<action
							result="fail"
							error="11"
							sqlMsgError="'.addslashes(htmlentities(mysql_error($link))).'"
							sqlNumberError="'.htmlentities(mysql_errno($link)).'"
							sqlQuery="'.addslashes(htmlentities($query)).'"
							/>'
						);
					}
				}
			}
		}
	break;
}
$xml = '<action result="ok" error="" />'."\n";

die($xml);

