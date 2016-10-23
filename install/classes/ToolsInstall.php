<?php

class ToolsInstall
{
	public static function checkDB ($srv, $login, $password, $name, $posted = true) {
		if ($posted){
			// Check POST data...
			$data_check = array(
				!isset($_GET['server']) OR empty($_GET['server']),
				!self::isMailName($_GET['server']),
				!isset($_GET['type']) OR empty($_GET['type']),
				!self::isMailName($_GET['type']),
				!isset($_GET['name']) OR empty($_GET['name']),
				!self::isMailName($_GET['name']),
				!isset($_GET['login']) OR empty($_GET['login']),
				!self::isMailName($_GET['login']),
				!isset($_GET['password'])
			);
			foreach ($data_check AS $data)
				if ($data)
					return 8;
		}

		switch(self::tryToConnect(trim($srv), trim($login), trim($password), trim($name)))
		{
			case 0:
				if (self::tryUTF8(trim($srv), trim($login), trim($password)))
					return true;
				return 49;
			break;
			case 1:
				return 25;
			break;
			case 2:
				return 24;
			break;
			case 3:
				return 50;
			break;
		}
	}
	
	public static function isMailName($mailName) {
		return preg_match('/^[^<>;=#{}]*$/u', $mailName);
	}
	
	static function tryToConnect($server, $user, $pwd, $db, $newDbLink = true) {
		if (!$link = @mysql_connect($server, $user, $pwd, $newDbLink))
			return 1;
		if (!@mysql_select_db($db, $link))
			return 2;
		@mysql_close($link);
		return 0;
	}

	static function tryUTF8($server, $user, $pwd) {
		$link = @mysql_connect($server, $user, $pwd);
		if (!mysql_query('SET NAMES \'utf8\'', $link))
			$ret = false;
		else
			$ret = true;
		@mysql_close($link);
		return $ret;
	}

	static function strtolower($str)
	{
		if (function_exists('mb_strtolower'))
			return mb_strtolower($str, 'utf-8');
		return strtolower($str);
	}

	static function strtoupper($str)
	{
		if (function_exists('mb_strtoupper'))
			return mb_strtoupper($str, 'utf-8');
		return strtoupper($str);
	}
	
	static function ucfirst($str)
	{
		return self::strtoupper(self::substr($str, 0, 1)).self::substr($str, 1);
	}
	
	static function substr($str, $start, $length = false, $encoding = 'utf-8')
	{
		if (function_exists('mb_substr'))
			return mb_substr($str, $start, ($length === false ? self::strlen($str) : $length), $encoding);
		return substr($str, $start, $length);
	}
	
	static function strlen($str)
	{
		if (function_exists('mb_strlen'))
			return mb_strlen($str, 'utf-8');
		return strlen($str);
	}
}
