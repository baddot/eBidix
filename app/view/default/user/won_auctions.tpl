{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.My_won_auctions}</li>
		</ol>
		<div class="content">
			<table cellpadding="0" cellspacing="0" align="center" class="table">
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

{include file='footer.tpl'}
