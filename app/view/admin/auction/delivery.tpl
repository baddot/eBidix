{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/auctions/closed">{$lang.Closed_auctions}</a> &raquo {$lang.Shipping}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Shipping_of} <a href="/auctions/view/{$auction.id}">{$auction.name}</a></h3>
					</div>
					<div class="bcont">
						<form method="POST" action="/admin/auctions/delivery/{$auction.id}">
							<p>	
								<label>{$lang.Supplier} <font color="red">*</font> :</label><br /> 
								<select name="supplier_id" class="select">
									<option value=""></option>
									{foreach from=$suppliers item=supplier}
										<option value="{$supplier.id}">{$supplier.company_name}</option>
									{/foreach}
								</select>
							</p>
							<p>
								<label>{$lang.Object} <font color="red">*</font> :</label><br /> 
								<input type="text" name="object" class="inputtext big" />
							</p>
							<p>
								<label>{$lang.Message} <font color="red">*</font> :</label><br /> 
								<textarea name="message" rows="10" cols="50"></textarea>
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Send}</span></button>
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