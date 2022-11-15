{include file="header.tpl"}
<h5>Editar Auto</h5>
{foreach from=$autosbyid item=$autos}
<form action="formEdit/{$autos->id}" method="POST" class="form">
    <label>Autos</label>
        <input type="text"  name="autos" class="form-control"value="{$autos->autos}">
    <label>Modelo</label>
        <input type="text"  name="modelo" class="form-control" value="{$autos->modelo}">
    <label>Color</label>
        <input type="text" name="color" class="form-control" value="{$autos->color}">
        <label>Km</label>
        <input type="text" name="km" class="form-control"value="{$autos->km}">
    <div class="mt-4">
    <button type="submit" class="btn btn-primary mt-2">Editar</a>
    </div>
</form>
</div>
{/foreach}

{include file="footer.tpl"}