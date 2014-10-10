{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Pages}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Pages}</h3>
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
									<th>{$lang.Name}</th>
									<th>{$lang.Title}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$pages item=page}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$page.id}</td>
										<td>{$page.name}</td>
										<td>{$page.title}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/page/view/{$page.name}">{$lang.View}</a></li><li><a href="/admin/page/edit/{$page.id}">{$lang.Edit}</a></li><li><a href="/admin/page/delete/{$page.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{foreachelse}
									<tr><td>{$lang.No_pages}</td></tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/page">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium"  required> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/img/infos.png" alt="infos" /></a><span class="tooltip">{$lang.Page_name_text}</span></span></span>
							</p>
							<p>
								<label>{$lang.Title} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="title" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Meta_description} : </label><br />
								<input type="text" name="meta_description" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Meta_keywords} : </label><br />
								<input type="text" name="meta_keywords" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<textarea class="ckeditor" cols="80" name="content" rows="10" required>{$lang.Content_of_page}</textarea>
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