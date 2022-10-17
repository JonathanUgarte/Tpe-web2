{if $logged}
<form class="form" action="add" method="POST">
<div class="mb-3">
<label class="form-label">Autos</label>
<input type="text" name="autos" class="form-control">
</div>
<div class="mb-3">
<label class="form-label" >Modelo</label>
<input type="text" name="modelo" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Color</label>
<input type="text" name="color" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Km</label>
<input type="text" name="km" class="form-control">
</div>
<button type="submit" class="btn btn-primary mt-3">Insertar</button>
</form>
{/if}
