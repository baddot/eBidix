{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Payment_systems}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Payment_systems}</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th>{$lang.Name}</th>
									<th>{$lang.Account}</th>
									<th>{$lang.Fixed_fees}</th>
									<th>{$lang.Variable_fees}</th>
									<th>{$lang.Activated}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$payments item=payment}
									<tr>
										<td>{$payment.name}</td>
										<td>{$payment.account}</td>
										<td>{$payment.fixed_fees}</td>
										<td>{$payment.variable_fees}</td>
										<td>{if $payment.active ==1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/payments/edit/{$payment.id}">{$lang.Edit}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}