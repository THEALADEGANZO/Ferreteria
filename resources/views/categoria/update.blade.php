
  <!-- Modal -->
  <div class="modal fade" id="update{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('categoria.update',$cat->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="modal-body">
         <div class="mb-3">
           <label for="" class="form-label">NOMBRE</label>
           <input type="text"
             class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" required value="{{$cat->nombre}} ">
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