<?php
if(!isset($_SESSION))
{
    session_start();
}
if (!isset($_SESSION["logueado"])) {
    header("location: pokedex.php");
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar pokemon</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<?php
include_once "headerLogueado.php";
?>

<main class="w3-light-gray">
    <form style="display: flex; justify-content: center" method="post" enctype="multipart/form-data">
        <div class="w3-margin w3-padding-64" style="width:40rem;">
            <div style="display:flex; justify-content: space-between;"><label>ID Pokemón: </label>
                <input style="width: 50%;" type="number" placeholder="Ingrese el ID del pokemon" name="id_pokemon" required></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Nombre: </label>
                <input style="width: 50%; type="text" placeholder="Ingrese el nombre" name="nombre" required></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Descripción: </label>
                <textarea style="width: 50%;" placeholder="Ingrese la descripción" name="descripcion" required></textarea></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Tipo: </label>
                <input style="width: 50%;" type="text" placeholder="Ingrese el/los tipos" name="tipo" required></div><br>

            <div style="display:flex; justify-content: space-between;"><label>Imágen del Pokemón:</label>
                <input type="file" name="imagen" required></div><br>
            <input type="submit" value="Agregar">
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Obtengo los datos ingresados
        $id_pokemon = $_POST['id_pokemon'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $imagen = $_FILES["imagen"];
        //creo la conexion
        $conexion = mysqli_connect("localhost", "root", "", "pokemon") or die("Error en la conexion");

        $dir = "img/";
        $dir = $dir . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $dir);
        $resultadoInsercion = mysqli_query($conexion, "INSERT INTO pokemon (id_pokemon, imagen, nombre, tipo, descripcion) VALUES ('$id_pokemon', '$dir', '$nombre', '$tipo', '$descripcion')");

        if ($resultadoInsercion) {

            header("Location: vistaUsuarioLogueado.php");
            exit();
        } else {
            echo "Error al agregar el Pokémon.";
        }
    }
    ?>
</main>
<footer class="w3-padding-48 w3-2020-mosaic-blue">
</body>
</html>
