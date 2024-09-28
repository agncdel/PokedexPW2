<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="pokedex.css">
</head>
<body>

</body>
</html>

<?php
if (!isset($_SESSION)) {
    session_start();
}
//Conexion a la bdd
$conexion = mysqli_connect("localhost", "root", "", "pokemon") or die("Error en la conexión");
//Query para mostrar todos los pokemones
$resultado = mysqli_query($conexion, "SELECT * FROM pokemon ORDER BY id_pokemon ASC");
//Muestra todos los datos

while($fila = mysqli_fetch_array($resultado)){
    echo "<tr class='w3-blue-gray'>
                <th><img style='width:6rem; height:6rem;' src='" . htmlspecialchars($fila["imagen"]) . "'></th>
                <th>" . htmlspecialchars($fila["tipo"]) . "</th>
                <th>" . htmlspecialchars($fila["id_pokemon"]) . "</th>
                <th><a href='descripcionPokemon.php?id=" . htmlspecialchars($fila["id"]) . "'>" . htmlspecialchars($fila["nombre"]) . "</a></th>";
    if(isset($_SESSION["logueado"])){
        echo "<th><a href='modificarPokemon.php?id=" . htmlspecialchars($fila["id"]) . "' class='w3-button'>Modificar</a><a href='eliminarPokemon.php?id=" . htmlspecialchars($fila["id"]) . "' class='w3-button'>Eliminar</a></th>";
    }
    echo "</tr>";
}
mysqli_close($conexion);
?>