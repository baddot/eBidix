<?php

define('INSTALL_VERSION', '1.0');
define('_DIR_', dirname(dirname(__FILE__)));

function lang($txt) {
	global $lang;
	return (isset($lang[$txt])) ? $lang[$txt] : $txt;
}

if(isset($_GET['language'])) {
	if($_GET['language'] == 1) {
		include(_DIR_ .'/install/languages/english.lang');
		$language = 'en';
	} elseif($_GET['language'] == 2) {
		include(_DIR_ .'/install/languages/french.lang');
		$language = 'fr';
	} elseif($_GET['language'] == 3) {
		include(_DIR_ .'/install/languages/russian.lang');
		$language = 'ru';
	} elseif($_GET['language'] == 4) {
		include(_DIR_ .'/install/languages/spanish.lang');
		$language = 'es';
	} elseif($_GET['language'] == 5) {
		include(_DIR_ .'/install/languages/german.lang');
		$language = 'de';
	} elseif($_GET['language'] == 6) {
		include(_DIR_ .'/install/languages/italian.lang');
		$language = 'it';
	}
} else {
	$language = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2));
	if($language == 'en') include(_DIR_ .'/install/languages/english.lang');
	elseif($language == 'fr') include(_DIR_ .'/install/languages/french.lang');
	elseif($language == 'ru') include(_DIR_ .'/install/languages/russian.lang');
	elseif($language == 'es') include(_DIR_ .'/install/languages/spanish.lang');
	elseif($language == 'de') include(_DIR_ .'/install/languages/german.lang');
	elseif($language == 'it') include(_DIR_ .'/install/languages/italian.lang');
	else include(_DIR_ .'/install/languages/english.lang');
}

if (version_compare(phpversion(), '5.0.0', '<')) {
	echo '<html xmlns="http://www.w3.org/1999/xhtml" >
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			</head>
			<body>
				<p style="border:1px solid red; padding:10px;">'.sprintf(lang('eBidix require PHP5 currently %s'), phpversion()).'</p>
			</body>
		  </html>';
	die;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache" content="no store" />
	<meta http-equiv="Expires" content="-1" />
	<meta name="robots" content="noindex" />
	<title><?php echo sprintf(lang('eBidix %s install'), INSTALL_VERSION); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="style.css"/>
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>	
	<script type="text/javascript">
		var id_lang = "<?php echo (isset($_GET['language']) ? (int)($_GET['language']) : 0); ?>";
		var txtDbLoginEmpty = "<?php echo lang('Please set a database login'); ?>";
		var txtDbNameEmpty = "<?php echo lang('Please set a database name'); ?>";
		var txtDbServerEmpty = "<?php echo lang('Please set a database server name'); ?>";
		var txtTabInstaller1 = "<?php echo lang('Welcome'); ?>";
		var txtTabInstaller2 = "<?php echo lang('Compatibility'); ?>";
		var txtTabInstaller3 = "<?php echo lang('System_configuration'); ?>";
		var txtTabInstaller4 = "<?php echo lang('Site_configuration'); ?>";
		var txtTabInstaller5 = "<?php echo lang('Completed'); ?>";
		var txtConfigIsOk = "<?php echo lang('Your configuration is valid, click next to continue!'); ?>";
		var txtConfigIsNotOk = "<?php echo lang('Your configuration is invalid. Please fix the issues below:'); ?>";
		
		var txtError = new Array();
		txtError[0] = "<?php echo lang('Required field'); ?>";
		txtError[2] = "<?php echo lang('Fields are different!'); ?>";
		txtError[3] = "<?php echo lang('This email adress is wrong!'); ?>";
		txtError[12] = "<?php echo lang('The password is incorrect (alphanumeric string at least 8 characters).'); ?>";
		txtError[14] = "<?php echo lang('A eBidix database already exists, please drop it or change the prefix.'); ?>";
		txtError[17] = "<?php echo lang('Error while creating the /config.php file.'); ?>";
		txtError[23] = "<?php echo lang('Database connection is available!'); ?>";
		txtError[24] = "<?php echo lang('Database Server is available but database is not found'); ?>";
		txtError[25] = "<?php echo lang('Database Server is not found. Please verify the login, password and server fields.'); ?>";
		txtError[47] = "<?php echo lang('Your firstname contains some invalid characters'); ?>";
		txtError[48] = "<?php echo lang('Your lastname contains some invalid characters'); ?>";
	</script>
	<script type="text/javascript" src="functions.js"></script>	
</head>
<body>
	<div id="container">
		<div id="loaderSpace">
			<div id="loader">&nbsp;</div>
		</div>
		
		<div class="sb-box">
			<div class="sb-box-inner content">
				<div class="header">
					<h3 id="bigTitle"><?php echo lang('Welcome'); ?></h3>
				</div>
				<div class="bcont">
					<div class="left-column">
						<ol id="tabs"><li>&nbsp;</li></ol>
					</div>
					<div class="right-column">
						<div class="sheet shown" id="sheet_lang">
							<p class="title"><?php echo sprintf(lang('Welcome eBidix %s install processus'), INSTALL_VERSION); ?></p>
							<p>
								<?php echo lang('install process only few minutes'); ?>
							</p>
							<p>
								<h2><?php echo lang('Choose the installer language:')?></h2>
								<form id="formSetInstallerLanguage" action="<?php $_SERVER['REQUEST_URI']; ?>" method="get">
									<ul id="langList" style="line-height:20px;">
										<li>
											<input onclick="setInstallerLanguage()" type="radio" value="1" <?php if($language == 'en') echo 'checked="checked"'; ?> id="lang_1" name="language" style="vertical-align: middle; margin-right: 0;" />
											<label for="lang_1"><img src="images/flag-en.jpg" alt="english" style="vertical-align: middle;" /> English</label>
										</li>
										<li>
											<input onclick="setInstallerLanguage()" type="radio" value="2" <?php if($language == 'fr') echo 'checked="checked"'; ?> id="lang_2" name="language" style="vertical-align: middle; margin-right: 0;" />
											<label for="lang_2"><img src="images/flag-fr.jpg" alt="french" style="vertical-align: middle;" /> Fran&ccedil;ais (French)</label>
										</li>
									</ul>
								</form>
							</p>
						</div>
						
						<div class="sheet" id="sheet_require">	
							<p class="title"><?php echo lang('Required set-up. Please verify the following checklist items are true.'); ?></p>
							<p>
								<h2 id="resultConfig"></h2>
								<ul id="required">
									<li class="title"><?php echo lang('PHP parameters:')?></li>
									<li class="required"><?php echo lang('PHP 5.0 or later installed')?></li>
									<li class="required"><?php echo lang('File upload allowed')?></li>
									<li class="required"><?php echo lang('Create new files and folders allowed')?></li>
									<li class="required"><?php echo lang('MySQL support is on')?></li>
									<li class="title"><?php echo lang('Write permissions on files and folders:')?></li>
									<li class="required">/cache</li>
									<li class="required">/config</li>
									<li class="required">/sitemap.xml</li>
									<li class="required">/tools/smarty/compile</li>
									<li class="required">/tools/smarty/cache</li>
									<li class="required">/upload</li>
								</ul>
							</p>
							<p>
								<ul id="optional">
									<li class="title"><?php echo lang('Optional set-up')?></li>
									<li class="optional"><?php echo lang('Open external URLs allowed')?></li>
									<li class="optional"><?php echo lang('PHP register global option is off (recommended)')?></li>
									<li class="optional"><?php echo lang('GZIP compression is on (recommended)')?></li>
									<li class="optional"><?php echo lang('Mcrypt is available (recommended)')?></li>
									<li class="optional"><?php echo lang('PHP magic quotes option is off (recommended)')?></li>
									<li class="optional"><?php echo lang('Dom extension loaded')?></li>
								</ul>
							</p>
							<p><button class="button blue" style="float:right;" id="btRefresh"><span><?php echo lang('Refresh these settings')?></span></button></p>
						</div>
						
						<div class="sheet" id="sheet_db">	
							<div id="dbPart">
								<h2><?php echo lang('Configure your database by filling out the following fields:')?></h2>
								<p><?php echo lang('You have to create a database'); ?></p>
								<form id="formCheckSQL" class="aligned" action="<?php $_SERVER['REQUEST_URI']; ?>" onsubmit="verifyDbAccess(); return false;" method="post">
									<p class="first" style="margin-top: 15px;">
										<label for="dbServer"><?php echo lang('Server:')?> </label>
										<input size="25" class="text" type="text" id="dbServer" value="localhost"/>
									</p>
									<p>
										<label for="dbName"><?php echo lang('Database name:')?> </label>
										<input size="10" class="text" type="text" id="dbName" />
									</p>
									<p>
										<label for="dbLogin"><?php echo lang('Login:')?> </label>
										<input class="text" size="10" type="text" id="dbLogin" value="root"/>
									</p>
									<p>
										<label for="dbPassword"><?php echo lang('Password:')?> </label>
										<input class="text" autocomplete="off" size="10" type="password" id="dbPassword" />
									</p>
									<p>
										<label for="dbEngine"><?php echo lang('Database Engine:')?></label>
										<select id="dbEngine" name="dbEngine">
											<option value="MyISAM">MyISAM</option>
											<option value="InnoDB">InnoDB</option>
										</select>
									</p>
									<p class="last">
										<label for="db_prefix"><?php echo lang('Tables prefix:')?></label> 
										<input class="text" type="text" id="db_prefix" value="eb_"/>
									</p>
									<p class="aligned">
										<button class="button small blue" id="btTestDB"><span><?php echo lang('Verify now!')?></span></button>
									</p>
									<p id="dbResultCheck"></p>
									<p id="dbCreateResultCheck"></p>
								</form>
							</div>
						</div>
						
						<div class="sheet" id="sheet_infos">
							<h2><?php echo lang('Site configuration')?></h2>
							
							<div id="infosSiteBlock">
								<form method="post" action="<?php $_SERVER['REQUEST_URI']; ?>" onsubmit="return false;">
									<div class="field">
										<label for="infosFirstname" class="aligned"><?php echo lang('First name:'); ?> </label>
										<span class="contentinput">
											<input class="text" type="text" id="infosFirstname"/> <sup class="required">*</sup>
										</span>
										<span id="resultInfosFirstname" class="result aligned"></span>
									</div>

									<div class="field">
										<label for="infosName" class="aligned"><?php echo lang('Last name:'); ?> </label>
										<span class="contentinput">
											<input class="text" type="text" id="infosName"/> <sup class="required">*</sup>
										</span>
										<span id="resultInfosName" class="result aligned"></span>
									</div>

									<div class="field">
										<label for="infosEmail" class="aligned"><?php echo lang('E-mail address:'); ?> </label>
										<span class="contentinput">
											<input type="text" class="text required" id="infosEmail"/> <sup class="required">*</sup>
										</span>
										<span id="resultInfosEmail" class="result aligned"></span>
									</div>

									<div class="field">
										<label for="infosPassword" class="aligned"><?php echo lang('Admin password:'); ?> </label>
										<span class="contentinput">
											<input autocomplete="off" type="password" class="text" id="infosPassword"/> <sup class="required">*</sup>
										</span>
										<span id="resultInfosPassword" class="result aligned"></span>
									</div>
									<div class="field">
										<label class="aligned" for="infosPasswordRepeat"><?php echo lang('Re-type to confirm:'); ?> </label>
										<span class="contentinput">
											<input type="password" autocomplete="off" class="text" id="infosPasswordRepeat"/> <sup class="required">*</sup>
										</span>
										<span id="resultInfosPasswordRepeat" class="result aligned"></span>
									</div>
								</form>
								
								<div id="resultEnd">
									<span id="resultInfosSQL" class="result"></span>
								</div>
							</div>
						</div>
						
						<div class="sheet" id="sheet_end">
							<h2><?php echo lang('eBidix is ready!'); ?></h2>
						
							<div class="clearfix">
								<h2><?php echo lang('Your installation is finished!'); ?></h2>
								<p><?php echo lang('You have just installed and configured your online auction solution. We wish you all the best with the success of your online auction site.'); ?></p>
								<p><?php echo lang('Here are your site information. You can modify them once logged in.'); ?></p>
								<table cellpadding="0" cellspacing="0" border="0" id="resultInstall" width="620">
									<tr class="odd">
										<td class="label"><?php echo lang('First name:'); ?></td>
										<td id="endFirstName" class="resultEnd">&nbsp;</td>
									</tr>
									<tr>
										<td class="label"><?php echo lang('Last name:'); ?></td>
										<td id="endName" class="resultEnd">&nbsp;</td>
									</tr>
									<tr class="odd">
										<td class="label"><?php echo lang('E-mail:'); ?></td>
										<td id="endEmail" class="resultEnd">&nbsp;</td>
									</tr>
									<tr>
										<td class="label"><?php echo lang('Username:'); ?></td>
										<td class="resultEnd">admin</td>
									</tr>
									<tr class="odd">
										<td class="label"><?php echo lang('Password:'); ?></td>
										<td class="resultEnd"><?php echo lang('previously provided'); ?></td>
									</tr>
								</table>
								
								<h3 class="infosBlock"><?php echo lang('WARNING: For more security, you must delete the \'install\' folder.'); ?></h3>
								
								<p style="float:right;"><a href="../" class="button green" target="_blank"><span><?php echo lang('Discover your site'); ?></span></a></p>
								
								<div id="resultEnd"></div>
							</div>
						</div>
						
						<div class="navigation">
							<button class="button" style="float:left;" id="btBack"><span><?php echo lang('Back'); ?></span></button>
							<button class="button green" style="float:right;" id="btNext"><span><?php echo lang('Next'); ?></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>