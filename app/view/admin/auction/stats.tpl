{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/auctions">{$lang.Auctions}</a> &raquo {$lang.Stats}</div>
		
		<div class="grid_5">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Stats}</h3>
					</div>
					<div class="bcont">
						<div style="font-weight:bold;">{$lang.Auction} n° <a href="/auctions/view/{$auction.id}">{$auction.id}</a></div>
						<div style="margin-top:15px;">
							<ul>
								<li>{$lang.Product}: <a href="/admin/products">{$auction.product_name}</a> ({$auction.product_price}&euro;)</li>
								<li>{$lang.Category}: <a href="/admin/categories">{$auction.category_name}</a></li>
								<li>{$lang.Total_bids}: <b>{$auction.total_bids}</b></li>
								<li>{$lang.Total_manual_bids}: <b>{$auction.total_manuals}</b></li>
								<li>{$lang.Total_auto_bids}: <b>{$auction.total_auto}</b></li>
								<li>{$lang.Total_buynows}: <b>{if !empty($auction.total_buynows)}<a href="/admin/auctions/closed?buy_id={$auction.id}">{$auction.total_buynows}</a>{else}0{/if}</b></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="grid_7">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Placed_bids}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Top}</a></li>
						</ul>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.User}</th>
									<th>{$lang.Type}</th>
									<th>{$lang.Date}</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$bids item=bid}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/admin/users/view/{$bid.user_id}">{$bid.username}</a></td>
										<td>{if $bid.description == 'manual'}{$lang.Manual_bid}{elseif $bid.description == 'auto'}{$lang.Auto_bid}{/if}</td>
										<td>{$bid.created|date_format:"%d-%m-%Y %H:%M:%S"}</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						<div id="controls_small">
							<div id="perpage_small">
								<select onchange="sorter.size(this.value)">
								<option value="5">5</option>
									<option value="10" selected="selected">10</option>
									<option value="20">20</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span>{$lang.Entries_per_page}</span>
							</div>
							<div id="navigation_small">
								<img src="/themes/default/admin/images/first.gif" width="16" height="16" alt="" onclick="sorter.move(-1,true)" />
								<img src="/themes/default/admin/images/previous.gif" width="16" height="16" alt="" onclick="sorter.move(-1)" />
								<img src="/themes/default/admin/images/next.gif" width="16" height="16" alt="" onclick="sorter.move(1)" />
								<img src="/themes/default/admin/images/last.gif" width="16" height="16" alt="" onclick="sorter.move(1,true)" />
							</div>
							<div id="text_small">{$lang.Page} <span id="currentpage"></span> {$lang.on} <span id="pagelimit"></span></div>
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
								sorter.init("table",1);
							</script>
						{/literal}
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th>{$lang.User}</th>
									<th>{$lang.Bids_number}</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$top_bids item=bid}
									<tr>
										<td><a href="/admin/users/view/{$bid.user_id}">{$bid.username}</a></td>
										<td>{$bid.bids}</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						<div class="clearingfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>


{include file='admin/elements/footer.tpl'}