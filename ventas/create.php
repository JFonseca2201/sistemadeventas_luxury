<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/clientes/listado_clientes.php');

/* C:\xampp\htdocs\www.sistemadeventas.com\app\controllers\clientes\listado_clientes.php */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">REGISTRO DE UNA NUEVA VENTA</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $URL ?>">Inicio</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-12">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <?php
                            $cont_ventas = 0;
                            foreach ($ventas_datos as $ventas_dato) {
                                $cont_ventas = $cont_ventas + 1;
                            }
                            ?>

                            <div class="card-tools">
                                <h3 class="card-title" style="text-align: center;">
                                    <div class="contenedor-flexbox">
                                        <div class="" style="display:inline-block;"><i class="fa fa-shopping-bag"></i> Venta Nro </div>
                                        <div class="" style="display:inline-block; text-align: center;"><input type="text" class="form-control" value="<?php echo $cont_ventas + 1 ?>" disabled></div>
                                    </div>

                                </h3>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="" style="display: flex; text-align: right; float: right;">

                                <div class="" style="width: 20px;"></div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_producto">
                                    <i class="fas fa-plus"></i> Agregar producto
                                </button>
                            </div>
                            <!-- Visualizar prodcuto -->
                            <div id="modal-buscar_producto" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Busqueda de producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Código</th>
                                                            <th>Selec.</th>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th>P.V.P</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($productos_datos as $productos_dato) {
                                                            $id_producto = $productos_dato['id_producto'];
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $productos_dato['codigo'] ?></td>
                                                                <td>
                                                                    <center>
                                                                        <button class="btn btn-info" id="btn_seleccionar<?php echo $id_producto ?>">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>
                                                                    </center>
                                                                    <script>
                                                                        $('#btn_seleccionar<?php echo $id_producto ?>').click(function() {

                                                                            var id_producto = "<?php echo $productos_dato['id_producto'] ?>";
                                                                            $('#id_producto').val(id_producto);

                                                                            var codigo = "<?php echo  $productos_dato['codigo'] ?>";
                                                                            $('#producto').val(codigo);

                                                                            var descripcon = "<?php echo $productos_dato['nombre'] ?>";
                                                                            $('#descripcon').val(descripcon);

                                                                            var precio_venta = "<?php echo '$ ' . $productos_dato['precio_venta'] ?>";
                                                                            $('#precio_unitario').val(precio_venta);
                                                                            $('#cantidad').focus();

                                                                            //$('#modal-buscar_producto').modal('toggle');

                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><img src="<?php echo $URL . '/almacen/img_productos/' . $productos_dato['imagen'] ?>" width="50px" alt=""></td>
                                                                <td><?php echo $productos_dato['nombre'] ?></td>
                                                                <td><?php echo "$ " . $productos_dato['precio_venta'] ?></td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                                <hr>


                                                <div class="row">

                                                    <div class="col-md-2">

                                                        <div class="form-goup">
                                                            <input type="text" id="id_producto" hidden>
                                                            <label for="">Producto</label>
                                                            <input type="text" class="form-control" id="producto" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="form-goup">
                                                            <label for="">Descripción</label>
                                                            <input type="text" class="form-control" id="descripcon" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-goup">
                                                            <label for="">Cantidad</label>
                                                            <input type="number" class="form-control" id="cantidad">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-goup">
                                                            <label for="">Precio Unitario</label>
                                                            <input type="text" class="form-control" value="$" id="precio_unitario" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button style="float: right;" class="btn btn-primary" id="btn_registrar_carrito"> <i class="fas fa-plus"></i> Agregar</button>
                                                <div class="" id="respuesta_carrito"></div>
                                                <script>
                                                    $('#btn_registrar_carrito').click(function() {

                                                        var nro_venta = '<?php echo $cont_ventas + 1; ?>'
                                                        var id_producto = $('#id_producto').val();
                                                        var cantidad = $('#cantidad').val();

                                                        if (id_producto == "") {
                                                            alert('Debe seleccionar un producto...');
                                                        } else if (cantidad == "") {
                                                            alert('Debe ingresar una cantidad...');
                                                        } else {
                                                            var url = "../app/controllers/ventas/registrar_carrito.php";
                                                            $.get(url, {
                                                                nro_venta: nro_venta,
                                                                id_producto: id_producto,
                                                                cantidad: cantidad

                                                            }, function(datos) {
                                                                $('#respuesta_carrito').html(datos);
                                                            });

                                                            //$('#modal-buscar_producto').modal('toggle');
                                                        }

                                                    });
                                                </script>
                                                <br><br>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <br>
                            <hr>
                            <div class="table table-responsive">
                                <table class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #e7e7e7; text-align: center;">No</th>
                                            <th style="background-color: #e7e7e7; text-align: center;">Producto </th>
                                            <th style="background-color: #e7e7e7; text-align: center;">Detalle </th>
                                            <th style="background-color: #e7e7e7; text-align: center;">Cantidad </th>
                                            <th style="background-color: #e7e7e7; text-align: center;">Subtotal </th>
                                            <th style="background-color: #e7e7e7; text-align: center;">Precio final</th>
                                            <th style="background-color: #e7e7e7; text-align: center;">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_de_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $precio_total = 0;
                                        $nro_venta = $contador_de_carrito + 1;


                                        $sql_carrito = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion, pro.precio_venta AS precio_venta
                                                        FROM tb_carrito AS carr INNER JOIN tb_almacen AS pro ON carr.id_producto=pro.id_producto 
                                                        WHERE nro_venta= '$nro_venta' ORDER BY id_carrito ASC";

                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();

                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($carrito_datos as $carrito_dato) {
                                            $id_carrito = $carrito_dato['id_carrito'];
                                            $contador_de_carrito = $contador_de_carrito + 1;
                                            $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                            $precio_unitario_total = $precio_unitario_total + $carrito_dato['precio_venta']
                                        ?>
                                            <tr>
                                                <?php  ?>
                                                <td><?php echo $contador_de_carrito ?></td>
                                                <td><?php echo $carrito_dato['nombre_producto'] ?></td>
                                                <td><?php echo $carrito_dato['descripcion']  ?></td>
                                                <td><?php echo $carrito_dato['cantidad'] ?></td>
                                                <td>$<?php echo $carrito_dato['precio_venta'] ?></td>
                                                <td>$<?php
                                                        $cantidad = floatval($carrito_dato['cantidad']);
                                                        $precio_venta = floatval($carrito_dato['precio_venta']);
                                                        $subtotal = $cantidad * $precio_venta;
                                                        echo bcdiv($subtotal, '1', 2);
                                                        $precio_total = $precio_total + $subtotal;
                                                        ?></td>
                                                <td>
                                                    <center>
                                                        <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                                            <input type="text" name="id_carrito" value="<?php echo $id_carrito ?>" hidden>
                                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </center>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" style="background-color:rgb(240, 240, 240); text-align: right;">Total: </th>
                                            <th><?php echo $cantidad_total ?></th>
                                            <th>$<?php echo bcdiv($precio_unitario_total, '1', 2); ?></th>
                                            <th style="background-color:rgb(0, 30, 58); text-align: center; color:rgb(255, 255, 255); font-size: larger;">$<?php echo bcdiv($precio_total, '1', 2); ?></th>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="row">
                        <div class="col-md-7">
                            <!-- ******************CLIENTE**************** -->
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="" style="display: flex; text-align: right; float: right;">

                                        <div class="" style="width: 20px;"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_cliente">
                                            <i class="fas fa-plus"></i> Buscar cliente
                                        </button>
                                    </div>
                                    <div id="modal-buscar_cliente" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title">Busqueda de Cliente</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table table-responsive">
                                                        <table id="example2" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Selec.</th>
                                                                    <th>Cliente</th>
                                                                    <th>Cédula/RUC</th>
                                                                    <th>Dirección</th>
                                                                    <th>Teléfono</th>
                                                                    <th>Correo electrónico</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $cont_cliente = 0;
                                                                foreach ($clientes_datos as $clientes_dato) {
                                                                    $cont_cliente = $cont_cliente + 1;

                                                                    $id_cliente = $clientes_dato['id_cliente'];
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $cont_cliente ?></td>
                                                                        <td>

                                                                            <center>
                                                                                <button class="btn btn-info" id="btn_pasar_cliente<?php echo $id_cliente ?>">
                                                                                    <i class="fa fa-user-check"></i>
                                                                                </button>
                                                                            </center>
                                                                            <script>
                                                                                $('#btn_pasar_cliente<?php echo $id_cliente ?>').click(function() {

                                                                                    var id_cliente = '<?php echo $clientes_dato['id_cliente'] ?>';
                                                                                    $('#id_cliente').val(id_cliente);

                                                                                    var nit_ci_cliente = '<?php echo $clientes_dato['nit_ci_cliente'] ?>';
                                                                                    $('#nit_ci_cliente').val(nit_ci_cliente);

                                                                                    var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente'] ?>';
                                                                                    $('#nombre_cliente').val(nombre_cliente);

                                                                                    var direccion_cliente = '<?php echo $clientes_dato['direccion_cliente'] ?>';
                                                                                    $('#direccion_cliente').val(direccion_cliente);

                                                                                    var celular_cliente = '<?php echo $clientes_dato['celular_cliente'] ?>';
                                                                                    $('#celular_cliente').val(celular_cliente);

                                                                                    var email_cliente = '<?php echo $clientes_dato['email_cliente'] ?>';
                                                                                    $('#email_cliente').val(email_cliente);


                                                                                    //alert(nombre_cliente);
                                                                                    $('#modal-buscar_cliente').modal('toggle');
                                                                                });
                                                                            </script>
                                                                        </td>
                                                                        <td><?php echo $clientes_dato['nit_ci_cliente'] ?></td>
                                                                        <td><?php echo $clientes_dato['nombre_cliente'] ?></td>
                                                                        <td><?php echo $clientes_dato['direccion_cliente'] ?></td>
                                                                        <td><?php echo $clientes_dato['celular_cliente'] ?></td>
                                                                        <td><?php echo $clientes_dato['email_cliente'] ?></td>
                                                                    </tr>

                                                                <?php } ?>
                                                            </tbody>

                                                        </table>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="id_cliente" hidden>
                                                <label for="">Cédula o RUC cliente</label>
                                                <input type="text" class="form-control" id="nit_ci_cliente">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre cliente</label>
                                                <input type="text" class="form-control" id="nombre_cliente">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Dirección cliente</label>
                                                <input type="text" class="form-control" id="direccion_cliente">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Teléfono cliente</label>
                                                <input type="text" class="form-control" id="celular_cliente">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Correo electrónico cliente</label>
                                                <input type="text" class="form-control" id="email_cliente">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ******************CLIENTE**************** -->
                        </div>
                        <div class="col-md-5">
                            <!-- ******************FACTURA**************** -->
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-shopping-cart"></i> Registrar venta </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="total_a_cancelar-sp" class="form-label">Monto a cancelar</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="total_a_cancelar-sp">$</span>
                                                <input type="text" id="total_a_cancelar" style="text-align: center; font-size: xx-large;" class="form-control" value="<?php echo bcdiv($precio_total, '1', 2); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="basic_addon3s" class="form-label">Descuento</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic_addon3">$</span>
                                                <input type="text" class="form-control" style="font-size: larger;" id="total_descuento" aria-describedby="basic-addon3" value="0">
                                            </div>
                                            <script>
                                                $('#total_descuento').keyup(function() {
                                                    var total_a_cancelar = $('#total_a_cancelar').val();
                                                    var total_descuento = $('#total_descuento').val();

                                                    $('#total_a_cancelar_final').val((parseFloat(total_a_cancelar) - parseFloat(total_descuento)).toFixed(2));

                                                });
                                            </script>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-8">
                                            <label for="basic-addon_3" class="form-label">TOTAL A CANCELAR</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon_3">$</span>
                                                <input type="text" id="total_a_cancelar_final" style="text-align: center; font-size: xx-large;" class="form-control" aria-describedby="basic-addon3" value="<?php echo bcdiv($precio_total, '1', 2); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="basic-addon_3" class="form-label">Pago</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon_3">$</span>
                                                <input type="text" id="total_pagado" style="text-align: center; font-size: x-large;" class="form-control" aria-describedby="basic-addon3">
                                                <script>
                                                    $('#total_pagado').keyup(function() {
                                                        var total_a_cancelar = $('#total_a_cancelar').val();
                                                        var total_descuento = 0;
                                                        total_descuento = $('#total_descuento').val()
                                                        var total_pagado = $('#total_pagado').val();
                                                        var cambio = (parseFloat(total_pagado) - parseFloat(total_a_cancelar)) + parseFloat(total_descuento);
                                                        $('#cambio').val(cambio.toFixed(2));
                                                    });
                                                </script>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="basic-addon_3" class="form-label">Cambio</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon_3">$</span>
                                                <input type="text" id="cambio" style="text-align: center; font-size: x-large;" class="form-control" aria-describedby="basic-addon3" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="button" id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar venta</button>
                                                <script>
                                                    $('#btn_guardar_venta').click(function() {
                                                        var nro_venta = '<?php echo $cont_ventas + 1 ?>';
                                                        var id_cliente = $('#id_cliente').val();
                                                        var total_a_cancelar_final = $('#total_a_cancelar_final').val();

                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>


    </div>

</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/parte2.php'); ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  productos",
                "infoEmpty": "Mostrando 0 a 0 de 0  productos",
                "infoFiltered": "(Filtrado de _MAX_ total  productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(function() {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0  clientes",
                "infoFiltered": "(Filtrado de _MAX_ total  clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>