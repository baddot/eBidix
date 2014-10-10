{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo; <a href="/admin/users">{$lang.Users}</a> &raquo; {$lang.Add}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Add_new_user}</h3>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/users">
							<p>
								<label>{$lang.Username} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="username" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Password} <span style="color:red;">*</span> :</label><br/> 
								<input type="password" name="password" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Email} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="email" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Last_name} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="lastname" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.First_name} <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="firstname" class="inputtext medium" />
							</p>
							<p>
								<label>{$lang.Gender} <span style="color:red;">*</span> :</label><br/> 
								{$lang.Male} <input type="radio" class="radio" name="gender" value="1"> {$lang.Female} <input type="radio" class="radio" name="gender" value="2">
							</p>
							<p>
								<input type="checkbox" name="active" class="checkbox" value="1" checked="checked" /> <label>{$lang.Activate_user}</label>
							</p>
							{if $smarty.session.user_id == 1}
								<p>
									<input type="checkbox" name="admin" class="checkbox" value="1" /> <label>{$lang.Admin}</label>
								</p>
							{/if}
							<p>
								<button name="submit" class="button green"><span>{$lang.Add}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}