<?php
include('../../config.php');

session_start();

if (isset($_SESSION['sesion_email'])) {
    session_destroy();
    //echo $URL;
    header('location:' . $URL);
}
