<?php
include('../../config.php');
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$id_rol = $_POST['id_rol'];
$password_user = $_POST['password_user'];
$password_repetir = $_POST['password_repetir'];
try {
    if ($password_user == $password_repetir) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
    (nombres, 
    email, 
    password_user, 
    id_rol, 
    fyh_creacion) 
    VALUES (:nombres, 
    :email, 
    :password_user,
    :id_rol, 
    :fyh_creacion)");
        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $id_rol);
        $sentencia->bindParam('password_user', $password_user);
        $sentencia->bindParam('fyh_creacion', $fechaHora);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario creado con éxito!";
        header('location:' . $URL . '/usuarios');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error, las contaseñas no coinciden";
        header('location:' . $URL . '/usuarios/create.php');
    }
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "Error, usuario o email ya existen";
    header('location:' . $URL . '/usuarios');
}
