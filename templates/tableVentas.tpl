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
      <td ><a class="btn btn-success mt-0"   href='formEditCompradores/{$comprador->id_comprador}' type='button'>Editar</a></td>
    {/if}
    
    </tr>
    {/foreach}
  </tbody>
</table>
<h5>VER AUTOS DE CADA COMPRADOR</h5>
    <form class="form" action="filter" method="POST">
    <select name="selected">
    {foreach from= $compradorbyid item= $comprador}
    <option value="{$comprador->id_comprador}">{$comprador->nombre}</option>
    {/foreach}
    </select>
    <button type="submit">IR</button>
    </form>

   
    {include file="footer.tpl"}

