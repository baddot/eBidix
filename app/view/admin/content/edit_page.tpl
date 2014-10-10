{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/page">{$lang.Pages}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Pages}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/page/edit/{$page.id}">
							<p>
								<label>{$lang.Name} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" value="{$page.name}" required> <a href="#" class="bubble"><img src="/themes/default/admin/img/infos.png" alt="infos" /><span>{$lang.Page_name_text}</span></a>
							</p>
							<p>
								<label>{$lang.Title} <span style="color:red;">*</span> : </label><br />
								<input type="text" name="title" class="inputtext medium" value="{$page.title}" required>
							</p>
							<p>
								<label>{$lang.Meta_description} : </label><br />
								<input type="text" name="meta_description" class="inputtext medium" value="{$page.meta_description}" />
							</p>
							<p>
								<label>{$lang.Meta_keywords} : </label><br />
								<input type="text" name="meta_keywords" class="inputtext medium" value="{$page.meta_keywords}" />
							</p>
							<p>
								<label>{$lang.Content} <span style="color:red;">*</span> : </label><br />
								<textarea name="content" class="ckeditor" cols="80" rows="10" required>{$page.content}</textarea>
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