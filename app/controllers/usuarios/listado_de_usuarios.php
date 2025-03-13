<?php
/* Lista de usuarios */

$sql_ususarios = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol 
FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol;";
$query = $pdo->prepare($sql_ususarios);
$query->execute();

$usuarios_datos = $query->fetchAll(PDO::FETCH_ASSOC);
