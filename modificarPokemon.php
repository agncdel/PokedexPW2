<?php
if(!isset($_SESSION))
{
    session_start();
}
if (!isset($_SESSION["logueado"])) {
    header("location: pokedex.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Modificar Pokemón</title>
</head>
<body>
<?php
include_once "headerLogueado.php";

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "pokemon") or die("Error en la conexion");

$resultado = mysqli_query($conexion, "SELECT * FROM pokemon WHERE id = $id");
$extraido = mysqli_fetch_array($resultado);
?>
<main class="w3-light-gray" style="padding-left: 25%;padding-right: 25%;">
    <form style="display: flex; justify-content: space-between" method="post" enctype="multipart/form-data">
        <div class="w3-margin w3-padding"><p>Imágen:</p>
        <label for="fotoPokemon"><img style="width: 20rem;height: 20rem" src=" <?php echo htmlspecialchars($extraido["imagen"]);?>"></label><br><br>
        <input id="fotoPokemon" type="file" placeholder="<?php echo htmlspecialchars($extraido["imagen"]);?> " name="imagen"></div>
        <div class="w3-margin w3-padding-64" style="width:25rem;">
            <div style="display:flex; justify-content: space-between;"><label>Nombre: </label>
                <input type="text" placeholder="<?php echo htmlspecialchars($extraido["nombre"]);?> " name="nombre"></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Tipo: </label>
                <input type="text" placeholder="<?php echo htmlspecialchars($extraido["tipo"]);?> " name="tipo"></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Descripción: </label>
                <textarea name="descripcion"><?php echo htmlspecialchars($extraido['descripcion']); ?></textarea></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Id Pokemón: </label>
                <input type="text" placeholder="<?php echo htmlspecialchars($extraido["id_pokemon"]);?> " name="id_pokemon"></div><br>
                <input type="submit" value="Guardar">
        </div>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_pokemon = !empty($_POST["id_pokemon"]) ? $_POST["id_pokemon"] : $extraido["id_pokemon"];
        $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : $extraido["nombre"];
        $tipo = !empty($_POST["tipo"]) ? $_POST["tipo"] : $extraido["tipo"];
        $descripcion = !empty($_POST["descripcion"]) ? $_POST["descripcion"] : $extraido["descripcion"];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
            $imagen = "img/" . $_FILES['imagen']['name']; // Cambia esto según tu ruta de subida
            move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen); // Sube la imagen
        } else {
            $imagen = $extraido['imagen']; // Si no se sube una nueva imagen, se mantiene la anterior
        }

        $resultadoModificado = mysqli_query($conexion, "UPDATE pokemon SET id_pokemon = '$id_pokemon', nombre = '$nombre', tipo = '$tipo', descripcion = '$descripcion', imagen = '$imagen' WHERE id = '$id'");
        if ($resultadoModificado) {
            header("Location: vistaUsuarioLogueado.php");
        }
    }
    ?></main>
<footer class="w3-padding-48 w3-2020-mosaic-blue">
</body>
</html>
