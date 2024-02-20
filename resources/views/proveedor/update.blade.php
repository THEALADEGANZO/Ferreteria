
  <!-- Modal -->
  <div class="modal fade" id="update{{$prov->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('proveedor.update',$prov->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="modal-body">
            
         <div class="mb-3">
           <label for="" class="form-label">NOMBRE</label>
           <input type="text"
             class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" required value="{{$prov->nombre}} ">
         </div>
         <div class="mb-3">
            <label for="" class="form-label">TELEFONO</label>
            <input type="text"
              class="form-control" name="telefono" id="" aria-describedby="helpId" placeholder="" required value="{{$prov->telefono}} ">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">DOCUMENTO</label>
            <input type="text"
              class="form-control" name="documento" id="" aria-describedby="helpId" placeholder="" required value="{{$prov->documento}} ">
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