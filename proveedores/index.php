<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
    Launch Default Modal
</button> -->
<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PROVEEDORES</h1>
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
                            <h3 class="card-title">Proveedores registradas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                </button>
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-create">
                                    <i class="fas fa-plus"></i> Agregar proveedor
                                </button>

                            </div>

                        </div>

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre proveedor</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Empresa</th>
                                        <th>Email</th>
                                        <th>Direccion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($proveedores_datos as $proveedores_dato) {
                                        $contador = $contador + 1;
                                        $id_proveedor = $proveedores_dato['id_proveedor'];
                                        $nombre_proveedor = $proveedores_dato['nombre_proveedor'];
                                    ?>
                                        <tr>
                                            <td> <?php echo $contador ?></td>
                                            <td> <?php echo $proveedores_dato['nombre_proveedor'] ?></td>
                                            <td>
                                                <a href="https://wa.me/+593<?php echo $proveedores_dato['celular'] ?>" class="btn btn-success" target="_blank">
                                                    <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $proveedores_dato['celular'] ?>
                                                </a>
                                            </td>
                                            <td> <?php echo $proveedores_dato['telefono'] ?></td>
                                            <td> <?php echo $proveedores_dato['empresa'] ?></td>
                                            <td> <?php echo $proveedores_dato['email'] ?></td>
                                            <td> <?php echo $proveedores_dato['direccion'] ?></td>

                                            <td>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor ?>">
                                                        <i class="fas fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!-- Actualizar proveedor -->
                                                    <div id="modal-update<?php echo $id_proveedor ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h4 class="modal-title">Nuevo proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Nombre del proveedor <b style="color: red;">*</b></label>
                                                                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['nombre_proveedor'] ?>" class="form-control" required>
                                                                                <small style="color: red; display:none" id="lbl_nombre<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Celular <b style="color: red;">*</b></label>
                                                                                <input type="number" id="celular<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['celular'] ?>" class="form-control" required>
                                                                                <small style="color: red; display:none" id="lbl_celular<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><form-group>
                                                                                <label for="">Telefono de la empresa<b style="color: red;">*</b></label>
                                                                                <input type="number" id="telefono<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['telefono'] ?>" class="form-control" required>
                                                                                <small style="color: red; display:none" id="lbl_telefono<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group></div>
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Empresa<b style="color: red;">*</b></label>
                                                                                <input type="text" id="empresa<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['empresa'] ?>" class="form-control" required>
                                                                                <small style="color: red; display:none" id="lbl_empresa<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Email</label>
                                                                                <input type="email" id="email<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['email'] ?>" class="form-control" required>
                                                                                <small style="color: red; display:none" id="lbl_email<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Direccion<b style="color: red;">*</b></label>
                                                                                <textarea name="" id="direccion<?php echo $id_proveedor ?>" class="form-control" required><?php echo $proveedores_dato['direccion'] ?></textarea>
                                                                                <small style="color: red; display:none" id="lbl_direccion<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-success" id="btn_update<?php echo $id_proveedor ?>">Actualizar</button>
                                                                    <div id="respuesta"></div>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_update<?php echo $id_proveedor ?>').click(function() {

                                                            var id_proveedor = '<?php echo $id_proveedor ?>';
                                                            var nombre_proveedor = $('#nombre_proveedor<?php echo $id_proveedor ?>').val();
                                                            var celular = $('#celular<?php echo $id_proveedor ?>').val();
                                                            var empresa = $('#empresa<?php echo $id_proveedor ?>').val();
                                                            var telefono = $('#telefono<?php echo $id_proveedor ?>').val();
                                                            var email = $('#email<?php echo $id_proveedor ?>').val();
                                                            var direccion = $('#direccion<?php echo $id_proveedor ?>').val();

                                                            if (nombre_proveedor == "") {
                                                                $('#nombre_proveedor<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_nombre<?php echo $id_proveedor ?>').css('display', 'block');
                                                            } else if (celular == "") {
                                                                $('#celular<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_celular<?php echo $id_proveedor ?>').css('display', 'block');

                                                            } else if (empresa == "") {
                                                                $('#empresa<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_empresa<?php echo $id_proveedor ?>').css('display', 'block');

                                                            } else if (email == "") {
                                                                $('#email<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_email<?php echo $id_proveedor ?>').css('display', 'block');

                                                            } else if (direccion == "") {
                                                                $('#direccion<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_direccion<?php echo $id_proveedor ?>').css('display', 'block');

                                                            } else {
                                                                var url = "../app/controllers/proveedores/update.php";
                                                                $.get(url, {
                                                                    id_proveedor: id_proveedor,
                                                                    nombre_proveedor: nombre_proveedor,
                                                                    celular: celular,
                                                                    telefono: telefono,
                                                                    empresa: empresa,
                                                                    email: email,
                                                                    direccion: direccion,
                                                                }, function(datos) {
                                                                    $('#respuesta').html(datos);
                                                                });
                                                            }

                                                        });
                                                    </script>
                                                    <div id="respuesta_update<?php echo $id_proveedor ?>"></div>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor ?>">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                    <!-- Eliminar proveedor -->
                                                    <div id="modal-delete<?php echo $id_proveedor ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h4 class="modal-title">Esta seguro de eliminar al proveedor?</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Nombre del proveedor <b style="color: red;">*</b></label>
                                                                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['nombre_proveedor'] ?>" class="form-control" disabled>
                                                                                <small style="color: red; display:none" id="lbl_nombre<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Celular <b style="color: red;">*</b></label>
                                                                                <input type="number" id="celular<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['celular'] ?>" class="form-control" disabled>
                                                                                <small style="color: red; display:none" id="lbl_celular<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><form-group>
                                                                                <label for="">Telefono de la empresa<b style="color: red;">*</b></label>
                                                                                <input type="number" id="telefono<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['telefono'] ?>" class="form-control" disabled>
                                                                                <small style="color: red; display:none" id="lbl_telefono<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group></div>
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Empresa<b style="color: red;">*</b></label>
                                                                                <input type="text" id="empresa<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['empresa'] ?>" class="form-control" disabled>
                                                                                <small style="color: red; display:none" id="lbl_empresa<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Email</label>
                                                                                <input type="email" id="email<?php echo $id_proveedor ?>" value="<?php echo $proveedores_dato['email'] ?>" class="form-control" disabled>
                                                                                <small style="color: red; display:none" id="lbl_email<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <form-group>
                                                                                <label for="">Direccion<b style="color: red;">*</b></label>
                                                                                <textarea name="" id="direccion<?php echo $id_proveedor ?>" class="form-control" disabled><?php echo $proveedores_dato['direccion'] ?></textarea>
                                                                                <small style="color: red; display:none" id="lbl_direccion<?php echo $id_proveedor ?>">* Este campo requerido</small>
                                                                            </form-group>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_proveedor ?>">Eliminar</button>
                                                                    <div id="respuesta"></div>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_delete<?php echo $id_proveedor ?>').click(function() {

                                                            var id_proveedor = '<?php echo $id_proveedor ?>';

                                                            var url2 = "../app/controllers/proveedores/delete.php";
                                                            $.get(url2, {
                                                                id_proveedor: id_proveedor
                                                            }, function(datos) {
                                                                $('#respuesta').html(datos);
                                                            });


                                                        });
                                                    </script>
                                                    <div id="respuesta_delete<?php echo $id_proveedor ?>"></div>
                                                </div>


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
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ proveedores",
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

<!-- Modal ingreso proveedores -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Nuevo proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <form-group>
                            <label for="">Nombre del proveedor <b style="color: red;">*</b></label>
                            <input type="text" id="nombre_proveedor" class="form-control" required>
                            <small style="color: red; display:none" id="lbl_nombre">* Este campo requerido</small>
                        </form-group>
                    </div>
                    <div class="col-md-6">
                        <form-group>
                            <label for="">Celular <b style="color: red;">*</b></label>
                            <input type="number" id="celular" class="form-control" required>
                            <small style="color: red; display:none" id="lbl_celular">* Este campo requerido</small>
                        </form-group>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"><form-group>
                            <label for="">Telefono de la empresa<b style="color: red;">*</b></label>
                            <input type="number" id="telefono" class="form-control" required>
                            <small style="color: red; display:none" id="lbl_telefono">* Este campo requerido</small>
                        </form-group></div>
                    <div class="col-md-6">
                        <form-group>
                            <label for="">Empresa<b style="color: red;">*</b></label>
                            <input type="text" id="empresa" class="form-control" required>
                            <small style="color: red; display:none" id="lbl_empresa">* Este campo requerido</small>
                        </form-group>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form-group>
                            <label for="">Email</label>
                            <input type="email" id="email" class="form-control" required>
                            <small style="color: red; display:none" id="lbl_email">* Este campo requerido</small>
                        </form-group>
                    </div>
                    <div class="col-md-6">
                        <form-group>
                            <label for="">Direccion<b style="color: red;">*</b></label>
                            <textarea name="" id="direccion" class="form-control" required></textarea>
                            <small style="color: red; display:none" id="lbl_direccion">* Este campo requerido</small>
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
        var nombre_proveedor = $('#nombre_proveedor').val();
        var celular = $('#celular').val();
        var telefono = $('#telefono').val();
        var empresa = $('#empresa').val();
        var email = $('#email').val();
        var direccion = $('#direccion').val();

        if (nombre_proveedor == "") {
            $('#nombre_proveedor').focus();
            $('#lbl_nombre').css('display', 'block');
        } else if (celular == "") {
            $('#celular').focus();
            $('#lbl_celular').css('display', 'block');

        } else if (empresa == "") {
            $('#empresa').focus();
            $('#lbl_empresa').css('display', 'block');

        } else if (email == "") {
            $('#email').focus();
            $('#lbl_email').css('display', 'block');

        } else if (direccion == "") {
            $('#direccion').focus();
            $('#lbl_direccion').css('display', 'block');

        } else {
            var url = "../app/controllers/proveedores/create.php";
            $.get(url, {
                nombre_proveedor: nombre_proveedor,
                celular: celular,
                telefono: telefono,
                empresa: empresa,
                email: email,
                direccion: direccion,
            }, function(datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>
<!-- <div class="" id="respuesta"></div> -->