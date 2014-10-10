{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo {$lang.Auction_creation}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Auction_creation}: {$product.name}</h3>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/auction/add/{$product.id}">
							<p>
								<input type="hidden" name="product_id" value="{$product.id}" />
							</p>
							
							<p>
								<label>{$lang.Auction_type} <font color="red">*</font> :</label><br /> 
								<select name="auction_type" id="auction_type">
									<option value="1">{$lang.Classic_auction}</option>
									<option value="2" selected="selected">{$lang.Cent_auction}</option>
									{if $settings.app.increments == 'dynamic'}<option value="3">{$lang.Clic_auction}</option>{/if}
									<option value="4">{$lang.Fixed_price_auction}</option>
									<option value="5">{$lang.Beginner_auction}</option>
									<option value="6">{$lang.Vip_auction}</option>
									<option value="7">{$lang.Free_auction}</option>
									<option value="8">Enchère à prix prédéfini</option>
								</select> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/img/infos.png" alt="infos" /></a><span class="tooltip">{$lang.Auction_type_text}</span></span></span>
							</p>
							
							<div id="fixed_price" style="display:none;">
								<p>
									<label>{$lang.Fixed_price} <font color="red">*</font> :</label><br /> 
									<input type="text" name="auction_fixed_price" class="inputtext small" value="0.00" />
								</p>
							</div>
							
							<p id="start_price">
								<label>{$lang.Start_price} <font color="red">*</font> :</label><br /> 
								<input type="text" name="auction_start_price" class="inputtext small" value="0.00" />
							</p>
							
							{if $settings.app.increments == 'single'}
								<p id="increments">
									<label>{$lang.Time_increment} <font color="red">*</font> :</label><br /> 
									<select name="time_increment">
										<option value="15">15</option>
										<option value="30">30</option>
										<option value="45">45</option>
										<option value="60">60</option>
										<option value="90">90</option>
										<option value="120">120</option>
									</select>
								</p>
							{elseif $settings.app.increments == 'dynamic'}
								<div id="increments">
									<label>{$lang.Time_increment} <font color="red">*</font> :</label><br /> 
									<select name="time_increment">
										<option value="15">15</option>
										<option value="30">30</option>
										<option value="45">45</option>
										<option value="60">60</option>
										<option value="90">90</option>
										<option value="120">120</option>
									</select>
								</div>
								<div id="increments_dynamic" style="display:none;">
									<table>
										<thead>
											<tr>
												<th></th>
												<th width="15"></th>
												<th style="text-align:center;">{$lang.Lower_price}</th>
												<th style="text-align:center;">{$lang.Upper_price}</th>
												<th width="15"></th>
												<th style="text-align:center;">{$lang.Bid_debit}</th>
												<th style="text-align:center;">{$lang.Price_increment}</th>
												<th style="text-align:center;">{$lang.Time_increment}</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><label>{$lang.Band_number}1 <font color="red">*</font> :</label></td>
												<td></td>
												<td><input type="text" name="lower_price_1" class="inputtext very_small" value="0.00" /></td>
												<td><input type="text" name="upper_price_1" class="inputtext very_small" value="5.00" /></td>
												<td></td>
												<td><input type="text" name="bid_debit_1" class="inputtext very_small" value="1" /></td>
												<td><input type="text" name="price_increment_1" class="inputtext very_small" value="0.01" /></td>
												<td><input type="text" name="time_increment_1" class="inputtext very_small" value="60" /></td>
											</tr>
											<tr>
												<td><label>{$lang.Band_number}2 :</label></td>
												<td></td>
												<td><input type="text" name="lower_price_2" class="inputtext very_small" /></td>
												<td><input type="text" name="upper_price_2" class="inputtext very_small" /></td>
												<td></td>
												<td><input type="text" name="bid_debit_2" class="inputtext very_small" /></td>
												<td><input type="text" name="price_increment_2" class="inputtext very_small" /></td>
												<td><input type="text" name="time_increment_2" class="inputtext very_small" /></td>
											</tr>
											<tr>
												<td><label>{$lang.Band_number}3 :</label></td>
												<td></td>
												<td><input type="text" name="lower_price_3" class="inputtext very_small" /></td>
												<td><input type="text" name="upper_price_3" class="inputtext very_small" /></td>
												<td></td>
												<td><input type="text" name="bid_debit_3" class="inputtext very_small" /></td>
												<td><input type="text" name="price_increment_3" class="inputtext very_small" /></td>
												<td><input type="text" name="time_increment_3" class="inputtext very_small" /></td>
											</tr>
											<tr>
												<td><label>{$lang.Band_number}4 :</label></td>
												<td></td>
												<td><input type="text" name="lower_price_4" class="inputtext very_small" /></td>
												<td><input type="text" name="upper_price_4" class="inputtext very_small" /></td>
												<td></td>
												<td><input type="text" name="bid_debit_4" class="inputtext very_small" /></td>
												<td><input type="text" name="price_increment_4" class="inputtext very_small" /></td>
												<td><input type="text" name="time_increment_4" class="inputtext very_small" /></td>
											</tr>
										</tbody>
									</table>
								</div>
							{/if}
							
							<p>
								<input type="checkbox" name="auction_peak_only" class="checkbox" value="1" checked="checked" /> <label>{$lang.Limited_auction}</label> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/img/infos.png" alt="infos" /></a><span class="tooltip">{$lang.Limited_auction_text}</span></span></span>
							</p>
							
							<p>
								<input type="checkbox" name="auction_top" class="checkbox" value="1" /> <label>{$lang.Top_auction}</label> 
							</p>
							
							{if $settings.app.podium.active && $settings.app.podium.refund == 'amount'}
								<p id="podium">
									<input type="checkbox" name="auction_podium" class="checkbox" value="1" onClick="show_box('podium_box');" /> <label>{$lang.Activate_podium}</label>
								</p>
								<div id="podium_box" style="display:none; margin-left:30px;">
									<p>
										<label>{$lang.Credits_second_podium} <font color="red">*</font> :</label><br /> 
										<input type="text" name="auction_second_credits" class="inputtext small" value="50" />
									</p>
									<p>
										<label>{$lang.Credits_third_podium} <font color="red">*</font> :</label><br /> 
										<input type="text" name="auction_third_credits" class="inputtext small" value="25" />
									</p>
								</div>
							{/if}
							
							<p id="autobids">
								<input type="checkbox" name="auction_autobids" id="autobids" class="checkbox" value="1" /> <label>{$lang.Authorize_autobids}</label>
							</p>
							
							<p>
								<input type="checkbox" name="auction_buynow" id="buynow" class="checkbox" value="1" /> <label>{$lang.Authorize_buynow}</label>
							</p>
							
							{if $settings.app.labels}
								<p>
									<label>{$lang.Label}</label><br /> 
									<select name="auction_label">
										<option value="0">{$lang.None}</option>
										<option value="1">{$lang.Business_to}</option>
										<option value="2">{$lang.Gift_idea}</option>
										<option value="3">{$lang.Hot}</option>
										<option value="4">{$lang.New}</option>
									</select>
								</p>
							{/if}
							
							<p>
								<button name="submit" class="button green"><span>{$lang.Create_auction}</span></button>
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