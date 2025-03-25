<?php
include('../../config.php');

$id_compra = $_GET['id_compra'];
$id_producto = $_GET['id_producto'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_actual = $_GET['stock_actual'];

//echo $id_compra . " - " . $id_producto . " - " . $cantidad_compra . " - " . $stock_actual;
$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_compras WHERE id_compra=:id_compra");
$sentencia->bindParam('id_compra', $id_compra);

if ($sentencia->execute()) {
    $stock = $stock_actual - $cantidad_compra;
    $sentencia = $pdo->prepare("UPDATE tb_almacen
                            SET     stock=:stock                                 
                            WHERE   id_producto=:id_producto;");
    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Compra eliminada con éxito!";
    $_SESSION['icono'] = "success";
?>

    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
<?php
} else {

    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar la compra.";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = "<?php echo $URL; ?>/compras"
    </script>
<?php
}
?>