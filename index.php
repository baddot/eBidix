<?php

/*******************************************************************************
 *      Author:     BWeb Media
 *      Email:      contact@bwebmedia.com
 *      Website:    http://www.bwebmedia.com
 *
 *      File:       index.php
 *      Version:    1.1
 *      Copyright:  (c) 2014 - BWeb Media 
 *      
 ******************************************************************************/

/*date_default_timezone_set('Europe/Paris');
$start = microtime();*/
 
define('_DIR_', dirname(__FILE__));
require _DIR_ . '/config/config.inc.php';
Dispatcher::getInstance()->run();

/*$end = microtime() - $start;
echo round($end * 1000) . 'ms';*/