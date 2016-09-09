{if isset($ads)}
	<div id="ad">
		<ul>
			{foreach from=$ads item=ad}
				<li>{$ad.img}</li>
			{/foreach}
		</ul>
	</div>
{/if}

<<<<<<< HEAD
<div class="well">
	<div>
		{if isset($smarty.session.user_id)}
			<div class="content">
				{$lang.Hi} <strong>{$smarty.session.username}</strong>,
				<br>{$lang.you_have} <span class="bid-balance" style="font-weight:bold;">{if !empty($user.balance)}{$user.balance}{else}0{/if}</span> {$lang.credits}
			</div>
		{/if}
=======
{if isset($smarty.session.user_id)}
	<div class="content">
		{$lang.Hi} {$smarty.session.username},
		<br>{$lang.you_have} <span class="bid-balance" style="font-weight:bold;">{if !empty($user.balance)}{$user.balance}{else}0{/if}</span> {$lang.credits}
>>>>>>> 61ea784ce2063bc7be7f33a27a060646a4812729
	</div>
</div>



{if isset($auction.buynow) && $auction.buynow == 1}
<div class="well">
    <h4>{$lang.Buynow}</h4>
    <div>
			<div class="descriptions">
				<p>{$lang.Product_price}</p>
				<p>{$lang.Delivery_cost}</p>
				<p>{$lang.Spent_credits}</p>
				<p><span style="font-weight:bold;">{$lang.Total}</span></p>
			</div>
			<div class="prices">
				<p>{$auction.product_price}{$settings.app.currency_code}</p>
				<p>+ {$auction.delivery_cost}{$settings.app.currency_code}</p>
				<p>- {$auction.spent_credits}{$settings.app.currency_code}</p>
				<p><span style="font-weight:bold;">{math equation="x + y - z" x=$auction.product_price y=$auction.delivery_cost z=$auction.spent_credits}{$settings.app.currency_code}</span></p>
			</div>

			<center>
				<a class="btn btn-warning" href="/auction/buy/{$auction.id}">{$lang.Buy}</a>

				<div class="infos">{$lang.Buynow_available_only}</div>
			</center>
		</div>
</div>
{/if}

<!-- Blog  Well -->
<div class="well">
    <h4>{$lang.Legends}</h4>
    <div>
			<ul class="right-list">
				<li><img src="/assets/img/icons/beginner_icon.png" alt="" /> <span class="text">{$lang.Beginner_option}</span></li>
				<li><img src="/assets/img/icons/vip_icon.png" alt="" /> <span class="text">{$lang.Vip_auction}</span></li>
				<li><img src="/assets/img/icons/fixed_auction_icon.png" alt="" /> <span class="text">{$lang.Fixed_price_auction}</span></li>
				<li><img src="/assets/img/icons/auction_podium_icon.png" alt="" /> <span class="text">{$lang.Podium_option}</span></li>
				<li><img src="/assets/img/icons/auction_autobids_icon.png" alt="" /> <span class="text">{$lang.No_autobids}</span></li>
				<li><img src="/assets/img/icons/auction_buynow_icon.png" alt="" /> <span class="text">{$lang.Buy_now}</span></li>
				<li><img src="/assets/img/icons/time_increment_45.png" alt="" /> <span class="text">{$lang.Time_increment}</span></li>
				<li><img src="/assets/img/icons/bid_debit_1.png" alt="" /> <span class="text">{$lang.Bid_debit}</span></li>
				<li><img src="/assets/img/icons/price_increment_1.png" alt="" /> <span class="text">{$lang.Price_increment}</span></li>
			</ul>
		</div>
    <!-- /.input-group -->
</div>
