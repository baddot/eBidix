<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé
include_once(INSTALL_PATH .'/classes/ConfigurationTest.php');

// Functions list to test with 'test_system'
$funcs = array('fopen', 'fclose', 'fread', 'fwrite', 'rename', 'file_exists', 'unlink', 'rmdir', 'mkdir', 'getcwd', 'chdir', 'chmod');

// Test list to execute (function/args)
$tests = array(
	'phpversion' => false,
	'upload' => false,
	'system' => $funcs,
	'mysql_support' => false,
	'cache_dir' => INSTALL_PATH.'/../cache/',
	'config_dir' => INSTALL_PATH.'/../config/',
	'sitemap' => INSTALL_PATH.'/../sitemap.xml',
	'smarty_tools_dir' => INSTALL_PATH.'/../tools/smarty/compile/',
	'smarty_cache_dir' => INSTALL_PATH.'/../tools/smarty/cache/',
	'upload_dir' => INSTALL_PATH.'/../upload/',
);
$tests_op = array(
	'fopen' => false,
	'register_globals' => false,
	'gz' => false,
	'mcrypt' => false,
	'magicquotes' => false,
	'dom' => false,
);

// Execute tests
$res = ConfigurationTest::check($tests);
$res_op = ConfigurationTest::check($tests_op);

$has_error = false;

// Building XML Tree...
echo '<config>'."\n";
	echo '<firsttime value="'.((isset($_GET['firsttime']) AND $_GET['firsttime'] == 1) ? 1 : 0).'" />'."\n";
	echo '<testList id="required">'."\n";
	foreach ($res AS $key => $line)
	{
		if ($line == 'fail') $has_error = true;
		echo '<test id="'.$key.'" result="'.$line.'"/>'."\n";
	}
	echo '</testList>'."\n";
	echo '<testList id="optional">'."\n";
	foreach ($res_op AS $key => $line)
	{
		if ($line == 'fail') $has_error = true;
		echo '<test id="'.$key.'" result="'.$line.'"/>'."\n";
	}
	echo '</testList>'."\n";
echo '</config>';


