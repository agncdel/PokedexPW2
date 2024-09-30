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
    <title>Pokedex TP</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="pokedex.css">
</head>
<body>

<?php
include_once "headerLogueado.php";
?>

<main class="w3-light-gray w3-padding-32">
<form class="w3-padding" style="text-align: center; margin-bottom: 30px" action="vistaUsuarioLogueado.php" method="post">
    <input class="w3-padding w3-round-xxlarge" type="text" id=pokemon" name="busqueda" placeholder="Ingrese el nombre, tipo o número de Pokemón" required style="border: 1px solid black;width: 40%;">
    <input class="w3-blue w3-button w3-round-xxlarge" type="submit" value="¿Quién es este pokemón?">
</form>
<table style="margin:auto;border: 1px solid black; border-collapse: collapse;">
    <tr class="w3-black">
        <th>Imágen</th>
        <th>Tipo</th>
        <th>Número</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <?php
    //Si no escribio nada en el form de buscar muestra todos
    if (!isset($_POST['busqueda'])) {
        include ("mostrarTodos.php");
    }else{
        //Si escribio algo busca al pokemon especifico
        include ("buscarPokemon.php");
    }
    ?>
</table>
    <a href="agregarPokemon.php"><div class="w3-button w3-round-large w3-black w3-padding w3-margin" style="position: fixed;bottom: 20px;right: 20px;">Agregar Pokemón</div></a>
</main>
<footer class="w3-padding-48 w3-2020-mosaic-blue">
</body>
</html>
