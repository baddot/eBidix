{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.User_menu.My_messages}</li>
		</ol>
		<div class="content">
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

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
