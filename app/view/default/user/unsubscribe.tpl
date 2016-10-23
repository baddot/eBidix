{include file='header.tpl'}
	
	<div id="left-column">
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> > {$lang.Unsubscribe}</div>
		<div class="content">
			<p>{$lang.Unsubscribe_text}:</p>
			<p>
				<form method="POST" action="/user/unsubscribe">
					<ul>
						<li><input type="email" name="email" placeholder="{$lang.Email}" required autofocus></li>
						<li><input type="submit" class="button green" name="submit" value="{$lang.Submit}"></li>
					</ul>
				</form>
			</p>
		</div>
	</div>
	
	<div id="right-column">
		{include file='right_column.tpl'}
	</div>
	
</div>
{include file='footer.tpl'}
