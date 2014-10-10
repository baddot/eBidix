{include file='header.tpl'}

	<div id="left-column">	
		{if $top_ad.active == 1}<div class="top-ad">{$top_ad.content}</div>{/if}
		
		{if !empty($home_text)}<div class="infos-message">{$home_text}</div>{/if}
		
		<div id="auctions">
			<ul>
				{if !empty($ongoing_auctions)}	
					{foreach from=$ongoing_auctions item=auction}
						{include file='auction/display.tpl'}
					{/foreach}
				{/if}
				{if !empty($soon_auctions)}
					{assign var='sort' value='list'}
					{foreach from=$soon_auctions item=auction}
						{include file='auction/display.tpl'}
					{/foreach}
				{/if}
			</ul>
		</div>
	</div>
	
	<div id="right-column">
		{include file='right_column.tpl'}
	</div>

{include file='footer.tpl'}
