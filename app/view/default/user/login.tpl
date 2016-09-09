{include file='header.tpl'}
	
<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> > {$lang.Login_page}</div>
	<div class="content">
		<form method="post" action="/user/login">
			<ul>
				<li><input type="text" name="username" placeholder="{$lang.Username}" required autofocus></li>
				<li><input type="password" name="password" placeholder="{$lang.Password}" required></li>
				<li><input type="submit" class="button green" name="submit" value="{$lang.Login}"></li>
			</ul>
		</form>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}
