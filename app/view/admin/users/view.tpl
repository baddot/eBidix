{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/users">{$lang.Users}</a> &raquo {$lang.Infos}</div>
		
		<div class="grid_5">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Infos}</h3>
					</div>
					<div class="bcont">
						<div style="font-weight:bold;">{$user.last_name} {$user.first_name} (aka {$user.username})</div>
						<div style="margin-top:15px;">
							<ul>
								<li>{$lang.Total_credits}: <b>{if !empty($user.balance)}{$user.balance}{else}0{/if}</b></li>
								<li>{$lang.Total_buy_credits}: <b>{$user.total_buy_credits}&euro;</b></li>
								<li>{$lang.Total_offered_credits}: <b>{$user.total_offered_credits}&euro;</b></li>
								<li>{$lang.Total_spent_credits}: <b>{$user.spent_credits}</b></li>
								<li>{$lang.Total_win_auctions}: <b>{if !empty($user.win_auctions)}<a href="/admin/auctions/closed?user_id={$user.id}">{$user.win_auctions}</a>{else}0{/if}</b></li>
								<li>{$lang.Total_win_amount}: <b>{$user.total_win_amount}&euro;</b></li>
								<li>{$lang.Desired_products_cat}: <b>{$user.desired_category}</b></li>
								<li>{$lang.Referrer}: <b><a href="/admin/users/view/{$user.referrer_id}">{$user.referrer_username}</a></b></li>
								<li>{$lang.Referrals}: <b><a href="/admin/users?referrer_id={$user.id}">{$user.referrals}</a></b></li>
								<li style="border-bottom:1px dotted #555555; margin:10px 0 10px 0;"></li>
								<li>{$lang.Date_of_registration}: <b>{$user.created|date_format:"%d-%m-%Y %H:%M:%S"}</b></li>
								<li>{$lang.Source}: <b>{$user.source}</b></li>
								<li>{$lang.Newsletter}: {if $user.newsletter == 1}{$lang.Yes}{else}{$lang.No}{/if}</li>
								<li>{$lang.Last_connect_date}: <b>{$user.last_access|date_format:"%d-%m-%Y %H:%M:%S"}</b></li>
								<li>{$lang.Date_of_birth}: <b>{$user.date_of_birth}</b></li>
								<li>{$lang.Gender}: <b>{if $user.gender_id == 1}{$lang.Male}{elseif $user.gender_id == 2}{$lang.Female}{/if}</b></li>
								<li>{$lang.Address}: <b><br />{$user.address|stripslashes} <br />{$user.postcode} {$user.city} <br />{$user.country}</b></li>
								<li>{$lang.Phone}: <b>{$user.phone}</b></li>
								<li>{$lang.Mobile}: <b>{$user.mobile}</b></li>
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
						<h3>{$lang.Transactions}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.Credit}</a></li>
							<li><a href="#">{$lang.Debit}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="transactions_table">
							<thead>
								<tr>
									<th>{$lang.Date}</th>
									<th>{$lang.Description}</th>
									<th>{$lang.Details}</th>
									<th>{$lang.Credit}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$credits item=credit}
									<tr>
										<td>{$credit.created|date_format:"%d-%m-%Y %H:%M:%S"}</td>
										<td>{$credit.description}</td>
										<td>{$credit.details}</td>
										<td>{$credit.credit}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/users/delete_transaction/{$credit.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						<div class="clearingfix"></div>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="auctions_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Date}</th>
									<th>{$lang.Auction_id}</th>
									<th>{$lang.Type}</th>
									<th>{$lang.Debit}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$debits item=debit}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$debit.created}</td>
										<td><a href="/auctions/view/{$debit.auction_id}">{$debit.auction_id}</a></td>
										<td>{if $debit.description == 'manual'}{$lang.Manual_bid}{elseif $debit.description == 'auto'}{$lang.Auto_bid}{/if}</td>
										<td>{$debit.debit}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/users/delete_bid/{$debit.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
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
								sorter.sortmethod = "desc";
								sorter.init("auctions_table",1);
							</script>
						{/literal}
					</div>
					<div class="bcont">
						<form method="post" action="/admin/users/add_transaction/{$user.id}">
							<p>
								<label>{$lang.Description} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="description" class="inputtext medium" />	
							</p>
							<p>
								<label>{$lang.Total} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="total" class="inputtext medium" />
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>


{include file='admin/elements/footer.tpl'}