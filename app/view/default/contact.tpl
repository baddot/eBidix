
{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Contact}</li>
		</ol>
		<div class="content">
			<form action="/contact" method="post">
<<<<<<< HEAD
				
					{if !isset($smarty.session.user_id)}
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="{$lang.Email}" required autofocus>
						</div>
					{else}
						<div class="form-group">
							<input type="hidden" class="form-control" name="user_id" value="{$smarty.session.user_id}">
						</div>
					{/if}
					<div class="form-group">
						<input type="text" class="form-control" name="object" placeholder="{$lang.Object}" required>
					</div>
					<div class="form-group">
						<textarea name="message" class="form-control" cols="50" rows="10" placeholder="{$lang.Message}" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="{$lang.Send}">
					</div>
=======
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
>>>>>>> 61ea784ce2063bc7be7f33a27a060646a4812729
			</form>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
