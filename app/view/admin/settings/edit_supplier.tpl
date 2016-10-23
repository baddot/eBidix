{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/suppliers">{$lang.Suppliers}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Suppliers}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/suppliers/edit/{$supplier.id}">
							<p>
								<label>{$lang.Company_name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="company_name" class="inputtext medium" value="{$supplier.company_name}" />
							</p>
							<p>
								<label>{$lang.Contact_name} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="contact_name" class="inputtext medium" value="{$supplier.contact_name}" />
							</p>
							<p>
								<label>{$lang.Address} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="address" class="inputtext medium" value="{$supplier.address}" />
							</p>
							<p>
								<label>{$lang.Postcode} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="postcode" class="inputtext medium" value="{$supplier.postcode}" />
							</p>
							<p>
								<label>{$lang.City} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="city" class="inputtext medium" value="{$supplier.city}" />
							</p>
							<p>
								<label>{$lang.Country} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="country" class="inputtext medium" value="{$supplier.country}" />
							</p>
							<p>
								<label>{$lang.Phone} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="phone" class="inputtext medium" value="{$supplier.phone}" />
							</p>
							<p>
								<label>{$lang.Fax} :</label><br /> 
								<input type="text" name="fax" class="inputtext medium" value="{$supplier.fax}" />
							</p>
							<p>
								<label>{$lang.Email} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="email" class="inputtext medium" value="{$supplier.email}" />
							</p>
							<p>
								<label>{$lang.Details} :</label><br /> 
								<input type="text" name="details" class="inputtext medium" value="{$supplier.details}" />
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