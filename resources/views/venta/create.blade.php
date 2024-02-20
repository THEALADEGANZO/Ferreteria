@extends('layouts.app1')

@section('title', '')

@section('contents')
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-0" style="display: inline-block;">Nueva Venta</h2>
        </div>
        <div class="col-md-6 text-right">
        </div>
    </div>
    <form method="POST" action="{{ route('venta.store') }}" id="formVenta">
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="row" id="res"></div>
                <div class="row mt-2">
                    <div class="col-md-1" STYLE="display: none">
                        <label class="labels">ID_CLIENTE</label>
                        <input type="text" id="idcliente" name="idcliente" class="form-control" readonly>
                    </div>
                    <div class="col-md-9">
                        <label class="labels">CLIENTE</label>
                        <input type="text" id="cliente" name="cliente" class="form-control"
                               placeholder="Buscar Cliente">
                        <ul id="resultadoscliente" class="list-group" style="display: none;"></ul>
                    </div>
                    <div class="col-md-3">
                        <label class="labels">DOCUMENTO</label>
                        <input type="text" id="documento" name="documento" class="form-control" readonly>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-1" style="display: none">
                        <label class="labels">ID</label>
                        <input type="text" id="idproductos" name="idproductos" class="form-control">
                    </div>
                    <div class="col-md-9">
                        <label class="labels">PRODUCTO</label>
                        <input type="text" id="producto" name="producto" class="form-control"
                               placeholder="Buscar producto">
                        <ul id="resultadosProductos" class="list-group" style="display: none;"></ul>
                    </div>
                    <div class="col-md-1">
                        <label class="labels">STOCK</label>
                        <input type="number" id="stock" name="stock" class="form-control" readonly>
                    </div>
                    <div class="col-md-1">
                        <label class="labels">PRECIO</label>
                        <input type="text" id="precio_venta" name="precio_venta" class="form-control" readonly>
                    </div>
                    <div class="col-md-1">
                        <label class="labels">Cantidad</label>
                        <input type="number" min="1" id="cantidad" name="cantidad" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">&nbsp;</label>
                        <button class="btn btn-primary btn-block" type="button" id="btnAgregar"><i
                                class="fa fa-plus"></i> Agregar
                        </button>
                        <button class="btn btn-secondary btn-block" type="button" id="btnLimpiar">
                            Limpiar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form> <!-- Fin del formulario principal -->
    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <table id="detallesVentaTemporal" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color:#A9D0F5">
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Total</th>
            <th>Acciones</th>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>SubTotal:</strong></td>
                <td id="subtotal" class="text-center">0.00</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>IGV:</strong></td>
                <td id="igv" class="text-center">0.00</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>Monto Total:</strong></td>
                <td id="total" class="text-center">0.00</td>
                <td></td>
            </tr>
            </tfoot>
        </table>
        <div class="form-group col-md-3 m-auto">
            <button class="btn btn-primary btn-block" type="button" id="btnRealizarVenta">
                <i class="fa fa-plus"></i> Realizar Venta
            </button>
        </div>
        <br>
        <div class="form-group col-md-3 m-auto">
            <a href="{{ route('venta.index') }}"
               class="btn btn-secondary btn-block" style="color: white">
                Cancelar
            </a>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnAgregar').on('click', function () {
                agregarItem();
            });
            $('#btnLimpiar').on('click', function () {
                clearInputs();
            });
            $('#btnRealizarVenta').on('click', function () {
                realizarVenta();
            });
            $(document).on('click', '.btnEliminar', function () {
                $(this).closest('tr').remove();
                actualizarTotal();
            });

            function agregarItem() {
                // Obtener los valores de los campos
                var id_producto = parseInt($('#idproductos').val());
                var producto = $('#producto').val();
                var cantidad = parseInt($('#cantidad').val());
                var precioVenta = parseFloat($('#precio_venta').val());
                var stock = parseInt($('#stock').val());

                // Validar que se haya seleccionado un producto y la cantidad
                if (producto === '' || isNaN(cantidad) || cantidad <= 0 || isNaN(precioVenta)) {
                    alert('Completa los campos correctamente.');
                    return;
                }
                if (cantidad > stock) {
                    alert('Stock no disponible.');
                    return;
                }
                // Verificar si el producto ya está en la tabla
                var productoExistente = false;
                $('#detallesVentaTemporal tbody tr').each(function () {
                    var productoEnTabla = parseInt($(this).find('td:eq(0)').text());
                    if (productoEnTabla === id_producto) {
                        productoExistente = true;
                        return false; // Salir del bucle si el producto ya está en la tabla
                    }
                });

                if (productoExistente) {
                    alert('El producto ya está en la lista.');
                    return;
                }

                // Crear una nueva fila en la tabla con los valores
                var newRow = "<tr>" +
                    "<td>" + id_producto + "</td>" +
                    "<td>" + producto + "</td>" +
                    "<td>" + cantidad + "</td>" +
                    "<td>" + precioVenta + "</td>" +
                    "<td>" + (cantidad * precioVenta).toFixed(2) + "</td>" +
                    "<td><button class='btn btn-danger btn-sm btnEliminar'>Eliminar</button></td>" +
                    "</tr>";

                // Agregar la nueva fila a la tabla
                $('#detallesVentaTemporal tbody').append(newRow);

                // Actualizar el total
                actualizarTotal();

                clearInputs();
            }

            function actualizarTotal() {
                // Calcular y mostrar el nuevo subtotal
                var subtotal = 0;
                $('#detallesVentaTemporal tbody tr').each(function () {
                    subtotal += parseFloat($(this).find('td:eq(4)').text());
                });
                $('#subtotal').text(subtotal.toFixed(2));

                // Calcular y mostrar el nuevo IGV (18% del subtotal)
                var igv = subtotal * 0.18;
                $('#igv').text(igv.toFixed(2));

                // Calcular y mostrar el nuevo monto total (subtotal + igv)
                var total = subtotal + igv;
                $('#total').text(total.toFixed(2));
            }

            function realizarVenta() {

                // Validar que los campos del cliente estén llenos
                var idCliente = $('#idcliente').val();
                if (idCliente === '') {
                    alert('Selecciona un cliente válido.');
                    return;
                }

                // Validar que haya al menos un elemento en el detalle
                if ($('#detallesVentaTemporal tbody tr').length === 0) {
                    alert('Agrega al menos un ítem al detalle.');
                    return;
                }

                // Obtener los datos necesarios para la venta
                var detallesVenta = [];
                $('#detallesVentaTemporal tbody tr').each(function () {
                    var id = parseInt($(this).find('td:eq(0)').text());
                    var producto = $(this).find('td:eq(1)').text();
                    var cantidad = parseInt($(this).find('td:eq(2)').text());
                    var precioVenta = parseFloat($(this).find('td:eq(3)').text());
                    var total = parseFloat($(this).find('td:eq(4)').text());

                    detallesVenta.push({
                        id: id,
                        producto: producto,
                        cantidad: cantidad,
                        precioVenta: precioVenta,
                        total: total
                    });
                });

                var subtotal = parseFloat($('#subtotal').text());
                var igv = parseFloat($('#igv').text());
                var total = parseFloat($('#total').text());

                // Realizar la solicitud AJAX al servidor
                $.ajax({
                    url: '{{ route("venta.store") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        idCliente: idCliente,
                        detallesVenta: detallesVenta,
                        subtotal: subtotal,
                        igv: igv,
                        total: total
                        // Agrega otras variables según tus necesidades
                    },
                    success: function (response) {
                        if (response.success) {
                            const id_venta = response.venta_id;
                            const url = '{{ route("venta.export", ":id") }}'.replace(':id', id_venta)
                            window.open(url, '_blank');
                            window.location.href = '{{ route("venta.index") }}';
                        } else {
                            alert('Error al realizar la venta');
                        }
                    },
                    error: function () {
                        alert('Error de conexión');
                    }
                });
            }

            function clearInputs() {
                $('#idproductos').val('');
                $('#producto').val('');
                $('#cantidad').val('');
                $('#precio_venta').val('');
                $('#stock').val('');
            }
        });
    </script>
@endsection
