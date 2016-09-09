{include file='header.tpl'}

<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; <a href="/account">{$lang.Menu.My_account}</a> &raquo; {$lang.User_menu.Change_password}</div>	
	<div class="content">
		<form method="POST" action="/user/edit_password">
			<ul>
				<li><input type="password" name="old_password" placeholder="{$lang.Old_password}" required></li>
				<li><input type="password" name="new_password" placeholder="{$lang.New_password}" required></li>
				<li><input type="submit" class="button green" value="{$lang.Edit}"></li>
			</ul>
		</form>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}
