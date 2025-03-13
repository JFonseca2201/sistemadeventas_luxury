<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/show_usuario.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATOS DEL USUARIO</h1>
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
                <div class="col-md-8">
                    <div class="card  card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Mostrar usuario</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?php echo $URL ?>/app/controllers/usuarios/create.php" method="post">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nombres:</label>
                                            <input type="tet" name="nombres" id="" class="form-control" value="<?php echo $nombres ?>" aria-describedby="helpId" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Email:</label>
                                            <input type="email" name="email" id="" class="form-control" value="<?php echo $email ?>" aria-describedby="helpId" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Rol de usuario:</label>
                                            <input type="text" name="email" id="" class="form-control" value="<?php echo $rol ?>" aria-describedby="helpId" disabled />
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Regresar</a>
                                        </div>
                                    </form>
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
<!-- <?php include('../layout/mensaje.php'); ?> -->
<?php include('../layout/parte2.php'); ?>