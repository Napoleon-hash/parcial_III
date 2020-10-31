<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Registro de tareas</title>
       <!-- Bootstrap 3.3.4 -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    
   
</head>


<body class="container">

<div> 
<center><h1>Bienvenido al sistema de registro de tareas</h1></center>

</div>



<section class="col-lg-12">

<h3>Que tareas registraremos hoy?</h3>
<br>


<form class="form-horizontal" style="margin:10 auto" method="post" id="tarea" action="action/agregar.php" role="">

    <div class="form-group">
        <div class="col-md-6">
            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Como se llama tu tarea">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-6">
            <input type="text" name="descripcion" required class="form-control" id="descripcion" placeholder="Cuentame. De que trata la tarea?">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <button class="btn btn-block btn-success">Registrar datos.</button>
        </div>
    </div>
</form>
</section>
<section class="col-lg-12">
    <?php include 'tabla.php'; ?>
</section>
</body>
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>



    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
</html>
