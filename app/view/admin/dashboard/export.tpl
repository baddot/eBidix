{php}
header("Content-type:application/vnd.ms-excel");
header("Content-disposition:attachment;filename=accounting.csv");
{/php}
"{$lang.Date}";"{$lang.Type}";"{$lang.Details}";"{$lang.Payment}";"{$lang.Income}";"{$lang.Outgoings}";"{$lang.Earnings}";
{php}echo "\n";{/php}
{foreach from=$stats item=key}
"{$key.date}";"{if $key.type == 1}{$lang.Auction_sale}{elseif $key.type == 2}{$lang.Classic_sale}{elseif $key.type == 3}{$lang.Product_buy}{/if}";"{$key.auction_id} / {$key.winner_username}";"{if !empty($key.payment)}{$key.payment} ({$lang.Fees}: {$key.fees}){/if}";"{$key.price} + {$key.spent_credits}";"{$key.outgoings}";"{$key.earnings}";{php}echo "\n";{/php}
{/foreach}