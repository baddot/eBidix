{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Adverts}</div>

		<div class="grid_7">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Adverts}</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th>{$lang.Name}</th>
									<th>{$lang.Activated}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$adverts item=advert}
									<tr>
										<td>{$advert.name}</td>
										<td>{if $advert.active == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/advert/edit/{$advert.id}">{$lang.Edit}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/advert">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" /> 
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<textarea class="ckeditor" cols="80" name="content" rows="10">{$lang.Content_of_page}</textarea>
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