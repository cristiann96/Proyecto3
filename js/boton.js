//funcion para cambiar el boton de buscar por un input de tipo texto
function showInput(){
  var x = document.getElementById("navBuscar");
  x.innerHTML='<input type="text" size="30" placeholder="Buscar" class="w3-padding-small w3-margin-right w3-bar-item w3-hide-small w3-right" style="margin-top:5px; margin-bottom:5px;" onkeyup="showQuery(this.value)" onblur="showIcon()">';
}
//funcion para cambiar el input de tipo texto a un boton
function showIcon(){
  var x = document.getElementById("navBuscar");
  x.innerHTML='<a href="#" class="w3-padding-large w3-hover-red w3-hide-small w3-bar-item w3-right" onclick="showInput()"><i class="fa fa-search"></i></a>';
}