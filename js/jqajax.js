function ejecutarReserva(){
  $("#formajax").submit(function(e){ //Cuando el id formajax haga submit se hara un ajax
    $.ajax({
            type: "POST",
            url: "incidencias.php",//Archivo php donde se envian los datos
            data: $("#formajax").serialize(),//Serializa los elementos del formulario
            success: function(data)//Si el ajax ha sido exitoso entrara dentro de esta funcion
            {
              $("#respuesta").html(data); //Muestra la respuesta del php
              var datos = $("#formajax").find('input[name="recurso"]').val(); //Variable que recoje el id del recurso que estamos mostrando
              $.ajax({
                type: "GET",
                url: 'mostrarReservas.php',
                data: {q: datos}, //Le enviamos en la variable q el contenido de la variable datos
                success: function(cosas){
                  $("#mostrarReservas").html(cosas); //Dentro del id mostrarReservas cargara el contenido de cosas que sera el contenido del archivo mostrarReservas.php
                }
              })
            }
    });
    $("#formajax").find(':button').attr("onclick","hacerNada()");
    e.preventDefault(); //evita que se ejecute el submit del form
  });
}
function ejecutarIncidencia(){  
  $("#formajax").submit(function(e){
    $.ajax({
            type: "POST",
            url: "modincidencias.proc.php",//Archivo php donde se envian los datos
            data: $("#formajax").serialize(),//Serializa los elementos del formulario
            success: function(data)
            {
              $("#contenidoResultado").load("incidenciasactivas.php");
              showUser('Todo');
              //alert("Incidencia cerrada");
            }
    });
    e.preventDefault(); //evita que se ejecute el submit del form
  });
}
function nuevaIncidencia(){  
  $("#formajax").submit(function(e){
    $.ajax({
            type: "POST",
            url: "incidencia.proc.php",//Archivo php donde se envian los datos
            data: $("#formajax").serialize(),//Serializa los elementos del formulario
            success: function(data)
            {
              alert("Incidencia Creada");
              window.location.replace("reservas2.php");
            }
    });
    e.preventDefault(); //evita que se ejecute el submit del form
  });
}
