{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.User_menu.My_debits}</div>
			
			<div class="items_list">
				<table cellpadding="0" cellspacing="0" align="center">
					<tr>
						<th>{$lang.Date}</th>
						<th>{$lang.Auction_id}</th>
						<th>{$lang.Type}</th>
						<th>{$lang.Debit}</th>
						<th>{$lang.Options}</th>
					</tr>
					{foreach from=$bids item=bid}
						<tr>
							<td>{$bid.created}</td>
							<td><a href="/auctions/view/{$bid.auction_id}">{$bid.auction_id}</a></td>
							<td>{if $bid.description == 'manual'}{$lang.Manual_bid}{elseif $bid.description == 'auto'}{$lang.Auto_bid}{else}{$bid.description}{/if}</td>
							<td>{$bid.debit}</td>
							<td><a href="/users/debits?auction_id={$bid.auction_id}">{$lang.View_only_auction}</a></td>
						</tr>
					{/foreach}
				</table>
			</div>
			<div class="pagination">{$lang.Page}: {pagination params=$pagination}{/pagination}</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
