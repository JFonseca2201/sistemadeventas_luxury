<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Compra nro <?php echo $compras_dato['nro_compra'] ?></h1>
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
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card  card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Está seguro que desea eliminar esta compra? </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" style="display: block;">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Detalles del producto. </h3>
                                        </div>
                                    </div>
                                    <!-- PRODUCTO -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <input type="text" value="<?php echo $id_producto ?>" id="id_producto" hidden>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Codigo: </label>

                                                                <input type="text" value="<?php echo $codigo ?>" name="" id="codigo" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Categoria: </label>
                                                                <div style="display: flex;">

                                                                    <input type="" value="<?php echo $nombre_categoria ?>" class="form-control" id="categoria" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Nombre del producto: </label>
                                                                <input type="text" name="nombre" value="<?php echo $nombre_producto ?>" id="nombre_producto" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Usuario</label>
                                                                <input type="text" class="form-control" value="<?php echo $nombre_usuario_producto ?>" id="usuario_producto" disabled>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Descripcion del producto: </label>
                                                                <textarea name="descripcion" id="descripcion_producto" class="form-control" style="height: 60px; width: 100%; resize: none;" disabled>
                                                                <?php echo $descripcion ?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Stock: </label>
                                                                <input type="number" name="stock" value="<?php echo $stock ?>" id="stock" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Stock minimo: </label>
                                                                <input type="number" name="stock_minimo" value="<?php echo $stock_minimo ?>" id="stock_minimo" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Stock maximo: </label>
                                                                <input type="number" name="stock_maximo" value="<?php echo $stock_maximo ?>" id="stock_maximo" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Precio compra: </label>
                                                                <input type="text" name="precio_compra" value="<?php echo $precio_compra_producto ?>" id="precio_compra" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Precio venta: </label>
                                                                <input type="text" name="precio_venta" value="<?php echo $precio_venta_producto ?>" id="precio_venta" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Fecha de ingreso:</label>
                                                                <input type="date" value="<?php echo $fecha_ingreso ?>" name="fecha_ingreso" id="fecha_ingreso" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Imagen del producto</label>
                                                        <hr>
                                                        <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen; ?>" id="img_producto" width="100%" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <!-- PROVEEDOR -->
                                    <div class="card  card-info">
                                        <div class="card-header card-blue">
                                            <h3 class="card-title">Detalles de proveedor. </h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <input type="text" id="id_proveedor" hidden>
                                                        <label for="">Nombre del proveedor </label>
                                                        <input type="text" value="<?php echo $nombre_proveedor_tabla ?>" id="nombre_proveedor" class="form-control" disabled>

                                                    </form-group>
                                                </div>
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Celular </label>
                                                        <input type="number" value="<?php echo $celular_proveedor ?>" id="celular" class="form-control" disabled>

                                                    </form-group>
                                                </div>

                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Telefono de la empresa</label>
                                                        <input type="number" value="<?php echo $telefono_proveedor ?>" id="telefono" class="form-control" disabled>
                                                    </form-group>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Empresa</label>
                                                        <input type="text" value="<?php echo $empresa_proveedor ?>" id="empresa" class="form-control" disabled>

                                                    </form-group>
                                                </div>
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Email</label>
                                                        <input type="email" value="<?php echo $email_proveedor ?>" id="email" class="form-control" disabled>

                                                    </form-group>
                                                </div>
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Direccion</label>
                                                        <textarea name="" value="" id="direccion" class="form-control" disabled><?php echo $direccion_empresa ?></textarea>

                                                    </form-group>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-danger ">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de Compra</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <label for="">Numero de compra</label>
                                                <input type="text" class="form-control" style="text-align: center;" value="<?php echo $compras_dato['nro_compra'] ?>" disabled>
                                                <input type="text" value="<?php echo $id_compra_get ?>" hidden id="nro_compra">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de compra</label>
                                                <input type="date" value="<?php echo $fecha_compra ?>" class="form-control" id="fecha_compra" disabled>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de compra</label>
                                                <input type="text" value="<?php echo $comprobante ?>" class="form-control" id="comprobante" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio compra</label>
                                                <input type="text" value="<?php echo $precio_compra ?>" class="form-control" id="precio_compra_controlador" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Stock actual</label>
                                                <input type="text" value="<?php echo $stock ?>" id="stock_actual" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" value="<?php echo $cantidad ?>" id="cantidad_compra" class="form-control" disabled>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control" value="<?php echo $email_sesion ?>" disabled>
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <button type="button" class="btn btn-danger" id="btn_eliminar"><i class="fa fa-trash"></i> Eliminar</button>
                                            <a href="<?php echo $URL . '/compras' ?>" class="btn btn-secondary" id=""><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                                        </div>
                                    </div>
                                    <div class="" id="respuesta_delete"></div>
                                    <!-- ************************************************************************ -->
                                    <script lang="ts">
                                        $('#btn_eliminar').click(function() {
                                            var id_compra = '<?php echo $id_compra_get ?>';
                                            var id_producto = $('#id_producto').val();
                                            var cantidad_compra = '<?php echo $cantidad ?>';
                                            var stock_actual = '<?php echo $stock ?>';

                                            Swal.fire({
                                                title: "Desea eliminar esta compra?",
                                                icon: "question",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Si, borrar esta compra!"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    Swal.fire(
                                                        eliminar(),
                                                        'Compra eliminada',
                                                        'success'
                                                    );
                                                }
                                            });

                                            function eliminar() {
                                                var url = "../app/controllers/compras/delete.php";

                                                $.get(url, {
                                                    id_compra: id_compra,
                                                    id_producto: id_producto,
                                                    cantidad_compra: cantidad_compra,
                                                    stock_actual: stock_actual
                                                }, function(datos) {
                                                    $('#respuesta_delete').html(datos)
                                                });
                                            }

                                        });
                                    </script>
                                    <!-- ************************************************************************ -->

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div id="respuesta_create"></div>
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