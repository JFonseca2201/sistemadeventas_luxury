<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">REGISTRO DE UNA NUEVA COMPRA</h1>
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
                            <div class="card  card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ingreso de una compra</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">

                                    <div class="" style="display: flex;">

                                        <h5>Datos del producto</h5>
                                        <div class="" style="width: 20px;"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_producto">
                                            <i class="fas fa-search"></i> Buscar producto
                                        </button>
                                    </div>
                                    <!-- Visualizar prodcuto -->
                                    <div id="modal-buscar_producto" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title">Busqueda del producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>Nro.</th> -->
                                                                    <th>Codigo</th>
                                                                    <th>Agregar</th>
                                                                    <th>Imagen</th>
                                                                    <th>Nombre</th>
                                                                    <!-- <th>Descripcion</th> -->
                                                                    <!-- <th>Stock</th> -->
                                                                    <!-- <th>S. Min</th> -->
                                                                    <!-- <th>S. Max</th> -->
                                                                    <!-- <th>Precio compra</th> -->
                                                                    <th>P.V.P</th>
                                                                    <!-- <th>Fecha ingreso</th> -->
                                                                    <!-- <th>Usuario</th> -->

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($productos_datos as $productos_dato) {
                                                                    $id_producto = $productos_dato['id_producto'];
                                                                ?>
                                                                    <tr>
                                                                        <!-- <td><?php echo $productos_dato['id_producto'] ?></td> -->
                                                                        <td><?php echo $productos_dato['codigo'] ?></td>
                                                                        <td>
                                                                            <button class="btn btn-info" id="btn_seleccionar<?php echo $id_producto ?>">
                                                                                Agregar
                                                                            </button>
                                                                            <script>
                                                                                $('#btn_seleccionar<?php echo $id_producto ?>').click(function() {

                                                                                    var id_producto = "<?php echo $productos_dato['id_producto'] ?>";
                                                                                    $('#id_producto').val(id_producto);

                                                                                    var codigo = "<?php echo $productos_dato['codigo'] ?>";
                                                                                    $('#codigo').val(codigo);

                                                                                    var categoria = "<?php echo $productos_dato['nombre_categoria'] ?>";
                                                                                    $('#categoria').val(categoria);

                                                                                    var nombre_producto = "<?php echo $productos_dato['nombre'] ?>";
                                                                                    $('#nombre_producto').val(nombre_producto);

                                                                                    var email = "<?php echo $productos_dato['email'] ?>";
                                                                                    $('#usuario_producto').val(email);

                                                                                    var descripcion_producto = "<?php echo $productos_dato['descripcion'] ?>";
                                                                                    $('#descripcion_producto').val(descripcion_producto);

                                                                                    var stock = "<?php echo $productos_dato['stock'] ?>";
                                                                                    $('#stock').val(stock);
                                                                                    $('#stock_actual').val(stock);

                                                                                    var stock_minimo = "<?php echo $productos_dato['stock_minimo'] ?>";
                                                                                    $('#stock_minimo').val(stock_minimo);

                                                                                    var stock_maximo = "<?php echo $productos_dato['stock_maximo'] ?>";
                                                                                    $('#stock_maximo').val(stock_maximo);
                                                                                    var precio_compra = "<?php echo $productos_dato['precio_compra'] ?>";
                                                                                    $('#precio_compra').val(precio_compra);

                                                                                    var precio_venta = "<?php echo $productos_dato['precio_venta'] ?>";
                                                                                    $('#precio_venta').val(precio_venta);

                                                                                    var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso'] ?>";
                                                                                    $('#fecha_ingreso').val(fecha_ingreso);

                                                                                    var ruta_img = "<?php echo $URL . '/almacen/img_productos/' . $productos_dato['imagen'] ?>";

                                                                                    $('#img_producto').attr({
                                                                                        src: ruta_img,
                                                                                    });
                                                                                    $('#modal-buscar_producto').modal('toggle');


                                                                                });
                                                                            </script>
                                                                        </td>
                                                                        <td><img src="<?php echo $URL . '/almacen/img_productos/' . $productos_dato['imagen'] ?>" width="50px" alt=""></td>
                                                                        <td><?php echo $productos_dato['nombre'] ?></td>
                                                                        <!-- <td><?php echo $productos_dato['descripcion'] ?></td> -->
                                                                        <!-- <td><?php echo $productos_dato['stock'] ?></td> -->
                                                                        <!-- <td><?php echo $productos_dato['stock_minimo'] ?></td> -->
                                                                        <!-- <td><?php echo $productos_dato['stock_maximo'] ?></td> -->
                                                                        <!-- <td><?php echo "$ " . $productos_dato['precio_compra'] ?></td> -->
                                                                        <td><?php echo "$ " . $productos_dato['precio_venta'] ?></td>
                                                                        <!-- <td><?php echo $productos_dato['fecha_ingreso'] ?></td> -->
                                                                        <!-- <td><?php echo $productos_dato['email'] ?></td> -->

                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>

                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
                                            </div> -->
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                    <!-- </div> -->

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <input type="text" id="id_producto" hidden>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Codigo: </label>

                                                                <input type="text" name="" id="codigo" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Categoria: </label>
                                                                <div style="display: flex;">
                                                                    <input type="" class="form-control" id="categoria" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Nombre del producto: </label>
                                                                <input type="text" name="nombre" id="nombre_producto" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Usuario</label>
                                                                <input type="text" class="form-control" id="usuario_producto" disabled>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Descripcion del producto: </label>
                                                                <textarea name="descripcion" id="descripcion_producto" class="form-control" style="height: 60px; width: 100%; resize: none;" disabled></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Stock: </label>
                                                                <input type="number" name="stock" id="stock" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Stock minimo: </label>
                                                                <input type="number" name="stock_minimo" id="stock_minimo" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Stock maximo: </label>
                                                                <input type="number" name="stock_maximo" id="stock_maximo" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Precio compra: </label>
                                                                <input type="text" name="precio_compra" id="precio_compra" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Precio venta: </label>
                                                                <input type="text" name="precio_venta" id="precio_venta" class="form-control" placeholder="" aria-describedby="helpId" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Fecha de ingreso: </label>
                                                                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" placeholder="" aria-describedby="helpId" disabled />
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
                                            <hr>
                                            <div class="" style="display: flex;">

                                                <h5>Datos del proveedor</h5>
                                                <div class="" style="width: 20px;"></div>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_proveedor">
                                                    <i class="fas fa-search"></i> Buscar proveedor
                                                </button>
                                            </div>
                                            <!-- Visualizar proveedor -->
                                            <div id="modal-buscar_proveedor" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title">Buscar proveedoor</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table table-responsive">
                                                                <table id="example2" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nro.</th>
                                                                            <th>Agregar</th>
                                                                            <th>Nombre proveedor</th>
                                                                            <th>Celular</th>
                                                                            <th>Telefono</th>
                                                                            <th>Empresa</th>
                                                                            <!-- <th>Email</th> -->
                                                                            <!-- <th>Direccion</th> -->

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
                                                                                <td>
                                                                                    <button class="btn btn-info" id="btn_seleccionar_prov<?php echo $id_proveedor ?>">
                                                                                        Agregar
                                                                                    </button>
                                                                                    <script>
                                                                                        $('#btn_seleccionar_prov<?php echo $id_proveedor ?>').click(function() {

                                                                                            var id_proveedor = '<?php echo $id_proveedor ?>';
                                                                                            $('#id_proveedor').val(id_proveedor);

                                                                                            var nombre_proveedor = '<?php echo $nombre_proveedor ?>';
                                                                                            $('#nombre_proveedor').val(nombre_proveedor);

                                                                                            var celular_proveedor = '<?php echo $proveedores_dato['celular'] ?>';
                                                                                            $('#celular').val(celular_proveedor);

                                                                                            var telefono_proveedor = '<?php echo $proveedores_dato['telefono'] ?>';
                                                                                            $('#telefono').val(telefono_proveedor);

                                                                                            var empresa_proveedor = '<?php echo $proveedores_dato['empresa'] ?>';
                                                                                            $('#empresa').val(empresa_proveedor);

                                                                                            var email_proveedor = '<?php echo $proveedores_dato['email'] ?>';
                                                                                            $('#email').val(email_proveedor);

                                                                                            var direccion_proveedor = '<?php echo $proveedores_dato['direccion'] ?>';
                                                                                            $('#direccion').val(direccion_proveedor);

                                                                                            $('#modal-buscar_proveedor').modal('toggle');

                                                                                        });
                                                                                    </script>
                                                                                </td>
                                                                                <td> <?php echo $proveedores_dato['nombre_proveedor'] ?></td>
                                                                                <td>
                                                                                    <a href="https://wa.me/+593<?php echo $proveedores_dato['celular'] ?>" class="btn btn-success" target="_blank">
                                                                                        <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $proveedores_dato['celular'] ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td> <?php echo $proveedores_dato['telefono'] ?></td>
                                                                                <td> <?php echo $proveedores_dato['empresa'] ?></td>
                                                                                <!-- <td> <?php echo $proveedores_dato['email'] ?></td> -->
                                                                                <!-- <td> <?php echo $proveedores_dato['direccion'] ?></td> -->


                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tbody>

                                                                </table>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->

                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <input type="text" id="id_proveedor" hidden>
                                                        <label for="">Nombre del proveedor </label>
                                                        <input type="text" id="nombre_proveedor" class="form-control" disabled>

                                                    </form-group>
                                                </div>
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Celular </label>
                                                        <input type="number" id="celular" class="form-control" disabled>

                                                    </form-group>
                                                </div>

                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Telefono de la empresa</label>
                                                        <input type="number" id="telefono" class="form-control" disabled>
                                                    </form-group>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Empresa</label>
                                                        <input type="text" id="empresa" class="form-control" disabled>

                                                    </form-group>
                                                </div>
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Email</label>
                                                        <input type="email" id="email" class="form-control" disabled>

                                                    </form-group>
                                                </div>
                                                <div class="col-md-4">
                                                    <form-group>
                                                        <label for="">Direccion</label>
                                                        <textarea name="" id="direccion" class="form-control" disabled></textarea>

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
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de la compra</h3>

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
                                                <?php
                                                $contador_de_compras = 1;
                                                foreach ($compras_datos as $compras_dato) {
                                                    $contador_de_compras = $contador_de_compras + 1;
                                                }

                                                ?>
                                                <label for="">Numero de compra</label>
                                                <input type="text" class="form-control" style="text-align: center;" value="<?php echo $contador_de_compras ?>" disabled>
                                                <input type="text" value="<?php echo $contador_de_compras ?>" hidden id="nro_compra">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de compra</label>
                                                <input type="date" class="form-control" id="fecha_compra">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de compra</label>
                                                <input type="text" class="form-control" id="comprobante">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio compra</label>
                                                <input type="text" class="form-control" id="precio_compra_controlador">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock actual</label>
                                                <input type="text" id="stock_actual" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock total</label>
                                                <input type="text" id="stock_total" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" id="cantidad_compra" class="form-control">
                                            </div>
                                            <script>
                                                $("#cantidad_compra").keyup(function() {

                                                    var stock_actual = $('#stock_actual').val();
                                                    var stcok_compra = $('#cantidad_compra').val();
                                                    var total = parseInt(stock_actual) + parseInt(stcok_compra);
                                                    $('#stock_total').val(total)


                                                });
                                            </script>
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
                                            <button class="btn btn-block btn-primary" id="btn_guardar_compra">Guardar compra </button>
                                        </div>
                                    </div>
                                    <script>
                                        $('#btn_guardar_compra').click(function() {
                                            var id_producto = $("#id_producto").val();
                                            var nro_compra = $("#nro_compra").val();
                                            var fecha_compra = $("#fecha_compra").val();
                                            var id_proveedor = $("#id_proveedor").val();
                                            var comprobante = $("#comprobante").val();
                                            var id_usuario = '<?php echo $id_usuario_sesion ?>';
                                            var precio_compra_controlador = $("#precio_compra").val();
                                            var cantidad_compra = $("#cantidad_compra").val();
                                            var stock_total = $("#stock_total").val();
                                            

                                            if (id_producto == "") {
                                                $("#id_producto").focus();
                                                alert('Se debe llenar todos los campos');
                                            } else if (fecha_compra == "") {
                                                $("#fecha_compra").focus();
                                                alert('Se debe llenar todos los campos');
                                            } else if (comprobante == "") {
                                                $("#comprobante").focus();
                                                alert('Se debe llenar todos los campos');
                                            } else if (precio_compra_controlador == "") {
                                                $("#precio_compra_controlador").focus();
                                                alert('Se debe llenar todos los campos');
                                            } else if (cantidad_compra == "") {
                                                $("#cantidad_compra").focus();
                                                alert('Se debe llenar todos los campos');
                                            } else {
                                                var url = "../app/controllers/compras/create.php";
                                                $.get(url, {
                                                    id_producto: id_producto,
                                                    nro_compra: nro_compra,
                                                    fecha_compra: fecha_compra,
                                                    id_proveedor: id_proveedor,
                                                    comprobante: comprobante,
                                                    id_usuario: id_usuario,
                                                    precio_compra_controlador: precio_compra_controlador,
                                                    stock_total: stock_total,
                                                    cantidad_compra: cantidad_compra
                                                }, function(datos) {
                                                    $('#respuesta_create').html(datos);
                                                });
                                            }
                                        });
                                    </script>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  productos",
                "infoEmpty": "Mostrando 0 a 0 de 0  productos",
                "infoFiltered": "(Filtrado de _MAX_ total  productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(function() {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  PROVEESORES",
                "infoEmpty": "Mostrando 0 a 0 de 0  productos",
                "infoFiltered": "(Filtrado de _MAX_ total  PROVEESORES)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  PROVEESORES",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>