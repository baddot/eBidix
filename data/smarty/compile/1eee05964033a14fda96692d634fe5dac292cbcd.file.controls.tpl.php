<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:09:31
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/elements/controls.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27766641953b4e58bb64d74-57837415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eee05964033a14fda96692d634fe5dac292cbcd' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/elements/controls.tpl',
      1 => 1403712445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27766641953b4e58bb64d74-57837415',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e58bb8b4d9_65655391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e58bb8b4d9_65655391')) {function content_53b4e58bb8b4d9_65655391($_smarty_tpl) {?>						<div id="controls">
							<div id="perpage">
								<select onchange="sorter.size(this.value)">
								<option value="5">5</option>
									<option value="10" selected="selected">10</option>
									<option value="20">20</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Entries_per_page'];?>
</span>
							</div>
							<div id="navigation">
								<img src="/assets/admin/images/first.gif" width="16" height="16" alt="" onclick="sorter.move(-1,true)" />
								<img src="/assets/admin/images/previous.gif" width="16" height="16" alt="" onclick="sorter.move(-1)" />
								<img src="/assets/admin/images/next.gif" width="16" height="16" alt="" onclick="sorter.move(1)" />
								<img src="/assets/admin/images/last.gif" width="16" height="16" alt="" onclick="sorter.move(1,true)" />
							</div>
							<div id="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Page'];?>
 <span id="currentpage"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['on'];?>
 <span id="pagelimit"></span></div>
						</div>
						<div class="clearingfix"></div>
						
							<script type="text/javascript">
								var sorter = new TINY.table.sorter("sorter");
								sorter.head = "head";
								sorter.asc = "asc";
								sorter.desc = "desc";
								sorter.even = "evenrow";
								sorter.odd = "oddrow";
								sorter.evensel = "evenselected";
								sorter.oddsel = "oddselected";
								sorter.paginate = true;
								sorter.currentid = "currentpage";
								sorter.limitid = "pagelimit";
								sorter.sortmethod = "desc";
								sorter.init("table",1);
							</script>
						<?php }} ?>
