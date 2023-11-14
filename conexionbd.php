<?php
$DATABASE_HOST = "localhost";
$DATABASE_USER = "srcsti_root";
$DATABASE_PASS = "sabeNoMeAcuerdo-";
$DATABASE_NAME = "srcsti";

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ($conn->connect_error) {
    exit("Fallo en la coneccion con Mysql" . mysqli_connect_error());
}
?>