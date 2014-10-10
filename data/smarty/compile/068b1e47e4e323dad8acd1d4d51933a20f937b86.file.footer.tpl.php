<?php /* Smarty version Smarty-3.1.17, created on 2014-08-13 16:56:15
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84710450653eb7c8fd368c9-46417798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '068b1e47e4e323dad8acd1d4d51933a20f937b86' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/footer.tpl',
      1 => 1407935843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84710450653eb7c8fd368c9-46417798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53eb7c8fd56259_04491448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eb7c8fd56259_04491448')) {function content_53eb7c8fd56259_04491448($_smarty_tpl) {?>﻿	</div>
</div>

<footer id="footer">
	<div class="main">
		<div class="inner">
			<div class="useful-links">
				<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Useful_links'];?>
</h3>
				<ul>
					<li><a href="/how-it-works"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['How_it_works'];?>
</a></li>
					<li><a href="/faq"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Faq'];?>
</a></li>
					<li><a href="/promotions"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Promotions'];?>
</a></li>
					<li><a href="/sitemap"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Sitemap'];?>
</a></li>
				</ul>
			</div>
			<div class="infos">
				<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Informations'];?>
</h3>
				<ul>
					<li><a href="/about"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Who_are_us'];?>
</a></li>
					<li><a href="/privacy"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Privacy_policy_data_protection'];?>
</a></li>
					<li><a href="/terms"><?php echo $_smarty_tpl->tpl_vars['lang']->value['cgu'];?>
</a></li>
					<li><a href="/contact"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Contact'];?>
</a></li>
				</ul>
			</div>
			<div class="social">
				<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Social_networks'];?>
</h3>
				<div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="250" data-height="200" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
			</div>
		</div>
	</div>
	<div class="bottom">
		<div class="inner">
			&copy; 2009 - 
			
				<script type="text/javascript">
					d = new Date;
					document.write(d.getFullYear());
				</script> 
			 
			eBidix &reg; Tous droits réservés / All rights reserved
		</div>
	</div>
</footer>

<script type="text/javascript" src="/assets/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<?php if ($_smarty_tpl->tpl_vars['settings']->value['google_analytics']['active']) {?>
	
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['settings']->value['google_analytics']['id'];?>
']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	
<?php }?>

</body>
</html><?php }} ?>
