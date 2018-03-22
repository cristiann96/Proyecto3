//funcion para hacer la confirmacion de reservas
function ConfirmarReserva(rec_num) {
  var respuesta = confirm("¿Está seguro que desea confirmar la reserva de este recurso?");
    if (respuesta == true) {
      var id="reservar_form_recursos"+rec_num;
      document.getElementById(id).submit();   
    }
}
//funcion para confirmar la liberacion de reservas
function ConfirmarLiberacion(rec_num) {
  var respuesta = confirm("¿Está seguro que desea liberar este recurso?");
    if (respuesta == true) {
      var id="liberar_form_recursos"+rec_num;
      document.getElementById(id).submit();   
    }
}