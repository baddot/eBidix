{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<div class="auction-item" id="auction_{$auction.id}">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="auction-image">
						<div class="big">
							<a href="/assets/img/product/thumb/{$auction.product_id}/product_gallery.jpg" class="fancybox" rel="group"><img src="/assets/img/product/thumb/{$auction.product_id}/product_gallery.jpg" width="240" height="240" alt=""></a>
						</div>
						<div class="thumbs-list">
							<ul>
								{counter assign=counter start=0}
								{foreach from=$images item=image}
									{counter}
									<li><a rel="img{$counter}" href="#"><img src="/assets/img/product/thumb/{$auction.product_id}/product_thumb.jpg" width="44" height="44" alt=""></a></li>
								{/foreach}
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h2>{$auction.product_name}</h2>

					<div class="content">
						<a href="#" id="auction-options-link"></a>
						<div class="auction-options">
							<ul>
								<li>- <a href="/auction/add_watch/{$auction.id}">{$lang.Follow_auction}</a></li>
								{if $auction.status_id == 1}<li>- <a href="/auction/alert/{$auction.id}">{$lang.Email_alert}</a></li>{/if}
							</ul>
						</div>
						<div class="bid-config">
							{if $auction.type == 4}<img src="/assets/img/icons/fixed_auction_icon.png" alt="" />
							{elseif $auction.type == 5}<img src="/assets/img/icons/beginner_icon.png" alt="" />
							{elseif $auction.type == 6}<img src="/assets/img/icons/vip_icon.png" alt="" />
							{/if}
							{if $auction.podium == 1}<img src="/assets/img/icons/auction_podium_icon.png" title="{$lang.Podium}" alt="" />{/if}
							{if $auction.autobids == 0}<img src="/assets/img/icons/auction_autobids_icon.png" title="{$lang.Autobids}" alt="" />{/if}
							{if $auction.buynow == 1}<img src="/assets/img/icons/auction_buynow_icon.png" title="{$lang.Buynow}" alt="" />{/if}
							<img src="/assets/img/icons/time_increment_{$auction.time_increment}.png" alt="" />
							<img src="/assets/img/icons/bid_debit_{$auction.bid_debit}.png" alt="" />
							{if $auction.price_increment == '0.01'}<img src="/assets/img/icons/price_increment_1.png" alt="" />
							{elseif $auction.price_increment == '0.02'}<img src="/assets/img/icons/price_increment_2.png" alt="" />
							{elseif $auction.price_increment == '0.03'}<img src="/assets/img/icons/price_increment_3.png" alt="" />
							{elseif $auction.price_increment == '0.04'}<img src="/assets/img/icons/price_increment_4.png" alt="" />
							{elseif $auction.price_increment == '0.05'}<img src="/assets/img/icons/price_increment_5.png" alt="" />
							{/if}
						</div>
						<div class="bid-price">{$auction.price}{$settings.app.currency_code}</div>
						<div class="product-price">{$lang.Value}: <b>{$auction.product_price}{$settings.app.currency_code}</b></div>
						<div class="countdown" id="timer_{$auction.id}">--:--:--</div>
						<div class="bid-bidder">&nbsp;</div>
						<div class="bid-button">
							{if $auction.closed != 1 && $auction.status_id == 3}
								<a class="btn btn-success" id="{$auction.id}">{$lang.Bid}</a>
							{/if}
						</div>
					</div>
					<div class="bid-message"></div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					{if $auction.status_id > 3}<div class="economy">{$lang.Economy}: <span class="bid-savings-percentage">&nbsp;</span></div>{/if}
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					{if $auction.autobids == 1 && isset($smarty.session.user_id)  && $auction.closed == 0}
						<h3>{$lang.Program_your_auction}</h3>
						<form method="POST" action="/autobid/set/{$auction.id}">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 10px;">
								<div class="form-group">
								  <label>{$lang.Minimum_price}</label>
								  <input type="text" name="minimum_price" class="form-control" />
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 10px;">
								<div class="form-group">
								  <label>{$lang.Maximum_price}</label>
								  <input type="text" name="maximum_price" class="form-control" />
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 10px;">
								<div class="form-group">
								  <label>{$lang.Maximum_bids}</label>
								  <input type="text" name="bids" class="form-control" />
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 10px;">
								<div class="form-group">
									<label style="width:100%;">&nbsp;</label>
									<input type="submit" name="submit" class="btn btn-primary" value="{$lang.Save}" />
								</div>
							</div>
						</form>
					{/if}
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>{$lang.History}</h3>
					<div id="bidHistoryTable{$auction.id}" class="bid-histories">
						<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-hover">
							<thead>
								<tr>
									<th>{$lang.Date}</th>
									<th>{$lang.Price}</th>
									<th>{$lang.Username}</th>
									<th>{$lang.Type}</th>
								</tr>
							</thead>
							<tbody id="bidHistoryTable{$auction.id}tbody"></tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>{$lang.Description}</h3>
					<div>
						{$auction.description}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
