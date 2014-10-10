<?php

class userController extends appController 
{	
	public $models = array('user', 'bid', 'category', 'source', 'country');
	public $libs = array('facebook');
	
	function index() {
		if(isset($_SESSION['user_id'])) {
			$userID = $_SESSION['user_id'];
			
			$this->smarty->assign(array(
				'active' => 6,
				'profile' => $this->user->getById($userID),
				'unpaid' => $this->user->checkStatus($userID, 4),
				'uncomment' => $this->user->checkStatus($userID, 5),
				'packages' => $this->user->checkPackages($userID),
				'address' => $this->user->checkAddress($userID),
				'messages' => $this->user->checkMessages($userID)
			));
			$this->smarty->display('user/index.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function mail() {
		$mail = tools::sendMail("giotsar@gmail.com", 'registration', array('username' => 'giorgio', 'key' => '123456789'));
		echo $mail;
	}

	function edit() {
		if (isset($_SESSION['user_id'])) {
			$userID = $_SESSION['user_id'];
			
			if (!empty($_POST)) {
				$data = tools::filter($_POST);
				$toCheck = array(
					$data['firstname'] => 'var',
					$data['lastname'] => 'var',
					$data['email'] => 'email',
					$data['address'] => 'var',
					$data['postcode'] => 'int',
					$data['city'] => 'var',
					$data['country'] => 'int'
				);
				
				$errors = tools::validate($toCheck);
				if (empty($errors)) {
					// check if the email was changed and send verification code
					$oldData = $this->user->getById($userID);
					if ($data['email'] != $oldData['email']) {
						$key = mt_rand();
						
						tools::sendMail($data['email'], 'email_verification', array(
							'username' => $oldData['username'],
							'key' => $key
						));
						
						$this->user->update($userID, array('active' => 0, 'validation_key' => $key));
					}
					
					$toUpdate = array(
						'lastname' => $data['lastname'],
						'firstname' => $data['firstname'],
						'email' => $data['email'],
						'birthday' => $data['birthday'],
						'phone' => $data['phone'],
						'address' => $data['address'],
						'postcode' => $data['postcode'],
						'city' => $data['city'],
						'country' => $data['country'],
						'newsletter' => $data['newsletter'],
						'source' => $data['source']
					);
					
					if ($this->user->update($userID, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
					else tools::setFlash($this->l('An error has occurred'), 'error');
					tools::redirect('/user/edit');
				} else {
					$message = '';
					foreach ($errors as $error) $message .= $this->l($error).'<br>';
					tools::setFlash($message, 'error');
					tools::redirect('/user/edit');
				}
			}
			
			$this->smarty->assign(array(
				'data' => $this->user->getById($userID),
				'countries' => $this->country->getAll(),
				'categories' => $this->category->getAll()
			));
			$this->smarty->display('user/edit.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function edit_password() {
		if(isset($_SESSION['user_id'])) {
			$userID = $_SESSION['user_id'];
			
			if(!empty($_POST)) {
				$data = tools::filter($_POST);
				$toCheck = array(
					'password' => $data['old_password'],
					'password' => $data['new_password']
				);
				$errors = tools::validate($toCheck);
				
				if (empty($errors)) {
					$user = $this->user->getById($userID);
					if (crypt($data['old_password'], $user['ppasswd']) == $user['ppasswd']) {
						if ($this->user->update($userID, array('ppasswd' => tools::generateHash($data['new_password'])))) {
							tools::setFlash($this->l('Request processed'), 'success');
							tools::redirect('/account');
						} else {
							tools::setFlash($this->l('An error has occurred'), 'error');
							tools::redirect('/user/edit_password');
						}
					} else {
						tools::setFlash($this->l('Wrong old password'), 'error');
					}
				} else {
					$message = '';
					foreach ($errors as $error) $message .= $this->l($error).'<br>';
					tools::setFlash($message, 'error');
				}
			}
			
			$this->smarty->display('user/edit_password.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function credits() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			if(isset($_GET['page'])) $page = tools::filter($_GET['page']);
			else $page = 1;
			$sql = "SELECT description, credit, created FROM ". DB_PREFIX ."bids";
			$conditions = "WHERE user_id=".$user_id." AND credit > 0 AND debit = 0 ORDER BY created DESC";
			list($bids_data, $pagination) = tools::paginate($sql, $conditions, "". DB_PREFIX ."bids", $page, $this->settings['app']['per_page']);
			
			$bids = array();
			$total = 0;
			$i=0;
			foreach($bids_data as $bid) {
				$bids[$i]['credit'] = $bid['credit'];
				$bids[$i]['created'] = $bid['created'];
				
				$explode = explode('#', $bid['description']);
				if($explode[0] == 'package') {
					$bids[$i]['description'] = PACKAGE_BUY;
					$bids[$i]['details'] = $bid['credit']. BUY_CREDITS;
				} elseif($explode[0] == 'package_win') {
					$bids[$i]['description'] = PACKAGE_WIN;
					$bids[$i]['details'] = '<a href="/'.$bid['auction_id'].'">'.$explode[1].'</a>';
				} elseif($explode[0] == 'credits_deal') {
					$bids[$i]['description'] = CREDITS_DEAL;
					$product = $this->exec_one("SELECT p.name FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$bid['auction_id']." AND p.id=a.product_id");
					$bids[$i]['details'] = VALUE_OF ." <a href=\"/".$bid['auction_id']."\">".$product['name']."</a>";
				} elseif($explode[0] == 'podium') {
					$bids[$i]['description'] = PODIUM;
					if($explode[1] == 'second') $bids[$i]['details'] = "<a href=\"/".$bid['auction_id']."\">". SECOND_PODIUM ."</a>";
					elseif($explode[1] == 'third') $bids[$i]['details'] = "<a href=\"/".$bid['auction_id']."\">". THIRD_PODIUM ."</a>";
				} elseif($explode[0] == 'recredited') {
					$bids[$i]['description'] = "<a href=\"/".$bid['auction_id']."\">".$explode[1]."</a>";
					$bids[$i]['details'] = '';
				} elseif($explode[0] == 'free') {
					if($explode[1] == 'coupon') {
						$bids[$i]['description'] = COUPON;
						$bids[$i]['details'] = $explode[2];
					} elseif($explode[1] == 'register') {
						$bids[$i]['description'] = REGISTER;
						$bids[$i]['details'] = $bid['credit']. OFFERED_CREDITS;
					} elseif($explode[1] == 'package') {
						$bids[$i]['description'] = $explode[2];
						$bids[$i]['details'] = $bid['credit']. OFFERED_CREDITS;
					}
				} elseif($explode[0] == 'referral') {
					$bids[$i]['description'] = REFERRAL;
					$bids[$i]['details'] = $bid['credit']. OFFERED_CREDITS;
				} else {
					$bids[$i]['description'] = MISC;
					$bids[$i]['details'] = $explode[0];
				}
				
				$total += $bid['credit'];			
				$i++;
			}
			
			$this->smarty->assign(array(
				'bids'       => $bids,
				'total'      => $total,
				'pagination' => $pagination
			));
			$this->smarty->display('user/credits.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function debits() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			if(isset($_GET['page'])) $page = tools::filter($_GET['page']);
			else $page = 1;
			$sql = "SELECT auction_id, description, debit, created FROM ". DB_PREFIX ."bids";
			if(isset($_GET['auction_id'])) $conditions = "WHERE user_id=".$user_id." AND debit > 0 AND credit = 0 AND auction_id=".$_GET['auction_id']." ORDER BY created DESC";
			else $conditions = "WHERE user_id=".$user_id." AND debit > 0 AND credit = 0 ORDER BY created DESC";
			list($bids, $pagination) = tools::paginate($sql, $conditions, "". DB_PREFIX ."bids", $page, $this->settings['app']['per_page']);
			
			$this->smarty->assign(array(
				'bids' => $bids,
				'pagination' => $pagination
			));
			$this->smarty->display('user/debits.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function messages() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			$messages = $this->exec_all("SELECT * FROM ". DB_PREFIX ."messages WHERE receiver_id=".$user_id." ORDER BY created DESC");
		
			$this->smarty->assign(array(
				'messages' => $messages
			));
			$this->smarty->display('user/messages.tpl');
			
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function view_message($id) {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			if(isset($_POST['message'])) {
				$message = $this->exec_one("SELECT id, object, receiver_id FROM ". DB_PREFIX ."messages WHERE id=".$id."");
				if(!empty($message)) {
					$post_data = tools::filter($_POST);
					$this->exec("INSERT INTO ". DB_PREFIX ."messages (object, message, sender_id, receiver_id, discuss_id, created) 
					VALUES('".$message['object']."', '".$_POST['message']."', '".$user_id."', '1', '".$message['id']."', '".date("Y-m-d H:i:s")."')");
					tools::setFlash(SUCCESS_SENT, 'success');
					tools::redirect('/messages');
				}
			}
			
			$message = $this->exec_one("SELECT id, object, message FROM ". DB_PREFIX ."messages WHERE id=".$id."");
			$this->exec("UPDATE ". DB_PREFIX ."messages SET open=1 WHERE id=".$id."");
		
			$this->smarty->assign(array(
				'message' => $message
			));
			$this->smarty->display('user/view_message.tpl');
			
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function referrals() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			$referrals_data = $this->exec_all("SELECT r.user_id, u.username, DATE_FORMAT(u.created, '%d/%m/%Y') AS date_buy, r.confirmed, DATE_FORMAT(r.created, '%d/%m/%Y') AS date_register FROM ". DB_PREFIX ."referrals r, ". DB_PREFIX ."users u WHERE r.referrer_id = ".$user_id." AND u.id = r.user_id");
			
			$referrals = array();
			$i=0;
			foreach($referrals_data as $referral) {
				$referrals[$i]['username'] = $referral['username'];
				$referrals[$i]['date_register'] = $referral['date_register'];
				$referrals[$i]['date_buy'] = $referral['date_buy'];
				$referrals[$i]['confirmed'] = $referral['confirmed'];
				$referrals_credits = $this->exec_one("SELECT SUM(credit) as total FROM ". DB_PREFIX ."bids WHERE user_id=".$referral['user_id']." AND description LIKE 'free#referral#".$referral['user_id']."'");
				if(!empty($referrals_credits)) $referrals[$i]['won_credits'] = $referrals_credits['total'];
				else $referrals[$i]['won_credits'] = 0;				
				$i++;
			}
			
			$this->smarty->assign(array(
				'referrals' => $referrals
			));
			$this->smarty->display('user/referrals.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function invit() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			$ers = array();
			$oks = array();
			$import_ok = false;
			
			if (isset($_POST['message']) && isset($_POST['friends_email'])){		
				$emails = explode(",", $_POST['friends_email']);
				$message = tools::filter($_POST['message']);
				
				foreach($emails as $email) {
					tools::sendMail($email, 'Invitation', $message);
				}
				$oks['emails_sent'] = "message(s) envoyé(s)";
			}
			
			include _DIR_ .'/tools/openinviter/openinviter.php';
			$inviter = new OpenInviter();
			$oi_services = $inviter->getPlugins();
			
			if(isset($_POST['provider_box'])) {
				if(isset($oi_services['email'][$_POST['provider_box']])) $plugType='email';
				elseif (isset($oi_services['social'][$_POST['provider_box']])) $plugType='social';
				else $plugType='';
			} else $plugType = '';
			
			if (isset($_POST['email_box']) && isset($_POST['password_box']) && isset($_POST['provider_box'])) {
				if(empty($_POST['email_box'])) $ers['email'] = "Email missing!";
				if(empty($_POST['password_box'])) $ers['password'] = "Password missing!";
				if(empty($_POST['provider_box'])) $ers['provider'] = "Provider missing!";
				if(count($ers)==0) {
					$inviter->startPlugin($_POST['provider_box']);
					$internal=$inviter->getInternalError();
					if($internal) $ers['inviter']=$internal;
					elseif(!$inviter->login($_POST['email_box'],$_POST['password_box'])) {
						$internal=$inviter->getInternalError();
						$ers['login'] = ($internal?$internal:"Erreur lors de la connexion. Vérifiez votre email et votre mot de passe puis essayez de nouveau");
					} elseif(false === $contacts = $inviter->getMyContacts()) $ers['contacts'] = "Impossible d'importer les contacts!";
					else {
						$import_ok = true;
						$_POST['oi_session_id'] = $inviter->plugin->getSessionID();
						$_POST['message_box'] = '';
					}
				}
			}
			
			$contents = '';
			if($import_ok) {
				if($inviter->showContacts()) {
					if(count($contacts) == 0) $contents .= "Vous n'avez pas de contacts dans votre carnet d'adresses";
					else foreach($contacts as $email=>$name) $contents .= "{$email}, ";
				}
			}
			
			$this->smarty->assign(array(
				'contents'    => $contents,
				'import_ok'   => $import_ok,
				'errors'      => $ers,
				'success'     => $oks,
				'plugType'    => $plugType,
				'oi_services' => $oi_services,
			));
			$this->smarty->display('user/invit.tpl');
		} else {
			tools::setFlash($this->l('Please log in to access this area'), 'error');
			tools::redirect('/user/login');
		}
	}
	
	function add_testimonial($id) {
		if(!empty($id)) {
			if(isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				
				if(!empty($_POST)) {
					$post_data = tools::filter($_POST);
					
					if(isset($_FILES['image'])) {
						$dir = 'upload/';
						$file = basename($_FILES['image']['name']);
						$max_size = 1000000;
						$size = filesize($_FILES['image']['tmp_name']);
						$extensions = array('.png', '.gif', '.jpg', '.jpeg');
						$extension = strrchr($_FILES['image']['name'], '.'); 

						if(!in_array($extension, $extensions)) $message = WRONG_UPLOAD;
						if($size>$max_size) $message = BIG_FILE;
						if(!isset($message)) {
							$file = strtr($file, 
							  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
							  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
							$file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
							$date = date("dmYHis");
							$tmp_file = explode(".", $file);
							$new_file = $tmp_file[0]."-".$date.".".$tmp_file[1];
							if(move_uploaded_file($_FILES['image']['tmp_name'], $dir.$new_file)) {
								$date = date("Y-m-d H:i:s");
								$image_link = $new_file;
							} else {
								tools::setFlash(ERROR_UPLOAD, 'error');
								tools::redirect('/user/add_testimonial/'.$post_data['auction_id']);
							}
						}
					} else $image_link = null;
					
					$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."testimonials (user_id, auction_id, text, image, note, active, created)
												VALUES('".$user_id."',
													   '".$id."',
													   '".$post_data['text']."', 
													   '".$image_link."', 
													   '".$post_data['note']."', 
													   '1', 
													   '".date("Y-m-d H:i:s")."')");
					tools::setFlash(SUCCESS_ADD_TESTIMONIAL, 'success');
					tools::redirect('/account');
				}
				
				/*
				$auction = $this->exec_one("SELECT id, winner_id FROM ". DB_PREFIX ."auctions WHERE id= ".$id."");	
				if($user_id != $auction['winner_id']) {
					tools::setFlash(ERROR_WINNER , 'error');
					tools::redirect('/account');
				}
				*/
				
				$testimonial = $this->exec_one("SELECT id FROM ". DB_PREFIX ."testimonials WHERE user_id=".$user_id." AND auction_id=".$id."");
				if(!empty($testimonial)) {
					tools::setFlash(ALREADY_LEAVE_COMMENT , 'error');
					tools::redirect('/account');
				}
				
				$this->smarty->assign(array(
					'id' => tools::filter($id)
				));
				$this->smarty->display('user/add_testimonial.tpl');
			} else {
				tools::setFlash($this->l('Please log in to access this area'), 'error');
				tools::redirect('/user/login');
			}
		} else tools::redirect('/');
	}
	
	function facebook() {
		$facebook = new Facebook(array(
		  'appId' => $this->settings['facebook']['app_id'],
		  'secret' => $this->settings['facebook']['secret'],
		));
		
		$user = $facebook->getUser();
		if(!$user) {
			$url = $facebook->getLoginUrl();
			tools::redirect($url); 
		} else {
			try {
				$me = $facebook->api('/me');
		    } catch(FacebookApiException $e) {
				throw new Exception($e);
		    }
		  
		    if($me) {
				$user = $this->user->getByUsername($me['username']);
				if(!$user) $user = $this->user->getByName($me['last_name']);
				if($user) {
					if ($user['active'] == 0) {
						tools::setFlash($this->l('Account not active'), 'error');
						tools::redirect('/user/login');
					} else {				
						// create user session
						$_SESSION['user_id'] = $user['id'];
						$_SESSION['username'] = $user['username'];
						if($user['admin'] == 1) $_SESSION['admin'] = true;
						
						// increment online users number
						tools::writeCache('user_count_'.$user['id'], $user['id'], 300);
						
						// log user access
						$this->user->logAccess();
						
						tools::setFlash($this->l('Logged in successfully'), 'success');
						tools::redirect('/account');
					}
				} else {
					$random = substr(session_id(),0,8);
					$username = (empty($me['username'])) ? strtolower(substr($me['first_name'], 0, 1)).strtolower($me['last_name']) : $me['username'];
					
					$toInsert = array(
						'username' => $username,
						'firstname' => $me['first_name'],
						'lastname' => $me['last_name'],
						'ppasswd' => tools::generateHash($random),
						'email' => $me['email'],
						'ip' => $_SERVER['REMOTE_ADDR'],
						'created' => date("Y-m-d H:i:s")
					);
					
					if ($this->user->add($toInsert)) {		
						$userID = database::getInstance()->lastInsertId();
						
						// add free signup credits			
						$this->bid->add(array(
							'user_id' => $userID,
							'description' => 'free#signup',
							'credit' => $this->settings['app']['free_signup_credits']
						));
						
						
						// create user session
						$_SESSION['user_id'] = $userID;
						$_SESSION['username'] = $username;
						
						tools::setFlash($this->l('Thanks for signing up! You can place bids'), 'success');
						tools::redirect('/');
					} else {
						tools::setFlash($this->l('An error has occurred'), 'error');
						tools::redirect('/');
					}
				}
			} else {
				tools::setFlash($this->l('no facebook data'), 'error');
				tools::redirect('/');
			}
		  
		}
	}
	
	function login() {
		if (isset($_SESSION['user_id'])) tools::redirect('/account');
		
		if (!empty($_POST)) {
			$data = tools::filter($_POST);
			$user = $this->user->getByUsername($data['username']);
			
			if (!$user) {
				tools::setFlash($this->l('Username does not exist'), 'error');
				tools::redirect('/user/login');
			} else {
				if ($user['active'] == 0) {
					tools::setFlash($this->l('Account not active'), 'error');
					tools::redirect('/user/login');
				} else {
					// php > 5.5 -> if (password_verify($data['password'], $sql['ppasswd'])) {
					if (crypt($data['password'], $user['ppasswd']) == $user['ppasswd']) {
						$_SESSION['user_id'] = $user['id'];
						$_SESSION['username'] = $data['username'];
						if($user['admin'] == 1) $_SESSION['admin'] = true;
						
						// increment online users number
						tools::writeCache('user_count_'.$user['id'], $user['id'], 300);
						
						// log access
						$this->user->logAccess();
						
						// if account not completed redirect to form
						if (empty($user['firstname'])) {
							tools::setFlash($this->l('Please complete your profile'), 'error');
							tools::redirect('/user/edit');
						} else {
							tools::setFlash($this->l('Logged in successfully'), 'success');
							tools::redirect('/account');
						}
					} else {
						tools::setFlash($this->l('Wrong password'), 'error');
						tools::redirect('/user/login');
					}
				}
			}
		}
		
		$this->smarty->display('user/login.tpl');
	}
	
	function logout() {
		unlink(_DIR_ .'/data/user_count_'.$_SESSION['user_id']);
		$_SESSION = array();
		tools::setFlash($this->l('Logged out successfully'), 'success');
		tools::redirect('/');
	}
	
	function signup() {
		if (isset($_SESSION['user_id'])) tools::redirect('/account');
		
		if (!empty($_POST)) {
			$data = tools::filter($_POST);
			$toCheck = array(
				'username' => $data['username'],
				'password' => $data['password'],
				'email' => $data['email'],
				'req' => $data['terms'],
				'account' => $_SERVER['REMOTE_ADDR']
			);
			
			// check captcha if activated
			if ($this->settings['app']['captcha']) $toCheck['captcha'] = $data['captcha'];
			
			// validate the sent data
			$errors = tools::validate($toCheck);
			
			if (empty($errors)) {
				$key = mt_rand();
				$toInsert = array(
					'username' => $data['username'],
					'ppasswd' => tools::generateHash($data['password']),
					'email' => $data['email'],
					'validation_key' => $key,
					'ip' => $_SERVER['REMOTE_ADDR'],
					'created' => date("Y-m-d H:i:s")
				);
				
				if ($this->user->add($toInsert)) {
					// get user id
					$userID = database::getInstance()->lastInsertId();
					
					// add referrer if isset
					if (isset($_SESSION['referrer'])) {
						$this->user->addReferral(array(
							'user_id' => $userID,
							'referrer_id' => $_SESSION['referrer']
						));
						unset($_SESSION['referrer']);
					}
					
					// add free signup credits			
					$this->bid->add(array(
						'user_id' => $userID,
						'description' => 'free#signup',
						'credit' => $this->settings['app']['free_signup_credits']
					));
					
					// send signing email to user
					tools::sendMail($data['email'], 'registration', array(
						'username' => $data['username'],
						'key' => $key
					));
					
					tools::setFlash($this->l('Thanks for signing up! Please check your email and click Activate Account in the message we just sent to you'), 'success');
					tools::redirect('/');
				} else {
					tools::setFlash($this->l('An error has occurred'), 'error');
					tools::redirect('/user/signup');
				}				
			} else {
				$message = '';
				foreach ($errors as $error) $message .= $this->l($error).'<br>';
				tools::setFlash($message, 'error');
				$this->smarty->assign('data', $data);
			}
		}
		
		$this->smarty->assign('active', 7);
		$this->smarty->display('user/signup.tpl');
	}
	
	function activate($key) {
		if(isset($key)) {
			$user = $this->user->getByKey(tools::filter($key));
			if(!empty($user)) {
				$this->user->update($user['id'], array('active' => 1, 'validation_key' => null));
				
				// add credits to referrer
				$referrerID = $this->user->getReferrer($user['id']);
				if(!empty($referrerID)) {
					$this->bid->add(array(
						'user_id' => $referrerID,
						'description' => 'free#referral#'.$user['id'],
						'credit' => $this->settings['app']['free_referral_register_credits']
					));
					unlink(_DIR_ .'/data/bids_balance_'.$referrerID);
				}
				
				// create user session
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				
				// log user access
				$this->user->logAccess();
				
				tools::setFlash(SUCCESS_ACTIVE, 'success');
				tools::redirect('/user/edit');
			} else {
				tools::setFlash(INVALID_KEY, 'error');
				tools::redirect('/');
			}
		} else tools::redirect('/');
	}
	
	function reset() {
		if (isset($_POST['email'])) {
			$email = tools::filter($_POST['email']);
			$errors = tools::validate(array('email' => $email), false);
			
			if (!empty($errors)) {
				tools::setFlash($this->l('Invalid email'), 'error');
				tools::redirect('/user/reset');
			}
			
			if ($user = $this->user->getByEmail($email)) {
				$newPassword = substr(session_id(), 0, 8);
				
				if ($this->user->update($user['id'], array('ppasswd' => tools::generateHash($newPassword)))) {
					// send new password to user
					tools::sendMail($user['email'], 'password_reset', array(
						'username' => $user['username'],
						'password' => $newPassword
					));
					tools::setFlash($this->l('A new password sent to you by email'), 'success');
				} else {
					tools::setFlash($this->l('An error has occurred'), 'error');
				}
			} else {
				tools::setFlash($this->l('Email does not exist'), 'error');
			}
			tools::redirect('/user/reset');
		}
		
		$this->smarty->display('user/reset.tpl');
	}
	
	public function unsubscribe() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$user = $this->user->getByEmail($data['email']);
			if($user) {
				if($this->user->update($user['id'], array('newsletter' => 0))) {
					tools::setFlash($this->l('Successfully unsubscribed'), 'success');
				} else {
					tools::setFlash($this->l('An error has occurred'), 'error');
				}
			} else {
				tools::setFlash($this->l('Email does not exist'), 'error');
			}
			tools::redirect('/user/unsubscribe');
		}
		
		$this->smarty->display('user/unsubscribe.tpl');
	}
	
	public function captcha() {
		$fonts = array( _DIR_ .'/assets/fonts/VeraBd.ttf', _DIR_ .'/assets/fonts/VeraIt.ttf', _DIR_ .'/assets/fonts/Vera.ttf');
		tools::captcha($fonts, 5, 220, 50);
	}
	
	function admin_index() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'username' => $data['username'],
				'ppasswd' => tools::generateHash($data['password']),
				'firstname' => $data['first_name'],
				'lastname' => $data['last_name'],
				'gender' => $data['gender_id'],
				'email' => $data['email'],
				'active' => $data['active'],
				'created' => date("Y-m-d H:i:s")
			);
			
			if ($this->user->create($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/user');
		}
		
		if(isset($_POST['search'])) {
			$conditions = "AND username LIKE '%".$_POST['search']."%' OR first_name LIKE '%".$_POST['search']."%' OR last_name LIKE '%".$_POST['search']."%' OR email LIKE '%".$_POST['search']."%' OR ip LIKE '%".$_POST['search']."%'";
		} elseif(isset($_POST['actions'])) {
			if($_POST['actions'] == 'activated') {
				$conditions = "AND active=1 AND first_name != ''";
			} elseif($_POST['actions'] == 'not_confirmed') {
				$conditions = "AND active=0 AND first_name = ''";
			} elseif($_POST['actions'] == 'not_completed') {
				$conditions = "AND active=1 AND first_name = ''";
			} elseif($_POST['actions'] == 'suspended') {
				$conditions = "AND active=0 AND first_name != ''";
			} elseif($_POST['actions'] == 'today') {
				$day        = date("Y-m-d");
				$conditions = "AND created BETWEEN '".$day." 00:00:00' AND '".$day." 23:59:59'";
			} elseif($_POST['actions'] == 'yesterday') {
				$startTime  = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
				$endTime    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
				$conditions = "AND created BETWEEN '".$startTime."' AND '".$endTime."'";
			}  elseif($_POST['actions'] == 'this_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));	
				$conditions = "AND created BETWEEN '".$firstDay."' AND '".$lastDay."'";
			}  elseif($_POST['actions'] == 'last_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1-7, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d")-7, date("Y")));	
				$conditions = "AND created BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_month') {
				$month      = date("Y-m");
				$conditions = "AND DATE_FORMAT(created, '%Y-%m') = '".$month."'";
			} elseif($_POST['actions'] == 'last_month') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
				$lastDay    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
				$conditions = "AND created BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_year') {
				$year = date("Y");
				$conditions = "AND DATE_FORMAT(created, '%Y') = '".$year."'";
			} elseif($_POST['actions'] == 'last_year') {
				$year = date("Y")-1;
				$conditions = "AND DATE_FORMAT(created, '%Y') = '".$year."'";
			}
		} elseif(isset($_GET['referrer_id'])) {
			$referrals_ids = $this->exec_all("SELECT user_id FROM ". DB_PREFIX ."referrals WHERE referrer_id=".$_GET['referrer_id']."");
			$ids = "";
			$i=0;
			foreach($referrals_ids as $id) {
				if($i==0) $ids .= "'".$id['user_id']."'";
				else $ids .= ", '".$id['user_id']."'";
				$i++;
			}
			$conditions = "AND id IN (".$ids.")";
		} elseif(isset($_GET['coupon_id'])) {
			$users_ids = $this->exec_all("SELECT user_id FROM ". DB_PREFIX ."coupons_submitted WHERE coupon_id=".$_GET['coupon_id']."");
			$ids = "";
			$i=0;
			foreach($users_ids as $id) {
				if($i==0) $ids .= "'".$id['user_id']."'";
				else $ids .= ", '".$id['user_id']."'";
				$i++;
			}
			$conditions = "AND id IN (".$ids.")";
		} else $conditions = "";
		
		$users = $this->exec_all("SELECT id, username, firstname, lastname, email, ip, newsletter, admin, DATE_FORMAT(birthday, '%d/%m/%Y') AS date_of_birth, DATE_FORMAT(created, '%d/%m/%Y') AS register_date, active, blacklist  
								  FROM ". DB_PREFIX ."users WHERE autobidder=0 AND blacklist=0 AND username != 'admin' ".$conditions."");
		
		$this->smarty->assign(array(
			'users' => $users
		));
		$this->smarty->display('admin/users/users.tpl');
	}
	
	function admin_blacklist() {
		$blacklisted = $this->exec_all("SELECT * FROM ". DB_PREFIX ."users WHERE blacklist=1");
		
		$this->smarty->assign(array(
			'blacklisted' => $blacklisted
		));
		
		$this->smarty->display('admin/users/blacklist.tpl');
	}
	
	function admin_add() {
		$this->smarty->display('admin/users/add.tpl');
	}
	
	function admin_view($user_id) {
		$user = $this->exec_one("SELECT id, username, firstname, lastname, phone, mobile, gender, birthday, source, desired_category_id, created, last_access FROM ". DB_PREFIX ."users WHERE id=".$user_id."");
		if(!empty($user['desired_category_id'])) {
			$category = $this->exec_one("SELECT name FROM ". DB_PREFIX ."categories WHERE id=".$user['desired_category_id']."");
			$user['desired_category'] = $category['name'];
		}
		
		if(!empty($user['source_id'])) {
			$source = $this->exec_one("SELECT name FROM ". DB_PREFIX ."sources WHERE id=".$user['source_id']."");
			$user['source'] = $source['name'];
		}
		
		$referrer = $this->exec_one("SELECT r.referrer_id, u.username FROM ". DB_PREFIX ."referrals r, ". DB_PREFIX ."users u WHERE r.user_id=".$user['id']." AND u.id=r.referrer_id");
		if(!empty($referrer['referrer_id'])) {
			$user['referrer_id'] = $referrer['referrer_id'];
			$user['referrer_username'] = $referrer['username'];
		}
		
		$referrals = $this->exec_one("SELECT count(id) as total FROM ". DB_PREFIX ."referrals WHERE referrer_id=".$user['id']."");
		$user['referrals'] = $referrals['total'];
		
		$address = $this->exec_one("SELECT address, postcode, city FROM ". DB_PREFIX ."addresses WHERE user_id=".$user_id."");
		if($address) {
			$user['address'] = $address['address'];
			$user['postcode'] = $address['postcode'];
			$user['city'] = $address['city'];
		}
		
		$balance = $this->exec_one("SELECT SUM(credit) - SUM(debit) AS balance FROM ". DB_PREFIX ."bids WHERE user_id=".$user_id."");
		$user['balance'] = $balance['balance'];
		
		$total_buy_credits_sql = $this->exec_all("SELECT p.price FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."packages p 
												  WHERE b.description LIKE 'package#%' AND credit > 0 AND b.user_id=".$user_id." AND p.bids=b.credit");
		$total_buy_credits = 0;
		foreach($total_buy_credits_sql as $amount) $total_buy_credits += $amount['price'];
		$user['total_buy_credits'] = $total_buy_credits;
		
		$total_offered_credits_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids 
												      WHERE description NOT LIKE 'package#%' AND credit > 0 AND user_id=".$user_id."");
		$total_offered_credits = 0;
		foreach($total_offered_credits_sql as $amount) $total_offered_credits += $amount['credit'];
		$user['total_offered_credits'] = $total_offered_credits;
		
		$credits = $this->exec_one("SELECT count(id) as amount FROM ". DB_PREFIX ."bids WHERE user_id=".$user_id." AND debit > 0 AND auction_id != 0");
		$user['spent_credits'] = $credits['amount'];
		
		$win_auctions = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."auctions WHERE closed=1 AND status_id > 3 AND winner_id=".$user_id."");
		$user['win_auctions'] = $win_auctions['count'];
		
		$total_win_amount_sql = $this->exec_all("SELECT p.price FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p 
												 WHERE a.closed=1 AND a.winner_id=".$user_id." AND p.id=a.product_id");
		$total_win_amount = 0;
		foreach($total_win_amount_sql as $amount) $total_win_amount += $amount['price'];
		$user['total_win_amount'] = $total_win_amount;
		
		$debits_data = $this->exec_all("SELECT * FROM ". DB_PREFIX ."bids WHERE user_id=".$user_id." AND debit > 0");
		$debits = array();
		$i=0;
		foreach($debits_data as $debit) {
			$debits[$i]['id'] = $debit['id'];
			$debits[$i]['auction_id'] = $debit['auction_id'];
			$debits[$i]['description'] = $debit['description'];
			$debits[$i]['debit'] = $debit['debit'];
			$debits[$i]['created'] = $debit['created'];
			$i++;
		}
		
		$credits_data = $this->exec_all("SELECT id, auction_id, description, credit, created FROM ". DB_PREFIX ."bids WHERE user_id=".$user_id." AND credit > 0 ORDER BY id DESC");
		$credits = array();
		$j=0;
		foreach($credits_data as $credit) {
			$credits[$j]['id'] = $credit['id'];
			$credits[$j]['auction_id'] = $credit['auction_id'];
			
			$explode = explode('#', $credit['description']);
			if ($explode[0] == 'package') {
				$description = PACKAGE_BUY;
				$details = $credit['credit']. BUY_CREDITS;
			} elseif ($explode[0] == 'package_win') {
				$description = PACKAGE_WIN;
				$details = '<a href="/auctions/view/'.$credit['auction_id'].'">'.$explode[1].'</a>';
			} elseif ($explode[0] == 'credits_deal') {
				$description = CREDITS_DEAL;
				$product = $this->exec_one("SELECT p.name FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$credit['auction_id']." AND p.id=a.product_id");
				$details = VALUE_OF ." <a href=\"/auctions/view/".$credit['auction_id']."\">".$product['name']."</a>";
			} elseif ($explode[0] == 'podium') {
				$description = PODIUM;
				if ($explode[1] == 'second') $details = "<a href=\"/auctions/view/".$credit['auction_id']."\">". SECOND_PODIUM ."</a>";
				elseif ($explode[1] == 'third') $details = "<a href=\"/auctions/view/".$credit['auction_id']."\">". THIRD_PODIUM ."</a>";
			} elseif ($explode[0] == 'recredited') {
				$description = "<a href=\"/auctions/view/".$credit['auction_id']."\">".$explode[1]."</a>";
				$details = '';
			} elseif ($explode[0] == 'free') {
				if ($explode[1] == 'coupon') {
					$description = COUPON;
					$details = $explode[2];
				} elseif($explode[1] == 'register') {
					$description = REGISTER;
					$details = $credit['credit']. OFFERED_CREDITS;
				} elseif($explode[1] == 'package') {
					$description = $explode[2];
					$details = $credit['credit']. OFFERED_CREDITS;
				} else {
					$description = '';
					$details = '';
				}
			} elseif($explode[0] == 'referral') {
				$description = REFERRAL;
				$details = $credit['credit']. OFFERED_CREDITS;
			} else {
				$description = MISC;
				$details = $explode[0];
			}
			
			$credits[$j]['description'] = $description;
			$credits[$j]['details'] = $details;
			$credits[$j]['credit'] = $credit['credit'];
			$credits[$j]['created'] = $credit['created'];
			$j++;
		}
		
		$this->smarty->assign(array(
			'user' 	       => $user,
			'debits' 	   => $debits,
			'credits'      => $credits
		));
		$this->smarty->display('admin/users/view.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'username' => $data['username'],
				'email' => $data['email'],
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'gender_id' => $data['gender_id'],
				'active' => $data['active'],
				'admin' => $data['admin']
			);
			$this->user->update($id, $toUpdate);
			
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/user');
		}
		
		$this->smarty->assign('user', $this->user->getData($id));
		$this->smarty->display('admin/users/edit_user.tpl');
	}
	
	function admin_add_transaction($user_id) {
		if(!empty($_POST)) {
				$data = tools::filter($_POST);
				if($data['total'] > 0) {
					$credit = $data['total'];
					$debit = '';
				} elseif($data['total'] < 0) {
					$credit = '';
					$debit = str_replace("-", "", $data['total']);
				}
				$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, debit, created) 
											VALUES('".$user_id."', '".$data['description']."', '".$credit."', '".$debit."', '".date("Y-m-d H:i:s")."')");
				
				unlink(_DIR_ .'/data/bids_balance_'.$user_id);
				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/admin/user/view/'.$user_id);
		}
	}
	
	function admin_delete_transaction($id) {
		$sql_request = $this->exec("DELETE FROM ". DB_PREFIX ."bids WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/user');
	}
	
	function admin_export() {
		$users_data = $this->exec_all("SELECT id, 
											  username, 
											  firstname, 
											  lastname, 
											  phone, 
											  mobile, 
											  birthday, 
											  gender, 
											  email, 
											  source, 
											  DATE_FORMAT(created, '%d/%m/%Y') as created
									   FROM ". DB_PREFIX ."users WHERE autobidder=0");
		if($users_data) {
			$users = array();
			$i = 0;
			foreach($users_data as $user) {
				$users[$i]['username'] = $user['username'];
				$users[$i]['firstname'] = $user['firstname'];
				$users[$i]['lastname'] = $user['lastname'];
				$users[$i]['email'] = $user['email'];
				$address = $this->exec_one("SELECT * FROM ". DB_PREFIX ."addresses WHERE user_id=".$user['id']."");
				$users[$i]['address'] = $address['address'];
				$users[$i]['postcode'] = $address['postcode'];
				$users[$i]['city'] = $address['city'];
				$users[$i]['country'] = $address['country'];
				if($user['gender'] == 1) $gender = 'homme';
				elseif($user['gender'] == 2) $gender = 'femme';
				$users[$i]['gender'] = $gender;
				$source = $this->exec_one("SELECT name FROM ". DB_PREFIX ."sources WHERE id = ".$user['source']."");
				$users[$i]['source'] = $source['name'];
				$users[$i]['created'] = $user['created'];
				$balance = $this->exec_one("SELECT SUM(credit) - SUM(debit) as credits FROM ". DB_PREFIX ."bids WHERE user_id = ".$user['id']."");
				$users[$i]['balance'] = $balance['credits'];
				$i++;
			}
			
			$this->smarty->assign('users', $users);
			$this->smarty->display('admin/users/export.tpl');
		} else {
			tools::setFlash(ERROR_EXPORT, 'error');
			tools::redirect('/admin/user');
		}
	}
	
	function admin_suspend($user_id) {
		$this->exec("UPDATE ". DB_PREFIX ."users SET active='0' WHERE id=".$user_id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/user');
	}
	
	function admin_activate($user_id) {
		$this->exec("UPDATE ". DB_PREFIX ."users SET active='1' WHERE id=".$user_id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/user');
	}
	
	function admin_delete($user_id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."users WHERE id=".$user_id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/user');
	}
	
	function admin_add_blacklist($user_id) {
		$this->exec("UPDATE ". DB_PREFIX ."users SET blacklist='1' WHERE id=".$user_id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/user');
	}
	
	function admin_delete_blacklist($user_id) {
		$this->exec("UPDATE ". DB_PREFIX ."users SET blacklist='0' WHERE id=".$user_id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/user');
	}
	
	function admin_referrals() {
		$referrers_data = $this->exec_all("SELECT u.id, u.username, u.first_name, u.last_name, r.referrer_id, DATE_FORMAT(r.created, '%d/%m/%Y %H:%i:%s') AS date, r.confirmed FROM ". DB_PREFIX ."referrals r, ". DB_PREFIX ."users u WHERE r.user_id = u.id");
		$referrals = array();
		$i=0;
		foreach($referrers_data as $referral) {
			$referrals[$i]['user_id'] = $referral['id'];
			$referrals[$i]['referrer_id'] = $referral['referrer_id'];
			$referrals[$i]['username'] = $referral['username'];
			$referrals[$i]['first_name'] = $referral['first_name'];
			$referrals[$i]['last_name'] = $referral['last_name'];
			$referrer = $this->exec_one("SELECT username FROM ". DB_PREFIX ."users WHERE id=".$referral['referrer_id']."");
			$referrals[$i]['referrer_username'] = $referrer['username'];
			$referrals[$i]['date'] = $referral['date'];
			$i++;
		}
		
		$this->smarty->assign('referrals', $referrals);
		$this->smarty->display('admin/users/referrals.tpl');
	}
	
	function admin_extends() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'username' => tools::filter($data['username']),
				'autobidder' => 1,
				'active' => $data['active']
			);
			
			if ($this->user->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/user/extends');
		}
		
		$this->smarty->assign('extends', $this->user->getExtends());
		$this->smarty->display('admin/users/extends.tpl');
	}
	
	function admin_edit_extend($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'username' => $data['username'],
				'active' => $data['active']
			);
			
			if ($this->user->update($id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/user/extends');
		}
		
		$extend = $this->exec_one("SELECT id, username, active FROM ". DB_PREFIX ."users WHERE id=".$id."");
		$this->smarty->assign('extend', $extend);
		$this->smarty->display('admin/users/edit_extend.tpl');
	}
	
	function admin_delete_extend($id) {
		if ($this->user->delete($id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/user/extends');
	}
}
?>
