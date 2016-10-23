
{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Buynow}</li>
		</ol>
		<div class="content">
			<div>
				<div>{$lang.Product_buy}: <b>{$auction.product_name}</b></div>

				<div>
					{if $can_buy}
						<div style="margin-top:15px;">{$lang.You_will_pay} <b>{$auction.price_to_buy}&euro;</b></div>
						<div style="margin-top:15px;">
							<p>
								<form method="POST" action="/auctions/buy/{$auction.id}">
									<input type="hidden" name="confirm" value="1" />
									<button class="button green"><span>{$lang.Confirm}</span></button>
								</form>
							</p>
						</div>
					{else}
						<div style="margin-top:15px;">
							<span style="color:red;">{$lang.Cant_buynow}</span><br />
							<a href="/auctions/view/{$auction.id}">{$lang.Return_to_auction}</a>
						</div>
					{/if}
				</div>
			</div>
		</div>
	</div>

</div>

{include file='footer.tpl'}
