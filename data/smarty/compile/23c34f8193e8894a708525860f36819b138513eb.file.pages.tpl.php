<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:14:06
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/content/pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207870131553b4e69e257f98-35834652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23c34f8193e8894a708525860f36819b138513eb' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/content/pages.tpl',
      1 => 1403712441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207870131553b4e69e257f98-35834652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'pages' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e69e416281_24466512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e69e416281_24466512')) {function content_53b4e69e416281_24466512($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Pages'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pages'];?>
</h3>
						<ul class="tabs">
							<li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['List'];?>
</a></li>
							<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add'];?>
</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Id'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Title'];?>
</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/page/view/<?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['View'];?>
</a></li><li><a href="/admin/page/edit/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</a></li><li><a href="/admin/page/delete/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php }
if (!$_smarty_tpl->tpl_vars['page']->_loop) {
?>
									<tr><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['No_pages'];?>
</td></tr>
								<?php } ?>
							</tbody>
						</table>
						<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/controls.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/page">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
 <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium"  required> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/img/infos.png" alt="infos" /></a><span class="tooltip"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Page_name_text'];?>
</span></span></span>
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Title'];?>
 <span style="color:red;">*</span> : </label><br />
								<input type="text" name="title" class="inputtext medium" required>
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Meta_description'];?>
 : </label><br />
								<input type="text" name="meta_description" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Meta_keywords'];?>
 : </label><br />
								<input type="text" name="meta_keywords" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Content'];?>
 <span style="color:red;">*</span> : </label><br />
								<textarea class="ckeditor" cols="80" name="content" rows="10" required><?php echo $_smarty_tpl->tpl_vars['lang']->value['Content_of_page'];?>
</textarea>
							</p>							
							<p>
								<button name="submit" class="button green"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add'];?>
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
