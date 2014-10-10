{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.Payment}</div>
			
			<div>{$lang.Please_wait_transfering}</div>
			<div style="margin-top:15px;">
				<form method="POST" action="{$paypal.url}" id="frmPaypal">
					<input type="hidden" name="cmd" value="_xclick" />
					<input type="hidden" name="lc" value="{$paypal.lc}" />
					<input type="hidden" name="currency_code" value="{$paypal.currency_code}" />
					<input type="hidden" name="business" value="{$paypal.business}" />
					<input type="hidden" name="item_name" value="{$paypal.item_name}" />
					<input type="hidden" name="item_number" value="{$paypal.item_number}" />
					<input type="hidden" name="amount" value="{$paypal.amount}" />
					<input type="hidden" name="return" value="{$paypal.return}" />
					<input type="hidden" name="notify_url" value="{$paypal.notify_url}" />
					<input type="hidden" name="first_name" value="{$paypal.first_name}" />
					<input type="hidden" name="last_name" value="{$paypal.last_name}" />
					<input type="hidden" name="email" value="{$paypal.email}" />
					<input type="hidden" name="custom" value="{$paypal.custom}" />
					<input type="hidden" name="cancel_return" value="{$paypal.cancel_return}" />
					<input type="submit" value="{$lang.Click_if_not_redirect}" />
				</form>
				<script type="text/javascript">
					document.getElementById('frmPaypal').submit();
				</script>
			</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
