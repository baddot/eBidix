{php}
header("Content-type:application/vnd.ms-excel");
header("Content-disposition:attachment;filename=userlist.csv");
{/php}
"Utilisateur";"Email";"Nom";"Prenom";"Adresse";"Code postal";"Ville";"Pays";"Genre";"Credits";"Source";"Date de creation";
{php}echo "\n";{/php}
{foreach from=$users item=user}
"{$user.username}";"{$user.email}";"{$user.lastname}";"{$user.firstname}";"{$user.address}";"{$user.postcode}";"{$user.city}";"{$user.country}";"{$user.gender}";"{$user.balance}";"{$user.source}";"{$user.created}";{php}echo "\n";{/php}
{/foreach}