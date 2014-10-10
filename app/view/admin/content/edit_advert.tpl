{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/advert">{$lang.Adverts}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Adverts}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/advert/edit/{$advert.id}">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" value="{$advert.name}" />
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<textarea class="ckeditor" cols="80" id="pub_content" name="content" rows="10">{$advert.content}</textarea>
							</p>
							<p>
								<input type="checkbox" name="active" value="1" {if $advert.active == 1}checked="checked"{/if} /> <label>{$lang.Activated}</label>
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Edit}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}