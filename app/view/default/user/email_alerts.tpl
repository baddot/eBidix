{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.User_menu.My_email_alerts}</div>
			
			<div class="items_list">
				<table cellpadding="0" cellspacing="0" align="center">
					<tr>
						<th>{$lang.Auction_id}</th>
						<th>{$lang.Product_name}</th>
						<th>{$lang.Date}</th>
						<th>{$lang.Options}</th>
					</tr>
					{foreach from=$alerts item=alert}
						<tr>
							<td><a href="/auctions/view/{$alert.auction_id}">{$alert.auction_id}</a></td>
							<td>{$alert.product_name}</td>
							<td>{$alert.created}</td>
							<td><a href="/emails/delete_alert/{$alert.id}">{$lang.Delete}</a></td>
						</tr>
					{/foreach}
				</table>
			</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
