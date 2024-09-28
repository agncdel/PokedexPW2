<?php
if(!isset($_SESSION))
{
    session_start();
}

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "pokemon") or die("Error en la conexion");
$resultado = mysqli_query($conexion, "SELECT * FROM pokemon WHERE id = '$id'");
$extraido = mysqli_fetch_array($resultado);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Descripción Pokemon</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
if(isset($_SESSION["logueado"])){
    include_once "headerLogueado.php";
}else include_once "headerSinLoguearse.php";

if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    include ("validarLogin.php");
}
?>
<main class="w3-light-gray w3-padding-64" style="display: flex;justify-content: center;">
    <img style="width: 20%; height:20%;" src="<?php echo htmlspecialchars($extraido['imagen'])?>">
    <div><h1 class="w3-padding"><?php echo htmlspecialchars($extraido['tipo']) . " | " . htmlspecialchars($extraido["nombre"])?></h1>
    <h3 class="w3-padding"> <?php echo htmlspecialchars($extraido["descripcion"])?></h3></div>

</main>
<footer class="w3-padding-48 w3-2020-mosaic-blue">
</footer>
</body>
</html>
