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
if(!isset($_SESSION))
{
    session_start();
}
//Obtengo lo que escribio el usuario
$buscar = $_POST['busqueda'];
//Hago la conexion a la BDD
$conexion = mysqli_connect("localhost", "root", "", "pokemon");
//Busco en la BDD si existe un pokemon con ese nombre o ese ID, si lo encuentra lo muestra, si no muestra un error y muestra todos
$resultado = mysqli_query($conexion, "SELECT * FROM pokemon WHERE nombre LIKE  '%$buscar%' OR id_pokemon = '$buscar' OR tipo = '$buscar'");
if (mysqli_num_rows($resultado)!=0) {
    while($fila = mysqli_fetch_assoc($resultado)){
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
}else{
    echo "<h3 class='w3-red w3-padding' style='text-align: center;'>No se encontraron resultados</h3>";
    include ("mostrarTodos.php");
}
?>
