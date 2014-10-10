<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:13:51
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/content/testimonials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42215740253b4e68fb54b33-55889071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ec49ec979e57826143ded3ba7e901dffdf81320' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/content/testimonials.tpl',
      1 => 1403712442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42215740253b4e68fb54b33-55889071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'testimonials' => 0,
    'testimonial' => 0,
    'auctions' => 0,
    'auction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e68fe19868_22789210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e68fe19868_22789210')) {function content_53b4e68fe19868_22789210($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript" src="/themes/default/admin/js/note.js"></script>
	
	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Testimonials'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Testimonials'];?>
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
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auction_id'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Text'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Note'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activated'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Validated'];?>
</th>
									
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Date'];?>
</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['testimonial'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['testimonial']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['testimonials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['testimonial']->key => $_smarty_tpl->tpl_vars['testimonial']->value) {
$_smarty_tpl->tpl_vars['testimonial']->_loop = true;
?>
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><?php if (!empty($_smarty_tpl->tpl_vars['testimonial']->value['auction_id'])) {?><a href="/auctions/view/<?php echo $_smarty_tpl->tpl_vars['testimonial']->value['auction_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['testimonial']->value['auction_id'];?>
</a><?php }?></td>
										<td><a href="/admin/users/view/<?php echo $_smarty_tpl->tpl_vars['testimonial']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['testimonial']->value['username'];?>
</a></td>
										<td><?php echo $_smarty_tpl->tpl_vars['testimonial']->value['text'];?>
...</td>
										<td><?php echo $_smarty_tpl->tpl_vars['testimonial']->value['note'];?>
/5</td>
										<td><?php if ($_smarty_tpl->tpl_vars['testimonial']->value['active']==1) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yes'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lang']->value['No'];?>
<?php }?></td>
										<td><?php if ($_smarty_tpl->tpl_vars['testimonial']->value['validate']==1) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yes'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lang']->value['No'];?>
<?php }?></td>
										
										<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['testimonial']->value['created'],"%d-%m-%Y %H:%M:%S");?>
</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/testimonials/preview/<?php echo $_smarty_tpl->tpl_vars['testimonial']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Survey'];?>
</a></li><?php if ($_smarty_tpl->tpl_vars['testimonial']->value['validate']!=1) {?><li><a href="/admin/testimonials/validate/<?php echo $_smarty_tpl->tpl_vars['testimonial']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Validate'];?>
</a></li><?php }?><li><a href="/admin/testimonials/edit/<?php echo $_smarty_tpl->tpl_vars['testimonial']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</a></li><li><a href="/admin/testimonials/delete/<?php echo $_smarty_tpl->tpl_vars['testimonial']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/controls.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/testimonials" enctype="multipart/form-data">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auction_id'];?>
 <span style="color:red;">*</span> : </label><br />
								<select name="auction_id" class="small_select">
									<?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
</option>
									<?php } ?>
								</select> 
								<span class="tooltip_box"><span><a href="#"><img src="/themes/default/admin/images/infos.png" alt="infos" /></a><span class="tooltip"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auction_id_text'];?>
</span></span></span>
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Image'];?>
 : <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /></label><br />
								<input type="file" name="image" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Content'];?>
 <span style="color:red;">*</span> : </label><br />
								<input type="text" name="text" class="inputtext big" />
							</p>
							<p>
								<input type="checkbox" name="active" value="1" class="checkbox" checked="checked" /> <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activate'];?>
</label>
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
