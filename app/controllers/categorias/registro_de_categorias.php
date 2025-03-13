<?php

include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO tb_categoria (nombre_categoria, fyh_creacion) VALUES (:nombre_categoria,  :fyh_creacion)");
$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

try {

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Categoria creada con éxito!";
        $_SESSION['icono'] = "success";
?>

        <script>
            location.href = "<?php echo $URL; ?>/categorias"
        </script>
    <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al crear la categoria.";
        $_SESSION['icono'] = "error";
    ?>
        <script>
            location.href = "<?php echo $URL; ?>/categorias"
        </script>
<?php
    }
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "Categoría duplicada.";
    $_SESSION['icono'] = "error";
}
?>
<script>
    location.href = "<?php echo $URL; ?>/categorias"
</script>