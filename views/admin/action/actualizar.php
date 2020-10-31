<?php include '../Tarea.php' ?>


<?php

$grade = new Tarea();
$grade->idtareas = $_POST["id"];
$grade->titulo = $_POST["titulo"];
$grade->descripcion = $_POST["descripcion"];
$grade->actualizar();

print "<script>window.location='../cuerpo.php';</script>";


?>