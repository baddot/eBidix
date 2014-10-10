<?php

// report all errors
@ini_set('display_errors', '1'); // 0, 1
@error_reporting(E_ALL); // 0, E_ALL

// improve PHP configuration to prevent issues
ini_set('upload_max_filesize', '100M');
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);

// correct Apache charset
if (!headers_sent()) header('Content-Type: text/html; charset=utf-8');

// start the session
if (session_id() === '') @session_start();

// if the software isn't installed
if ( !file_exists(_DIR_ .'/config/db.php') ) {
	header("Location: install/");
	exit;
}

// after installation is complete we need to delete '/install' folder
if ( is_dir(_DIR_ .'/install') ) {
	echo "<p>Please remove install folder to start using the software. If you haven't installed auction script go to <a href=\"/install\">install</a> and follow the on screen instructions.</p>";
	exit;
}

/*
// error handling
function error_handler($no, $str, $file, $line) {
	switch($no){
		// fatal error
		case E_ERROR:
		case E_PARSE:
		case E_CORE_ERROR:
		case E_CORE_WARNING:
		case E_COMPILE_ERROR:
		case E_COMPILE_WARNING:
		case E_USER_ERROR:
			$type = 'Fatal error: ';
			break;
		
		// warning
		case E_WARNING:
		case E_USER_WARNING:
			$type = 'Warning: ';
			break;
		
		// notice
		case E_NOTICE:
		case E_USER_NOTICE:
			$type = 'Notice: ';
			break;
		
		// syntax
		case E_STRICT:
			$type = 'Obsolete syntax: ';
			break;
		
		// unknow error
		default:
			$type = 'Unknow error: ';
			break;
	}
	
	$infos = '['.$no.']'.$str.' (file: '.$file.' - line: '.$line.') '.
	date("d/m/Y H:i:s",time()).
	":".$_SERVER['REMOTE_ADDR'].
	"GET:".serialize($_GET).
	"POST:".serialize($_POST).
	"SERVER:".serialize($_SERVER).
	"COOKIE:".(isset($_COOKIE)? serialize($_COOKIE) : "Undefined").
	"SESSION:".(isset($_SESSION)? serialize($_SESSION) : "Undefined");
	
	$log_file = _DIR_ .'/data/errors.log';
	error_log($infos, 3, );
}
set_error_handler('error_handler');
//trigger_error($str, E_USER_WARNING);
//throw new Exception("my error");
*/


// required files
require _DIR_ . '/config/db.php';
require _DIR_ . '/app/core/database.class.php';
require _DIR_ . '/app/core/dispatcher.class.php';
require _DIR_ . '/app/core/tools.class.php';
require _DIR_ . '/app/libs/smarty/Smarty.class.php';
require _DIR_ . '/app/controller/appController.php';
