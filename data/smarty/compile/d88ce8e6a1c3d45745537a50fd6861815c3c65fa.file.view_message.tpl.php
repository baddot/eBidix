<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:08:19
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/dashboard/view_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190918177353b4e5431bc061-41064722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd88ce8e6a1c3d45745537a50fd6861815c3c65fa' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/dashboard/view_message.tpl',
      1 => 1403712444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190918177353b4e5431bc061-41064722',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e5432e2e36_85968041',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e5432e2e36_85968041')) {function content_53b4e5432e2e36_85968041($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/dashboard/messages"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Messages'];?>
</a> &raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['View'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['message']->value['object'];?>
</h3>
					</div>
					<div class="bcont">
						<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['username'])) {?><?php echo $_smarty_tpl->tpl_vars['message']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['last_name'];?>
 (<a href="/admin/users?user_id=<?php echo $_smarty_tpl->tpl_vars['message']->value['sender_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value['username'];?>
</a>)<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message']->value['email'];?>
<?php }?>
						<p style="background-color:#f5f5f5; padding:10px;"><?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
</p>
						<p>
							<div><button class="button small blue" onClick="show_box('send_message');"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Reply'];?>
</span></button></div>
							<div id="send_message" style="display:none; margin-top:10px;">
								<form method="POST" action="/admin/dashboard/send_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
									<textarea class="wysiwyg" name="message" rows="5" cols="60"></textarea> <br />
									<button class="button green" name="submit"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Send'];?>
</span></button>
								</form>
							</div>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
