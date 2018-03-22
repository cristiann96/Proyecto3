//funcion para buscar y mostrar los datos cuando hacemos clic en un boton del apartado filtros
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","filtros.php?q="+str,true);
  xmlhttp.send();
}
//funcion para buscar y mostrar los datos cuando hacemos una busqueda en la barra de busqueda
function showQuery(str) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","query.php?q="+str,true);
  xmlhttp.send();
}
function showModal(str, php) {
  var recurso = {
    rec : str
  };

  if (str=="") {
    document.getElementById("contenidoResultado").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("contenidoResultado").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET",php+".php?q="+str,true);
  xmlhttp.send();
}

function showModRes(str,fechaini,fechafin,php) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
    alert("La fecha ini es: "+fechaini);
  alert("La fecha fin es: "+fechafin);
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("contenidoResultado3").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET",php+".php?q="+str+"&fechaini="+fechaini+"&fechafin"+fechafin+"",true);
  xmlhttp.send();
}

function showReservas(str) {
  setTimeOut(function(){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("mostrarReservas").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","mostrarReservas.php?q="+str,true);
    xmlhttp.send();
  }, 1000);
}
function mostrarUser(str) {
  if (str=="") {
    document.getElementById("contenidoResultado2").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("contenidoResultado2").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","detalleusuarios.php?q="+str,true);
  xmlhttp.send();
}
