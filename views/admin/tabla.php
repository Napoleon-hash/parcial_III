

<?php include 'Tarea.php' ?>
<h2>Tareas registradas </h2>
<br>


<?php

    $tareas = Tarea::mostrar();
    if(count($tareas)>0){
      // si hay usuarios
?>


 
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Fecha</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
      </thead>
      

      <?php
        foreach($tareas as $tarea){
      ?>
      

      <tr>
        <td><?php echo $tarea->titulo?></td>
        <td><?php echo $tarea->descripcion?></td>
        <td><?php echo $tarea->fecha_registro?></td>

        <td>

        <a title="Actualizar Evento" class="btn btn-warning btn-sm" data-toggle="modal" href="#actualizar-<?php echo $tarea->idtareas; ?>"><i class="glyphicon glyphicon-pencil"></i> </a>

          <!-- Modal -->
          <div class="modal fade" id="actualizar-<?php echo $tarea->idtareas; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h5 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Actualizar: <?php echo $tarea->titulo ;?></h5>
                </div>
                
                <div class="modal-body">
                    
                    <form class="form-horizontal" method="post" id="tarea" action="action/actualizar.php" role="form">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $tarea->titulo?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="descripcion" required class="form-control" id="descripcion" value="<?php echo $tarea->descripcion?>">
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $tarea->idtareas?>" name="id">

                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-success">Actualizar</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>
          <form action="action/eliminar.php" method="post">
            <input type="hidden" value="<?php echo $tarea->idtareas?>" id="id" name="id">
            <button class="btn btn-danger"><i class="glyphicon glyphicon-check"></i></button>
          </form>
        </td>
      </tr>


<?php
}
}else{


    echo "<div class='jumbotron col-lg-12'>";
    echo "<h2>Aun no hay nada por aqui.</h2>";
    echo "</div>";
}
?> 
                        