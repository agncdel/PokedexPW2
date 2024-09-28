<?php
if(!isset($_SESSION))
{
    session_start();
}

if (isset($_SESSION["logueado"])) {
    header("location: vistaUsuarioLogueado.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Pokedex</title>
</head>
<body>

<?php
include_once "headerSinLoguearse.php";
?>

<main class="w3-light-gray w3-padding-32">
<form class="w3-padding" style="text-align: center; margin-bottom: 30px;" action="pokedex.php" method="post">
    <input class="w3-padding w3-round-xxlarge" type="text" id=pokemon" name="busqueda" placeholder="Ingrese el nombre, tipo o número de Pokemón" required style="border: 1px solid black;width: 40%;">
    <input class="w3-blue w3-button w3-round-xxlarge" type="submit" value="¿Quién es este pokemón?">
</form>
<table style="margin:auto;border: 1px solid black; border-collapse: collapse;">
    <tr class="w3-black">
        <th>Imágen</th>
        <th>Tipo</th>
        <th>Número</th>
        <th>Nombre</th>
    </tr>

    <?php
    //Si el usuario escribio algo en el formulario de login, lo trata de loguear
    if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
        include ("validarLogin.php");
    }
    //Si no escribio nada en el form de buscar muestra todos
    if (!isset($_POST['busqueda'])) {
        include ("mostrarTodos.php");
    }else{
        //Si escribio algo busca al pokemon especifico
        include ("buscarPokemon.php");
    }
    ?>
</table>
</main>
<footer class="w3-container w3-padding-48 w3-2020-mosaic-blue">
</footer>
</body>
</html>