$(document).ready(function()
                  {
    $("#reg-docentesA").click(function(event)
                             {
        $("#capa").load('registro/data_docentes.php');

});

    $("#reg-estudiantesA").click(function(event)
                             {
        $("#capa").load('registro/data_estudiantes.php');

});
        $("#lista-estudiantesA").click(function(event)
                             {
        $("#capa").load('registro/lista_alumnos.php?listaGeneral=1');

});
        $("#lista-estudiantesB").click(function(event)
                             {
        $("#capa").load('registro/lista_alumnos.php?listaGeneral=1');

});
    
    $("#reg-docentesB").click(function(event)
                             {
        $("#capa").load('registro/data_docentes.php');

});

    $("#reg-estudiantesB").click(function(event)
                             {
        $("#capa").load('registro/data_estudiantes.php');
        
    });

});

