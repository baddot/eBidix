{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Suppliers}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Suppliers}</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th>{$lang.Company_name}</th>
									<th>{$lang.Contact_name}</th>
									<th>{$lang.Address}</th>
									<th>{$lang.Postcode}</th>
									<th>{$lang.City}</th>
									<th>{$lang.Country}</th>
									<th>{$lang.Phone}</th>
									<th>{$lang.Fax}</th>
									<th>{$lang.Email}</th>
									<th>{$lang.Details}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$suppliers item=supplier}
									<tr>
										<td>{$supplier.company_name}</td>
										<td>{$supplier.contact_name}</td>
										<td>{$supplier.address}</td>
										<td>{$supplier.postcode}</td>
										<td>{$supplier.city}</td>
										<td>{$supplier.country}</td>
										<td>{$supplier.phone}</td>
										<td>{$supplier.fax}</td>
										<td>{$supplier.email}</td>
										<td>{$supplier.details}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/suppliers/edit/{$supplier.id}">{$lang.Edit}</a></li><li style="color:#717171; margin-left:5px;">{*<a href="/admin/suppliers/delete/{$supplier.id}">*}{$lang.Delete}{*</a>*}</li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/suppliers">
							<p>
								<label>{$lang.Company_name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="company_name" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Contact_name} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="contact_name" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Address} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="address" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Postcode} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="postcode" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.City} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="city" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Country} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="country" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Phone} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="phone" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Fax} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="fax" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Email} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="email" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Details} :</label><br /> 
								<input type="text" name="details" class="inputtext medium" />
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