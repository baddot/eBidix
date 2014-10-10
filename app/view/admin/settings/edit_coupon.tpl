{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/coupons">{$lang.Coupons}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Coupons}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/coupon/edit/{$coupon.id}">
							<p>
								<label>{$lang.Code} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="code" class="inputtext medium" value="{$coupon.code}" required> <a href="#" class="bubble_infos"><img src="/themes/default/admin/images/infos.png" alt="infos" /><span>{$lang.Coupon_code_text}</span></a>
							</p>
							<p>
								<label>{$lang.Saving} <span style="color:red;">*</span> : </label><br /> 
								<input type="text" name="saving" class="inputtext medium" value="{$coupon.saving}" required> <a href="#" class="bubble_infos"><img src="/themes/default/admin/images/infos.png" alt="infos" /><span>{$lang.Coupon_saving_text}</span></a>
							</p>
							<p>
								<label>{$lang.Saving_type} <span style="color:red;">*</span> : </label><br /> 
								<select name="type" class="select">
									<option value="1" {if $coupon.type == 1}selected="selected"{/if}>{$lang.Percent}</option>
									<option value="2" {if $coupon.type == 2}selected="selected"{/if}>{$lang.Free_bids}</option>
									<option value="3" {if $coupon.type == 3}selected="selected"{/if}>{$lang.Free_bids_percent}</option>
									<option value="4" {if $coupon.type == 4}selected="selected"{/if}>{$lang.Free_bids_no_buy}</option>
								</select>
							</p>
							<p>
								<label>{$lang.Description} : </label><br /> 
								<input type="text" name="description" class="inputtext medium" value="{$coupon.description}" /> 
							</p>
							<p>
								<label>{$lang.Date_hour_start} <font color="red">*</font> : </label><br />
								<select name="start_time_day" class="small_select">
									{foreach from=$days item=day}
										<option value="{$day}" {if $time_data.start_day == $day}selected="selected"{/if}>{$day}</option>
									{/foreach}
								</select>
								-<select name="start_time_month" class="small_select">
									<option value="01" {if $time_data.start_month == '01'}selected="selected"{/if}>{$lang.January}</option>
									<option value="02" {if $time_data.start_month == '02'}selected="selected"{/if}>{$lang.February}</option>
									<option value="03" {if $time_data.start_month == '03'}selected="selected"{/if}>{$lang.March}</option>
									<option value="04" {if $time_data.start_month == '04'}selected="selected"{/if}>{$lang.April}</option>
									<option value="05" {if $time_data.start_month == '05'}selected="selected"{/if}>{$lang.May}</option>
									<option value="06" {if $time_data.start_month == '06'}selected="selected"{/if}>{$lang.June}</option>
									<option value="07" {if $time_data.start_month == '07'}selected="selected"{/if}>{$lang.July}</option>
									<option value="08" {if $time_data.start_month == '08'}selected="selected"{/if}>{$lang.August}</option>
									<option value="09" {if $time_data.start_month == '09'}selected="selected"{/if}>{$lang.September}</option>
									<option value="10" {if $time_data.start_month == '10'}selected="selected"{/if}>{$lang.October}</option>
									<option value="11" {if $time_data.start_month == '11'}selected="selected"{/if}>{$lang.November}</option>
									<option value="12" {if $time_data.start_month == '12'}selected="selected"{/if}>{$lang.December}</option>
								</select>
								-<select name="start_time_year" class="small_select">
									{foreach from=$years item=year}
										<option value="{$year}" {if $time_data.start_year == $year}selected="selected"{/if}>{$year}</option>
									{/foreach}
								</select>
								{$lang.At} <select name="start_time_hour" class="small_select">
									{foreach from=$hours item=hour}
										<option value="{$hour}" {if $time_data.start_hour == $hour}selected="selected"{/if}>{$hour}</option>
									{/foreach}
								</select>:<select name="start_time_min" class="small_select">
									{foreach from=$minutes item=minute}
										<option value="{$minute}" {if $time_data.start_minute == $minute}selected="selected"{/if}>{$minute}</option>
									{/foreach}
								</select>
								:<select name="start_time_sec" class="small_select">
									{foreach from=$seconds item=second}
										<option value="{$second}" {if $time_data.start_second == $second}selected="selected"{/if}>{$second}</option>
									{/foreach}
								</select>
							</p>
							<p>
								<label>{$lang.Date_hour_end} <font color="red">*</font> : </label><br />
								<select name="end_time_day" class="small_select">
									{foreach from=$days item=day}
										<option value="{$day}" {if $time_data.end_day == $day}selected="selected"{/if}>{$day}</option>
									{/foreach}
								</select>
								-<select name="end_time_month" class="small_select">
									<option value="01" {if $time_data.end_month == '01'}selected="selected"{/if}>{$lang.January}</option>
									<option value="02" {if $time_data.end_month == '02'}selected="selected"{/if}>{$lang.February}</option>
									<option value="03" {if $time_data.end_month == '03'}selected="selected"{/if}>{$lang.March}</option>
									<option value="04" {if $time_data.end_month == '04'}selected="selected"{/if}>{$lang.April}</option>
									<option value="05" {if $time_data.end_month == '05'}selected="selected"{/if}>{$lang.May}</option>
									<option value="06" {if $time_data.end_month == '06'}selected="selected"{/if}>{$lang.June}</option>
									<option value="07" {if $time_data.end_month == '07'}selected="selected"{/if}>{$lang.July}</option>
									<option value="08" {if $time_data.end_month == '08'}selected="selected"{/if}>{$lang.August}</option>
									<option value="09" {if $time_data.end_month == '09'}selected="selected"{/if}>{$lang.September}</option>
									<option value="10" {if $time_data.end_month == '10'}selected="selected"{/if}>{$lang.October}</option>
									<option value="11" {if $time_data.end_month == '11'}selected="selected"{/if}>{$lang.November}</option>
									<option value="12" {if $time_data.end_month == '12'}selected="selected"{/if}>{$lang.December}</option>
								</select>
								-<select name="end_time_year" class="small_select">
									{foreach from=$years item=year}
										<option value="{$year}" {if $time_data.end_year == $year}selected="selected"{/if}>{$year}</option>
									{/foreach}
								</select>
								{$lang.At} <select name="end_time_hour" class="small_select">
									{foreach from=$hours item=hour}
										<option value="{$hour}" {if $time_data.end_hour == $hour}selected="selected"{/if}>{$hour}</option>
									{/foreach}
								</select>
								:<select name="end_time_min" class="small_select">
									{foreach from=$minutes item=minute}
										<option value="{$minute}" {if $time_data.end_minute == $minute}selected="selected"{/if}>{$minute}</option>
									{/foreach}
								</select>
								:<select name="end_time_sec" class="small_select">
									{foreach from=$seconds item=second}
										<option value="{$second}" {if $time_data.end_second == $second}selected="selected"{/if}>{$second}</option>
									{/foreach}
								</select>
							</p>
							<p>
								<label>{$lang.Limit} : </label><br />
								<input type="text" name="limit" class="inputtext small" value="{$coupon.nb_limit}" /> 
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