{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Activity}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Activity}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Search}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Date}</th>
									<th>{$lang.Description}</th>
									<th>{$lang.Details}</th>
									<th>{$lang.Auction_id}</th>
									<th>{$lang.User}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$bids item=bid}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$bid.created}</td>
										<td>{$bid.description}</td>
										<td>{$bid.details}</td>
										<td>{if !empty($bid.auction_id)}<a href="/{$bid.auction_id}">{$bid.auction_id}</a>{/if}</td>
										<td><a href="/admin/user/view/{$bid.user_id}">{$bid.username}</a></td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/auction/bids?auction_id={$bid.auction_id}">{$lang.View_only_auction}</a></li><li><a href="/admin/auction/bids?user_id={$bid.user_id}">{$lang.View_only_user}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
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
							<form method="POST" action="/admin/auction/bids">
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
									<optgroup label="{$lang.Type}">
										<option value="credits">{$lang.Credits}</option>
										<option value="debits">{$lang.Debits}</option>
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
								sorter.init("table",1);
							</script>
						{/literal}
					</div>
					
					<div class="bcont">
						<form method="GET" action="/admin/auction/bids">
							<p>
								<label>{$lang.Auction_id} :</label><br/>
								<input type="text" name="auction_id" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Username} :</label><br/>
								<input type="text" name="username" class="inputtext medium" />
							</p>
							<p>
								<button name="search" class="button green"><span>{$lang.Search}</span></button>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}