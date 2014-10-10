{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Accounting}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Accounting} <a href="/admin/stats/accounting?export=yes" title="{$lang.Export}"><img src="/themes/default/admin/images/export_excel.png" width="20" alt="" /></a></h3>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th>{$lang.Date}</th>
									<th>{$lang.Type}</th>
									<th>{$lang.Details}</th>
									<th>{$lang.Payment}</th>
									<th>{$lang.Income}</th>
									<th>{$lang.Outgoings}</th>
									<th>{$lang.Earnings}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$stats item=key}
									<tr>
										<td>{$key.date}</td>
										<td>{if $key.type == 1}{$lang.Auction_sale}{elseif $key.type == 2}{$lang.Classic_sale}{elseif $key.type == 3}{$lang.Product_buy}{/if}</td>
										<td><a href="/admin/auctions/stats/{$key.auction_id}">{$key.auction_id}</a> {if !empty($key.winner_username)}/ <a href="/admin/users/view/{$key.winner_id}">{$key.winner_username}</a>{/if}</td>
										<td>{if !empty($key.payment)}{$key.payment} ({$lang.Fees}: {$key.fees}{$settings.app.currency_code}){/if}</td>
										<td>{if !empty($key.price)}{$key.price}{$settings.app.currency_code} + <a href="/admin/auctions/bids?auction_id={$key.auction_id}">{$key.spent_credits}{$settings.app.currency_code}</a>{/if}</td>
										<td>{if !empty($key.outgoings)}{$key.outgoings}{$settings.app.currency_code}{/if}</td>
										<td>{if !empty($key.earnings)}{$key.earnings}{$settings.app.currency_code}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/auctions/stats/{$key.auction_id}">{$lang.Stats}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						<div id="controls">
							<div id="perpage">
								<select onchange="sorter.size(this.value)">
								<option value="5">5</option>
									<option value="10" selected="selected">10</option>
									<option value="20">20</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span>{$lang.Entries_per_page}</span>
							</div>
							<div id="navigation">
								<img src="/themes/default/admin/images/first.gif" width="16" height="16" alt="" onclick="sorter.move(-1,true)" />
								<img src="/themes/default/admin/images/previous.gif" width="16" height="16" alt="" onclick="sorter.move(-1)" />
								<img src="/themes/default/admin/images/next.gif" width="16" height="16" alt="" onclick="sorter.move(1)" />
								<img src="/themes/default/admin/images/last.gif" width="16" height="16" alt="" onclick="sorter.move(1,true)" />
							</div>
							<div id="text">{$lang.Page} <span id="currentpage"></span> {$lang.on} <span id="pagelimit"></span></div>
						</div>
						<div class="tableactions">
							{$lang.Sort_filters} 
							<form method="POST" action="/admin/stats/accounting">
								<select name="actions">
									<option>...</option>
									<optgroup label="{$lang.Date}">
										<option value="today">{$lang.Today}</option>
										<option value="yesterday">{$lang.Yesterday}</option>
										<option value="this_week">{$lang.This_week}</option>
										<option value="last_week">{$lang.Last_week}</option>
										<option value="this_month">{$lang.This_month}</option>
										<option value="last_month">{$lang.Last_month}</option>
										<option value="this_year">{$lang.This_year}</option>
										<option value="last_year">{$lang.Last_year}</option>
									</optgroup>
								</select>
								<button class="button blue small left"><span>{$lang.Go}</span></button>
							</form>
						</div>
						<div class="clearingfix"></div>
						{literal}
							<script type="text/javascript">
								var sorter = new TINY.table.sorter("sorter");
								sorter.head = "head";
								sorter.asc = "asc";
								sorter.desc = "desc";
								sorter.even = "evenrow";
								sorter.odd = "oddrow";
								sorter.evensel = "evenselected";
								sorter.oddsel = "oddselected";
								sorter.paginate = true;
								sorter.currentid = "currentpage";
								sorter.limitid = "pagelimit";
								sorter.sortmethod = "desc";
								sorter.init("table",0);
							</script>
						{/literal}
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}