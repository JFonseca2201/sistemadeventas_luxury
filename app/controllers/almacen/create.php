<?php
include('../../config.php');
$codigo = $_POST['codigo'];
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];

$image = $_POST['image'];

$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo . "__" . $_FILES['image']['name'];
$location = "../../../almacen/img_productos/" . $filename;
echo ("<br>");
echo $location;

move_uploaded_file($_FILES['image']['tmp_name'], $location);


$sentencia = $pdo->prepare("INSERT INTO tb_almacen (codigo, id_categoria, nombre,id_usuario,descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, fyh_creacion) 
                                    VALUES (:codigo, :id_categoria, :nombre, :id_usuario, :descripcion, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :fyh_creacion)");
$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $filename);
$sentencia->bindParam('fyh_creacion', $fechaHora);
try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Producto creado con éxito!";
        $_SESSION['icono'] = "success";
        header('location:' . $URL . '/almacen');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al ingresar el producto";
        $_SESSION['icono'] = "error";
        header('location:' . $URL . '/almacen/create.php');
    }
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "El producto o codigo ya existe!";
    $_SESSION['icono'] = "error";
    header('location:' . $URL . '/almacen/create.php');
}
