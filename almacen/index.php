<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/almacen/listado_de_productos.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PRODUCTOS</h1>
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
                            <h3 class="card-title">Productos registrados</h3>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div> -->
                            <div class="card-tools">
                                <a type="button" class="btn btn-info" href="<?php echo $URL ?>/almacen/create.php">
                                    <i class="fas fa-plus"></i> Agregar producto
                                </a>
                            </div>

                        </div>

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>Nro.</th> -->
                                        <th>Codigo</th>
                                        <th>Imagen</th>
                                        <!-- <th>Nombre</th> -->
                                        <th>Descripcion</th>
                                        <th>Stock</th>
                                        <!-- <th>S. Min</th> -->
                                        <!-- <th>S. Max</th> -->
                                        <!-- <th>Precio compra</th> -->
                                        <th>P.V.P</th>
                                        <th>Con Factura</th>
                                        <!-- <th>Fecha ingreso</th> -->
                                        <!-- <th>Usuario</th> -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($productos_datos as $productos_dato) {
                                        $id_producto = $productos_dato['id_producto'];
                                    ?>
                                        <tr>
                                            <!-- <td><?php echo $productos_dato['id_producto'] ?></td> -->
                                            <td><?php echo $productos_dato['codigo'] ?></td>
                                            <?php ?>
                                            <?php
                                            $longitud_img = strlen($productos_dato['imagen']);
                                            if ($longitud_img > 22) { ?>
                                                <td><img src="<?php echo $URL . '/almacen/img_productos/' . $productos_dato['imagen'] ?>" width="50px" alt=""></td>
                                            <?php
                                            } else { ?>
                                                <td><img src="<?php echo $URL . '/almacen/img_productos/no_photo.png' ?>" width="50px" alt=""></td>
                                            <?php
                                            }
                                            ?>

                                            <!-- <td><?php echo $productos_dato['nombre'] ?></td> -->
                                            <td><?php echo $productos_dato['descripcion'] ?></td>
                                            <?php
                                            $stock_actual = $productos_dato['stock'];
                                            $stock_minimo = $productos_dato['stock_minimo'];
                                            $stock_maximo = $productos_dato['stock_maximo'];
                                            if ($stock_actual < $stock_minimo) { ?>
                                                <td style="background-color: #ee868b;"><?php echo $productos_dato['stock'] ?></td>
                                            <?php
                                            } else if ($stock_actual > $stock_maximo) { ?>
                                                <td style="background-color: #8ac68d;"><?php echo $productos_dato['stock'] ?></td>
                                            <?php
                                            } else { ?>
                                                <td><?php echo $productos_dato['stock'] ?></td>
                                            <?php
                                            }
                                            ?>

                                            <!-- <td><?php echo $productos_dato['stock_minimo'] ?></td> -->
                                            <!-- <td><?php echo $productos_dato['stock_maximo'] ?></td> -->
                                            <!-- <td><?php echo "$ " . $productos_dato['precio_compra'] ?></td> -->
                                            <td><?php echo "$ " . $productos_dato['precio_venta'] ?></td>
                                            <td><?php echo "$ " . number_format($productos_dato['precio_venta'] * 1.15, 2, '.', ',') ?></td>
                                            <!-- <td><?php echo $productos_dato['fecha_ingreso'] ?></td> -->
                                            <!-- <td><?php echo $productos_dato['email'] ?></td> -->
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?php echo $id_producto ?>" type="button" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> Ver</a>
                                                        <a href="update.php?id=<?php echo $id_producto ?>" type="button" class="btn btn-success btn-sm"> <i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="delete.php?id=<?php echo $id_producto ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                                                    </div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_  productos",
                "infoEmpty": "Mostrando 0 a 0 de 0  productos",
                "infoFiltered": "(Filtrado de _MAX_ total  productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  productos",
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
</script>