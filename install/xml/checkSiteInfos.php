<?php

include(INSTALL_PATH.'/classes/Validate.php');
include_once(INSTALL_PATH.'/../config/dbconf.php');

function isFormValid() {
	global $error;
	$validInfos = true;
	foreach ($error as $anError)
		if ($anError != '')
			$validInfos = false;
	return $validInfos;
}

$error = array();
foreach($_GET AS &$var) {
	if (is_string($var))
		$var = html_entity_decode($var, ENT_COMPAT, 'UTF-8');
	elseif (is_array($var))
		foreach($var AS &$row)
			$row = html_entity_decode($row, ENT_COMPAT, 'UTF-8');
}

if(!isset($_GET['infosFirstname']) OR empty($_GET['infosFirstname'])) $error['infosFirstname'] = '0';
else $error['infosFirstname'] = '';

if(!isset($_GET['infosName']) OR empty($_GET['infosName'])) $error['infosName'] = '0';
else $error['infosName'] = '';

if(isset($_GET['infosEmail']) AND !Validate::isEmail($_GET['infosEmail'])) $error['infosEmail'] = '3';
else $error['infosEmail'] = '';

if(isset($_GET['infosFirstname']) AND !Validate::isName($_GET['infosFirstname'])) $error['validateFirstname'] = '47';
else $error['validateFirstname'] = '';

if(isset($_GET['infosName']) AND !Validate::isName($_GET['infosName'])) $error['validateName'] = '48';
else $error['validateName'] = '';

if(!isset($_GET['infosEmail']) OR empty($_GET['infosEmail'])) $error['infosEmail'] = '0';

if(!isset($_GET['infosPassword']) OR empty($_GET['infosPassword'])) $error['infosPassword'] = '0';
else $error['infosPassword'] = '';

if(!isset($_GET['infosPasswordRepeat']) OR empty($_GET['infosPasswordRepeat'])) $error['infosPasswordRepeat'] = '0';
else $error['infosPasswordRepeat'] = '';

if($error['infosPassword'] == '' AND $_GET['infosPassword'] != $_GET['infosPasswordRepeat']) $error['infosPassword'] = '2';
if($error['infosPassword'] == '' AND (strlen($_GET['infosPassword']) < 6 OR !Validate::isPasswdAdmin($_GET['infosPassword']))) $error['infosPassword'] = '12';

/////////////////////////////
// IF ALL IS OK DO THE NEXT//
/////////////////////////////

include_once(INSTALL_PATH.'/classes/ToolsInstall.php');
$link = mysql_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_);
mysql_select_db(_DB_NAME_, $link);
mysql_query('SET NAMES \'utf8\'', $link);

//Insert configuration parameters into the database
$error['infosInsertSQL'] = '';
if (isFormValid()) {
	$sqlParams = array();
	$sqlParams[] = "INSERT INTO ". _DB_PREFIX_ ."users (username, ppasswd, first_name, last_name, email, active, admin, ip, created) 
					VALUES('admin', '".md5($_GET['infosPassword']. _SALT_)."', '".ucfirst(strtolower($_GET['infosFirstname']))."', '".ucfirst(strtolower($_GET['infosName']))."', '".strtolower($_GET['infosEmail'])."', '1', '1', '".$_SERVER['REMOTE_ADDR']."', '".date("Y-m-d H:i:s")."')";
	
	foreach($sqlParams as $query)
		if(!mysql_query($query, $link))
			$error['infosInsertSQL'] = '11';
}

//////////////////////////
// Building XML Response//
//////////////////////////

echo '<siteConfig>'."\n";
foreach ($error AS $key => $line)
	echo '<field id="'.$key.'" result="'.( $line != "" ? 'fail' : 'ok').'" error="'.$line.'" />'."\n";
echo '</siteConfig>';

?>