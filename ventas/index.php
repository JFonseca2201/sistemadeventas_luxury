<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE VENTAS</h1>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Compras registradas</h3>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div> -->
                            <div class="card-tools">
                                <a type="button" class="btn btn-info" href="<?php echo $URL ?>/ventas/create.php">
                                    <i class="fas fa-plus"></i> Nueva venta
                                </a>
                            </div>

                        </div>

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nro. Venta</th>
                                        <th>Productos</th>
                                        <th>Cliente</th>
                                        <th>Total Pagado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($ventas_datos as $ventas_dato) {
                                        $id_venta = $ventas_dato['id_venta'];
                                        $contador = $contador + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $contador ?></td>
                                            <td><?php echo $ventas_dato['nro_venta'] ?></td>
                                            <td>
                                                <center>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_productos<?php echo $ventas_dato['id_venta'] ?>">
                                                        <i class="fa fa-shopping-basket"></i> Productos
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_productos<?php echo $ventas_dato['id_venta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Proctos de la venta # <?php echo $ventas_dato['id_venta'] ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <!-- **************************************** -->
                                                                    <div class="table table-responsive">
                                                                        <table class="table table-bordered table-sm table-hover table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="background-color: #e7e7e7; text-align: center;">No</th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center;">Producto / Servicio </th>
                                                                                    <!-- <th style="background-color: #e7e7e7; text-align: center;">Detalle </th> -->
                                                                                    <th style="background-color: #e7e7e7; text-align: center;">Cantidad </th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center;">Subtotal </th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center;">Precio final</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $contador_de_carrito = 0;
                                                                                $cantidad_total = 0;
                                                                                $precio_unitario_total = 0;
                                                                                $precio_total = 0;
                                                                                $nro_venta = $ventas_dato['nro_venta'];


                                                                                $sql_carrito = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion, pro.precio_venta AS precio_venta, pro.stock AS stock, pro.id_producto AS id_producto
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
                                                                                        <td>
                                                                                            <?php echo $contador_de_carrito ?>
                                                                                            <input type="text" value="<?php echo $carrito_dato['id_producto'] ?>" id="id_producto<?php echo $contador_de_carrito ?>" hidden>
                                                                                        </td>
                                                                                        <td><?php echo $carrito_dato['nombre_producto'] ?></td>
                                                                                        <!-- <td><?php echo $carrito_dato['descripcion']  ?></td> -->
                                                                                        <td>
                                                                                            <span id="cantidad_carrito<?php echo $contador_de_carrito ?>"><?php echo $carrito_dato['cantidad'] ?></span>
                                                                                            <input type="text" value="<?php echo $carrito_dato['stock'] ?>" id="stock_de_inventario<?php echo $contador_de_carrito ?>" hidden>
                                                                                        </td>
                                                                                        <td style="text-align: right;">$<?php echo bcdiv(($carrito_dato['precio_venta'] / 1.15), '1', 2)  ?></td>
                                                                                        <td style="text-align: right;">$<?php
                                                                                                                        $cantidad = floatval($carrito_dato['cantidad']);
                                                                                                                        $precio_venta = floatval($carrito_dato['precio_venta']);
                                                                                                                        $subtotal = $cantidad * $precio_venta;
                                                                                                                        echo bcdiv(($subtotal) / 1.15, '1', 2);
                                                                                                                        $precio_total = $precio_total + $subtotal;
                                                                                                                        ?></td>

                                                                                    </tr>

                                                                                <?php } ?>
                                                                                <tr>
                                                                                    <td colspan="7"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="4" style="text-align: right;"> Subtotal: </th>
                                                                                    <th colspan="1" style="text-align: right;"><?php echo '$ ' . number_format(($ventas_dato['total_pagado']) / 1.15, 2, '.', ',')  ?></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="4" style="text-align: right;"> IVA (15)%: </th>
                                                                                    <th colspan="1" style="text-align: right;"><?php echo '$ ' . number_format($ventas_dato['total_pagado'] - ($ventas_dato['total_pagado'] / 1.15), 2, '.', ',')  ?></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="4" style="text-align: right;"> Descuento: </th>
                                                                                    <th colspan="1" style="text-align: right;"><?php echo '$ ' . number_format(bcdiv($precio_total, '1', 2) - $ventas_dato['total_pagado'], 2, '.', ',')  ?></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th colspan="4" style="background-color:rgb(240, 240, 240); text-align: right;">Total: </th>
                                                                                    <!-- <th><?php echo $cantidad_total ?></th> -->
                                                                                    <!-- <th>$<?php echo bcdiv($precio_unitario_total, '1', 2); ?></th> -->
                                                                                    <th colspan="1" style="background-color:rgb(0, 30, 58); text-align: right; color:rgb(255, 255, 255); font-size: larger;"><!-- $<?php echo bcdiv($precio_total, '1', 2); ?> -->
                                                                                        <?php echo '$ ' . number_format($ventas_dato['total_pagado'], 2, '.', ',')  ?>
                                                                                    </th>

                                                                                </tr>

                                                                            </tbody>

                                                                        </table>
                                                                    </div>
                                                                    <!-- *************************************** -->
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_productos<?php echo $ventas_dato['id_venta'] ?>">
                                                        <i class="fa fa-users"></i> Cliente
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_productos<?php echo $ventas_dato['id_venta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </center>
                                            </td>
                                            <td style="font-size: x-large; text-align: right;"><?php echo '$ ' . number_format($ventas_dato['total_pagado'], 2, '.', ',')  ?></td>
                                            <td>
                                                <center>
                                                    <a href="" class="btn btn-secondary"><i class="fa fa-eye"></i> </a>
                                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>

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
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  compras",
                "infoEmpty": "Mostrando 0 a 0 de 0  compras",
                "infoFiltered": "(Filtrado de _MAX_ total  compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  compras",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
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
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor',
                    //collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>r