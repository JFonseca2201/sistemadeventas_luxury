<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('DB', 'sistema');

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO,  PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "Conexion establecida";
} catch (PDOException $e) {
    //print_r($e);
    echo "Error al conectar a la base de datos!";
}

//$URL = "http://localhost/www.sistemadeventas.com";
$URL = "http://192.168.100.4/www.sistemadeventas.com";

date_default_timezone_set("America/Guayaquil");
$fechaHora = date('Y-m-d H:i:s');
