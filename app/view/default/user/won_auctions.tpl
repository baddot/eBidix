{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.User_menu.My_won_auctions}</div>
			
			<div class="items_list">
				<table cellpadding="0" cellspacing="0" align="center">
					<tr>
						<th>{$lang.Auction}</th>
						<th>{$lang.Paid_price}</th>
						<th>{$lang.Date_won}</th>
						<th>{$lang.Status}</th>
						<th>{$lang.Options}</th>
					</tr>
					{foreach from=$auctions item=auction}
						<tr>
							<td><a href="/auctions/view/{$auction.id}">{$auction.name}</a></td>
							<td>{$auction.paid_price}&euro;</td>
							<td>{$auction.end_time}</td>
							<td>{$auction.status}</td>
							<td>
								{if $auction.status_id == 4}<a href="/auctions/pay/{$auction.id}">{$lang.Pay}</a> |{/if} 
								{if empty($auction.comment)}<a href="/testimonials/add/{$auction.id}">{$lang.Leave_comment}</a>{/if}
							</td>
						</tr>
					{/foreach}
				</table>
			</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
