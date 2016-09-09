{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
		  <li class="active">{$lang.Menu.My_account}</li>
		</ol>
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
				<div class="form-group">
					<input type="text" class="form-control" name="code" placeholder="{$lang.Code_coupon}" required> 
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="{$lang.Submit}">
				</div>
			</form>
		</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
