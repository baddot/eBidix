{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Menu.Buy_credits}</li>
		</ol>
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

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
