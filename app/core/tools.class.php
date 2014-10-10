<?php
/*******************************************************************************
 *                         Tools class
 *******************************************************************************
 *      Author:     BWeb Media
 *      Email:      contact@bwebmedia.com
 *      Website:    http://www.bwebmedia.com
 *
 *      File:       tools.class.php
 *      Version:    1.2
 *      Copyright:  (c) 2009+ BWeb Media 
 *      
 ******************************************************************************/

Class tools
{
	public static function filter($data, $type = 'string') {
		if(is_array($data)) {
	  		foreach ($data as $key => $value) {
	    		$data[$key] = self::filter($value);
	  		}
		} else {		
			switch ($type) {
				case 'email' :
					$data = filter_var($data, FILTER_SANITIZE_EMAIL);
					break;
				
				case 'url' :
					$data = filter_var($data, FILTER_SANITIZE_URL);
					break;
					
				case 'special_chars' :
					$data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
					break;
				
				case 'string' :
					$data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
					break;
				
				case 'accents' :
					$search = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_-]@');
					$replace = array ('e','a','i','u','o','c','_','');
					$data = preg_replace($search, $replace, $data);
					break;
			}
		}
		return $data;
	}
	
	public static function upload($files, $dir = 'data/') {
		if(isset($files) && !empty($files)) {
			$max_files = 5;
			$max_size = 3000000;
			$not_allowed = array("exe","mp3");
			$num = count($files["file"]["name"]);
			
			if (!is_writable($dir)) {
				throw new Exception("UPLOAD ERROR: not allowed to write to dir: {$dir}.");
				return false;
			}
			
			if ($num > $max_files) {
				throw new Exception("UPLOAD ERROR: too many files. Max allowed : {$max_files}.");
				return false;
			} else {
				$data = array();
				for ($i=0;$i<$num;$i++) {
					if ($files["file"]["size"][$i] > $max_size) {
						throw new Exception('UPLOAD ERROR: too large file. Max allowed: ' . ($max_size/1000) . 'kb.');
						return false;
					}
					
					$file_type = explode(".", $files["file"]["type"][$i]);
					$file_type = $file_type[count($file_type)-1];
					
					if (isset($file_type[1]) && in_array($file_type[1], $not_allowed)) {
						throw new Exception('UPLOAD ERROR: file type not allowed.');
						return false;
					}
					
					$extension = strrchr($files['file']['name'][$i], '.');
					$unique_filename = sha1(uniqid(rand(), true));
					$filename = $unique_filename.$extension;
					
					if (!empty($filename)) {
						$add = $dir.$filename;
						if (is_uploaded_file($files["file"]["tmp_name"][$i])) {
							move_uploaded_file($files["file"]["tmp_name"][$i], $add);
							
							if (!chmod("$add", 0777)) { // set permission to the file.
								throw new Exception("UPLOAD ERROR: problems with copy of: {$filename}");
								return false;
							}
							
							$data[] = $filename; 
						}
					}
				}
				return $data;
			}
		}
	}
	
	public static function thumbnail($source, $dest, $nw, $nh) {
		$stype = explode(".", $source);
		$stype = $stype[count($stype)-1];
		$size = getimagesize($source);
		$w = $size[0];
		$h = $size[1];
		
		switch($stype) {
			case 'gif':
				$simg = imagecreatefromgif($source);
				break;
			case 'jpg':
			case 'jpeg':
				$simg = imagecreatefromjpeg($source);
				break;
			case 'png':
				$simg = imagecreatefrompng($source);
				break;
		}
		
		$dimg = imagecreatetruecolor($nw, $nh);
		$wm = $w/$nw;
		$hm = $h/$nh;
		$h_height = $nh/2;
		$w_height = $nw/2;
		
		$white = imagecolorallocate($dimg, 255, 255, 255);
		imagefill($dimg, 0, 0, $white);
		 
		if ($w>$h) {
			$adjusted_width = $w / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
		} elseif (($w <$h) || ($w == $h)) {
			$adjusted_height = $h / $wm;     
			$half_height = $adjusted_height / 2;     
			$int_height = $half_height - $h_height;         
			imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); 		
		} else {
			imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); 
		}  
		
		if( imagejpeg($dimg,$dest,100) ) return true;
		else return false;
	}
	
	public static function sendMail($to, $template, $toReplace) {
		// set template dir
		$dir = _DIR_ .'/assets/mails/' . $_SESSION['lang'] . '/';
		$template_dir = (file_exists($dir)) ? $dir : _DIR_ . '/assets/mails/en/';
		
		// get html content
		$htmlContent = (file_exists($template_dir . $template . '.html')) ? file_get_contents($template_dir . $template . '.html') : 'error';
		
		// get text content
		$txtContent = (file_exists($template_dir . $template . '.txt')) ? strip_tags(html_entity_decode(file_get_contents($template_dir . $template . '.txt'), null, 'utf-8')) : 'error';
		
		// set settings
		//$serverName = $_SERVER['SERVER_NAME'];
		$serverName = 'ebidix.com';
		$siteURL = "http://" . $serverName;
		preg_match("/<title>(.*?)<\/title>/", $htmlContent, $matches);
		$subject = (isset($matches[1])) ? $matches[1] : 'message';
		$rn = "\r\n";
		$boundary = md5(rand());
		$pkid = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDF6kSXQSKkGkqY51C1uLeZK0CnND6uYljGs+zcp18PCE+bOYjN
ijT/ndEAdCXMJCQ3BVLKbqqYzsn8CX+JGVkJFFBCm5hT9qXinWiQuYZ6/rI375k/
xvv/X4wW9c6U2Hzd26/lB44yS2ft/r0QGEJPMLRijgb/7tcSOaxu1cEb+wIDAQAB
AoGAZHBWLNh+Zv98ugox+HbsncvIfNJTuRXp7bUj0HsUD8Hs/F5/Yafw64RAq9VF
1UrGIjIOaPMummvfL4v2cDIv7zlZmTuor1402VV7GMcTDs3TD4wc5G6QBeoXsufd
Uq9oyBJzAHqyFEDk+y1dUJsyJuuAIPkTm+iGPU9iRBc28KkCQQD1Al+WSbqXAMph
gteRFcS+DAcIL+ELoKciHajOdjZJAX7myTNnUV9Z9K+HfvdFZo5MnNV9tO94FOu0
Kh1RIWgFAkEAzssTolB+DqVeGzY9x19i9GjpOgOh5snVdOCEhmdGSSJJtfARzeiE
cKLlh7P4uPmGdO/WdGMNVIM4QEDTyfOz/wJBAJRznLE1+R2XeAh/O9gHxY6VQQl/
4S6nZ70vFWILlDbF9jslu8SlNE4QCO7jSjW9vwjCmkSxhctPecVPIzZONHUCQHtw
7AJ7TBRQEJHr2gr2XKqLKZWw72dF2j7PeyyD34fuiNOrP+WLQ+u8wYk1HGbGxMVv
GbQWILHvNpfcWtB1wl8CQQCCsmKCYEVOgvMumN3ScYmO3HaK3NkWsvBBl/nMCktV
Iqr7pQ7PAEsFaH1IRx6JEkL+2auL6rvYrJh0Y5QOrWzQ
-----END RSA PRIVATE KEY-----';
		//$pkid = openssl_pkey_get_private(_DIR_ .'/data/email.pem');	
		
		// replace all content values to corresponding
		$toReplace['site_url'] = $siteURL;
		$toReplace['site_name'] = $serverName;
		foreach($toReplace as $key => $item) {
			$htmlContent = str_replace("%{$key}%", $item, $htmlContent);
			$txtContent = str_replace("%{$key}%", $item, $txtContent);
		}
		
		// set headers
		$headers   = array();
		$headers[] = "From: {$serverName} <noreply@{$serverName}>";
		$headers[] = "To: {$to}";
		$headers[] = 'Subject: =?UTF-8?B?' . base64_encode($subject).'?=';
        $headers[] = 'Message-ID: <'.sha1(microtime(true)).'@'.$serverName.'>';
		$headers[] = 'Date: '.date('r');
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-Type: multipart/alternative; boundary="'.$boundary.'"';
		
		// set body
		$body  = $rn.'--'.$boundary.$rn;
        $body .= 'Content-Type: text/plain; charset=utf-8'.$rn; // text version
        $body .= 'Content-Transfer-Encoding: 7bit'.$rn;
		$body .= strip_tags($txtContent).$rn;
        $body .= $rn."--".$boundary.$rn;
        $body .= 'Content-Type: text/html; charset=utf-8'.$rn; // html version
        $body .= 'Content-Transfer-Encoding: 7bit'.$rn;
        $body .= $rn.$htmlContent.$rn;
		$body .= $rn.'--'.$boundary.'--'.$rn;
		
		// DKIM signature
		$bh = base64_encode(sha1($body,true));
		$ts = time();
		$ln = strlen($body);
		$dkim = "DKIM-Signature: v=1; a=rsa-sha1; c=relaxed/relaxed; d={$serverName}; s=key; l={$ln}; t={$ts}; h=from:to:subject:message-id:date:mime-version:content-type; bh={$bh};\r\n\tb=";
		$dkim = wordwrap($dkim,76,"\r\n\t");
		$unsigned = implode("\r\n",$headers)."\r\n{$dkim}";
		openssl_sign($unsigned, $signed, $pkid, OPENSSL_ALGO_SHA1);
		$dkim .= chunk_split(base64_encode($signed),76,"\r\n\t");
		
		// DomainKey signature
		$dk = "DomainKey-Signature: a=rsa-sha1; c=nofws; d={$serverName}; s=key;";
		$unsigned = self::nofws($headers,$body);
		openssl_sign($unsigned, $signed, $pkid, OPENSSL_ALGO_SHA1);
		$b = chunk_split(base64_encode($signed),76,"\r\n\t");
		$dk .="b={$b}";
		
		// Create email data, first headers was DKIM and DomainKey
		$emailData = trim($dkim).$rn;
		$emailData .= trim(wordwrap($dk,76,"\r\n\t")).$rn;
		
		// Include other headers
		foreach($headers as $value){
			$emailData.= $value.$rn;
		}
		
		// send the email
		return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $emailData);
	}
	
	public static function nofws($raw_headers,$raw_body){
		// nofws-ed headers
		$headers = array();
		
		// Loop the raw_headers
		foreach ($raw_headers as $header){
		  // Replace all Folding Whitespace
		  $headers[] = preg_replace('/[\r\t\n ]++/','',$header);
		}
		
		// Join headers with LF then Add it into data
		$data = implode("\n",$headers)."\n";
		
		// Loop Body Lines
		foreach(explode("\n","\n".str_replace("\r","",$raw_body)) as $line)
		{
		  // Replace all Folding Whitespace from current line
		  // then Add it into data
		  $data .= preg_replace('/[\t\n ]++/','',$line)."\n";
		}
		
		// Remove Trailing empty lines then split it with LF
		$data = explode("\n",rtrim($data,"\n"));
		
		// Join array of data with CRLF and Append CRLF 
		// to the resulting line
		$data = implode("\r\n",$data)."\r\n";
		
		// Return Canonicalizated Data
		return $data;
	}
	
	public static function paginate($sql, $conditions, $table, $page = 1, $per_page = 30) {
        $offset = ($page - 1) * $per_page;
		$limit = 'LIMIT '.$offset.','.$per_page;
		$new_sql = $sql.' '.$conditions.' '.$limit;
		$items = $this->exec_all($new_sql);
		$total_items = $this->exec_one("SELECT COUNT(*) AS 'row_count' FROM ".$table." ".$conditions."");
		return array(
			$items,
			array(
				'total'    => $total_items['row_count'], 
				'page'     => $page, 
				'per_page' => $per_page
			)
		);
	}
	
	public static function validate($data, $check = true) {
		$errors = array();
		foreach ($data as $type => $value) {
			switch ($type) {
				case 'username':
					if (!preg_match('`^(\w{2,15})$`', $value)) {
						array_push($errors, 'Invalid username');
					} else {
						if($check) {
							$checkDB = database::getInstance()->select('fetch', 'users', 'id', array('username' => $value));
							if (!empty($checkDB)) array_push($errors, 'Username already exists');
						}
					}
					break;
				
				case 'password':
					if (!preg_match('`^(\w{4,15})$`', $value)) array_push($errors, 'Invalid password');
					break;
				
				case 'email':
					$verif = "!^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,5}$!";
					if (!preg_match($verif, $value)) {
						array_push($errors, 'Invalid email');						
					} else {
						list($prefix, $domaine) = preg_split("/@/", $value);
						
						if (preg_match($verif, $value) && !getmxrr($domaine, $MXHost)) {
							array_push($errors, 'Unknown mail server');
						}
						
						if ($domaine == "yopmail.com" || $domaine == "jetable.org" || $domaine == "brefmail.com" || $domaine == "haltospam.com" || $domaine == "kleemail.com" || $domaine == "link2mail.net" || $domaine == "ephemail.net" || $domaine == "kasmail.com"  || $domaine == "spamgourmet.com"  || $domaine == "filzmail.com") {
							array_push($errors, 'Disposable emails not accepted');
						}
						
						if($check) {
							$email = database::getInstance()->select('fetch', 'users', 'id', array('email' => $value));
							if (!empty($email)) array_push($errors, 'Email already exists');
						}
					}
					break;
					
				case 'phone':
					break;
				
				case 'captcha':
					if (!empty($_SESSION['captcha']) && $value == $_SESSION['captcha']) unset($_SESSION['captcha']);
					else array_push($errors, 'Invalid captcha');
					break;
					
				case 'account':
					$account = database::getInstance()->select('fetch', 'users', 'count(id) as total, blacklist', array('ip' => $value));
					if ($account['blacklist'] == 1) array_push($errors, 'You have been banned');
					elseif ($account['total'] > 0) array_push($errors, 'You already have an account');
					break;
			}
		}
		return $errors;
	}
	
	public static function setFlash($messages, $template) {
		$text = '';
		if(is_array($messages)) {
			foreach ($messages as $value) {
	    		$text .= $value.'<br>';
	  		}
		} else {
			$text .= $messages;
		}
		
		$_SESSION['flash_message'] = '<div id="flash-message" class="'.$template.'">'.$text.'</div>';
	}
	
	public static function redirect($url) {
		if (!empty($url)) {
			header('Location:'.$url);
			exit;
		}
	}
	
	public static function generateHash($input) {
		if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
			$salt = '$2y$07$' . substr(md5(uniqid(rand(), true)), 0, 22);
			return crypt($input, $salt);
		} else throw new Exception("Can not generate hash - blowfish does not supported");
		// php > 5.5.0 -> password_hash($input, PASSWORD_DEFAULT);
	}
	
	public static function captcha($fonts, $numChars, $width, $height) {
		$image = imagecreate($width, $height);
		imagecolorallocate($image, 255, 255, 255);
		$code = '';
		for ($i=0;$i<$numChars; $i++) {
            // random char A-Z
			$code .= chr(rand(65, 90)); 
        }
		$_SESSION['captcha'] = $code;
		
		for ($i=0;$i<strlen($code);$i++) {
            // select random font
            $currentFont = $fonts[array_rand($fonts)];
            
            // select random color
            $textColor = imagecolorallocate($image, 0, 0, 0);
            
            // select random font size
            $fontSize = rand(16, 25);
            
            // select random angle
            $angle = rand(-30, 30);
            
            // get dimensions of character in selected font and text size
            $charDetails = imageftbbox($fontSize, $angle, $currentFont, $code[$i], array());
            
            // calculate character starting coordinates
            $spacing = (int)($width / $numChars);
			$x = $spacing / 4 + $i * $spacing;
            $charHeight = $charDetails[2] - $charDetails[5];
            $y = $height / 2 + $charHeight / 4;
            
            // write text to image
            imagefttext($image, $fontSize, $angle, $x, $y, $textColor, $currentFont, $code[$i], array());
        }
		
		// write out image to file or browser
		header("Content-type: image/jpeg");
		imagejpeg($image);
		
		// free memory used in creating image
		imagedestroy($image);
	}
	
	public static function log($message, $type = 'error') {
		switch ($type) {
			case 'app':
				$file = _DIR_ .'/data/app.log';
				break;
				
			case 'error':
				$file = _DIR_ .'/data/errors.log';
				break;
				
			case 'connexions':
				$file = _DIR_ .'/data/connexions.log';
				break;
		}
		$log = date("d-m-Y H:i:s")." | ".$message."\n";
		error_log($log, 3, $file);
	}
	
	public static function readCache($file) {
		if(file_exists(_DIR_ .'/data/'.$file)) {
			$data = file(_DIR_ .'/data/'.$file);
			if(time() < $data[0]) {
				return unserialize($data[1]);
			} else {
				unlink(_DIR_ .'/data/'.$file);
				return null;
			}
		} else {
			return null;
		}
	}

	public static function deleteCache($file) {
		if(file_exists(_DIR_ .'/data/'.$file)) {
			unlink(_DIR_ .'/data/'.$file);
			return true;
		} else {
			return false;
		}
	}

	public static function writeCache($file, $data, $duration = '10800') {
		$lineBreak = "\n";
		$data = serialize($data);
		$expires = time() + $duration;
		$contents = $expires . $lineBreak . $data . $lineBreak;
		$write = _DIR_ .'/data/'.$file;
		$result = fopen($write, 'w');

		if (is_writable($write)) {
			if (!$handle = fopen($write, 'a')) {
				return false;
			}
			if (fwrite($result, $contents) === false) {
				return false;
			}
			fclose($result);
			return true;
		} else {
			 return false;
		}
	}
	
	public static function getStringTime($timestamp){
		$diff 	= strtotime($timestamp) - time();
		
		if($diff < 0) $diff = 0;
		$day    = floor($diff / 86400);
		
		if($day < 1) $day = '';
		else $day = $day.'j';

		$diff   -= $day * 86400;
		$hour   = floor($diff / 3600);
		if($hour < 10) $hour = '0'.$hour;
		$diff   -= $hour * 3600;
		
		$minute = floor($diff / 60);
		if($minute < 10) $minute = '0'.$minute;
		$diff   -= $minute * 60;

		$second = $diff;
		if($second < 10) $second = '0'.$second;

		return trim($day.' '.$hour.':'.$minute.':'.$second);
		//return trim($minute.'m '.$second.'s');
	}

	public static function savings($auction, $product) {
		if($product['price'] > 0) {
			$data['percentage'] = 100 - ($auction['price'] / $product['price'] * 100);
			$data['price'] = $product['price'] - $auction['price'];
		} else {
			$data['percentage'] = 0;
			$data['price'] = 0;
		}

		$data['percentage'] = number_format($data['percentage'], 2);
		$data['price'] = $data['price'];

		return $data;
	}

	public static function niceShort($dateString = null, $userOffset = null) {
		global $config;
		$date = $dateString ? self::fromString($dateString, $userOffset) : time();

		$y = self::isThisYear($date) ? '' : ' Y';
		$timeFormat = "H:i:s".$y;

		if (self::isToday($date)) $ret = "" . date($timeFormat, $date);
		elseif (self::wasYesterday($date)) $ret = "Hier, " . date($timeFormat, $date);
		else $ret = date("d/m, ".$timeFormat, $date);
		
		return $ret;
	}

	public static function isPeakNow($returnDates = false) {
		if($returnDates == false) {
			$isPeakNow = self::readCache('peak');
		} else {
			$isPeakNow = null;
		}

		if(strlen($isPeakNow) == 0) {
			$data = array();
			$isPeakNow = 0;

			$auction_peak_start = self::readCache('auction_peak_start');
			if(!empty($auction_peak_start)) {
				$data['auction_peak_start'] = $auction_peak_start;
			} else {
				$auction_peak_start = database::getInstance()->getRow("SELECT value FROM ". DB_PREFIX ."settings WHERE name = 'auction_peak_start'");
				$auction = self::writeCache('auction_peak_start', $auction_peak_start['value']);
				$data['auction_peak_start'] = $auction_peak_start['value'];
			}

			$auction_peak_end = self::readCache('auction_peak_end');
			if(!empty($auction_peak_end)) {
				$data['auction_peak_end'] = $auction_peak_end;
			} else {
				$auction_peak_end = database::getInstance()->getRow("SELECT value FROM ". DB_PREFIX ."settings WHERE name = 'auction_peak_end'");
				$auction = self::writeCache('auction_peak_end', $auction_peak_end['value']);
				$data['auction_peak_end'] = $auction_peak_end['value'];
			}

			$auction_peak_start_time = explode(':', $data['auction_peak_start']);
			$auction_peak_end_time   = explode(':', $data['auction_peak_end']);
			$peak_start_hour   = $auction_peak_start_time[0];
			$peak_start_minute = $auction_peak_start_time[1];
			$peak_end_hour   = $auction_peak_end_time[0];
			$peak_end_minute = $auction_peak_end_time[1];
			$peak_length = $peak_end_hour - $peak_start_hour;

			if($peak_length <= 0) {
				$peak_start = date('Y-m-d') . ' ' . $data['auction_peak_start'] . ':00';
				$peak_end   = date('Y-m-d', time() + 86400) . ' ' . $data['auction_peak_end'] . ':00';
			} else {
				$peak_start = date('Y-m-d') . ' ' . $data['auction_peak_start'] . ':00';
				$peak_end   = date('Y-m-d') . ' ' . $data['auction_peak_end'] . ':00';
			}

			if($peak_end > date('Y-m-d H:i:s', time() + 86400)) $peak_end = date('Y-m-d', time()) . ' ' . $data['auction_peak_end'] . ':00';
			//if($peak_start > date('Y-m-d H:i:s')) $peak_start = date('Y-m-d', time() - 86400) . ' ' . $data['auction_peak_start'] . ':00';
			if($peak_start < date('Y-m-d H:i:s', time() - 86400)) $peak_start = date('Y-m-d') . ' ' . $data['auction_peak_start'] . ':00';
			if(strtotime($peak_end) - strtotime($peak_start) > 86400) $peak_end   = date('Y-m-d') . ' ' . $data['auction_peak_end'] . ':00';
			if(strtotime($peak_end) - strtotime($peak_start) > 86400) $peak_end   = date('Y-m-d H:i:s', strtotime($peak_end) - 86400);

			if($returnDates == true) {
				$data['date']       = date("Y-m-d H:i:s");
				$data['peak_end']   = $peak_end;
				$data['peak_start'] = $peak_start;
				return $data;
			}
			
			$now = time();
			if($now > strtotime($peak_start) && $now < strtotime($peak_end)) $isPeakNow = 1;
			self::writeCache('peak', $isPeakNow, 60);
		}
		return $isPeakNow;
	}

	public static function siteOnline() {
		$live = self::readCache('site_live');

		if(!empty($live)) return $live;
		else {
			$live = database::getInstance()->select('fetch', 'settings', 'value', array('name' => 'site_live'));
			$auction = self::writeCache('site_live', $live['value']);
			return $live['value'];
		}
	}

	public static function isThisYear($dateString, $userOffset = null) {
		$date = self::fromString($dateString, $userOffset);
		return  date('Y', $date) == date('Y', time());
	}

	public static function isToday($dateString, $userOffset = null) {
		$date = self::fromString($dateString, $userOffset);
		return date('Y-m-d', $date) == date('Y-m-d', time());
	}

	public static function wasYesterday($dateString, $userOffset = null) {
		$date = self::fromString($dateString, $userOffset);
		return date('Y-m-d', $date) == date('Y-m-d', strtotime('yesterday'));
	}

	public static function fromString($dateString, $userOffset = null) {
		if (is_integer($dateString) || is_numeric($dateString)) {
			$date = intval($dateString);
		} else {
			$date = strtotime($dateString);
		}
		return $date;
	}
	
	public static function curl($url, $type = 'get') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, urlencode($url));
		
		// keep session
		$pathCookie = _DIR_ .'cookies.txt';
		if (!file_exists(realpath($pathCookie))) touch($pathCookie);
		curl_setopt($curl, CURLOPT_COOKIESESSION, true);
		curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($pathCookie));
		curl_setopt($curl, CURLOPT_COOKIEFILE, realpath($pathCookie));
		
		switch ($type) {
			case 'get':
				curl_setopt($ch, CURLOPT_HEADER, 1);
				curl_setopt($ch, CURLOPT_NOBODY, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
				//curl_setopt($ch, CURLOPT_TIMEOUT, 60);
				$agents = array(
					$_SERVER['HTTP_USER_AGENT'],
					'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1',
					'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
					'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
					'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'
				);
				curl_setopt($ch, CURLOPT_USERAGENT, $agents[array_rand($agents)]);
				$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
				$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
				$header[] = "Cache-Control: max-age=0";
				$header[] = "Connection: keep-alive";
				$header[] = "Keep-Alive: 300";
				$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
				$header[] = "Accept-Language: en-us,en;q=0.5";
				$header[] = "Pragma: ";
				curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
				//curl_setopt($ch, CURLOPT_REFERER, 'https://www.domain.com/');
				break;
			
			case 'post':
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_POST, 1);
				$postfields = array(
					'username' => 'test',
					'password' => 'test',
					'login' => '1'
				);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
				break;
		}
		
		$result = curl_exec($ch);
		$error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		//var_dump($_SERVER);
		
		if($error) echo $error;
		else echo $http_code;
		//$page = new DOMDocument();
		//$page->loadHTML($result);
	}
}

?>
