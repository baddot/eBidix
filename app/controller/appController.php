<?php
/*******************************************************************************
 *                         Application Controller
 *******************************************************************************
 *      Author:     BWebMedia
 *      Email:      contact@bwebmedia.com
 *      Website:    https://www.bwebmedia.com
 *
 *      File:       appController.php
 *      Version:    1.2
 *      Copyright:  (c) 2009+ - BWeb Media
 *      
 ******************************************************************************/

 
class AppController
{	
	public $db;
	public $settings = array();
	public $lang = array();
	public $user = array();
	public $smarty;
	
	public function __construct() {
		// set flash message
		$this->flashMessage();	
		
		// get database instance
		$this->db = Database::getInstance();
		
		// get application settings
		$this->getSettings();
		
		// timezone setup
		date_default_timezone_set($this->settings['app']['timezone']);
		
		// language setup
		$this->getLang();
		
		// get user infos
		$this->getUserInfos();
		
		// smarty init
		$this->initSmarty();
	}
	
	private function getSettings() {
		require _DIR_ .'/config/settings.inc.php';
		$rows = $this->db->select('fetchAll', 'settings', array('name', 'value'));
		foreach($rows as $item) {
			$name = $item['name'];
			$settings['app'][$name] = $item['value'];
		}
		$this->settings = $settings;
	}
	
	private function getLang() {
		if (isset($_GET['lang'])) {
			$language = tools::filter($_GET['lang'], 'string');
			$_SESSION['lang'] = $language;
		} elseif (isset($_SESSION['lang'])) {
			$language = $_SESSION['lang'];
		} else {
			$language = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2));
			$_SESSION['lang'] = $language;
		}
		$lang_file = _DIR_ .'/app/lang/'.$language;
		require_once (file_exists($lang_file)) ? $lang_file : _DIR_ .'/app/lang/en';
		$this->lang = $lang;
	}
	
	public function l($value) {
		$translate = $this->lang[$value];
		return (!empty($translate)) ? $translate : $value;
	}
	
	private function flashMessage() {
		if(isset($_SESSION['del_flash_message'])) {
			unset($_SESSION['flash_message']);
			unset($_SESSION['del_flash_message']);
		}
		if(isset($_SESSION['flash_message'])) $_SESSION['del_flash_message'] = "yes";	
	}

	public function exec($sql, $params = array()) {
		return $this->db->PDOExecute($sql, $params);
	}
	
	public function exec_one($sql, $params = array()) {
		return $this->db->getRow($sql, $params);
	}
	
	public function exec_all($sql, $params = array()) {
		return $this->db->getRows($sql, $params);
	}
	
	private function getUserInfos() {
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			$isOnline = tools::readCache('user_count_'.$_SESSION['user_id']);
			if(!empty($isOnline)) {
				tools::deleteCache('user_count_'.$_SESSION['user_id']);
				tools::writeCache('user_count_'.$_SESSION['user_id'], $_SESSION['user_id'], 300);
			} else {
				tools::writeCache('user_count_'.$_SESSION['user_id'], $_SESSION['user_id'], 300);
			}
			
			$balance = $this->db->select("fetch", "bids", "SUM(credit) - SUM(debit) AS total", array("user_id" => $_SESSION['user_id']));
			$this->user['balance'] = $balance['total'];
		}
	}

	private function initSmarty() {
		$this->smarty = new Smarty;
		$this->smarty->template_dir = ( defined('_ADMIN_') ) ? _DIR_ .'/app/view/' : _DIR_ .'/app/view/'.$this->settings['app']['theme'];
		$this->smarty->compile_dir = _DIR_ .'/data/smarty/compile/';
		$this->smarty->config_dir = _DIR_ .'/data/smarty/configs/';
		$this->smarty->cache_dir = _DIR_ .'/data/smarty/cache/';
		$this->smarty->caching = $this->settings['app']['cache'];
		$this->smarty->assign(array(
			'lang' => $this->lang,
			'settings' => $this->settings,
			'categories' => $this->db->select('fetchAll', 'categories', array('id', 'name')),
			'user' => $this->user
		));
	}
}

?>