<?php
include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];

$sentencia = $pdo->prepare("UPDATE tb_roles 
                            SET rol=:rol, 
                                fyh_actualizacion=:fyh_actualizacion 
                            WHERE   id_rol=:id_rol;");
$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_rol', $id_rol);

//$sentencia->execute();
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizo el rol con éxito!";
    $_SESSION['icono'] = "success";
    header('location:' . $URL . '/roles');
} else {

    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el rol.";
    $_SESSION['icono'] = "error";
    header('location:' . $URL . '/roles/update.php?id=' . $id_rol);
}
