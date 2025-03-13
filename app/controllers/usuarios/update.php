<?php
include('../../config.php');
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repetir = $_POST['password_repetir'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['id_rol'];

if ($password_user == "") {

    if ($password_user == $password_repetir) {
        $sentencia = $pdo->prepare("UPDATE tb_usuarios SET nombres=:nombres, email=:email, id_rol=:id_rol, fyh_actualizacion=:fyh_actualizacion WHERE id_usuario=:id_usuario;");
        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $rol);
        $sentencia->bindParam('fyh_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Se actualizo al usuario con éxito!";
        $_SESSION['icono'] = "success";
        header('location:' . $URL . '/usuarios');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error, las contaseñas no coinciden";
        $_SESSION['icono'] = "error";
        header('location:' . $URL . '/usuarios/update.php?id=' . $id_usuario);
    }
} else {
    if ($password_user == $password_repetir) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("UPDATE tb_usuarios SET nombres=:nombres, email=:email, id_rol=:id_rol, password_user=:password_user, fyh_actualizacion=:fyh_actualizacion WHERE id_usuario=:id_usuario;");
        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $rol);
        $sentencia->bindParam('password_user', $password_user);
        $sentencia->bindParam('fyh_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Se actualizó al usuario con éxito!";
        $_SESSION['icono'] = "success";
        header('location:' . $URL . '/usuarios');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error, las contaseñas no coinciden";
        $_SESSION['icono'] = "error";
        header('location:' . $URL . '/usuarios/update.php?id=' . $id_usuario);
    }
}
