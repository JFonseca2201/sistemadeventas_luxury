<?php
include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];


$sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor");
$sentencia->bindParam('id_proveedor', $id_proveedor);;

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor eliminado con éxito!";
    $_SESSION['icono'] = "success";
?>

    <script>
        location.href = "<?php echo $URL; ?>/proveedores"
    </SCript>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el proveedor.";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores"
    </script>
<?php
}
