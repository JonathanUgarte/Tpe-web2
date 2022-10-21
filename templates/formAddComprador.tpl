{if $logged}
    <form class="form" action="addComprador" method="POST">
    <div class="mb-3">
    <label class="form-label">ID-Comprador</label>
    <input type="text" name="id_comprador" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label" >Email</label>
    <input type="text" name="email" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Insertar</button>
    </form>
    {/if}
    