{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/payments">{$lang.Payment_systems}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Payment_systems}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/payments/edit/{$payment.id}">
							<p>
								<label>{$lang.Account} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="account" value="{$payment.account}" class="inputtext medium" />
							</p>	
							<p>
								<label>{$lang.Fixed_fees} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="fixed_fees" value="{$payment.fixed_fees}" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Variable_fees} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="variable_fees" value="{$payment.variable_fees}" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Activated} :</label><br /> 
								<input type="checkbox" name="active" value="1" class="checkbox" {if $payment.active == 1}checked="checked"{/if} />
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Edit}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}