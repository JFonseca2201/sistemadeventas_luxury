<?php
include('../../config.php');
$rol = $_POST['rol'];


$sentencia = $pdo->prepare("INSERT INTO tb_roles (rol, fyh_creacion) VALUES (:nombres,  :fyh_creacion)");
$sentencia->bindParam('nombres', $rol);
$sentencia->bindParam('fyh_creacion', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol creado con éxito!";
    $_SESSION['icono'] = "success";
    header('location:' . $URL . '/roles');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al crear rol.";
    $_SESSION['icono'] = "error";
    header('location:' . $URL . '/roles/create.php');
}
