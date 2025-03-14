<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
    Launch Default Modal
</button> -->
<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_de_categorias.php');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE CATEGORIAS</h1>
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
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorias registradas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                </button>
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-create">
                                    <i class="fas fa-plus"></i> Agregar categoria
                                </button>

                            </div>

                        </div>
                        <div class="card-header">
                            <div class="card-tools">
                                <a type="button" class="btn btn-success" href="<?php echo $URL ?>/almacen/create.php">
                                    <i class="fas fa-tasks"></i> &nbsp;&nbsp; Agregar producto
                                </a>
                            </div>
                        </div>


                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 0;
                                    foreach ($categorias_datos as $categoria) {
                                        $cont = $cont + 1;
                                        $id_categoria = $categoria['id_categoria'];
                                        $nombre_categoria = $categoria['nombre_categoria'];
                                    ?>
                                        <tr>
                                            <td> <?php echo $cont; ?></td>
                                            <td> <?php echo $categoria['nombre_categoria'] ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_categoria ?>">
                                                            <i class="fas fa-pencil-alt"></i> Editar
                                                        </button>
                                                        <!-- Actualizar categorias -->
                                                        <div class="modal fade" id="modal-update<?php echo $id_categoria ?>">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-success">
                                                                        <h4 class="modal-title">Actualizar categoria</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form-group>
                                                                                    <label for="">Nombre de la categoria</label>
                                                                                    <input type="text" id="nombre_categoria<?php echo $id_categoria ?>" value="<?php echo $nombre_categoria ?>" class="form-control">
                                                                                    <small style="color: red; display:none" id="lbl_update<?php echo $id_categoria ?>">* Este campo requerido</small>

                                                                                </form-group>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-success" id="btn_update<?php echo $id_categoria ?>">Actualizar</button>
                                                                        <div id="respuesta"></div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        <script>
                                                            $('#btn_update<?php echo $id_categoria ?>').click(function() {
                                                                var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria ?>').val();
                                                                var id_categoria = '<?php echo $id_categoria ?>';
                                                                if (nombre_categoria == "") {
                                                                    $('#nombre_categoria<?php echo $id_categoria ?>').focus();
                                                                    $('#lbl_update<?php echo $id_categoria ?>').css('display', 'block');
                                                                } else {
                                                                    var url = "../app/controllers/categorias/update_de_categorias.php";
                                                                    $.get(url, {
                                                                        nombre_categoria: nombre_categoria,
                                                                        id_categoria: id_categoria
                                                                    }, function(datos) {
                                                                        $('#respuesta').html(datos);
                                                                    });
                                                                }

                                                            });
                                                        </script>
                                                        <div id="respuesta_update<?php echo $id_categoria ?>"></div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ categorias",
                "infoEmpty": "Mostrando 0 a 0 de 0 categorias",
                "infoFiltered": "(Filtrado de _MAX_ total categorias)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ categorias",
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

<!-- Modal categorias -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Agregar categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <form-group>
                            <label for="">Nombre de la categoria *</label>
                            <input type="text" id="nombre_categoria" class="form-control" required>
                            <small style="color: red; display:none" id="lbl_create">* Este campo requerido</small>
                        </form-group>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Ingresar</button>
                <div id="respuesta"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- script -->
<script>
    $('#btn_create').click(function() {
        /* alert("Funcion"); */
        var nombre_categoria = $('#nombre_categoria').val();
        if (nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display', 'block');
        } else {
            var url = "../app/controllers/categorias/registro_de_categorias.php";
            $.get(url, {
                nombre_categoria: nombre_categoria
            }, function(datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>