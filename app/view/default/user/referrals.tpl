{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.User_menu.Referrals}</div>
			
			<div>
				<u><b>Voici vos informations dans l'optique du parrainage</b></u>
				<br /><br />Proposez ce lien aux personnes intéressées pour devenir leur parrain :
				<br /><b><a href="/?pid={$user.id}">{$settings.app.site_url}/?pid={$user.id}</a></b>
				{*<br /><br />Voici des bannières à installer sur votre site :
				<br /><br />•  Bannière format 468x60 (<a href="/themes/default/images/banner_468x60.gif" target="_blank">{$lang.View}</a>)
				<br /><textarea cols="70" rows="3"><a href="{$settings.app.site_url}/?pid={$user.id}"><img src="{$settings.app.site_url}/themes/default/images/banner_468x60.gif" alt="" /></a></textarea>*}
			</div>
			<div class="items_list" style="margin:30px 0 0 15px;">
				<u><b>{$lang.Referred_list}</b></u><br /><br />
				<table cellpadding="0" cellspacing="0">
					<tr>
						<th width="150">{$lang.Referred_username}</th>
						<th width="170">{$lang.Register_date}</th>
						<th width="150">{$lang.First_buy_date}</th>
						<th width="130">{$lang.Credits_offered}</th>
					</tr>
					{foreach from=$referrals item=referral}
						<tr>
							<td align="center">{$referral.username}</td>
							<td>{$referral.date_register}</td>
							<td>{if $referral.confirmed == 1}{$referral.date_buy}{else}{$lang.Waiting}{/if}</td>
							<td>{if empty($referral.won_credits)}{$lang.not_confirmed}{else}{$referral.won_credits}{/if}</td>
						</tr>
					{foreachelse}
						<tr><td>{$lang.No_referreds}</td></tr>
					{/foreach}
				</table>
			</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
