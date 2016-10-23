{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Extends}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Extends}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="users_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.User}</th>
									<th>{$lang.Activated}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$extends item=extend}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$extend.username}</td>
										<td>{if $extend.active == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/users/edit_extend/{$extend.id}">{$lang.Edit}</a></li><li><a href="/admin/auctions/closed_extends/{$extend.id}">{$lang.Won_auctions}</a></li><li><a href="/admin/users/delete_extend/{$extend.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
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
								sorter.init("users_table",1);
							</script>
						{/literal}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/users/extends">
							<p>
								<label>{$lang.Username} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="username" class="inputtext medium" />
							</p>
							<p>
								<input type="checkbox" name="active" class="checkbox" value="1" checked="checked" /> <label>{$lang.Activated}</label>
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