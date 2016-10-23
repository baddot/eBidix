{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Products}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Products} ({$number})</h3>
						<ul class="tabs">
							<li class="active"><a href="#">{$lang.List}</a></li>
							<li><a href="#">{$lang.Add}</a></li>
							<li><a href="#">{$lang.Search}</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th>{$lang.Name}</th>
									<th>{$lang.Category}</th>
									<th>{$lang.Price}</th>
									<th>{$lang.Delivery_cost}</th>
									<th>{$lang.Stock_number}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$products item=product}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$product.name}</td>
										<td>{$product.category_name}</td>
										<td>{$product.price}&euro;</td>
										<td>{$product.delivery_cost}&euro;</td>
										<td>{$product.stock_number}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/auction/add/{$product.id}">{$lang.Add_auction}</a></li><li><a href="/admin/product/edit/{$product.id}">{$lang.Edit}</a></li><li><a href="/admin/product/images/{$product.id}">{$lang.Images}</a></li><li style="color:#717171;"><a href="/admin/product/delete/{$product.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{foreachelse}
									<tr><td>{$lang.No_products}</td></tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
						<div class="tableactions">
							<form method="POST" action="/admin/product">
								<select name="actions">
									<option>{$lang.Filters}...</option>
									<optgroup label="{$lang.Categories}">
										{foreach from=$categories item=category}	
											<option value="{$category.id}">{$category.name}</option>
										{/foreach}
									</optgroup>
								</select>
								<button class="button blue small left"><span>{$lang.Apply_filter}</span></button>
							</form>
						</div>
						<div class="clearingfix"></div>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/product">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> :</label><br/>
								<input type="text" name="name" class="inputtext medium" required>
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
								<input type="text" name="price" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Description} <span style="color:red;">*</span> :</label><br/>
								<textarea name="description" id="description" rows="10" cols="80" required>{$lang.Description_of_product}</textarea>
								<script type="text/javascript">
								//<![CDATA[
									CKEDITOR.replace( 'description' );
								//]]>
								</script>
							</p>
							<p>
								<label>{$lang.Delivery_cost}<span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="delivery_cost" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Delivery_information} :</label><br/>
								<textarea name="delivery_information" rows="10" cols="80"></textarea>
							</p>
							<p>
								<label>{$lang.Stock_number} :</label><br/> 
								<input type="text" name="stock_number" class="inputtext medium" value="1" />
							</p>
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/product">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> :</label><br/>
								<input type="text" name="search_name" class="inputtext medium" />
							</p>
							<p>
								<button name="search" class="button green"><span>{$lang.Search}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}