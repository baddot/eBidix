{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Users}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Users} <a href="/admin/user/export" title="{$lang.Export}"><img src="/assets/admin/images/export_excel.png" width="20" alt="" /></a></h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
							<li><a href="#">{$lang.Search}</a></li>
						</ul>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="users_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Id}</th>
									<th>{$lang.Username}</th>
									<th>{$lang.First_name}</th>
									<th>{$lang.Last_name}</th>
									<th>{$lang.Email}</th>
									<th>{$lang.Ip_address}</th>
									<th>{$lang.Date_of_birth}</th>
									<th>{$lang.Register_date}</th>
									<th>{$lang.Status}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$users item=user}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$user.id}</td>
										<td {if $user.admin == 1}style="color:red; font-weight:bold;"{/if}>{$user.username}</td>
										<td>{$user.firstname}</td>
										<td>{$user.lastname}</td>
										<td>{$user.email}</td>
										<td>{$user.ip}</td>
										<td>{$user.date_of_birth}</td>
										<td>{$user.register_date}</td>
										<td>{if $user.active == 0 && empty($user.firstname)}{$lang.Not_confirmed}{elseif $user.active == 1 && empty($user.firstname)}{$lang.Not_completed}{elseif $user.active == 1 && !empty($user.firstname)}{$lang.Activated}{elseif $user.active == 0 && !empty($user.firstname)}{$lang.Suspended}{else}{$lang.Desactivated}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/user/view/{$user.id}">{$lang.Details}</a></li><li><a href="/admin/user/edit/{$user.id}">{$lang.Edit}</a></li><li>{if $user.active == 1}<a href="/admin/user/suspend/{$user.id}">{$lang.Suspend}</a>{else}<a href="/admin/user/activate/{$user.id}">{$lang.Activate}</a>{/if}</li>{if $user.blacklist == 0}<li><a href="/admin/user/add_blacklist/{$user.id}">{$lang.Add_to_blacklist}</a></li>{/if}<li><a href="/admin/user/delete/{$user.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
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
							<form method="POST" action="/admin/user">
								<select name="actions">
									<option>...</option>
									<optgroup label="{$lang.Status}">
										<option value="">{$lang.All}</option>
										<option value="activated">{$lang.Activated}</option>
										<option value="not_confirmed">{$lang.Not_confirmed}</option>
										<option value="not_completed">{$lang.Not_completed}</option>
										<option value="suspended">{$lang.Suspended}</option>
									</optgroup>
									<optgroup label="{$lang.Register_date}">
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
								sorter.init("users_table",1);
							</script>
						{/literal}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/user">
							<p>
								<label>{$lang.Username} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="username" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Password} <span style="color:red;">*</span> :</label><br/> 
								<input type="password" name="password" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Email} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="email" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Last_name} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="last_name" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.First_name} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="first_name" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Gender} <span style="color:red;">*</span> :</label><br/> 
								{$lang.Male} <input type="radio" class="radio" name="gender_id" value="1"> {$lang.Female} <input type="radio" class="radio" name="gender_id" value="2">
							</p>
							<p>
								<input type="checkbox" name="active" class="checkbox" value="1" checked="checked" /> <label>{$lang.Activate_user}</label>
							</p>
							{if $smarty.session.user_id == 1}
								<p>
									<input type="checkbox" name="admin" class="checkbox" value="1" /> <label>{$lang.Admin}</label>
								</p>
							{/if}
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/user">
							<p>
								<label>{$lang.Text} <span style="color:red;">*</span> :</label><br/>
								<input type="text" name="search" class="inputtext medium" /> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/admin/images/infos.png" alt="infos" /></a><span class="tooltip">{$lang.User_search_text}</span></span></span>
							</p>
							<p>
								<button class="button green"><span>{$lang.Search}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}