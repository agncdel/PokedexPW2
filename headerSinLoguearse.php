<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2020.css">
    <title>Header</title>
</head>
<body>
<header class="w3-padding w3-2020-mosaic-blue" style="display: flex;align-items: center;width: 100%;">
    <img class="w3-image" style="width: 5rem;height: 5rem;" src="img/pokedex.png">
    <a href="pokedex.php"><h1 class="w3-margin">Pokedex</h1></a>

    <form style="margin-left: auto;" action="#" method="post">
        <input type="text" id="usuario" name="usuario" required placeholder="Usuario">
        <input type="password" id="contrasena" name="contrasena" required placeholder="Contraseña">
        <input class="w3-button w3-round-large w3-black" type="submit" value="Ingresar">
    </form>
</header>
</body>
</html>