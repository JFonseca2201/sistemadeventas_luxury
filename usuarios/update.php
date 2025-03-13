<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/show_usuario.php');
include('../app/controllers/roles/listado_de_roles.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ACTUALIZAR USUARIO</h1>
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
                    <div class="card  card-success">
                        <div class="card-header">
                            <h3 class="card-title">Editar usuario</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?php echo $URL ?>/app/controllers/usuarios/update.php" method="post">
                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_get ?>" hidden>
                                        <div class="form-group">
                                            <label for="" class="form-label">Nombres:</label>
                                            <input type="tet" name="nombres" id="" class="form-control" value="<?php echo $nombres ?>" aria-describedby="helpId" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Email:</label>
                                            <input type="email" name="email" id="" class="form-control" value="<?php echo $email ?>" aria-describedby="helpId" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Rol de usuario:</label>
                                            <select name="id_rol" id="" class="form-control">
                                                <?php foreach ($roles_datos as $roles_dato) {
                                                    $rol_tabla = $roles_dato['rol'];
                                                    $id_rol = $roles_dato['id_rol'];
                                                ?>
                                                    <option value="<?php echo $id_rol ?>" <?php if ($rol_tabla == $rol) { ?> selected="selected" <?php } ?>>
                                                        <?php echo $roles_dato['rol'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Password:</label>
                                            <input type="text" name="password_user" id="" class="form-control" placeholder="Ingrese password de usuario" aria-describedby="helpId" />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Repita password:</label>
                                            <input type="text" name="password_repetir" id="" class="form-control" placeholder="Reingrese password de usuario" aria-describedby="helpId" />
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
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
<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/parte2.php'); ?>