{include file='header.tpl'}
	
<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.Contact}</div>
	<div class="content">
		<form action="/contact" method="post">
			<ul>
				{if !isset($smarty.session.user_id)}
					<li><input type="email" name="email" placeholder="{$lang.Email}" required autofocus></li>
				{else}
					<input type="hidden" name="user_id" value="{$smarty.session.user_id}">
				{/if}
				<li><input type="text" name="object" placeholder="{$lang.Object}" required></li>
				<li><textarea name="message" cols="50" rows="10" placeholder="{$lang.Message}" required></textarea></li>
				<li><input type="submit" class="button green" value="{$lang.Send}"></li>
			</ul>
		</form>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}
