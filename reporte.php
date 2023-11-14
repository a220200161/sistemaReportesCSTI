<?php
include("base1.php");
?>
<div>
    <h2>Datos del reporte</h2>

    <?php
    if (!isset($_GET['idReporte'])) {
        header("Location:ver-reportes.php");
    }
    include("conexionbd.php");
    if ($stmt = $conn->prepare("SELECT reporte.idReporte, area.edificio, area.numero, instructor.nombre, instructor.apellidoP, instructor.apellidoM, usuario.nombre, usuario.apellido, reporte.problema, reporte.solucion, reporte.estado FROM reporte LEFT JOIN area ON reporte.idArea = area.idArea LEFT JOIN instructor ON reporte.idInstructor = instructor.idInstructor LEFT JOIN usuario ON reporte.idUsuario = usuario.idUsuario WHERE idReporte = ?")) {
        $stmt->bind_param("i", $_GET['idReporte']);
        $stmt->execute();
        //$stmt->fetch();
        $res = $stmt->get_result();
        while ($row = $res->fetch_array(MYSQLI_NUM)) {
            $datos[] = $row;
        }
        if (!isset($datos[0])) {
            echo 'El reporte al que intenta acceder no existe o hay un error en la base de datos, contacte con el administrador del sitio.';
        } else {
            /*echo "<table>";
            echo "<tr>";
            echo "<th>Reporte</th>";
            echo "<th>Aula</th>";
            echo "<th>Nombre del instructor</th>";
            echo "<th>Nombre del usuario asignado</th>";
            echo "<th>Estado</th>";
            echo "<th></th>";
            echo "</tr>";*/
            echo "<table><tbody>";
            echo "<tr><th>Reporte</th><td>" . $datos[0][0] . "</td></tr>";
            echo "<tr><th>Aula</th><td>" . $datos[0][1] . "-" . $datos[0][2] . "</td></tr>";
            echo "<tr><th>Quien reportó</th><td>" . $datos[0][3] . " " . $datos[0][4] . " " . $datos[0][5] . "</td></tr>";
            echo "<tr><th>Asignado a</th><td>" . $datos[0][6] . " " . $datos[0][7] . "</td></tr>";
            echo "<tr><th>Problema</th><td>" . $datos[0][8] . "</td></tr>";
            echo "<tr><th>Solucion</th><td>" . $datos[0][9] . "</td></tr>";
            echo "<tr><th>Estado</th>";
            if ($datos[0][10] == "0") {
                echo "<td>En curso</td>";
            } else if ($datos[0][10] == "1") {
                echo "<td>Finalizado</td>";
            }
            echo "</tr>";
            //"<td>" . $datos[0][10] . "</td></tr>";
            echo "</tbody></table>";
            echo "<a href=\"modificar-reporte.php?idReporte=" . $datos[0][0] . "\"><input type=\"button\" value=\"Modificar Reporte\"></a>";
            /*for ($i = 0; $i < count($datos); $i++) {
                echo "<tr>";
                echo "<td>" . $datos[$i][0] . "</td>";
                echo "<td>" . $datos[$i][1] . "-" . $datos[$i][2] . "</td>";
                echo "<td>" . $datos[$i][3] . " " . $datos[$i][4] . " " . $datos[$i][5] . "</td>";
                echo "<td>" . $datos[$i][6] . " " . $datos[$i][7] . "</td>";
                echo "<td>" . $datos[$i][8] . "</td>";
                echo "<td><a href=\"reporte.php&idReporte=" . $datos[$i][0] . "\">Ver mas</a></td>";
                echo "</tr>";
            }
            echo "</table>";*/

        }
    } else {
        echo 'El reporte al que intenta acceder no existe o hay un error en la base de datos, contacte con el administrador del sitio.';
    }

    $stmt->close();

    ?>
</div>
<?php
include("base2.php");
?>