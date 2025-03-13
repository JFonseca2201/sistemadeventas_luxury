<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/categorias/listado_de_categorias.php');
include('../app/controllers/almacen/cargar_producto.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ACTUALIZAR PRODUCTO</h1>
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
                    <div class="card  card-success">
                        <div class="card-header">
                            <h3 class="card-title">Alctualizar producto</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?php echo $URL ?>/app/controllers/almacen/update.php" method="post" enctype="multipart/form-data">
                                        <input class="form-control" type="text" value="<?= $id_producto_get; ?>" name="id_producto" hidden>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Codigo: </label>

                                                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $codigo ?>" disabled />
                                                            <input type="text" name="codigo" value="<?php echo $codigo ?>" hidden>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Categoria: </label>
                                                            <div style="display: flex;">

                                                                <select name="id_categoria" id="" class="form-control" required>

                                                                    <?php foreach ($categorias_datos as $categorias_dato) {
                                                                        $nombre_categoria_tabla = $categorias_dato['nombre_categoria'];
                                                                        $id_categoria = $categorias_dato['id_categoria'];
                                                                    ?>
                                                                        <option value="<?php echo $id_categoria ?>" <?php if ($nombre_categoria_tabla == $nombre_categoria) { ?> selected="selected" <?php } ?>>
                                                                            <?php echo $nombre_categoria_tabla ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Nombre del producto: </label>
                                                            <input type="text" name="nombre" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $nombre ?>" />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $email ?>" disabled>
                                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario ?>" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Descripcion del producto: </label>
                                                            <textarea name="descripcion" id="" class="form-control"><?php echo $descripcion ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Stock: </label>
                                                            <input type="number" name="stock" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $stock ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Stock minimo: </label>
                                                            <input type="number" name="stock_minimo" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $stock_minimo ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Stock maximo: </label>
                                                            <input type="number" name="stock_maximo" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $stock_maximo ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Precio compra: </label>
                                                            <input type="text" name="precio_compra" id="" class="form-control" placeholder="" aria-describedby="helpId" required value="<?php echo $precio_compra ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Precio venta: </label>
                                                            <input type="text" name="precio_venta" id="" class="form-control" placeholder="" aria-describedby="helpId" required value="<?php echo $precio_venta ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Fecha de ingreso: </label>
                                                            <input type="date" name="fecha_ingreso" id="" class="form-control" placeholder="" aria-describedby="helpId" required value="<?php echo $fecha_ingreso ?>" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen del producto</label>
                                                    <input type="file" name="image" class="form-control" id="file">
                                                    <input type="text" class="form-control" name="image_text" value="<?php echo $imagen ?>" hidden>
                                                    <hr>
                                                    <center><output id="list">
                                                            <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen ?>" width="100%" alt="hola mundo">
                                                        </output></center>
                                                    <script>
                                                        function archivo(evt) {
                                                            var files = evt.target.files; //Filelist object
                                                            //Obtenemos la imagen del campo "file"
                                                            for (var i = 0, f; f = files[i]; i++) {
                                                                //solo admitimos imágenes

                                                                if (!f.type.match('image.*')) {
                                                                    alert('Archivo no compatible');
                                                                    continue;
                                                                }
                                                                var reader = new FileReader();
                                                                reader.onload = (function(theFile) {
                                                                    return function(e) {
                                                                        //Inserta la imagen
                                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                                                                    };
                                                                })(f);
                                                                reader.readAsDataURL(f);
                                                            }
                                                        }
                                                        document.getElementById('file').addEventListener('change', archivo, false);
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar producto</button>
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