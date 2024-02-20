<!-- Modal -->
<div class="modal fade" id="eliminar{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('producto.destroy', $prod->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="modal-body">
            Seguro que desea eliminar el producto <strong>{{ $prod->nombre }}</strong>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Atrás</button>
            <button type="submit" class="btn btn-primary">ELIMINAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  