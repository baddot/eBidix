{include file='header.tpl'}

	<div id="left-column">
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.User_menu.My_credits}</div>
		<div class="content">
			<div class="items_list">
				<table cellpadding="0" cellspacing="0" align="center">
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
			<div class="pagination">{$lang.Page}: {pagination params=$pagination}{/pagination}</div>
		</div>
	</div>

</div>

{include file='footer.tpl'}
