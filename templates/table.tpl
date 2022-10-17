{include file="header.tpl"}


{include file="formAddAuto.tpl"}
<table class="table">
  <thead>
    <tr>
    <th scope='col'>Id</th>
    <th scope='col'>Auto</th>
    <th scope='col'>Modelo</th>
    <th scope='col'>Color</th>
    <th scope='col'>Km</th>
    <th scope='col'></th>
    <th scope='col'></th>
    <th scope='col'></th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$autosbyid item=$autos}
    <tr>
    <td>{$autos->id}</td>
    <td>{$autos->autos}</td>
    <td>{$autos->modelo}</td>
    <td>{$autos->color}</td>
    <td>{$autos->km}</td>
    <td ><a class="btn btn-secondary mt-0" href='detalle/{$autos->id}' type='button'>Detalle</a></td>
    {if $logged}
    <td ><a class="btn btn-danger mt-0" href='delete/{$autos->id}' type='button'>Eliminar</a></td>
    <td ><a class="btn btn-success mt-0"   href='formEdit/{$autos->id}' type='button'>Editar</a></td>
  {/if}
  
    </tr>
    {/foreach}
  </tbody>
</table>





{include file="footer.tpl"};

