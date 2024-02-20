
  <!-- Modal -->
  <div class="modal fade" id="update{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('producto.update',$prod->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="idcategoria" class="form-label">CATEGORIA</label>
                <select class="form-select form-control" name="idcategoria" id="idcategoria" aria-describedby="helpId">
                    @foreach ($categoria as $cat)
                        <option value="{{ $cat->id }}" @if ($prod->idcategoria == $cat->id) selected @endif>
                            {{ $cat->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
         <div class="mb-3">
           <label for="" class="form-label">NOMBRE</label>
           <input type="text"
             class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" required value="{{$prod->nombre}} ">
         </div>
         <div class="mb-3">
            <label for="" class="form-label">DESCRIPCION</label>
            <input type="text"
              class="form-control" name="descripcion" id="" aria-describedby="helpId" placeholder="" required value="{{$prod->descripcion}} ">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">STOCK</label>
            <input type="text"
              class="form-control" name="stock" id="" aria-describedby="helpId" placeholder="" required value="{{$prod->stock}} ">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">PRECIO VENTA</label>
            <input type="text"
              class="form-control" name="precio_venta" id="" aria-describedby="helpId" placeholder="" required value="{{$prod->precio_venta}} ">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">PRECIO COMPRA</label>
            <input type="text"
              class="form-control" name="precio_compra" id="" aria-describedby="helpId" placeholder="" required value="{{$prod->precio_compra}} ">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>