<?php /* Smarty version Smarty-3.1.17, created on 2014-06-25 18:29:58
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173191813453aaf906194c37-48605708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8912ec574bc2c41ba035ecaaef19dc82dcdc88ee' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/page.tpl',
      1 => 1403712401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173191813453aaf906194c37-48605708',
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
  'unifunc' => 'content_53aaf90627d211_55923978',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aaf90627d211_55923978')) {function content_53aaf90627d211_55923978($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<div id="left-column">
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</div>
	<div class="content">
		<?php echo $_smarty_tpl->tpl_vars['page']->value['content'];?>

	</div>
</div>

<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
