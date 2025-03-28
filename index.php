<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_de_usuarios.php');
include('app/controllers/roles/listado_de_roles.php');
include('app/controllers/categorias/listado_de_categorias.php');
include('app/controllers/almacen/listado_de_productos.php');
include('app/controllers/proveedores/listado_de_proveedores.php');
include('app/controllers/compras/listado_de_compras.php');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">USUARIO: <?php echo $rol_sesion ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">

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

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $cont_usuarios = 0;
                            foreach ($usuarios_datos as $usuarios_dato) {
                                $cont_usuarios = $cont_usuarios + 1;
                            }
                            ?>
                            <h3><?php echo $cont_usuarios ?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/usuarios" class="small-box-footer">
                            Mas detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $cont_roles = 0;
                            foreach ($roles_datos as $roles_dato) {
                                $cont_roles = $cont_roles + 1;
                            }
                            ?>
                            <h3><?php echo $cont_roles ?></h3>
                            <p>Roles Registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/roles/create.php">
                            <div class="icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/roles" class="small-box-footer">
                            Mas detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!--  -->
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $cont_categorias = 0;
                            foreach ($categorias_datos as $categorias_dato) {
                                $cont_categorias = $cont_categorias + 1;
                            }
                            ?>
                            <h3><?php echo $cont_categorias ?></h3>
                            <p>Categorias registradas</p>
                        </div>
                        <a href="<?php echo $URL ?>/categorias">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/categorias" class="small-box-footer">
                            Mas detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $cont_prodcuto = 0;
                            foreach ($productos_datos as $productos_dato) {
                                $cont_prodcuto = $cont_prodcuto + 1;
                            }
                            ?>
                            <h3><?php echo $cont_prodcuto ?></h3>
                            <p>Productos registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/almacen" class="small-box-footer">
                            Mas detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- listado de proveedores  -->
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $cont_proveedores = 0;
                            foreach ($proveedores_datos as $proveedores_dato) {
                                $cont_proveedores = $cont_proveedores + 1;
                            }
                            ?>
                            <h3><?php echo $cont_proveedores ?></h3>
                            <p>Prveedores registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/proveedores">
                            <div class="icon">
                                <i class="fas fa-car"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/proveedores" class="small-box-footer">
                            Mas detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- listado de compras -->
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            $cont_compras = 0;
                            foreach ($compras_datos as $compras_dato) {
                                $cont_compras = $cont_compras + 1;
                            }
                            ?>
                            <h3><?php echo $cont_compras ?></h3>
                            <p>Compras registradas</p>
                        </div>
                        <a href="<?php echo $URL ?>/compras">
                            <div class="icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/compras" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- listado de ventas -->
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <?php
                            $cont_compras = 0;
                            foreach ($compras_datos as $compras_dato) {
                                $cont_compras = $cont_compras + 1;
                            }
                            ?>
                            <h3><?php echo $cont_compras ?></h3>
                            <p>Ventas registradas</p>
                        </div>
                        <a href="<?php echo $URL ?>/compras">
                            <div class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/compras" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
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

<?php
include('layout/parte2.php');
?>


<!-- 

<div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for=""> Monto a cancelar</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="text-align: center; font-size: medium;">$</span>
                                                    <input type="text" id="total_a_cancelar" aria-label="Amount (to the nearest dollar)" style="text-align: center; font-size: xx-large;" class="form-control" value="<?php echo bcdiv($precio_total, '1', 2); ?>" disabled>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Descuento</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="text-align: center; font-size: medium;">$</span>
                                                    <input type="text" id="total_descuento" aria-label="Amount (to the nearest dollar)" value="0" style="text-align: center; font-size: large;" class="form-control">
                                                    <script>
                                                        $('#total_descuento').keyup(function() {
                                                            var total_a_cancelar = $('#total_a_cancelar').val();
                                                            var total_descuento = $('#total_descuento').val();
                                                            $('#total_a_cancelar_final').val((parseFloat(total_a_cancelar) - parseFloat(total_descuento)).toFixed(2));
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Pago Total</label>
                                                    <input type="text" id="total_a_cancelar_final" style="text-align: center; font-size: xx-large;" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Total pagado</label>
                                                <input type="text" id="total_pagado" style="text-align: center; font-size: x-large; display: inline-block;" class="form-control" placeholder="$0.00">
                                                <script>
                                                    $('#total_pagado').keyup(function() {
                                                        var total_a_cancelar = $('#total_a_cancelar').val();
                                                        var total_descuento = $('#total_descuento').val();
                                                        var total_pagado = $('#total_pagado').val();
                                                        var cambio = (parseFloat(total_pagado) - parseFloat(total_a_cancelar)) + parseFloat(total_descuento);
                                                        $('#cambio').val(cambio);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Cambio</label>
                                                <input type="text" class="form-control" id="cambio" placeholder="$0.00" disabled>
                                            </div>
                                        </div>
                                    </div>
-->