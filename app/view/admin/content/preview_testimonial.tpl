{include file='admin/elements/header.tpl'}
	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/testimonials">{$lang.Testimonials}</a> &raquo {$lang.Survey}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Survey}</h3>
					</div>
					<div class="bcont">
						<p><img src="/upload/{$testimonial.image}" alt="" style="max-width:600px;" /></p>
						<p><b>{$testimonial.username}</b> :<br /><i>{$testimonial.text}</i></p>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}