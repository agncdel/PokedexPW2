<?php
//ESTO LO TENEMOS QUE HACER
if(!isset($_SESSION))
{
    session_start();
}
$usuario = $_POST['usuario'];
$clave = $_POST['contrasena'];

if($usuario == "asd" && $clave == "asd"){
    $_SESSION['logueado'] = 1;
    header("Location: vistaUsuarioLogueado.php");
    exit();
}else{
    header("Location: pokedex.php");
    exit();
}
?>