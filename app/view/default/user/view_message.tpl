{include file='header.tpl'}

	<div id="left-column">
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; <a href="/messages">{$lang.User_menu.My_messages}</a> &raquo; {$lang.View}</div>
		<div class="content">
			<div style="text-align:left;">
				<p><b>{$message.object}</b></p>
				<div style="background-color:#ffffff; padding:10px;">{$message.message}</div>
				<p>
					<button class="button small blue" onClick="show_box('send_message');"><span>{$lang.Reply}</span></button>
					<div id="send_message" style="display:none; margin-top:10px;">
						<form method="POST" action="/users/view_message/{$message.id}">
							<textarea name="message" cols="75" rows="10"></textarea> <br /><br />
							<button class="button green" name="submit"><span>{$lang.Send}</span></button>
						</form>
					</div>
				</p>
			</div>
		</div>
	</div>

</div>
{include file='footer.tpl'}
