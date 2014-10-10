{include file='header.tpl'}

<div id="left-column">	
	<div class="breadcrumb"><a href="/">{$lang.Home}</a> &raquo; {$lang.Categories} &raquo; {$category_name}</div>
	<div id="auctions">
		<ul>
			{foreach from=$auctions item=auction}
				{include file='auction/display.tpl'}
			{/foreach}
		</ul>
	</div>
</div>

<div id="right-column">
	{include file='right_column.tpl'}
</div>
	
{include file='footer.tpl'}
