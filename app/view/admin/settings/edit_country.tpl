{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/country">{$lang.Countries}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Countries}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/country/edit/{$country.id}">
							<p>
								<label>{$lang.Code} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="code" value="{$country.code}" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" value="{$country.name}" class="inputtext medium" required>
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