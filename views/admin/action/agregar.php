<?php include '../Tarea.php' ?>


<?php

$grade = new Tarea();
$grade->titulo = $_POST["titulo"];
$grade->descripcion = $_POST["descripcion"];
$grade->agregar();

print "<script>window.location='../cuerpo.php';</script>";


?>