{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Soon_auctions}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Soon_auctions} ({$number})</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Id}</th>
									<th>{$lang.Product}</th>
									<th>{$lang.Type}</th>
									<th>{$lang.Options}</th>
									<th>{$lang.Email_alerts}</th>
									<th>{$lang.Autobids}</th>
									{*<th>{$lang.Views}</th>*}
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$auctions item=auction}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/{$auction.id}" target="_blank">{$auction.id}</a></td>
										<td>{$auction.name}</td>
										<td>{if $auction.type == 1}{$lang.Classic_auction}{elseif $auction.type == 2}{$lang.Cent_auction}{elseif $auction.type == 3}{$lang.Clic_auction}{elseif $auction.type == 4}{$lang.Fixed_price_auction}{elseif $auction.type == 5}{$lang.Beginner_auction}{elseif $auction.type == 6}{$lang.Vip_auction}{elseif $auction.type == 7}{$lang.Free_auction}{/if}</td>
										<td>{if $auction.top == 1}<img src="/assets/img/icons/auction_star_icon.png" title="{$lang.Top_auction}" alt="" />{/if} {if $auction.podium == 1}<img src="/assets/img/icons/auction_podium_icon.png" title="{$lang.Podium}" alt="" />{/if} {if $auction.autobids == 0}<img src="/assets/img/icons/auction_autobids_icon.png" title="{$lang.Autobids}" alt="" />{/if} {if $auction.buynow == 1}<img src="/assets/img/icons/auction_buynow_icon.png" title="{$lang.Buynow}" alt="" />{/if}</td>
										<td><a href="/admin/user?email_alerts={$auction.id}">{$auction.email_alerts}</a></td>
										<td><a href="/admin/user?autobids={$auction.id}">{$auction.autobids}</a></td>
										{*<td>{$auction.hits}</td>*}
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul>{*<li><a href="/admin/auctions/edit/{$auction.id}">{$lang.Edit}</a></li>*}<li><a href="/admin/auctions/start/{$auction.id}">{$lang.Start}</a></li><li><a href="/admin/auction/delete/{$auction.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}