{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li>{$lang.Menu.My_account}</li>
		  <li class="active">{$lang.User_menu.Edit_account}</li>
		</ol>
		<div class="content">
			<form method="POST" action="/user/edit">
				<div class="form-group">
				  <input type="text" id="username" class="form-control" name="username" placeholder="{$lang.Username}" required autofocus>
				</div>
				
				<div class="form-group">
				  <input type="text" class="form-control" name="lastname" value="{$data.lastname}" placeholder="{$lang.Last_name}" required>
				</div>
				
				<div class="form-group">
				  <input type="text" class="form-control" name="firstname" value="{$data.firstname}" placeholder="{$lang.First_name}" required>
				</div>
				
				<div class="form-group">
				  <input type="email" class="form-control" name="email" value="{$data.email}" placeholder="{$lang.Email}" required>
				</div>
				
				<div class="form-group">
				  <input type="text" class="form-control" name="birthday" value="{$data.birthday}" placeholder="{$lang.Date_of_birth}" onfocus="(this.type='date')">
				</div>
				
				<div class="form-group">
				  <input type="tel" class="form-control" name="phone" value="{$data.phone}" placeholder="{$lang.Phone}">
				</div>
				
				<div class="form-group">
				  <input type="text" class="form-control" name="address" value="{$address.address}" placeholder="{$lang.Address}">
				</div>
				
				<div class="form-group">
				  <input type="text" class="form-control" name="postcode" value="{$address.postcode}" placeholder="{$lang.Postcode}">
				</div>
				
				<div class="form-group">
				  <input type="text" class="form-control" name="city" value="{$address.city}" placeholder="{$lang.City}">
				</div>
				
				<div class="form-group">
					{$lang.Country} :
					<select name="country" class="form-control">
						<option value=""></option>
						{foreach from=$countries item=country}
							<option value="{$country.id}" {if $country.id == $data.country}selected{/if}>{$country.name}</option>
						{/foreach}
					</select>
				</div>
				
				
				{*<div class="form-group">
					{$lang.How_did_find_us} : <br>
					<select name="source" class="form-control">
						<option value=""></option>
						{foreach from=$sources item=source}
							<option value="{$source.id}" {if $source.id == $data.source}selected{/if}>{$source.name}</option>
						{/foreach}
					</select>
				</div>*}
				
				<div class="form-group">
					<div class="checkbox">
						<input type="checkbox" name="newsletter" value="1" {if $data.newsletter ==1}checked{/if}> {$lang.Receive_newsletter}
					</div>
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="{$lang.Edit}">
				</div>
			</form>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}

