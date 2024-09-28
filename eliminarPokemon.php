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
    <title>Eliminar Pokemón</title>
</head>
<body>
<?php
include_once "headerLogueado.php";
?>
<main class="w3-light-gray w3-padding-32" style="text-align: center;height: 20rem;align-content: center;">
    <form method="post">
        <h2>¿Seguro que querés eliminar este Pokemón?</h2>
        <input type="submit" name="accion" value="Eliminar">
        <input type="submit" name="accion" value="Cancelar">
    </form>
</main>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['accion'] == "Eliminar"){
        $id = $_GET['id'];
        $conexion = mysqli_connect("localhost", "root", "", "pokemon") or die("Error en la conexion");

        $resultado = mysqli_query($conexion, "DELETE FROM pokemon WHERE id = '$id'");
        header("Location: vistaUsuarioLogueado.php");
    }else if($_POST['accion'] == "Cancelar"){
        header("Location: vistaUsuarioLogueado.php");
    }

}
?>
<footer class="w3-padding-48 w3-2020-mosaic-blue">
</body>
</html>
