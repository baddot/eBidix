<?php

if(isset($_GET['source'])) {
    highlight_file(__FILE__);
    die;
}

class GoogleAnalytics
{
	private $login;
	private $password;
	private $ids;
	private $loginToken;
	private $response;
	private $date_begin;
	private $date_end;
	private $sort;
	private $sort_param;
	
	public function __construct($login,$password,$ids,$date_begin,$date_end = null)
	{
		$this->login = $login;
		$this->password = $password;
		$this->ids = $ids;
		$this->date_begin = $date_begin;
		
		if (!$date_end) {
			$this->date_end = $date_begin;
		} else {
			$this->date_end = $date_end;
		}
		
		$this->sort = "-";
		$this->sort_param = "metrics";
		$this->login();
	}
	
	public function setSortByMetrics ($sort)
	{
		if ($sort==true) {
			$this->sort = "";
		} else {
			$this->sort = "-";
		}
		$this->sort_param = 'metrics';
	}
	
	public function setSortByDimensions ($sort)
	{
		if ($sort==true) {
			$this->sort = "";
		} else {
			$this->sort = "-";
		}
		$this->sort_param = 'dimensions';
	}
	
	public function setIds($ids)
	{
		$this->ids = $ids;
	}
	
	public function setDate ($date_begin,$date_end = null)
	{
		$this->date_begin = $date_begin;
		
		if (!$date_end) {
			$this->date_end = $date_begin;
		} else {
			$this->date_end = $date_end;
		}
	}
	
	private function login()
	{
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/accounts/ClientLogin");  
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  
		  
		$data = array('accountType' => 'GOOGLE',  
				  'Email' => $this->login,  
				  'Passwd' => $this->password,  
				  'source'=>'php_curl_analytics',  
				  'service'=>'analytics');  

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
		curl_setopt($ch, CURLOPT_POST, true);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  

		$hasil = curl_exec($ch);  
		curl_close($ch);
		
		// Get the login token
		// SID=DQA...oUE  
		// LSID=DQA...bbo  
		// Auth=DQA...Sxq  
		if (preg_match('/Auth=(.*)$/',$hasil,$matches)>0) {
			$this->loginToken = $matches[1];
		} else {
			trigger_error('Authentication problem',E_USER_WARNING);
			return null;
		}
	}
	
	function getContent ($url) 
	{
		if (!extension_loaded('curl')) {
            throw new Exception('curl extension is not available');
        }
		
		$ch = curl_init($url); 
		
		$header[] = 'Authorization: GoogleLogin auth=' . $this->loginToken;

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		curl_setopt($ch, CURLOPT_HEADER, false); 
		  
		$this->response = curl_exec($ch); 
		$infos = curl_getinfo($ch);
		curl_close($ch);
		
		return $infos['http_code'];
	}
	
	public function getDimensionByMetric($metrics, $dimensions)
	{
		$url = "https://www.google.com/analytics/feeds/data?ids=ga:" . $this->ids . "&metrics=ga:" . $metrics . "&dimensions=ga:" . $dimensions . "&start-date=" . $this->date_begin . "&end-date=" . $this->date_end ."&sort=" . $this->sort . "ga:";
		
		if ($this->sort_param=='metrics') { // sort by metrics
			$url .= $metrics;
		}
		
		if ($this->sort_param=='dimensions') { // sort by dimensions
			$url .= $dimensions;
		}

		if($this->getContent($url) == 200) {
			$XML_object = simplexml_load_string($this->response);
			$labels_array = array();
			$datas_array = array();
			
			foreach($XML_object->entry as $m) {
				$dxp = $m->children('http://schemas.google.com/analytics/2009');
				$metric_att = $dxp->metric->attributes();
				$dimension_att = $dxp->dimension->attributes();
				$labels_array []= $dimension_att['value'] . ' (' . $metric_att['value'] . ')';
				$datas_array  []= (string)$metric_att['value'];
			}
			
			return array('labels' => $labels_array, 'datas' => $datas_array);
		} else {
			return null;
		}
	}
	
	public function getMetric($metric,$uri=null)
	{
		$url = "https://www.google.com/analytics/feeds/data?ids=ga:" . $this->ids . "&metrics=ga:" . $metric . "&start-date=" . $this->date_begin . "&end-date=" . $this->date_end;  

		if ($uri) {
			$url .= "&dimensions=ga:pagePath&filters=ga:pagePath%3D%3D" . $uri;
		}
		
		if($this->getContent($url) == 200) {
			$XML_object = simplexml_load_string($this->response);
			$dxp = $XML_object->entry->children('http://schemas.google.com/analytics/2009');
			if (@count($dxp)>0) {
				$metric_att = $dxp->metric->attributes();
			}
			return $metric_att['value'] ? (string)$metric_att['value'] : 0;
		} else {
			return null;
		}
	}
		
}

?>
