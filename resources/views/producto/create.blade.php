<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="idcategoria" class="form-label">CATEGORIA</label>
              <select class="form-select form-control" name="idcategoria" id="idcategoria" aria-describedby="helpId">
                <option value=""disabled selected>Elige una categoría</option>
                  @foreach ($categoria as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                  @endforeach
              </select>
          </div>          
            <div class="mb-3">
              <label for="nombre" class="form-label">NOMBRE</label>
              <input type="text" class="form-control" name="nombre"  aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">DESCRIPCION</label>
              <input type="text" class="form-control" name="descripcion"  aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">STOCK</label>
              <input type="text" class="form-control" name="stock" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">PRECIO VENTA</label>
              <input type="text" class="form-control" name="precio_venta" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">PRECIO COMPRA</label>
              <input type="text" class="form-control" name="precio_compra" aria-describedby="helpId" placeholder="" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  