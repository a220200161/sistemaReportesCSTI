<?php
session_start();

include("conexionbd.php");

if (!isset($_POST["usuario"], $_POST["pass"])) {
    exit("Por favor ingrese los datos solicitados.");
}

if ($stmt = $conn->prepare("SELECT idUsuario, contraseña FROM usuario WHERE usuario = ?")) {
    $stmt->bind_param("s", $_POST["usuario"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($idUsuario, $contraseña);
        $stmt->fetch();
        if ($_POST['pass'] === $contraseña) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['nombre'] = $_POST['usuario'];
            $_SESSION['idUsuario'] = $idUsuario;
            //echo 'Bienvenido ' . $_SESSION['nombre'] . '!';
            header("Location: inicio.php");
            exit();
        } else {
            header('Location: login.php?incorrectPass=1');
            exit();
            //echo 'Nombre de usuario o contraseña incorrectos, vuelva a intentarlo.';
        }
    } else {
        //echo 'Nombre de usuario o contraseña incorrectos, vuelva a intentarlo.';
        header('Location: login.php?incorrectPass=1');
    }

    $stmt->close();
}
?>