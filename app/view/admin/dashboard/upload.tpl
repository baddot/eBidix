{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Upload}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Files}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.To_upload}</a></li>
						</ul>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Files}</th>
									<th>{$lang.Url}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$files item=file}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><img src="../../../upload/{$file.link}" style="max-width:600px;" alt="" /></td>
										<td>/upload/{$file.link}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/dashboard/delete_image/{$file.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/dashboard/upload/" enctype="multipart/form-data">
							<p id="multifiles_1">
								<label>{$lang.File} 1 <span style="color:red;">*</span> : </label><br />
								<input type="file" name="file[]" class="inputtext medium"><br />
								{*<label>{$lang.Label_dimensions} 1 :</label><br />
								{$lang.Width}: <input type="text" name="file_width_0" style="width:50px;" /> pixels<br />
								{$lang.Height}: <input type="text" name="file_height_0" style="width:50px;" /> pixels*}
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