{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<ol class="breadcrumb">
		  <li><a href="/">{$lang.Home}</a></li>
			<li>{$lang.Categories}</li>
		  <li class="active">{$category_name}</li>
		</ol>
		<div id="auctions">
			<ul>
				{foreach from=$auctions item=auction}
					{include file='auction/display.tpl'}
				{/foreach}
			</ul>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
