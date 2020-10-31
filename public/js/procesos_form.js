$(document).ready(function ()
                  {
    $("#form-busca-docente").submit(function(event)
                                    {
        $("#data").load("registro/resultado_docente.php?busqueda=1&id_docente="+$("#cod-docente").val());
        event.preventDefault();
    });

    $("#pre-insertDocente").click(function(event)
                                  {
        $("#data").load( './registro/resultado_docente.php?insert=1');  
    });

    $("#form-busca-estudiante").submit(function(event)
                                       {
        $("#data").load("registro/resultado_estudiante.php?busqueda=1&id_estudiante="+$("#cod-estudiante").val());
        event.preventDefault();
    });

    $("#pre-insertEstudiante").click(function(event)
                                     {
        $("#data").load( 'registro/resultado_estudiante.php?insert=1');  
    });
    
     $("a.UpdateEstu").click(function(event)   {
        var carnet = $(this).attr("data-carnet");
        $("#data").load("registro/get_data_estudiante.php?id_estudiante=" + carnet);  
    });
    
    

    $("#nombre1, #apellido1, #ciclo,#num-estudiante").keyup(function()
                                                            {
        var nom = $("#nombre1").val();
        var ape = $("#apellido1").val();
        var ciclo = $("#ciclo").val();
        var numE = $("#num-estudiante").val();

        if (ciclo.substring(0,1) == 1)
        {
            var ciclob = "0111";
        }
        else
        {
            var ciclob = "0222";
        }
        var numE = $("#num-estudiante").val();
        $("#output").val(nom.substring(0,1)+ape.substring(0,1)+ciclob+numE);
        $("#output2").val(nom.substring(0,1)+ape.substring(0,1)+ciclob+numE);
        var correo = (nom.substring(0,1)+ape.substring(0,1)+ciclob+numE).toLowerCase()+"@uls.edu.sv";
        $("#email").val(correo);
    });

    $("#idform").on("submit", function(e)
                    {
        e.preventDefault();

        var formData = new FormData(document.getElementById("idform"));

        formData.append("dato", "valor");

        $.ajax({
            url: "./registro/save_data_estudiante.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res)
                  {
            $("#data").html(res);
        });    
    });

    
    
     $("#idform2").on("submit", function(e)
                    {
        e.preventDefault();

        var formData = new FormData(document.getElementById("idform2"));

        formData.append("dato", "valor");

        $.ajax({
            url: "./registro/save_data_docente.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res)
                  {
            $("#data").html(res);
        });    
    });
    
      $("#idform3").on("submit", function(e)
                    {
        e.preventDefault();

        var formData = new FormData(document.getElementById("idform3"));

        formData.append("dato", "valor");

        $.ajax({
            url: "./registro/cargar_foto.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res)
                  {
            $("#data").html(res);
        });    
    });
    
    
    $("#idform4").on("submit", function(e)
                    {
        e.preventDefault();

        var formData = new FormData(document.getElementById("idform4"));

        formData.append("dato", "valor");

        $.ajax({
            url: "./registro/update_data_estudiante.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res)
                  {
            $("#data").html(res);
        });    
    });
    
    //form-busca-estudianteCarrera
    
    $("#idform6").on("submit", function(e)
                    {
        e.preventDefault();

        var formData = new FormData(document.getElementById("idform6"));

        formData.append("dato", "valor");

        $.ajax({
            url: "./registro/lista_alumnos.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res)
                  {
            $("#capa").html(res);
        });    
    });
    
    
    
       $("#idform7").on("submit", function(e)
                    {
        e.preventDefault();

        var formData = new FormData(document.getElementById("idform7"));

        formData.append("dato", "valor");

        $.ajax({
            url: "./registro/lista_alumnos.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res)
                  {
            $("#capa").html(res);
        });    
    });
    
    
    
    
    
    
    $("#movil").inputmask("9999-9999");
});