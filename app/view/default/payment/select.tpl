{include file='header.tpl'}

<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> > {$lang.Choose_your_payment}</div>
	<div class="content">
		<div class="payments_subtitle">
			{if isset($coupon)}
				<p>
					{$lang.Coupon_submitted} : {$coupon.code}
					{if $coupon.type == 1 || $coupon.type == 3}-{$coupon.saving}%{else}+{$coupon.saving} {$lang.Credits}{/if}
					(<a href="/package/delete_coupon">{$lang.Delete}</a>)
				</p>
			{/if}
			<span style="color:black; font-weight:bold;">{$data.name}</span>
			{if $data.model == 'package'}
				<span style="color:#e06c0b; font-weight:bold;">{$data.bids} crédit(s) ({$data.price}&euro;)</span>
			{elseif $data.model == 'auction'}
				<span style="color:#e06c0b; font-weight:bold;">{$data.price}&euro;</span>
			{/if}
		</div>
		<div class="arrow"></div>
		<div class="paypal">
			<a href="/payment?name=paypal&model={$data.model}&id={$data.id}">
				<span style="font-weight:bold; color:#000000;">Paypal</span>
				<br><img src="/assets/img/paypal_logo.jpg" alt="Paypal" />
			</a>
		</div>
		<!--<div class="credit_card">
			<a href="/payment?name=credit_card&model={$data.type}&id={$data.id}">
				<img src="/assets/img/credit_card_logo.png" alt="Carte de crédit" />
				<br /><span style="font-weight:bold; color:#000000;">Carte de crédit</span>
			</a>
		</div>-->
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}
