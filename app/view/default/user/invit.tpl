{include file='header.tpl'}

	{literal}
	<script type='text/javascript'>
		function toggleAll(element) {
			var form = document.forms.openinviter, z = 0;
			for(z=0; z<form.length;z++) {
				if(form[z].type == 'checkbox') form[z].checked = element.checked;
			}
		}
	</script>
	{/literal}

	<div id="left-column">
			<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.User_menu.Invit_my_friends}</div>
			<div class="content">
				
			<div>
				<div style="text-align:left; margin-left:25px;">
					<b>{$lang.Title_invit_1}</b>
					<br />{$lang.Text_invit_1}
				</div>

				<div style="margin-top:15px;">
					{$lang.Title_invit_2}
					<br /><form id="InviteIndexForm" method="post" action="/users/invit">
					<textarea name="friends_email" id="recipient_list" cols="70" rows="10" >{$contents}{if !empty($errors)}{foreach from=$errors item=error}{$error}{/foreach}{/if}{if !empty($success)}{foreach from=$success item=msg}{$msg}{/foreach}{/if}</textarea>
					<div style="margin-top:15px;">
						<label for="InviteMessage">{$lang.Invitation_message}</label><br/>
						<textarea name="message" cols="70" rows="10" id="InviteMessage" >Salut!

Je viens de découvrir un nouveau site d'enchères {$settings.app.site_name} et j'ai pensé que ça t'intéresserait.

Voici une invitation pour créer un compte, n'oublie pas de préciser que je te parraine (ou clique sur le lien ci-dessous).
http://www.bidjokers.com/?pid={$user.id}

{$user.first_name}</textarea>
					</div>
					<div class="submit" style="text-align:center;"><button class="button green"><span>{$lang.Invit}</span></button></div>
					</form>
				</div>

				{if !$import_ok}
					<div style="text-align:center; font-weight:bold; margin-top:30px;">{$lang.Import_text}</div>
					<br />
					<form action="/users/invit" method="POST" name="openinviter">
						<table align='center' class='thTable' cellspacing='2' cellpadding='0' style='border:none;'>
							<tr class='thTableRow'>
								<td align='right'><label for='provider_box'>{$lang.Platform} : </label></td>
								<td><select class='thSelect' name='provider_box'>
										<option value=''></option>";
										{foreach from=$oi_services key=type item=providers}
											{foreach from=$providers key=provider item=details}
													<option value='{$provider}' {if $smarty.post.provider_box == $provider}selected="selected"{/if}>{$details.name}</option>
											{/foreach}
										{/foreach}
									</select>
								</td>
							</tr>
							<tr class='thTableRow'>
								<td align='right'><label for='email_box'>{$lang.Email} : </label></td>
								<td><input class='thTextbox' type='text' name='email_box' value='{$smarty.post.email_box}'></td>
							</tr>
							<tr class='thTableRow'>
								<td align='right'><label for='password_box'>{$lang.Password} : </label></td>
								<td><input class='thTextbox' type='password' name='password_box' value='{$smarty.post.password_box}'></td>
							</tr>
							<tr class='thTableImportantRow'><td colspan='2' align='center'><button class="button green" name="import"><span>{$lang.Import}</span></button></td></tr>
						</table>
						<input type='hidden' name='step' value='get_contacts'>
					</form>
				{/if}
			</div>
		</div>
	</div>

</div>

{include file='footer.tpl'}
