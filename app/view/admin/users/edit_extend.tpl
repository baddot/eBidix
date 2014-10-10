{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/users/extends">{$lang.Extends}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Extends}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/users/edit_extend/{$extend.id}">
							<p>
								<label>{$lang.Username} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="username" class="inputtext medium" value="{$extend.username}" />
							</p>
							<p>
								<input type="checkbox" name="active" class="checkbox" value="1" {if $extend.active == '1'}checked="checked"{/if} /> <label>{$lang.Activated}</label>
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