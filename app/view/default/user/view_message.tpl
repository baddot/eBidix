{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li>{$lang.User_menu.My_messages}</li>
		  <li class="active">{$lang.View}</li>
		</ol>
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
