<?php
include('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$total_a_cancelar_final = $_GET['total_a_cancelar_final'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_ventas 
                            (nro_venta, id_cliente, total_pagado, fyh_creacion) 
                    VALUES  (:nro_venta, :id_cliente, :total_pagado, :fyh_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('id_cliente', $id_cliente);
$sentencia->bindParam('total_pagado', $total_a_cancelar_final);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Venta registrada con éxito.";
    $_SESSION['icono'] = "danger";
?>
    <script>
        location.href = "<?php echo $URL ?>/ventas";
    </script>
<?php
} else {
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "No se regitro la venta.";
    $_SESSION['icono'] = "danger";
?>
    <script>
        location.href = "<?php echo $URL ?>/ventas/create.php";
    </script>
<?php
}
