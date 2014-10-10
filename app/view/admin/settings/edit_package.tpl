{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/package">{$lang.Packages}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Packages}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/package/edit/{$package.id}">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" value="{$package.name}" />
							</p>
							<p>
								<label>{$lang.Nb_credits} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="bids" class="inputtext medium" value="{$package.bids}" />
							</p>
							<p>
								<label>{$lang.Price} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="price" class="inputtext medium" value="{$package.price}" />
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