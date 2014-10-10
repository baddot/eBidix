{include file='elements/header.tpl'}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.Buynow}</div>
			
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
{include file='elements/footer.tpl'}
