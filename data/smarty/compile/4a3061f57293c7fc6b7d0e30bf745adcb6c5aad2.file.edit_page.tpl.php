<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:14:31
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/content/edit_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8554918853b4e6b70e68b9-73490820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a3061f57293c7fc6b7d0e30bf745adcb6c5aad2' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/content/edit_page.tpl',
      1 => 1403712441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8554918853b4e6b70e68b9-73490820',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e6b721ce28_48662932',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e6b721ce28_48662932')) {function content_53b4e6b721ce28_48662932($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/page"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pages'];?>
</a> &raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pages'];?>
</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/page/edit/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
 <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
" required> <a href="#" class="bubble"><img src="/themes/default/admin/img/infos.png" alt="infos" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Page_name_text'];?>
</span></a>
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Title'];?>
 <span style="color:red;">*</span> : </label><br />
								<input type="text" name="title" class="inputtext medium" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
" required>
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Meta_description'];?>
 : </label><br />
								<input type="text" name="meta_description" class="inputtext medium" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['meta_description'];?>
" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Meta_keywords'];?>
 : </label><br />
								<input type="text" name="meta_keywords" class="inputtext medium" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['meta_keywords'];?>
" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Content'];?>
 <span style="color:red;">*</span> : </label><br />
								<textarea name="content" class="ckeditor" cols="80" rows="10" required><?php echo $_smarty_tpl->tpl_vars['page']->value['content'];?>
</textarea>
							</p>
							<p>
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
