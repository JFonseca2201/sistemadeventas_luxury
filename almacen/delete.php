<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/cargar_producto.php');
//include('../app/controllers/categorias/listado_de_categorias.php');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ELIMINAR <?php echo $nombre; ?>?</h1>
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
                <div class="col-md-10">
                    <div class="card  card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Esta seguro de realizar esta accion?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?php echo $URL ?>/app/controllers/almacen/delete.php" method="post">
                                        <input type="text" name="id_producto" value="<?php echo $id_producto_get ?>" hidden>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Codigo: </label>

                                                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"
                                                                value="<?php echo $codigo ?>" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Categoria: </label>
                                                            <div style="display: flex;">
                                                                <input type="" class="form-control" value="<?php echo $nombre_categoria ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Nombre del producto: </label>
                                                            <input type="text" name="nombre" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $nombre ?>" disabled />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $nombre_usuario ?>" disabled>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Descripcion del producto: </label>
                                                            <textarea name="descripcion" id="" class="form-control" style="height: 60px; width: 100%; resize: none;" disabled><?php echo $descripcion ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Stock: </label>
                                                            <input type="number" name="stock" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $stock ?>" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Stock minimo: </label>
                                                            <input type="number" name="stock_minimo" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $stock_minimo ?>" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Stock maximo: </label>
                                                            <input type="number" name="stock_maximo" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $stock_maximo ?>" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Precio compra: </label>
                                                            <input type="text" name="precio_compra" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo "$ " . $precio_compra  ?>" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Precio venta: </label>
                                                            <input type="text" name="precio_venta" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo "$ " . $precio_venta ?>" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Fecha de ingreso: </label>
                                                            <input type="date" name="fecha_ingreso" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $fecha_ingreso ?>" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen del producto</label>

                                                    <hr>
                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen; ?>" width="100%" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>

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