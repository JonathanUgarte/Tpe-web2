{include file="header.tpl"}

<h1>Autos que posee esta persona<h1>
{foreach from=$autosbycomprador item=$autos}
{if $autos->id_comprador!=""}
<ul>
   <li>{$autos->autos}</li>
</ul>
{else}
    <p>No posee autos</p>
{/if}
{/foreach}

