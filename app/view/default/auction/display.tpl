				{if $sort == 'labels'}
					<div class="label auction-item col-xs-12 col-sm-12 col-md-4 col-lg-4" id="auction_{$auction.id}">
						<div class="au_item">
						<h2><a href="/{$auction.id}-{$auction.link_name}" title="{$auction.name}">{$auction.name}</a></h2>
						<div class="details">
							<div class="image">
								<a href="/{$auction.id}-{$auction.link_name}"><img src="{$settings.app.site_url}/assets/img/product/thumb/{$auction.product_id}/home_label.jpg" width="160" height="120" alt="{$auction.name}"></a>
							</div>
							<div class="infos">
								<div class="bid-price">{$auction.price}{$settings.app.currency_code}</div>
								<div class="product-price">{$lang.Value}: <b>{$auction.product_price}{$settings.app.currency_code}</b></div>
								<div class="countdown" id="timer_{$auction.id}">--:--:--</div>
								<div class="bid-bidder"></div>
								<div class="bid-button">
									{if $auction.closed != 1}
										{if $auction.status_id == 1}
											<div class="set-autobid"><a href="/{$auction.id}-{$auction.link_name}">{$lang.Set_autobid}</a></div>
											<a class="btn btn-success" id="{$auction.id}" style="display:none;">{$lang.Bid}</a>
										{else}	
											<a class="btn btn-success" id="{$auction.id}">{$lang.Bid}</a>
										{/if}
									{/if}
								</div>
							</div>
						</div>
						<div class="bid-message"></div>
						</div>
					</div>
				{elseif $sort == 'list'}
					<div class="list auction-item col-xs-12 col-sm-12 col-md-4 col-lg-4" id="auction_{$auction.id}">
						<div class="au_item">
						<div class="image">
							<a href="/{$auction.id}-{$auction.link_name}"><img src="{$settings.app.site_url}/assets/img/product/thumb/{$auction.product_id}/home_list.jpg" width="60" height="35" alt="{$auction.name}"></a>
						</div>
						<h2><a href="/{$auction.id}-{$auction.link_name}">{$auction.name}</a></h2>
						<div class="infos-1">
							<div class="bid-price">{$auction.price}{$settings.app.currency_code}</div>
							<div class="product-price">{$lang.Value}: {$auction.product_price}{$settings.app.currency_code}</div>
						</div>
						<div class="countdown" id="timer_{$auction.id}">--:--:--</div>
						<div class="infos-2">	
							<div class="bid-bidder"></div>
						</div>
						<div class="bid-button">	
							{if $auction.closed != 1}
								{if $auction.status_id == 1}
									<div class="set-autobid"><a href="/{$auction.id}-{$auction.link_name}">{$lang.Set_autobid}</a></div>
									<a class="btn btn-success" id="{$auction.id}" style="display:none;">{$lang.Bid}</a>
								{else}	
									<a class="btn btn-success" id="{$auction.id}">{$lang.Bid}</a>
								{/if}
							{/if}
						</div>
						<div class="bid-message"></div>
						</div>
					</div>
				{/if}