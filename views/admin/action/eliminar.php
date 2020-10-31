
<?php include '../Tarea.php' ?>


<?php

$grade = new Tarea();
$grade->idtareas = $_POST["id"];
$grade->eliminar();
print "<script>window.location='../cuerpo.php';</script>";


?>