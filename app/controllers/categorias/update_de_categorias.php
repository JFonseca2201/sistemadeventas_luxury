<?php
include('../../config.php');

$id_categoria = $_GET['id_categoria'];
$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("UPDATE tb_categoria
                            SET nombre_categoria=:nombre_categoria, 
                                fyh_actualizacion=:fyh_actualizacion 
                            WHERE   id_categoria=:id_categoria;");
$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_categoria', $id_categoria);

//$sentencia->execute()

try {
    //code...


    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se actualizo la categoria con éxito!";
        $_SESSION['icono'] = "success";
?>

        <script>
            location.href = "<?php echo $URL; ?>/categorias"
        </script>
    <?php
    } else {

        session_start();
        $_SESSION['mensaje'] = "Error al actualizar la categoria.";
        $_SESSION['icono'] = "error";
    ?>

        <script>
            location.href = "<?php echo $URL; ?>/categorias"
        </script>
<?php
    }
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar la categoria.";
    $_SESSION['icono'] = "error";
}
?>
<script>
    location.href = "<?php echo $URL; ?>/categorias"
</script>