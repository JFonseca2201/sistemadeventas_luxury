<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/ventas/listado_de_ventas.php');
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
                            <h3 class="card-title">
                                <div class="form-group">
                                    <i class="fa fa-shopping-bag"></i> Venta Nro <input type="text" class="form-control" value="<?php echo $cont_ventas + 1 ?>" style="text-align: center;" disabled>
                                </div>

                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="" style="display: flex;">

                                <div class="" style="width: 20px;"></div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_producto">
                                    <i class="fas fa-search"></i> Buscar producto
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
                                                            <th>Seleccionar</th>
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
                                                                    <button class="btn btn-info" id="btn_seleccionar<?php echo $id_producto ?>">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
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
                                                <button style="float: right;" class="btn btn-primary" id="btn_registrar_carrito">Agregar</button>
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
                                        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
    </div> -->
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
                                                            <button type="button" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                                            <th>$<?php echo $precio_unitario_total ?></th>
                                            <th style="background-color:rgb(0, 30, 58); text-align: right; color:rgb(255, 255, 255); font-size: larger;">$<?php echo $precio_total ?></th>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

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
                            asd
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- ******************CLIENTE**************** -->
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
            "pageLength": 3,
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_  PROVEESORES",
                "infoEmpty": "Mostrando 0 a 0 de 0  productos",
                "infoFiltered": "(Filtrado de _MAX_ total  PROVEESORES)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  PROVEESORES",
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