{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Donations}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Donations}</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Username}</th>
									<th>{$lang.Offered_amount}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$donations item=donation}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$donation.username}</td>
										<td>{$donation.amount}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
						<div class="tableactions">
							<select name="actions">
								<option>{$lang.Actions}...</option>
								<option>{$lang.Set_read}</option>
								<option>{$lang.Archive}</option>
								<option>{$lang.Delete}</option>
							</select>
							<button class="button blue small left"><span>{$lang.Apply_to_selected}</span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}