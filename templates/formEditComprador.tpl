{include file="header.tpl"}
<h5>Editar Comprador</h5>
{foreach from= $compradorbyid item= $comprador}
<form action="formEditComprador/{$comprador->id_comprador}" method="POST" class="form">
    <label>Nombre</label>
        <input type="text"  name="nombre" class="form-control" value="{$comprador->nombre}">
    <label>Email</label>
        <input type="text"  name="email" class="form-control"value="{$comprador->email}">
    <div class="mt-4">
    <button type="submit" class="btn btn-primary mt-2">Editar</a>
    </div>
</form>
</div>
{/foreach}

