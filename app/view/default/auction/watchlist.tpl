{include file='header.tpl'}

	<div id="left-column">
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.User_menu.My_watchlist}</div>
		<div class="content">

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

{include file='footer.tpl'}
