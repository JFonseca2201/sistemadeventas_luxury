<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/compras/listado_de_compras.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE COMPRAS</h1>
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
                                <a type="button" class="btn btn-info" href="<?php echo $URL ?>/compras/create.php">
                                    <i class="fas fa-plus"></i> Agregar compra
                                </a>
                            </div>

                        </div>

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>No. Compra</th>
                                        <th>Producto</th>
                                        <th>Fecha de compra</th>
                                        <th>Proveedor</th>
                                        <th>Comprobante</th>
                                        <th>Usuario</th>
                                        <th>Precio compra</th>
                                        <th>Cantidad</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($compras_datos as $compras_dato) {
                                        $id_compra = $compras_dato['id_compra'];
                                    ?>
                                        <tr>
                                            <td><?php echo $contador = $contador + 1; ?></td>
                                            <td><?php echo $compras_dato['nro_compra'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-producto<?php echo $id_compra ?>">
                                                    <!-- <i class="fas fa-pencil-alt"></i> --> <?php echo $compras_dato['nombre_producto'] ?>
                                                </button>
                                                <!-- Visualizar prodcuto -->
                                                <div id="modal-producto<?php echo $id_compra ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h2 class="modal-title">PRODUCTO: <?php echo $compras_dato['nombre_producto'] ?></h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Codigo</label>
                                                                                    <input type="text" value="<?= $compras_dato['codigo'] ?>" class="form-control" disabled>
                                                                                </div>

                                                                            </div>
                                                                            <!-- <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Nombre del producto</label>
                                                                                    <input type="text" value="<?= $compras_dato['nombre'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div> -->
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Descripcion del producto</label>
                                                                                    <textarea class="form-control" name="" id="" disabled><?= $compras_dato['descripcion'] ?></textarea>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!-- <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Descripcion del producto</label>
                                                                                    <textarea class="form-control" name="" id="" disabled><?= $compras_dato['descripcion'] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Stock</label>
                                                                                    <input type="text" value="<?= $compras_dato['stock'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Stock minimo</label>
                                                                                    <input type="text" value="<?= $compras_dato['stock_minimo'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Stock maximo</label>
                                                                                    <input type="text" value="<?= $compras_dato['stock_maximo'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Fecha de ingreso</label>
                                                                                    <input type="text" value="<?= $compras_dato['fecha_ingreso'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Precio compra</label>
                                                                                    <input type="text" value="<?= $compras_dato['precio_compra_producto'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Precio venta</label>
                                                                                    <input type="text" value="<?= $compras_dato['precio_venta_producto'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Categoria</label>
                                                                                    <input type="text" value="<?= $compras_dato['nombre_categoria'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="" class="">Usuario</label>
                                                                                    <input type="text" value="<?= $compras_dato['nombre_usuario_producto'] ?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">

                                                                        <div class="form-group">
                                                                            <label for="" class="">Imagen</label>
                                                                            <img src=" <?= $URL . "/almacen/img_productos/" . $compras_dato['imagen'] ?>" width="100%" alt="">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                            <td><?php echo $compras_dato['fecha_compra'] ?></td>
                                            <td>
                                                <!-- <?php echo $compras_dato['id_proveedor'] ?> -->
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-proveedor<?php echo $id_compra ?>">
                                                    <!-- <i class="fas fa-pencil-alt"></i> --> <?php echo $compras_dato['nombre_proveedor'] ?>
                                                </button>
                                                <!-- ----------------------- -->
                                                <!-- Visualizar proveedor -->
                                                <div id="modal-proveedor<?php echo $id_compra ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light">
                                                                <h4 class="modal-title">EMPRESA: <?php echo $compras_dato['empresa'] ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del proveedor</label>
                                                                            <input type="text" class="form-control" value="<?= $compras_dato['nombre_proveedor'] ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Celular proveedor</label>
                                                                            <a href="https://wa.me/+593<?= $compras_dato['celular_proveedor'] ?>" target="_blank" class="btn btn-success"><i class="fa fa-phone"></i> <?= $compras_dato['celular_proveedor'] ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Telefono Empresa</label>
                                                                            <input type="text" class="form-control" value="<?= $compras_dato['telefono_proveedor'] ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Email Empresa</label>
                                                                            <input type="text" class="form-control" value="<?= $compras_dato['email_proveedor'] ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Direccion</label>
                                                                            <input type="text" class="form-control" value="<?= $compras_dato['direccion_empresa'] ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                                <!-- ----------------------- -->

                                            </td>
                                            <td><?php echo $compras_dato['comprobante'] ?></td>
                                            <td><?php echo $compras_dato['nombre_usuario'] ?></td>
                                            <td><?php echo "$ " . $compras_dato['precio_compra'] ?></td>
                                            <td><?php echo  $compras_dato['cantidad'] ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?php echo $id_compra ?>" type="button" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> Ver</a>
                                                        <a href="update.php?id=<?php echo $id_compra ?>" type="button" class="btn btn-success btn-sm"> <i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="delete.php?id=<?php echo $id_compra ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
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
            "pageLength": 5,
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
</script>