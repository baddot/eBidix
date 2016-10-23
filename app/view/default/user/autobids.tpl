{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.User_menu.My_autobids}</li>
		</ol>
		<div class="content">
			<table cellpadding="0" cellspacing="0" align="center" class="table"> 
					<tr>
						<th>{$lang.Auction_id}</th>
						<th>{$lang.Minimum_price}</th>
						<th>{$lang.Maximum_price}</th>
						<th>{$lang.Bids_allocated}</th>
						<th>{$lang.Bids_left}</th>
						<th>{$lang.Date}</th>
						<th>{$lang.Options}</th>
					</tr>
					{foreach from=$autobids item=autobid}
						<tr>
							<td><a href="/auctions/view/{$autobid.auction_id}">{$autobid.auction_id}</a></td>
							<td>{$autobid.minimum_price}</td>
							<td>{$autobid.maximum_price}</td>
							<td>{$autobid.total_bids}</td>
							<td>{$autobid.bids}</td>
							<td>{$autobid.date}</td>
							<td>{if $autobid.active == 1}<a href="/autobids/suspend/{$autobid.id}">{$lang.Suspend}</a>{else}<a href="/autobids/activate/{$autobid.id}">{$lang.Activate}</a>{/if} | <a href="/autobids/delete/{$autobid.id}">{$lang.Delete}</a></td>
						</tr>
					{/foreach}
				</table>
		</div>
	</div>
</div>

{include file='footer.tpl'}

