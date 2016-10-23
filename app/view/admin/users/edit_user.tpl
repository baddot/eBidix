{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/user">{$lang.Users}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Users}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/user/edit/{$user.id}">
							<p>
								<label>{$lang.User} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="username" class="inputtext medium" value="{$user.username}" />
							</p>
							<p>
								<label>{$lang.Email} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="email" class="inputtext medium" value="{$user.email}" />
							</p>
							<p>
								<label>{$lang.Last_name} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="lastname" class="inputtext medium" value="{$user.lastname}" />
							</p>
							<p>
								<label>{$lang.First_name} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="firstname" class="inputtext medium" value="{$user.firstname}" />
							</p>
							<p>
								<label>{$lang.Gender} <span style="color:red;">*</span> :</label><br/> 
								{$lang.Male} <input type="radio" class="radio" name="gender" value="1" {if $user.gender == '1'}checked="checked"{/if} /> {$lang.Female} <input type="radio" class="radio" name="gender" value="2" {if $user.gender == '2'}checked="checked"{/if} />
							</p>
							<p>
								<input type="checkbox" name="active" class="checkbox" value="1" {if $user.active == '1'}checked="checked"{/if} /> <label>{$lang.Activate_user}</label>
							</p>
							{if $smarty.session.user_id == 1}
								<p>
									<input type="checkbox" name="admin" class="checkbox" value="1" {if $user.admin == '1'}checked="checked"{/if} /> <label>{$lang.Admin}</label>
								</p>
							{/if}
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