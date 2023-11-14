<?php
include("base1.php");
?>
<div>
    <h2>Reportes</h2>

    <?php
    include("conexionbd.php");
    if ($stmt = $conn->prepare("SELECT reporte.idReporte, area.edificio, area.numero, instructor.nombre, instructor.apellidoP, instructor.apellidoM, usuario.nombre, usuario.apellido, reporte.estado FROM reporte LEFT JOIN area ON reporte.idArea = area.idArea LEFT JOIN instructor ON reporte.idInstructor = instructor.idInstructor LEFT JOIN usuario ON reporte.idUsuario = usuario.idUsuario")) {
        $stmt->execute();
        //$stmt->fetch();
        $res = $stmt->get_result();
        while ($row = $res->fetch_array(MYSQLI_NUM)) {
            $datos[] = $row;
        }
        echo "<table>";
        echo "<tr>";
        echo "<th>Reporte</th>";
        echo "<th>Aula</th>";
        echo "<th>Nombre del instructor</th>";
        echo "<th>Nombre del usuario asignado</th>";
        echo "<th>Estado</th>";
        echo "<th></th>";
        echo "</tr>";

        for ($i = 0; $i < count($datos); $i++) {
            echo "<tr>";
            echo "<td>" . $datos[$i][0] . "</td>";
            echo "<td>" . $datos[$i][1] . "-" . $datos[$i][2] . "</td>";
            echo "<td>" . $datos[$i][3] . " " . $datos[$i][4] . " " . $datos[$i][5] . "</td>";
            echo "<td>" . $datos[$i][6] . " " . $datos[$i][7] . "</td>";
            echo "<td>" . $datos[$i][8] . "</td>";
            echo "<td>Ver mas</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo 'No hay reportes registrados aún.';
    }

    $stmt->close();

    ?>
</div>
<?php
include("base2.php");
?>