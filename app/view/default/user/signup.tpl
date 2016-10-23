{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Menu.Sign_up}</li>
		</ol>
		<div class="content">
			<form method="post" action="/user/signup">
				<div class="form-group">
				  <input type="text" id="username" class="form-control" name="username" placeholder="{$lang.Username}" value="{if isset($data.username)}{$data.username}{/if}" required autofocus>
				</div>
				
				<div class="form-group">
				  <input type="email"  id="email" class="form-control" name="email" placeholder="{$lang.Email}" value="{if isset($data.email)}{$data.email}{/if}" required>
				</div>
				
				<div class="form-group">
				  <input type="password" id="password" class="form-control" name="password" placeholder="{$lang.Password}" value="{if isset($data.password)}{$data.password}{/if}" required>
				</div>
				
				{if $settings.app.captcha}
					<div><img src="/user/captcha" width="160" height="60" alt="" /></div>
					<div class="form-group">
					  <input type="text" id="captcha" class="form-control" name="captcha" placeholder="{$lang.Verification_code}" required>
					</div>
				{/if}
				
				<div class="form-group">
					<div class="checkbox">
						<label><input type="checkbox" name="terms" value="1" checked required>{$lang.cgu_accept}</label>
					</div>
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-success" name="signup" value="{$lang.Register}">
				</div>
			</form>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}

