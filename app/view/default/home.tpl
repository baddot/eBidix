{include file='header.tpl'}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		{if $top_ad.active == 1}<div class="top-ad">{$top_ad.content}</div>{/if}

		{if !empty($home_text)}<div class="infos-message">{$home_text}</div>{/if}

		<div id="auctions">
<<<<<<< HEAD
			
=======
			<ul>
>>>>>>> 61ea784ce2063bc7be7f33a27a060646a4812729
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
			
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-right">
		{include file='right_column.tpl'}
	</div>
</div>

{include file='footer.tpl'}
