<?php /* Smarty version Smarty-3.1.17, created on 2014-06-25 18:45:18
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186587913553aafc9e7537c7-14053828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47ea520eab302b170f667a5ab17caba2cc93e5e8' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/edit.tpl',
      1 => 1403714698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186587913553aafc9e7537c7-14053828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'data' => 0,
    'countries' => 0,
    'country' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53aafc9e9280e4_07827789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aafc9e9280e4_07827789')) {function content_53aafc9e9280e4_07827789($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<div id="left-column">
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <a href="/account"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['My_account'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['Edit_account'];?>
</div>
	<div class="content">
		<form method="POST" action="/user/edit">
			<ul>
				<li><input type="text" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['lastname'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_name'];?>
" required></li>
				<li><input type="text" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['firstname'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['First_name'];?>
" required></li>
				<li><input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Email'];?>
" required></li>
				<li><input type="text" name="birthday" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['birthday'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Date_of_birth'];?>
" onfocus="(this.type='date')"></li>
				<li><input type="tel" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['phone'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Phone'];?>
"></li>
				<li><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Address'];?>
"></li>
				<li><input type="text" name="postcode" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['postcode'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Postcode'];?>
"></li>
				<li><input type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['city'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['City'];?>
"></li>
				<li>
					<?php echo $_smarty_tpl->tpl_vars['lang']->value['Country'];?>
 :
					<select name="country">
						<option value=""></option>
						<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['country']->value['id']==$_smarty_tpl->tpl_vars['data']->value['country']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</li>
				
				<li><input type="checkbox" name="newsletter" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['newsletter']==1) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['lang']->value['Receive_newsletter'];?>
</li>
				<li><input type="submit" class="button green" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
"></li>
			</ul>
		</form>
	</div>
</div>

<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
