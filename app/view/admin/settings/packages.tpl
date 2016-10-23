{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Packages}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Packages}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th>{$lang.Name}</th>
									<th>{$lang.Nb_credits}</th>
									<th>{$lang.Price}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$packages item=package}
									<tr>
										<td>{$package.name}</td>
										<td>{$package.bids}</td>
										<td>{$package.price}€</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/package/edit/{$package.id}">{$lang.Edit}</a></li><li><a href="/admin/package/delete/{$package.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/package">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Nb_credits} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="bids" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Price} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="price" class="inputtext medium" required>
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