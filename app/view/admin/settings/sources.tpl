{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Sources}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Sources}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Name}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$sources item=source}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$source.name}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/sources/edit/{$source.id}">{$lang.Edit}</a></li><li><a href="/admin/sources/delete/{$source.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/sources">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" />
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button>
								<br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}