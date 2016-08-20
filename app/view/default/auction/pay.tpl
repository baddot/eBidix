{include file='header.tpl'}

	<div id="left-column">
		<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; <a href="/won-auctions">{$lang.User_menu.My_won_auctions}</a> &raquo; {$lang.Pay}</div>
		<div class="content">

			<div style="margin-left:15px;">{$lang.Pay_text} <b>{math equation="a + b" a=$auction.price b=$auction.delivery_cost}&euro;</b> ({$auction.price}&euro; + {$auction.delivery_cost}&euro; {$lang.delivery_fees}) {$lang.for_the_auction}<a href="/auctions/view/{$auction.id}">{$auction.id}</a></div>
			<form method="GET" action="/payment">
				<input type="hidden" name="id" value="{$auction.id}" />
				<div style="margin-top:30px;">
					<p><b>{$lang.Choose_your_product}</b></p>
					<p>
						<input type="radio" name="model" value="auction" /> {$lang.Won_product}
						{if $settings.app.credits_deal}<br /><input type="radio" name="model" value="credits" />{$auction.credits_deal} {$lang.Bids_credited_account}{/if}
					</p>
				</div>
				<div style="margin-top:30px;">
					<p><b>{$lang.Choose_your_payment} :</b></p>
					<p>
						{if $settings.credit_card.active}<input type="radio" name="name" value="credit_card" /> {$lang.Credit_card} {/if}
						{if $settings.paypal.active}<input type="radio" name="name" value="paypal" /> {$lang.Paypal}{/if}
					</p>
					<p><button class="button green" name="submit"><span>{$lang.Pay}</span></button></p>
				</div>
			</form>
		</div>
	</div>

</div>

{include file='footer.tpl'}
