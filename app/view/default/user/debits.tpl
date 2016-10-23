{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
			<li><a href="/">{$lang.Home}</a></li>
			<li class="active">{$lang.User_menu.My_debits}</li>
		</ol>
		<div class="content">
			<table cellpadding="0" cellspacing="0" align="center" class="table">
				<tr>
					<th>{$lang.Date}</th>
					<th>{$lang.Auction_id}</th>
					<th>{$lang.Type}</th>
					<th>{$lang.Debit}</th>
					<th>{$lang.Options}</th>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><b>Total:</b></td>
					<td><b>{$total}</b></td>
				</tr>
				{foreach from=$bids item=bid}
					<tr>
						<td>{$bid.created}</td>
						<td><a href="/auction/view/{$bid.auction_id}">{$bid.auction_id}</a></td>
						<td>{if $bid.description == 'manual'}{$lang.Manual_bid}{elseif $bid.description == 'auto'}{$lang.Auto_bid}{else}{$bid.description}{/if}</td>
						<td>{$bid.debit}</td>
						<td><a href="/debits?auction_id={$bid.auction_id}">{$lang.View_only_auction}</a></td>
					</tr>
				{/foreach}
			</table>
			<div class="pagination">{$lang.Page}: {pagination params=$pagination}{/pagination}</div>
		</div>
	</div>
</div>

{include file='footer.tpl'}
