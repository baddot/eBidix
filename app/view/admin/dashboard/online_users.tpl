{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Online_users}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Online_users}</h3>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.User}</th>
									<th>{$lang.Connected_from}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$users item=user}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/admin/users/view/{$user.id}">{$user.username}</a></td>
										<td>{$user.last_access|date_format:"%d-%m-%Y %H:%M:%S"}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/users/view/{$user.id}">{$lang.View}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}