{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/auction/soon">{$lang.Soon_auctions}</a> &raquo {$lang.Start}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Auction_start}: {$auction.name}</h3>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/auction/start/{$auction.id}">
							<p>
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td><label>{$lang.Date_start} <font color="red">*</font> :<label></td>
										<td style="width:5px;"></td>
										<td><input type="text" name="date" class="date-pick" /></td>
									</tr>
								</table>
							</p>
							
							<p>
								<label>{$lang.Hour_start} <font color="red">*</font> : </label>
								<select name="auction_hour">
									{foreach from=$hours item=hour}
										<option value="{$hour}" {if $now.hours == $hour}selected="selected"{/if}>{$hour}</option>
									{/foreach}
								</select>
								:<select name="auction_min">
									{foreach from=$minutes item=minute}
										<option value="{$minute}" {if $now.minutes == $minute}selected="selected"{/if}>{$minute}</option>
									{/foreach}
								</select>
								:<select name="auction_sec">
									{foreach from=$seconds item=second}
										<option value="{$second}" {if $now.seconds == $second}selected="selected"{/if}>{$second}</option>
									{/foreach}
								</select>
							</p>
								
							<p>
								<button name="submit" class="button green"><span>{$lang.Start}</span></button>
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