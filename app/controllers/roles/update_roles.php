<?php
$id_roles_get = $_GET['id'];


$sql_roles = "SELECT * FROM tb_roles WHERE id_rol='$id_roles_get';";
$query = $pdo->prepare($sql_roles);
$query->execute();

$roles_datos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($roles_datos as $roles_dato) {
    $rol = $roles_dato['rol'];
}
