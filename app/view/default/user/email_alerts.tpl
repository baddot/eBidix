{include file='header.tpl'}

<div id="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
			<li><a href="/">{$lang.Home}</a></li>
			<li class="active">{$lang.User_menu.My_email_alerts}</li>
		</ol>
		<div class="content">
			<table cellpadding="0" cellspacing="0" align="center" class="table">
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

{include file='footer.tpl'}
