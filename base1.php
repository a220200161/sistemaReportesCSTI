<?php
include("logverify.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="no-padding no-margin w-100per h-100vh bg-gray grid">
    <header class="bg-4 grid-header p-_35rem">
        <h1 class="no-margin">Sistema de Gestión para el soporte del Departamento de Ingeniería Industrial</h1>
        <p>Usuario activo:
            <?php echo $_SESSION['nombre']; ?>
        </p>
    </header>

    <aside class="bg-2 grid-aside">
        <nav>
            <ul class="no-margin no-decoration">
                <li>
                    Reportes<br>
                    <ul class="no-decoration">
                        <li>Registro</li>
                        <li><a href="reportes.php">Visualización</a></li>
                    </ul>
                </li>
                <li>
                    Historial
                    <ul class="no-decoration">
                        <li>Por aula</li>
                        <li>Por profesor</li>
                    </ul>
                </li>
                <li>
                    <a href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
    </aside>


    <main class="bg-1 grid-main p-_25rem">