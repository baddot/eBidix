{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Polls}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Polls}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Id}</th>
									<th>{$lang.Question}</th>
									<th>{$lang.Response} 1</th>
									<th>{$lang.Response} 2</th>
									<th>{$lang.Response} 3</th>
									<th>{$lang.Response} 4</th>
									<th>{$lang.Activated}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$polls item=poll}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$poll.id}</td>
										<td>{$poll.question}</td>
										<td>{$poll.response_1}</td>
										<td>{$poll.response_2}</td>
										<td>{$poll.response_3}</td>
										<td>{$poll.response_4}</td>
										<td>{if $poll.active == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/polls/stats/{$poll.id}">{$lang.Stats}</a></li><li><a href="/admin/polls/edit/{$poll.id}">{$lang.Edit}</a></li><li><a href="/admin/polls/delete/{$poll.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{foreachelse}
									<tr><td>{$lang.No_pages}</td></tr>
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
						<form method="post" action="/admin/polls">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" /> <a href="#" class="bubble"><img src="/themes/default/admin/img/infos.png" alt="infos" /><span>{$lang.Page_name_text}</span></a>
							</p>
							<p>
								<label>{$lang.Question} <span style="color:red;">*</span> :</label><br />
								<input type="text" name="question" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Response} 1 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_1" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Response} 2 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_2" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Response} 3 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_3" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Response} 4 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_4" class="inputtext medium" />
							</p>
							<p>
								<input type="checkbox" name="active" value="1" class="checkbox" checked="checked" /> <label>{$lang.Activate}</label>
							</p>							
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button>
								<br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}