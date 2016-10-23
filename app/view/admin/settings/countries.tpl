{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Countries}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Countries}</h3>
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
									<th>{$lang.Code}</th>
									<th>{$lang.Name}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$countries item=country}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$country.code}</td>
										<td>{$country.name}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/country/edit/{$country.id}">{$lang.Edit}</a></li><li><a href="/admin/country/delete/{$country.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/country">
							<p>
								<label>{$lang.Code} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="code" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" required>
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