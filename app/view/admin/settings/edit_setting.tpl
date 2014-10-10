{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/setting">{$lang.Settings}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Settings}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/setting/edit/{$setting.id}">
							<p>
								{if $setting.name == 'bid_value'}<label>{$lang.Value}  <span style="color:red;">*</span> : </label><br /> <input type="text" name="value" class="inputtext small" value="{$setting.value}" /> {$settings.app.currency}
								{elseif $setting.name == 'currency'}<label>{$lang.Value}  <span style="color:red;">*</span> : </label><br />
									<select name="value" class="select">
										<option value="EUR" {if $setting.value == 'EUR'}selected="selected"{/if}>{$lang.Euros}</option>
										<option value="USD" {if $setting.value == 'USD'}selected="selected"{/if}>{$lang.Dollars}</option>
										<option value="GBD" {if $setting.value == 'GBD'}selected="selected"{/if}>{$lang.Pounds}</option>
									</select>
								{elseif $setting.name == 'theme'}<label>{$lang.Theme}  <span style="color:red;">*</span> : </label><br />
									<select name="value" class="select">
										{foreach from=$themes item=theme}
											<option value="{$theme.name}" {if $setting.value == $theme.name}selected="selected"{/if}>{$theme.name}</option>
										{/foreach}
									</select>
								{elseif $setting.name == 'auction_peak_start' || $setting.name == 'auction_peak_end'}
									<select name="hours">
										{foreach from=$hours item=hour}
											<option value="{$hour}" {if $setting.hours == $hour}selected="selected"{/if}>{$hour}</option>
										{/foreach}
									</select> : <select name="minutes">
										{foreach from=$minutes item=minute}
											<option value="{$minute}" {if $setting.minutes == $minute}selected="selected"{/if}>{$minute}</option>
										{/foreach}
									</select>
								{elseif $setting.name == 'site_live' || $setting.name == 'show_server_time'}
									<select name="value" class="select">
											<option value="yes" {if $setting.value == 'yes'}selected="selected"{/if}>{$lang.Yes}</option>
											<option value="no" {if $setting.value == 'no'}selected="selected"{/if}>{$lang.No}</option>
									</select>
								{elseif $setting.name == 'auctions_display'}
									<select name="value" class="select">
											<option value="labels" {if $setting.value == 'labels'}selected="selected"{/if}>{$lang.Labels}</option>
											<option value="list" {if $setting.value == 'list'}selected="selected"{/if}>{$lang.List}</option>
									</select>
								{elseif $setting.name == 'auctions_order'}
									<select name="value" class="select">
											<option value="asc" {if $setting.value == 'asc'}selected="selected"{/if}>{$lang.Asc}</option>
											<option value="desc" {if $setting.value == 'desc'}selected="selected"{/if}>{$lang.Desc}</option>
									</select>
								{else}<label>{$lang.Value}  <span style="color:red;">*</span> : </label><br /> 
									  <input type="text" name="value" value="{$setting.value}" class="inputtext big" />
								{/if}
							</p>					
							<p>
								<input type="hidden" name="name" value="{$setting.name}">
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