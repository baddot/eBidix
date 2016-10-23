{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/product">{$lang.Products}</a> &raquo {$lang.Images}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Images_for} {$product.name}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.Images}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont">
						<div id="orderMessage" class="message" style="display: none"></div>
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Image}</th>
									<th>{$lang.By_default}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$images item=image}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><img src="/assets/img/product/thumb/{$product.id}/home_list.jpg" alt="" /></td>
										<td>{if $image.by_default == 1}<img src="/assets/img/icons/success.png" alt="" />{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul>{if $image.by_default != 1}<li><a href="/admin/product/set_default_image/{$image.id}">{$lang.Set_first}</a></li>{/if}<li><a href="/admin/product/regenerate_thumbnails/{$image.id}">{$lang.Regenerate_thumbnail}</a></li><li><a href="/admin/product/delete_image/{$image.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/product/images/{$product.id}" enctype="multipart/form-data">
							<p id="multifiles_1">
								<label>{$lang.File} 1 <span style="color:red;">*</span> : </label><br />
								<input type="file" name="file[]" class="inputtext medium"><br />
							</p>
							<p id="multifiles_2" style="display:none;">
								<label>{$lang.File} 2 : </label><br />
								<input type="file" name="file[]" class="inputtext medium"><br />
							</p>
							<p id="multifiles_3" style="display:none;">
								<label>{$lang.File} 3 : </label><br />
								<input type="file" name="file[]" class="inputtext medium"><br />
							</p>
							<p id="multifiles_4" style="display:none;">
								<label>{$lang.File} 4 : </label><br />
								<input type="file" name="file[]" class="inputtext medium"><br />
							</p>
							<p id="multifiles_5" style="display:none;">
								<label>{$lang.File} 5 : </label><br />
								<input type="file" name="file[]" class="inputtext medium"><br />
							</p>
							<p>
								<a href="javascript:multiupload();" id="multitxt">{$lang.Multi_files}</a>
								<a style="display:none;" class="button" href="javascript:multiupload();" id="addFile"><span>Ajouter un fichier</span></a>
								<button name="submit" class="button green"><span>{$lang.Upload}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}