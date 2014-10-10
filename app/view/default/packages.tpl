{include file='header.tpl'}
	
<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.Menu.Buy_credits}</div>
	<div class="content">	
		<p style="font-weight:bold;">{$lang.Different_packages} :</p>
		<ul class="packages-list">
			{foreach from=$packages item=package}
				<li>
					<div>
						<img src="/assets/img/pack_{$package.bids}.png" alt=""><br>
						{$package.bids} {$lang.credits} ({$package.price}{$settings.app.currency_code})
					</div>
					<div style="margin-top:10px;"><a class="button orange" style="margin-top:10px;" href="/payment/select?model=package&id={$package.id}">{$lang.Buy}</a></div>
				</li>
			{/foreach}
		</ul>					
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>
	
{include file='footer.tpl'}
