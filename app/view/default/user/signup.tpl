{include file='header.tpl'}

	<div id="left-column">	
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.Menu.Sign_up}</div>
		<div class="content">
			<form method="post" action="/user/signup">
				<ul>
					<li><input type="text" name="username" placeholder="{$lang.Username}" value="{if isset($data.username)}{$data.username}{/if}" required autofocus></li>
					<li><input type="email" name="email" placeholder="{$lang.Email}" value="{if isset($data.email)}{$data.email}{/if}" required></li>
					<li><input type="password" name="password" placeholder="{$lang.Password}" value="{if isset($data.password)}{$data.password}{/if}" required></li>
					{if $settings.app.captcha}
						<li><img src="/user/captcha" width="160" height="60" alt="" /></li>
						<li><input type="text" name="captcha" placeholder="{$lang.Verification_code}" required></li>
					{/if}
					<li><input type="checkbox" name="terms" value="1" checked required> {$lang.cgu_accept}</li>
					<li><input type="submit" class="button green" name="signup" value="{$lang.Register}"></li>
				</ul>
			</form>
		</div>
	</div>
	
	<div id="right-column">
		{include file='right_column.tpl'}
	</div>
	
</div>

{include file='footer.tpl'}
