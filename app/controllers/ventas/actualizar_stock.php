<?php

include('../../config.php');

$id_producto = $_GET['id_producto'];
$stock_calculado = $_GET['stock_calculado'];



/* if ($sentencia->execute()) {

    session_start();
    $_SESSION['mensaje'] = "Cliente registrado con éxito!";
    $_SESSION['icono'] = "success";

?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al ingresar el cliente.";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
} */

try {
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto=:id_producto");

    $sentencia->bindParam('stock', $stock_calculado);
    $sentencia->bindParam('id_producto', $id_producto);

    $sentencia->execute();
    echo 'Stock actualizado con éxito';
} catch (PDOException  $th) {
    echo 'No se pudo actualizar el stock. ' . $th->getMessage();
}
