{include file='admin/elements/header.tpl'}

<script type="text/javascript" src="/themes/default/admin/js/note.js"></script>

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/testimonials">{$lang.Testimonials}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Testimonials}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/testimonial/edit/{$testimonial.id}">
							<p>
								<label>{$lang.Image} : </label><br />
								<img src="/upload/{$testimonial.image}" alt="" />
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> :</label><br /> 
								<input type="text" name="text" value="{$testimonial.text}" class="inputtext big" required>
							</p>
							<p>
								<input type="checkbox" name="active" value="1" class="checkbox" {if $testimonial.active == 1}checked="checked"{/if} /> <label>{$lang.Activate}</label>
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