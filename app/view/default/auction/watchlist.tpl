{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.User_menu.My_watchlist}</div>
			
			<div class="items_list">
				<table cellpadding="0" cellspacing="0" align="center">
					<tr>
						<th>{$lang.Auction}</th>
						<th>{$lang.Date_hour_end}</th>
						<th>{$lang.Price}</th>
						<th>{$lang.Options}</th>
					</tr>
					{foreach from=$follows item=follow}
						<tr>
							<td><a href="/auctions/view/{$follow.auction_id}">{$follow.auction_name}</a></td>
							<td>{$follow.end_time}</td>
							<td>{$follow.price}{$settings.app.currency_code}</td>
							<td><a href="/auctions/delete_watch/{$follow.id}">{$lang.Delete}</a></td>
						</tr>
					{/foreach}
				</table>
			</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
