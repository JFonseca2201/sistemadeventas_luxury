<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE USUARIOS</h1>
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
                            <h3 class="card-title">Usuarios registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombres</th>
                                        <th>Correo</th>
                                        <th>Rol de usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 0;
                                    foreach ($usuarios_datos as $usuario) {
                                        $cont = $cont + 1;
                                        $id_usuario = $usuario['id_usuario'];
                                    ?>
                                        <tr>
                                            <td> <?php echo $cont ?></td>
                                            <td> <?php echo $usuario['nombres'] ?></td>
                                            <td> <?php echo $usuario['email'] ?></td>
                                            <td> <?php echo $usuario['rol'] ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?php echo $id_usuario ?>" type="button" class="btn btn-info"> <i class="fa fa-eye"></i> Ver</a>
                                                        <a href="update.php?id=<?php echo $id_usuario ?>" type="button" class="btn btn-success"> <i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="delete.php?id=<?php echo $id_usuario ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total usuarios)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ usuarios",
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