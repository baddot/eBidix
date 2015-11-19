<?php
class settingController extends appController 
{	
	public $models = array('setting');
	
	function admin_index() {
		$this->smarty->assign('settings_data', $this->setting->getAll());
		$this->smarty->display('admin/settings/settings.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			if($data['name'] == 'auction_peak_start' || $data['name'] == 'auction_peak_end'){
				$data['value'] = $data['hours'].':'.$data['minutes'];
			} elseif($data['name'] == 'bid_value') {
				if(strpos($data['value'], ',')) $data['value'] = str_replace(',', '.', $data['value']);
			}
			
			$toUpdate = array(
				'value' => $data['value']
			);
			
			if($this->setting->update($id, $toUpdate)) {
				if(isset($data['theme'])) {
					$dir = _DIR_ .'/data/smarty/compile';
					$handle=opendir($dir); 
					while(false !== ($file = readdir($handle))) { 
						if(($file != ".") && ($file != "..")) unlink($dir.'/'.$file); 
					}
					closedir($dir);
				} elseif($data['name'] == 'site_live') {
					$filename = _DIR_ .'/data/site_live';
					if(file_exists($filename)) unlink($filename);
				} elseif($data['name'] == 'auction_peak_start') {
					$filename = _DIR_ .'/data/auction_peak_start';
					if(file_exists($filename)) unlink($filename);
				} elseif($data['name'] == 'auction_peak_end') {
					$filename = _DIR_ .'/data/auction_peak_end';
					if(file_exists($filename)) unlink($filename);
				}

				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/admin/setting');
			}
		}
		
		$setting = $this->setting->getById($id);
		if($setting['name'] == 'theme') {
			$dir   = _DIR_ .'/app/view/';
			$files = scandir($dir);
			$themes = array();
			$i=0;
			foreach($files as $filename) {
				if(is_dir($dir . $filename)) {
					if(!preg_match('[^0-9A-Za-z_-]', $filename) && $filename != 'admin') $themes[$i]['name'] = $filename;
				}
				$i++;
			}
		} else $themes = null;
		if($setting['name'] == 'auction_peak_start' || $setting['name'] == 'auction_peak_end') {
			$explode = explode(':', $setting['value']);
			$setting['hours'] = $explode[0];
			$setting['minutes'] = $explode[1];
		}
		
		$hours = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23');
		$minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		
		$this->smarty->assign(array(
			'setting' => $setting,
			'themes' => $themes,
			'hours' => $hours,
			'minutes' => $minutes
		));
		$this->smarty->display('admin/settings/edit_setting.tpl');
	}
}
?>