{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li>{$lang.Menu.My_account}</li>
		  <li class="active">{$lang.User_menu.Change_password}</li>
		</ol>
		<div class="content">
			<form method="POST" action="/user/edit_password">
				<div class="form-group">
				  <input type="password" class="form-control" name="old_password" placeholder="{$lang.Old_password}" required>
				</div>
				
				<div class="form-group">
				  <input type="password" class="form-control" name="new_password" placeholder="{$lang.New_password}" required>
				</div>
				
				<div class="form-group">
				  <input type="submit" class="btn btn-success" value="{$lang.Edit}">
				</div>
		</form>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}

