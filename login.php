<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="bg-5 w-100vw h-100vh no-padding no-margin flex-center">
    <div class="flex-center bg-1 w-50vw h-50vh">
        <h1>Inicio de sesión</h1>
        <form action="autenticar.php" method="post" class="w-80per auto-margin">
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" class="w-95per auto-margin-l-r"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass" id="pass" class="w-95per"><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <?php
        if (isset($_GET['incorrectPass'])) {
            echo "<p class=\"fnt-col-red\">Usuario o contraseña incorrectos, vuelva a intentarlo.</p>";
        }
        ?>
    </div>
</body>

</html>