<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Dashboard</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
  
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
  
      <!-- Main Content -->
      <div id="content">
  
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
  
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>
  
          @yield('contents')
  
          <!-- Content Row -->
  
  
        </div>
        <!-- /.container-fluid -->
  
      </div>
      <!-- End of Main Content -->
  
      <!-- Footer -->
     
      <!-- End of Footer -->
  
    </div>
    <!-- End of Content Wrapper -->
  
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  // Supongamos que $productos contiene los datos de productos disponibles en la vista
  const productos = {!! json_encode($productos) !!};

  document.getElementById('producto').addEventListener('input', function() {
      buscarProductoEnTiempoReal(this.value);
  });

  function buscarProductoEnTiempoReal(query) {
      const resultadosProductos = document.getElementById('resultadosProductos');
      resultadosProductos.innerHTML = '';

      const resultadosFiltrados = productos.filter(producto => producto.nombre.toLowerCase().includes(query.toLowerCase()));

      resultadosFiltrados.forEach(producto => {
          const listItem = document.createElement('li');
          listItem.className = 'list-group-item';
          listItem.textContent = producto.nombre;

          listItem.addEventListener('click', function() {
              // Llenar los campos correspondientes al hacer clic en el resultado
              document.getElementById('producto').value = producto.nombre;
              document.getElementById('stock').value = producto.stock || 'Stock no disponible';
              document.getElementById('precio_venta').value = producto.precio_venta || 'Precio no disponible';
              document.getElementById('idproductos').value = producto.id || 'id no disponible';
              // Ocultar la lista de resultados después de la selección
              resultadosProductos.style.display = 'none';
          });

          resultadosProductos.appendChild(listItem);
      });

      resultadosProductos.style.display = resultadosFiltrados.length > 0 ? 'block' : 'none';
  }
</script>


<script>
    // Supongamos que $productos contiene los datos de productos disponibles en la vista
    const cliente = {!! json_encode($cliente) !!};
  
    document.getElementById('cliente').addEventListener('input', function() {
        buscarClienteEnTiempoReal(this.value);
    });
  
    function buscarClienteEnTiempoReal(query) {
        const resultadosCliente = document.getElementById('resultadoscliente');
        resultadosCliente.innerHTML = '';
  
        const resultadosFiltrados = cliente.filter(cliente => cliente.nombre.toLowerCase().includes(query.toLowerCase()));
  
        resultadosFiltrados.forEach(cliente => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.textContent = cliente.nombre;
  
            listItem.addEventListener('click', function() {
                // Llenar los campos correspondientes al hacer clic en el resultado
                document.getElementById('cliente').value = cliente.nombre;
                document.getElementById('documento').value = cliente.documento || 'documento no disponible';
                document.getElementById('idcliente').value = cliente.id || 'id no disponible';
                // Ocultar la lista de resultados después de la selección
                resultadosCliente.style.display = 'none';
            });
  
            resultadosCliente.appendChild(listItem);
        });
  
        resultadosCliente.style.display = resultadosFiltrados.length > 0 ? 'block' : 'none';
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>