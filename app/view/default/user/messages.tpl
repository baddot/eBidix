{include file='header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.Messages}</div>
		</div>
		<div id="user-menu">
			{include file='user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.User_menu.My_messages}</div>
			
			{if !empty($errors_text)}
				<div style="color:red; font-weight:bold; margin-bottom:15px;">
					{$errors_text}
				</div>
			{/if}
			
			<div style="text-align:left; margin-left:65px;">
				<ul>
					{foreach from=$messages item=message}
						<li><a class="no_visible" href="/users/view_message/{$message.id}"><span style="font-weight:bold; color:black;">{$message.object}</span> - <em>{$message.message|truncate:60|strip_tags}</em></span></a></li>
					{/foreach}
				</ul>
			</div>
		</div>
	</div>
	
</div>
{include file='footer.tpl'}
