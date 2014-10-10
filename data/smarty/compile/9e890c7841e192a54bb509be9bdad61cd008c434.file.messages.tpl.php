<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:07:56
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/dashboard/messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204119844053b4e52c58dc52-66095822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e890c7841e192a54bb509be9bdad61cd008c434' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/dashboard/messages.tpl',
      1 => 1403712443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204119844053b4e52c58dc52-66095822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'messages' => 0,
    'message' => 0,
    'archived_messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e52c7f7387_00030440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e52c7f7387_00030440')) {function content_53b4e52c7f7387_00030440($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/libs/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Messages'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Mailbox'];?>
</h3>
						<ul class="tabs">
							<li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['List'];?>
</a></li>
							<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Archives'];?>
</a></li>
							<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Send'];?>
</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<form method="POST" action="/admin/dashboard/messages">
							<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
								<thead>
									<tr>
										<th class="nosort"><input type="checkbox" class="checkall" /></th>
										<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Messages'];?>
</th>
										<th class="nosort"><a class="action" href="#"></a></th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
										<tr <?php if ($_smarty_tpl->tpl_vars['message']->value['open']==0) {?>style="background-color:#ecf2f6;"<?php }?>>
											<td class="small"><input type="checkbox" name="message_<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" /></td>
											<td><a class="no_visible" href="/admin/dashboard/view_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
"><span style="font-weight:bold; color:black;"><?php echo $_smarty_tpl->tpl_vars['message']->value['object'];?>
</span> - <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['message']->value['message'],60);?>
</span></a></td>
											<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/dashboard/view_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['View'];?>
</a></li><li><a href="/admin/dashboard/delete_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<div class="tableactions">
								<select name="actions">
									<option><?php echo $_smarty_tpl->tpl_vars['lang']->value['Actions'];?>
...</option>
									<option value="set_read"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Set_read'];?>
</option>
									<option value="archive"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Archive'];?>
</option>
									<option value="delete"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</option>
								</select>
								<button class="button blue small left"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Apply_to_selected'];?>
</span></button>
							</div>
						</form>
					</div>
					
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Messages'];?>
</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archived_messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
									<tr <?php if ($_smarty_tpl->tpl_vars['message']->value['open']==0) {?>style="background-color:#ecf2f6;"<?php }?>>
										<td class="small"><input type="checkbox" name="message_<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" /></td>
										<td><a class="no_visible" href="/admin/dashboard/view_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
"><span style="font-weight:bold; color:black;"><?php echo $_smarty_tpl->tpl_vars['message']->value['object'];?>
</span> - <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['message']->value['message'],60);?>
</span></a></td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/dashboard/view_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['View'];?>
</a></li><li><a href="/admin/dashboard/delete_message/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/dashboard/messages">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['To'];?>
 <span style="color:red;">*</span> : </label> 
								<input type="text" name="email" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Object'];?>
 <span style="color:red;">*</span> : </label> 
								<input type="text" name="object" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Message'];?>
 <span style="color:red;">*</span> : </label><br />
								<textarea class="wysiwyg" name="message" rows="5" cols="60"></textarea>
							</p>
							<p>
								<button name="submit" class="button green"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Send'];?>
</span></button>
								<br /><br /><?php echo $_smarty_tpl->tpl_vars['lang']->value['fields_required'];?>

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
