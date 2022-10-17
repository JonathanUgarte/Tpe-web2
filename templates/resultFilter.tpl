<h1>Chocolates pertenecientes a esa marca </h1>
<ul>
{foreach from=$autosbyid item=$autos}
    <li>{$autos->autos}</li>
{/foreach}
</ul>
<a href="item" type="button" class="btn btn-link">Volver a la tabla de chocolates </a>
