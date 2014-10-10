{include file='header.tpl'}

<div id="left-column">
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.Menu.My_account}</div>
	<div class="content">
		<p>
			<u>{$lang.Things_to_do}</u>
			<ul>
				{if empty($profile.firstname)}<li><a href="/edit-account">{$lang.Complete_profil}</a></li>{/if}
				{if $packages}<li><a href="/packages">{$lang.Purchase_bids}</a></li>{/if}
				{if $address}<li><a href="/addresses">{$lang.Add_address}</a></li>{/if}
				{if $unpaid}<li><a href="/won-auctions">{$lang.Pay_for_an_auction}</a></li>{/if}
				{if !empty($uncomment)}<li><a href="/won-auctions">{$lang.Leave_comment}</a></li>{/if}
				{if !empty($messages)}<li><a href="/messages">{$lang.Read_messages}</a></li>{/if}
			</ul>
		</p>
		<div class="coupon">
			{$lang.If_have_coupon}<br>
			<form method="POST" action="/coupon">
				<input type="text" name="code" placeholder="{$lang.Code_coupon}" required> 
				<input type="submit" class="button green" value="{$lang.Submit}">
			</form>
		</div>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>

{include file='footer.tpl'}