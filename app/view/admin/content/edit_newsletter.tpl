{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/newsletters">{$lang.Newsletters}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Newsletters}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/newsletter/edit/{$newsletter.id}">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" value="{$newsletter.name}" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Object} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="object" value="{$newsletter.object}" class="inputtext medium" required>
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<textarea cols="80" id="email_content" name="content" rows="10" required>{$newsletter.content}</textarea>
								<script type="text/javascript">
								//<![CDATA[
									CKEDITOR.replace( 'email_content' );
								//]]>
								</script>
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