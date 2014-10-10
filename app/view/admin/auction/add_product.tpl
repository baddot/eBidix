{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo; <a href="/admin/product">{$lang.Products}</a> &raquo; {$lang.Add}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Add_new_product}</h3>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/product">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> :</label><br/>
								<input type="text" name="name" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Category} <span style="color:red;">*</span> :</label><br/>
								<select name="category_id" class="select">
									{foreach from=$categories item=category}
										<option value="{$category.id}">{$category.name}</option>
									{/foreach}
								</select>
							</p>
							<p>
								<label>{$lang.Price} <span style="color:red;">*</span> :</label><br/>
								<input type="text" name="price" class="inputtext medium" value="0.00" />
							</p>
							<p>
								<label>{$lang.Description} <span style="color:red;">*</span> :</label><br/>
								<textarea name="description" id="description" rows="10" cols="80">{$lang.Description_of_product}</textarea>
								<script type="text/javascript">
								//<![CDATA[
									CKEDITOR.replace( 'description' );
								//]]>
								</script>
							</p>
							<p>
								<label>{$lang.Delivery_cost}<span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="delivery_cost" class="inputtext medium" value="0.00" />
							</p>
							<p>
								<label>{$lang.Delivery_information} :</label><br/>
								<textarea name="delivery_information" rows="10" cols="80"></textarea>
							</p>
							<p>
								<label>{$lang.Stock_number} :</label><br/> 
								<input type="text" name="stock_number" class="inputtext medium" value="0" />
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}