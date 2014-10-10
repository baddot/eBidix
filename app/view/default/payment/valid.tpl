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
			
			<div style="margin-top:15px;">
				<p><img src="/themes/default/images/valid_payment.png" alt="" /></p>
				<p>{$lang.Your_payment_accepted}</p>
			</div>
		</div>
	</div>					

</div>	
{include file='elements/footer.tpl'}