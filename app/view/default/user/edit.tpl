{include file='header.tpl'}
	
<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; <a href="/account">{$lang.Menu.My_account}</a> &raquo; {$lang.User_menu.Edit_account}</div>
	<div class="content">
		<form method="POST" action="/user/edit">
			<ul>
				<li><input type="text" name="lastname" value="{$data.lastname}" placeholder="{$lang.Last_name}" required></li>
				<li><input type="text" name="firstname" value="{$data.firstname}" placeholder="{$lang.First_name}" required></li>
				<li><input type="email" name="email" value="{$data.email}" placeholder="{$lang.Email}" required></li>
				<li><input type="text" name="birthday" value="{$data.birthday}" placeholder="{$lang.Date_of_birth}" onfocus="(this.type='date')"></li>
				<li><input type="tel" name="phone" value="{$data.phone}" placeholder="{$lang.Phone}"></li>
				<li><input type="text" name="address" value="{$address.address}" placeholder="{$lang.Address}"></li>
				<li><input type="text" name="postcode" value="{$address.postcode}" placeholder="{$lang.Postcode}"></li>
				<li><input type="text" name="city" value="{$address.city}" placeholder="{$lang.City}"></li>
				<li>
					{$lang.Country} :
					<select name="country">
						<option value=""></option>
						{foreach from=$countries item=country}
							<option value="{$country.id}" {if $country.id == $data.country}selected{/if}>{$country.name}</option>
						{/foreach}
					</select>
				</li>
				{*<li>
					{$lang.How_did_find_us} : <br>
					<select name="source">
						<option value=""></option>
						{foreach from=$sources item=source}
							<option value="{$source.id}" {if $source.id == $data.source}selected{/if}>{$source.name}</option>
						{/foreach}
					</select>
				</li>*}
				<li><input type="checkbox" name="newsletter" value="1" {if $data.newsletter ==1}checked{/if}> {$lang.Receive_newsletter}</li>
				<li><input type="submit" class="button green" value="{$lang.Edit}"></li>
			</ul>
		</form>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}
