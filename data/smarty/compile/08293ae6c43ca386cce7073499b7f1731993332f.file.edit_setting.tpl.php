<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:13:23
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/settings/edit_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17963512453b4e673dc3e11-28595268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08293ae6c43ca386cce7073499b7f1731993332f' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/settings/edit_setting.tpl',
      1 => 1403712446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17963512453b4e673dc3e11-28595268',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'setting' => 0,
    'settings' => 0,
    'themes' => 0,
    'theme' => 0,
    'hours' => 0,
    'hour' => 0,
    'minutes' => 0,
    'minute' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e6741ef1b6_67383296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e6741ef1b6_67383296')) {function content_53b4e6741ef1b6_67383296($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/setting"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Settings'];?>
</a> &raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Settings'];?>
</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/setting/edit/<?php echo $_smarty_tpl->tpl_vars['setting']->value['id'];?>
">
							<p>
								<?php if ($_smarty_tpl->tpl_vars['setting']->value['name']=='bid_value') {?><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
  <span style="color:red;">*</span> : </label><br /> <input type="text" name="value" class="inputtext small" value="<?php echo $_smarty_tpl->tpl_vars['setting']->value['value'];?>
" /> <?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency'];?>

								<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='currency') {?><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
  <span style="color:red;">*</span> : </label><br />
									<select name="value" class="select">
										<option value="EUR" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='EUR') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Euros'];?>
</option>
										<option value="USD" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='USD') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Dollars'];?>
</option>
										<option value="GBD" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='GBD') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pounds'];?>
</option>
									</select>
								<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='theme') {?><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Theme'];?>
  <span style="color:red;">*</span> : </label><br />
									<select name="value" class="select">
										<?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value) {
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']==$_smarty_tpl->tpl_vars['theme']->value['name']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
</option>
										<?php } ?>
									</select>
								<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auction_peak_start'||$_smarty_tpl->tpl_vars['setting']->value['name']=='auction_peak_end') {?>
									<select name="hours">
										<?php  $_smarty_tpl->tpl_vars['hour'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hour']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hours']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['hour']->key => $_smarty_tpl->tpl_vars['hour']->value) {
$_smarty_tpl->tpl_vars['hour']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['hour']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['setting']->value['hours']==$_smarty_tpl->tpl_vars['hour']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['hour']->value;?>
</option>
										<?php } ?>
									</select> : <select name="minutes">
										<?php  $_smarty_tpl->tpl_vars['minute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['minute']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['minutes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['minute']->key => $_smarty_tpl->tpl_vars['minute']->value) {
$_smarty_tpl->tpl_vars['minute']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['minute']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['setting']->value['minutes']==$_smarty_tpl->tpl_vars['minute']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['minute']->value;?>
</option>
										<?php } ?>
									</select>
								<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='site_live'||$_smarty_tpl->tpl_vars['setting']->value['name']=='show_server_time') {?>
									<select name="value" class="select">
											<option value="yes" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='yes') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yes'];?>
</option>
											<option value="no" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='no') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['No'];?>
</option>
									</select>
								<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_display') {?>
									<select name="value" class="select">
											<option value="labels" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='labels') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Labels'];?>
</option>
											<option value="list" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='list') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['List'];?>
</option>
									</select>
								<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_order') {?>
									<select name="value" class="select">
											<option value="asc" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='asc') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Asc'];?>
</option>
											<option value="desc" <?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='desc') {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['Desc'];?>
</option>
									</select>
								<?php } else { ?><label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
  <span style="color:red;">*</span> : </label><br /> 
									  <input type="text" name="value" value="<?php echo $_smarty_tpl->tpl_vars['setting']->value['value'];?>
" class="inputtext big" />
								<?php }?>
							</p>					
							<p>
								<input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['setting']->value['name'];?>
">
								<button name="submit" class="button green"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</span></button> <br /><br /><?php echo $_smarty_tpl->tpl_vars['lang']->value['fields_required'];?>

							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
