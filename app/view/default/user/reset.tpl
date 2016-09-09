{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Reset_password_title}</li>
		</ol>
		<div class="content">
			<p>{$lang.Password_reset_text}</p>
			<p>
				<form method="POST" action="/user/reset">
						<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="{$lang.Email}" required autofocus>
						</div>
						<div class="form-group">
						<input type="submit" class="btn btn-success" name="submit" value="{$lang.Submit}">
						</div>
				</form>
			</p>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
