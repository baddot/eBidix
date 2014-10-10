{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Buys_auctions}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Buys_auctions} ({$number})</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="closed_auctions_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Id}</th>
									<th>{$lang.Name}</th>
									<th>{$lang.Buy_date}</th>
									<th>{$lang.Sold_price}</th>
									<th>{$lang.Winner}</th>
									<th>{$lang.Status}</th>
									<th>{$lang.Evaluation}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$auctions item=auction}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/{$auction.id}">{$auction.id}</a></td>
										<td>{$auction.name}</td>
										<td>{$auction.end_time}</td>
										<td>{$auction.price}&euro;</td>
										<td><a href="/admin/user/view/{$auction.winner_id}">{$auction.winner_username}</a></td>
										<td>{$auction.status_name}</td>
										<td>{if $auction.status_id < 6}{$lang.Waiting}{else}{$lang.Done}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul>{if $auction.status_id > 4 && empty($auction.sent)}<li><a href="/admin/auction/delivery/{$auction.id}">{$lang.Shipping}</a></li>{/if}<li><a href="/admin/auction/delete/{$auction.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
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
								<img src="/assets/admin/images/first.gif" width="16" height="16" alt="" onclick="sorter.move(-1,true)" />
								<img src="/assets/admin/images/previous.gif" width="16" height="16" alt="" onclick="sorter.move(-1)" />
								<img src="/assets/admin/images/next.gif" width="16" height="16" alt="" onclick="sorter.move(1)" />
								<img src="/assets/admin/images/last.gif" width="16" height="16" alt="" onclick="sorter.move(1,true)" />
							</div>
							<div id="text">{$lang.Page} <span id="currentpage"></span> {$lang.on} <span id="pagelimit"></span></div>
						</div>
						<div class="tableactions">
							{$lang.Sort_filters} 
							<form method="POST" action="/admin/auction/buys">
								<select name="actions">
									<option>...</option>
									<optgroup label="{$lang.Buy_date}">
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
								sorter.init("closed_auctions_table",1);
							</script>
						{/literal}
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}