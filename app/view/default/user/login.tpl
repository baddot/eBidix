{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Login_page}</li>
		</ol>
		<div class="content">
			<form method="post" action="/user/login">
				<div class="form-group">
				  <input type="text" id="username" class="form-control" name="username" placeholder="{$lang.Username}" required autofocus>
				</div>
				
				<div class="form-group">
				  <input type="password" id="password" class="form-control" name="password" placeholder="{$lang.Password}" required>
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-success" name="submit" value="{$lang.Login}">
				</div>
			</form>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
