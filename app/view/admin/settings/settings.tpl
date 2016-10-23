{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Settings}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Settings}</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th>{$lang.Name}</th>
									<th>{$lang.Value}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$settings_data item=setting}
									<tr>
										<td>
											<div style="float:left; display:inline;">
											{if $setting.name == 'contact_email'}{$lang.Contact_email}
											{elseif $setting.name == 'auction_peak_start'}{$lang.Auction_peak_start}
											{elseif $setting.name == 'auction_peak_end'}{$lang.Auction_peak_end}
											{elseif $setting.name == 'free_register_credits'}{$lang.Free_register_credits}
											{elseif $setting.name == 'free_referral_register_credits'}{$lang.Free_referral_credits}
											{elseif $setting.name == 'free_referral_buy_credits'}{$lang.Free_ref_buy_credits}
											{elseif $setting.name == 'free_signup_credits'}{$lang.Free_signup_credits}
											{elseif $setting.name == 'free_first_buy_credits'}{$lang.Free_first_buy_credits}
											{elseif $setting.name == 'default_meta_title'}{$lang.Default_meta_title}
											{elseif $setting.name == 'default_meta_description'}{$lang.Default_meta_description}
											{elseif $setting.name == 'default_meta_keywords'}{$lang.Default_meta_keywords}
											{elseif $setting.name == 'theme'}{$lang.Theme}
											{elseif $setting.name == 'site_live'}{$lang.Site_live}
											{elseif $setting.name == 'poll'}{$lang.Poll_mod}
											{elseif $setting.name == 'coupons'}{$lang.Coupons}
											{elseif $setting.name == 'bid_value'}{$lang.Bid_value}
											{elseif $setting.name == 'bid_avg_value'}{$lang.Bid_avg_value}
											{elseif $setting.name == 'per_page'}{$lang.Per_page}
											{elseif $setting.name == 'auctions_format'}{$lang.Auctions_format}
											{elseif $setting.name == 'currency'}{$lang.Currency}
											{elseif $setting.name == 'show_server_time'}{$lang.Server_time}
											{elseif $setting.name == 'auctions_display'}{$lang.Auctions_display}
											{elseif $setting.name == 'auctions_order'}{$lang.Auctions_order}
											{elseif $setting.name == 'percent_bids_to_buy'}{$lang.Percent_bids_to_buy}
											{elseif $setting.name == 'buy_now_limit'}{$lang.Buy_now_limit}
											{elseif $setting.name == 'buy_now_nb_limit'}{$lang.Buy_now_nb_limit}
											{elseif $setting.name == 'home_text'}{$lang.Home_text}
											{elseif $setting.name == 'site_no_live_txt'}{$lang.Maintenance_text}
											{/if}
											</div>
											<div style="float:left; display:inline;">
												<ul class="settings">
													<li>
														<a href="#"><img src="/assets/img/infos.png" alt="infos" /></a>
														<div class="tooltip">{$setting.description}</div>
													</li>
												</ul>
											</div>
										</td>
										{if $setting.name == 'bid_value'}<td>{$setting.value}€</td>
										{elseif $setting.name == 'free_first_buy_credits' || $setting.name == 'percent_bids_to_buy'}<td>{$setting.value}%</td>
										{elseif $setting.name == 'currency'}<td>{if $setting.value == 'EUR'}{$lang.Euros}{elseif $setting.value == 'USD'}{$lang.Dollars}{elseif $setting.value == 'GBD'}{$lang.Pounds}{/if}</td>
										{elseif $setting.name == 'auctions_display'}<td>{if $setting.value == 'labels'}{$lang.Labels}{elseif $setting.value == 'list'}{$lang.List}{/if}</td>
										{elseif $setting.name == 'auctions_order'}<td>{if $setting.value == 'asc'}{$lang.Asc}{elseif $setting.value == 'desc'}{$lang.Desc}{/if}</td>
										{elseif $setting.value == 'yes'}<td>{$lang.Yes}</td>
										{elseif $setting.value == 'no'}<td>{$lang.No}</td>
										{else}<td>{$setting.value}</td>
										{/if}
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/setting/edit/{$setting.id}">{$lang.Edit}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}