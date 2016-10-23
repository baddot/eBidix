{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Connexions}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Connexions}</h3>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Connect_date}</th>
									<th>{$lang.Username}</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$connexions item=connexion}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$connexion.created}</td>
										<td><a href="/admin/users/view/{$connexion.user_id}">{$connexion.username}</a></td>
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