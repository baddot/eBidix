{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/dashboard/messages">{$lang.Messages}</a> &raquo {$lang.View}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$message.object}</h3>
					</div>
					<div class="bcont">
						{if !empty($message.username)}{$message.first_name} {$message.last_name} (<a href="/admin/users?user_id={$message.sender_id}">{$message.username}</a>){else}{$message.email}{/if}
						<p style="background-color:#f5f5f5; padding:10px;">{$message.message}</p>
						<p>
							<div><button class="button small blue" onClick="show_box('send_message');"><span>{$lang.Reply}</span></button></div>
							<div id="send_message" style="display:none; margin-top:10px;">
								<form method="POST" action="/admin/dashboard/send_message/{$message.id}">
									<textarea class="wysiwyg" name="message" rows="5" cols="60"></textarea> <br />
									<button class="button green" name="submit"><span>{$lang.Send}</span></button>
								</form>
							</div>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}