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
			Vous avez choici: 
			<span style="color:black; font-weight:bold;">{$data.name} - </span>
			{if $data.type == 'package'}
				<span style="color:#e06c0b; font-weight:bold;">{$data.bids} crédit(s) ({$data.price}&euro; TTC)</span>
			{elseif $data.type == 'auction'}
				<span style="color:#e06c0b; font-weight:bold;">{$data.price}&euro; TTC</span>
			{/if}
		</div>
		<div class="article">
			{if $data.type == 'package'}
				{if $data.bids == 1}<img src="/themes/shoppingPlayer/images/smiles-pack-1.png" alt="" />
				{elseif $data.bids == 2}<img src="/themes/shoppingPlayer/images/smiles-pack-2.png" alt="" />
				{elseif $data.bids == 10}<img src="/themes/shoppingPlayer/images/smiles-pack-10.png" alt="" />
				{elseif $data.bids == 20}<img src="/themes/shoppingPlayer/images/smiles-pack-20.png" alt="" />
				{elseif $data.bids == 50}<img src="/themes/shoppingPlayer/images/smiles-pack-50.png" alt="" />
				{elseif $data.bids == 100}<img src="/themes/shoppingPlayer/images/smiles-pack-100.png" alt="" />
				{elseif $data.bids == 250}<img src="/themes/shoppingPlayer/images/smiles-pack-250.png" alt="" />
				{elseif $data.bids == 500}<img src="/themes/shoppingPlayer/images/smiles-pack-500.png" alt="" />
				{/if}
			{/if}
		</div>
		<div class="arrow"></div>
		<div class="paypal">
			<img src="/themes/shoppingPlayer/images/paypal_logo.png" alt="Paypal" />
			<br /><span style="font-weight:bold; color:#000000;">Paypal</span>
		</div>
		<div class="credit_card">
			<img src="/themes/shoppingPlayer/images/credit_card_logo.png" alt="Carte de crédit" />
			<br /><span style="font-weight:bold; color:#000000;">Carte de crédit</span>
			<br /><span style="font-size:11px; color:#666666;">avec la Société Générale</span>
		</div>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}
