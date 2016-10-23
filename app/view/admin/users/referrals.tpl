{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Referrals}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Referrals}</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="referrals_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.User}</th>
									<th>{$lang.First_name}</th>
									<th>{$lang.Last_name}</th>
									<th>{$lang.Referrer}</th>
									<th>{$lang.Won_credits}</th>
									<th>{$lang.Date}</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$referrals item=referral}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/admin/users/view/{$referral.user_id}">{$referral.username}</a></td>
										<td>{$referral.first_name}</td>
										<td>{$referral.last_name}</td>
										<td><a href="/admin/users/view/{$referral.referrer_id}">{$referral.referrer_username}</a></td>
										<td>{if $referral.confirmed == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td>{$referral.date}</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{if !empty($referrals)}
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
						{/if}
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
								sorter.init("referrals_table",1);
							</script>
						{/literal}
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}