<?php
include('app/config.php');
$nombres = 'JUAN FONSECA';
$email =  'jfonsecay@hotmail.com';
$id_rol = 1;
$password_user = '1234';

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
   /*  session_start();
    $_SESSION['mensaje'] = "Usuario creado con éxito!";
    header('location:' . $URL . '/usuarios');
 */
