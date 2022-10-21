{include file="header.tpl"}

{include file="formAddComprador.tpl"}
<table class="table">
  <thead>
    <tr>
    <th scope='col'>id</th>
    <th scope='col'>Nombre</th>
    <th scope='col'>Email</th>
    <th scope='col'></th>
    <th scope='col'></th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$compradorbyid item=$comprador}
    <tr>
    <td>{$comprador->id_comprador}</td>
    <td>{$comprador->nombre}</td>
    <td>{$comprador->email}</td>
    {if $logged}
      <td ><a class="btn btn-danger mt-0" href='deleteComprador/{$comprador->id_comprador}' type='button'>Eliminar</a></td>
      <td ><a class="btn btn-success mt-0"   href='formEditComprador/{$comprador->id_comprador}' type='button'>Editar</a></td>
    {/if}
    
    </tr>
    {/foreach}
  </tbody>
</table>
<h5>VER AUTOS DE CADA COMPRADOR</h5>
    <form class="form" action="listVentas" method="POST">
    <select name="id_comprador">
    <option selected>Elegi Comprador</option>
    {foreach from= $compradorbyid item= $comprador}
    <option value="{$comprador->id_comprador}" name="id_comprador">{$comprador->nombre}</option>
    {/foreach}
    </select>
    <a class="btn btn-secondary mt-0" type="button" href="listVentas/{$comprador->id_comprador}" value="{$comprador->id_comprador}">Ir</a>
    </form>

   
    {include file="footer.tpl"}

