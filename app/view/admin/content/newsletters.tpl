{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Newsletters}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Newsletters}</h3>
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
									<th>{$lang.Name}</th>
									<th>{$lang.Object}</th>
									<th>{$lang.Sent}</th>
									<th>{$lang.Sent_date}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$newsletters item=newsletter}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$newsletter.name}</td>
										<td>{$newsletter.object}</td>
										<td>{if $newsletter.sent == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td>{if $newsletter.sent == 1}{$newsletter.sent_date}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li>{if $newsletter.sent == 0}<a href="/admin/newsletters/send/{$newsletter.id}">{$lang.Send}</a>{/if}</li><li><a href="/admin/newsletters/edit/{$newsletter.id}">{$lang.Edit}</a></li><li style="color:#717171; margin-left:5px;">{*<a href="/admin/newsletters/delete/{$newsletter.id}">*}{$lang.Delete}{*</a>*}</li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/newsletter">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Object} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="object" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<textarea cols="80" id="newsletter_content" name="content" rows="10" required></textarea>
								<script type="text/javascript">
								//<![CDATA[
									CKEDITOR.replace( 'newsletter_content' );
								//]]>
								</script>
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