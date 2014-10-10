{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/polls">{$lang.Polls}</a> &raquo {$lang.Stats}</div>
		
		<div class="grid_5">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Stats_of_poll}{$poll.id}</h3>
						<ul class="tabs" id="vis-setter">
							<li class="active"><a href="#" rel="bar">{$lang.Bar}</a></li>
							<li><a href="#" rel="pie">{$lang.Pie}</a></li>
						</ul>
					</div>
					<div class="bcont" id="visualize">
						<table class="graph">
							<caption>{$poll.question}</caption>
							<thead>
								<tr>
									<td></td>
									<th scope="col">{$lang.Voting_number}</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">{$poll.response_1}</th>
									<td>{$response_1_nb}</td>
								</tr>
								<tr>
									<th scope="row">{$poll.response_2}</th>
									<td>{$response_2_nb}</td>
								</tr>
								<tr>
									<th scope="row">{$poll.response_3}</th>
									<td>{$response_3_nb}</td>
								</tr>
								<tr>
									<th scope="row">{$poll.response_4}</th>
									<td>{$response_4_nb}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="grid_7">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Voting_list}</h3>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Username}</th>
									<th>{$lang.Response}</th>
									<th>{$lang.Date}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$poll_stats item=poll_stat}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/admin/users/view/{$poll_stat.user_id}">{$poll_stat.username}</a></td>
										<td>
											{if $poll_stat.response == 1}{$poll.response_1}
											{elseif $poll_stat.response == 2}{$poll.response_2}
											{elseif $poll_stat.response == 3}{$poll.response_3}
											{elseif $poll_stat.response == 4}{$poll.response_4}
											{/if}
										</td>
										<td>{$poll_stat.created|date_format:"%d-%m-%Y %H:%M:%S"}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/polls/delete_stat/{$poll_stat.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
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
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>


{include file='admin/elements/footer.tpl'}