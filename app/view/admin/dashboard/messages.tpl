{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Messages}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Mailbox}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Archives}</a></li>
							<li><a href="#">{$lang.Send}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<form method="POST" action="/admin/dashboard/messages">
							<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
								<thead>
									<tr>
										<th class="nosort"><input type="checkbox" class="checkall" /></th>
										<th>{$lang.Messages}</th>
										<th class="nosort"><a class="action" href="#"></a></th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$messages item=message}
										<tr {if $message.open == 0}style="background-color:#ecf2f6;"{/if}>
											<td class="small"><input type="checkbox" name="message_{$message.id}" value="{$message.id}" /></td>
											<td><a class="no_visible" href="/admin/dashboard/view_message/{$message.id}"><span style="font-weight:bold; color:black;">{$message.object}</span> - {$message.message|truncate:60}</span></a></td>
											<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/dashboard/view_message/{$message.id}">{$lang.View}</a></li><li><a href="/admin/dashboard/delete_message/{$message.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
										</tr>
									{/foreach}
								</tbody>
							</table>
							<div class="tableactions">
								<select name="actions">
									<option>{$lang.Actions}...</option>
									<option value="set_read">{$lang.Set_read}</option>
									<option value="archive">{$lang.Archive}</option>
									<option value="delete">{$lang.Delete}</option>
								</select>
								<button class="button blue small left"><span>{$lang.Apply_to_selected}</span></button>
							</div>
						</form>
					</div>
					
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Messages}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$archived_messages item=message}
									<tr {if $message.open == 0}style="background-color:#ecf2f6;"{/if}>
										<td class="small"><input type="checkbox" name="message_{$message.id}" value="{$message.id}" /></td>
										<td><a class="no_visible" href="/admin/dashboard/view_message/{$message.id}"><span style="font-weight:bold; color:black;">{$message.object}</span> - {$message.message|truncate:60}</span></a></td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/dashboard/view_message/{$message.id}">{$lang.View}</a></li><li><a href="/admin/dashboard/delete_message/{$message.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/dashboard/messages">
							<p>
								<label>{$lang.To} <span style="color:red;">*</span> : </label> 
								<input type="text" name="email" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Object} <span style="color:red;">*</span> : </label> 
								<input type="text" name="object" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Message} <span style="color:red;">*</span> : </label><br />
								<textarea class="wysiwyg" name="message" rows="5" cols="60"></textarea>
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Send}</span></button>
								<br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}