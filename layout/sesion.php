<?php
session_start();
if ($_SESSION['sesion_email']) {
    //echo "Existe sesion de: " . $_SESSION['sesion_email'];
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol 
            FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol WHERE email = '$email_sesion';";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $nombre_usuario = $usuario['nombres'];
        $id_usuario_sesion = $usuario['id_usuario'];
        $rol_sesion = $usuario['rol'];
    }
} else {
    echo "No hay ninguna sesion";
    header('location:' . $URL . '/login');
}
