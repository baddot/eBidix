{include file='admin/elements/header.tpl'}
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Coupons}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Coupons}</h3>
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
									<th>{$lang.Code}</th>
									<th>{$lang.Saving}</th>
									<th>{$lang.Saving_type}</th>
									<th>{$lang.Description}</th>
									<th>{$lang.Return}</th>
									<th>{$lang.Date_hour_start}</th>
									<th>{$lang.Date_hour_end}</th>
									<th>{$lang.Limit}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$coupons item=coupon}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{$coupon.code}</td>
										<td>{$coupon.saving}{if $coupon.type == 1}%{elseif $coupon.type == 3}&euro;{/if}</td>
										<td>
											{if $coupon.type == 1}{$lang.Percent_with_buy}
											{elseif $coupon.type == 2}{$lang.Free_bids_with_buy}
											{elseif $coupon.type == 3}{$lang.Free_bids_no_buy}
											{/if}
										</td>
										<td>{$coupon.description}</td>
										<td><a href="/admin/users?coupon_id={$coupon.id}">{$coupon.return}</a></td>
										<td>{$coupon.date_start}</td>
										<td>{$coupon.date_end}</td>
										<td>{if $coupon.nb_limit > 0}{$coupon.nb_limit}{else}{$lang.Illimited}{/if}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/coupons/edit/{$coupon.id}">{$lang.Edit}</a></li><li><a href="/admin/coupons/delete/{$coupon.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/coupon">
							<p>
								<label>{$lang.Code} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="code" class="inputtext medium" required> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/img/infos.png" alt="infos" /></a><span class="tooltip">{$lang.Coupon_code_text}</span></span></span>
							</p>
							<p>
								<label>{$lang.Saving} <span style="color:red;">*</span> : </label><br /> 
								<input type="text" name="saving" class="inputtext medium" required> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/img/infos.png" alt="infos" /></a><span class="tooltip">{$lang.Coupon_saving_text}</span></span></span>
							</p>
							<p>
								<label>{$lang.Saving_type} <span style="color:red;">*</span> : </label><br /> 
								<select name="type" class="select">
									<option value="1">{$lang.Percent_with_buy}</option>
									<option value="2">{$lang.Free_bids_with_buy}</option>
									<option value="3">{$lang.Free_bids_no_buy}</option>
								</select>
							</p>
							<p>
								<label>{$lang.Description} : </label><br /> 
								<input type="text" name="description" class="inputtext medium" /> 
							</p>
							<p>
								<label>{$lang.Date_hour_start} <font color="red">*</font> : </label><br />
								<select name="start_time_day" class="small_select">
									{foreach from=$days item=day}
										<option value="{$day}" {if $datenow.day == $day}selected="selected"{/if}>{$day}</option>
									{/foreach}
								</select>
								-<select name="start_time_month" class="small_select">
									<option value="01" {if $datenow.month == '01'}selected="selected"{/if}>{$lang.January}</option>
									<option value="02" {if $datenow.month == '02'}selected="selected"{/if}>{$lang.February}</option>
									<option value="03" {if $datenow.month == '03'}selected="selected"{/if}>{$lang.March}</option>
									<option value="04" {if $datenow.month == '04'}selected="selected"{/if}>{$lang.April}</option>
									<option value="05" {if $datenow.month == '05'}selected="selected"{/if}>{$lang.May}</option>
									<option value="06" {if $datenow.month == '06'}selected="selected"{/if}>{$lang.June}</option>
									<option value="07" {if $datenow.month == '07'}selected="selected"{/if}>{$lang.July}</option>
									<option value="08" {if $datenow.month == '08'}selected="selected"{/if}>{$lang.August}</option>
									<option value="09" {if $datenow.month == '09'}selected="selected"{/if}>{$lang.September}</option>
									<option value="10" {if $datenow.month == '10'}selected="selected"{/if}>{$lang.October}</option>
									<option value="11" {if $datenow.month == '11'}selected="selected"{/if}>{$lang.November}</option>
									<option value="12" {if $datenow.month == '12'}selected="selected"{/if}>{$lang.December}</option>
								</select>
								-<select name="start_time_year" class="small_select">
									{foreach from=$years item=year}
										<option value="{$year}" {if $datenow.year == $year}selected="selected"{/if}>{$year}</option>
									{/foreach}
								</select>
								{$lang.At} <select name="start_time_hour" class="small_select">
									{foreach from=$hours item=hour}
										<option value="{$hour}" {if $datenow.hour == $hour}selected="selected"{/if}>{$hour}</option>
									{/foreach}
								</select>:<select name="start_time_min" class="small_select">
									{foreach from=$minutes item=minute}
										<option value="{$minute}" {if $datenow.minute == $minute}selected="selected"{/if}>{$minute}</option>
									{/foreach}
								</select>
								:<select name="start_time_sec" class="small_select">
									{foreach from=$seconds item=second}
										<option value="{$second}" {if $datenow.second == $second}selected="selected"{/if}>{$second}</option>
									{/foreach}
								</select>
							</p>
							<p>
								<label>{$lang.Date_hour_end} <font color="red">*</font> : </label><br />
								<select name="end_time_day" class="small_select">
									{foreach from=$days item=day}
										<option value="{$day}" {if $datenow.day == $day}selected="selected"{/if}>{$day}</option>
									{/foreach}
								</select>
								-<select name="end_time_month" class="small_select">
									<option value="01" {if $datenow.month == '01'}selected="selected"{/if}>{$lang.January}</option>
									<option value="02" {if $datenow.month == '02'}selected="selected"{/if}>{$lang.February}</option>
									<option value="03" {if $datenow.month == '03'}selected="selected"{/if}>{$lang.March}</option>
									<option value="04" {if $datenow.month == '04'}selected="selected"{/if}>{$lang.April}</option>
									<option value="05" {if $datenow.month == '05'}selected="selected"{/if}>{$lang.May}</option>
									<option value="06" {if $datenow.month == '06'}selected="selected"{/if}>{$lang.June}</option>
									<option value="07" {if $datenow.month == '07'}selected="selected"{/if}>{$lang.July}</option>
									<option value="08" {if $datenow.month == '08'}selected="selected"{/if}>{$lang.August}</option>
									<option value="09" {if $datenow.month == '09'}selected="selected"{/if}>{$lang.September}</option>
									<option value="10" {if $datenow.month == '10'}selected="selected"{/if}>{$lang.October}</option>
									<option value="11" {if $datenow.month == '11'}selected="selected"{/if}>{$lang.November}</option>
									<option value="12" {if $datenow.month == '12'}selected="selected"{/if}>{$lang.December}</option>
								</select>
								-<select name="end_time_year" class="small_select">
									{foreach from=$years item=year}
										<option value="{$year}" {if $datenow.year == $year}selected="selected"{/if}>{$year}</option>
									{/foreach}
								</select>
								{$lang.At} <select name="end_time_hour" class="small_select">
									{foreach from=$hours item=hour}
										<option value="{$hour}" {if $datenow.hour == $hour}selected="selected"{/if}>{$hour}</option>
									{/foreach}
								</select>
								:<select name="end_time_min" class="small_select">
									{foreach from=$minutes item=minute}
										<option value="{$minute}" {if $datenow.minute == $minute}selected="selected"{/if}>{$minute}</option>
									{/foreach}
								</select>
								:<select name="end_time_sec" class="small_select">
									{foreach from=$seconds item=second}
										<option value="{$second}" {if $datenow.second == $second}selected="selected"{/if}>{$second}</option>
									{/foreach}
								</select>
							</p>
							<p>
								<label>{$lang.Limit} : </label><br />
								<input type="text" name="limit" class="inputtext small" /> 
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