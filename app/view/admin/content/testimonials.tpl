{include file='admin/elements/header.tpl'}

<script type="text/javascript" src="/themes/default/admin/js/note.js"></script>
	
	<div class="container_12">
		<div class="crumb">&raquo {$lang.Testimonials}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Testimonials}</h3>
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
									<th>{$lang.Auction_id}</th>
									<th>{$lang.Username}</th>
									<th>{$lang.Text}</th>
									<th>{$lang.Note}</th>
									<th>{$lang.Activated}</th>
									<th>{$lang.Validated}</th>
									{*<th>{$lang.Week_foto}</th>*}
									<th>{$lang.Date}</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$testimonials item=testimonial}
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td>{if !empty($testimonial.auction_id)}<a href="/auctions/view/{$testimonial.auction_id}">{$testimonial.auction_id}</a>{/if}</td>
										<td><a href="/admin/users/view/{$testimonial.user_id}">{$testimonial.username}</a></td>
										<td>{$testimonial.text}...</td>
										<td>{$testimonial.note}/5</td>
										<td>{if $testimonial.active == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										<td>{if $testimonial.validate == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>
										{*<td>{if $testimonial.show_home == 1}{$lang.Yes}{else}{$lang.No}{/if}</td>*}
										<td>{$testimonial.created|date_format:"%d-%m-%Y %H:%M:%S"}</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/testimonials/preview/{$testimonial.id}">{$lang.Survey}</a></li>{if $testimonial.validate != 1}<li><a href="/admin/testimonials/validate/{$testimonial.id}">{$lang.Validate}</a></li>{/if}{*{if $testimonial.show_home != 1}<li><a href="/admin/testimonials/display/{$testimonial.id}">{$lang.Week_foto}</a></li>{/if}*}<li><a href="/admin/testimonials/edit/{$testimonial.id}">{$lang.Edit}</a></li><li><a href="/admin/testimonials/delete/{$testimonial.id}">{$lang.Delete}</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						{include file='admin/elements/controls.tpl'}
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/testimonials" enctype="multipart/form-data">
							<p>
								<label>{$lang.Auction_id} <span style="color:red;">*</span> : </label><br />
								<select name="auction_id" class="small_select">
									{foreach from=$auctions item=auction}
										<option value="{$auction.id}">{$auction.id}</option>
									{/foreach}
								</select> 
								<span class="tooltip_box"><span><a href="#"><img src="/themes/default/admin/images/infos.png" alt="infos" /></a><span class="tooltip">{$lang.Auction_id_text}</span></span></span>
							</p>
							<p>
								<label>{$lang.Image} : <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /></label><br />
								<input type="file" name="image" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="text" class="inputtext big" />
							</p>
							<p>
								<input type="checkbox" name="active" value="1" class="checkbox" checked="checked" /> <label>{$lang.Activate}</label>
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