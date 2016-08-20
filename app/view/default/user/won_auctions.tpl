{include file='header.tpl'}

	<div id="left-column">
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.My_won_auctions}</div>
		<div class="content">
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

{include file='footer.tpl'}
