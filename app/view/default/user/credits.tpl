{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.User_menu.My_credits}</li>
		</ol>
		<div class="content">
			<table cellpadding="0" cellspacing="0" align="center" class="table">
					<tr>
						<th>{$lang.Date}</th>
						<th>{$lang.Description}</th>
						<th>{$lang.Details}</th>
						<th>{$lang.Credits}</th>
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
							<td>{$bid.description}</td>
							<td>{$bid.details}</td>
							<td>{$bid.credit}</td>
						</tr>
					{/foreach}
				</table>
		</div>
	</div>
</div>

{include file='footer.tpl'}

