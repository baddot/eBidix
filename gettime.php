<?php

require_once 'config/settings.inc.php';
date_default_timezone_set($settings['app']['timezone']);
$format = "d/m/Y, H:i:s";
if(!empty($_GET['format'])) $format = strip_tags($_GET['format']);
echo date($format);

?>