<?php
/* ultimo productos */

$sql_productos = "SELECT cat.nombre_categoria, u.email as email, MAX(a.id_producto) as id_producto
                  FROM   tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria=cat.id_categoria
                  INNER JOIN tb_usuarios as u ON u.id_usuario=a.id_usuario;";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$ultmio_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
