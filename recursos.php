<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/ejercicios.js"></script>
<script type="text/javascript" src="js/url.js"></script>
<script type="text/javascript" src="js/reservas.js"></script>
<script type="text/javascript" src="js/mostrar.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/boton.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jqajax.js"></script>
<?php
	session_start();
	include("conexion.proc.php");
	if (!isset($_SESSION['username'])){
		header("location: index.php?logout=ok");
	}
	$sqlusers = "SELECT * FROM `recursos`";
	$query = mysqli_query($conexion, $sqlusers);
?>
<head>
	<title>Administracion de recursos</title>
</head>
<body class="w3-light-grey">
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="reservas2.php" class="w3-bar-item w3-button w3-padding-large">INICIO</a>
    <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-padding-large w3-button" title="Incidencias"> ADMINISTRACION <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <a href="usuarios.php" class="w3-bar-item w3-button">Administrar Usuarios</a>
          <a href="recursos.php" class="w3-bar-item w3-button">Administrar Recursos</a>
        </div>
      </div>
    <?php if (isset($_SESSION ['username'])){ ?>
    <div class="w3-dropdown-hover w3-hide-small w3-right w3-margin-right">
      <button class="w3-padding-large w3-button" title="Reservas"><?php echo strtoupper($_SESSION['username']); ?>&nbsp&nbsp&nbsp&nbsp<i class="fa fa-power-off fa-fw"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="logout.php" class="w3-bar-item w3-button">Cerrar sesión</a>
      </div>
   </div>
   <?php } else{ ?>
   <div class="w3-dropdown-hover w3-hide-small w3-right w3-margin-right">
      <button class="w3-padding-large w3-button" title="Reservas">&nbsp&nbsp&nbsp&nbsp<i class="fa fa-power-off fa-fw"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="index.php" class="w3-bar-item w3-button"><?php echo $_SESSION['username']; ?></a>
      </div>
   </div>
   <?php } ?>

  </div>
</div>
<div class='w3-main' style="margin-left:10%; margin-right:10%;">
<br/><br/>
 <!-- Header -->
  <header id="portfolio">
    <div class="w3-container w3-margin-top">
    <h1><b>Intranet: Recursos</b></h1>
    <h4>Lista de recursos del sistema</h4>
    <div class="w3-section w3-bottombar w3-padding-16">
      <?php if ($_SESSION['permisos']=="jefaso" || $_SESSION['permisos']=="admin"){ ?>
      <span class="w3-margin-right">Añadir recurso:</span> 
      <a href="nuevorecurso.php"><button class="w3-button w3-blue-gray w3-hover-light-blue">Nuevo recurso</button></a>
      <?php } ?>
    </div>
    </div>
  </header>

  <table class="w3-table-all">
    <tr class="w3-blue-gray">
      <th>Recurso</th>
      <th>Estado</th>
      <th>Modificar</th>
      <th>Eliminar</th>
    </tr>
    <?php

    while($recursos = mysqli_fetch_array($query)){
    ?>
    <tr class="w3-white">
      <td><?php echo $recursos['rec_nombre'].'</a></td>
      <td>'.$recursos['rec_estado'].'</td>
      <td>
        <form action="modificarrecurso.php" method=POST>
          <input name="idrec" type="hidden" value="'.$recursos['rec_id'].'">
          <input name="recurso" type="hidden" value="'.$recursos['rec_nombre'].'">
          <input name="estado" type="hidden" value="'.$recursos['rec_estado'].'">
          <input name="tipo" type="hidden" value="'.$recursos['rec_tipo'].'">
          <input name="descripcion" type="hidden" value="'.$recursos['rec_desc'].'">
          <button class="w3-btn"';
          if($_SESSION['permisos']=="leer"){
              echo 'disabled';
            }

          echo '><i class="fa fa-pencil"></i></button>
        </form>
      </td>
      <td>
        <form action="eliminarrec.proc.php" method=POST>
          <input name="idrecurso" type="hidden" value="'.$recursos['rec_id'].'">
          <button class="w3-btn"';
          if($_SESSION['permisos']=="leer" || $_SESSION['permisos']=="modificar" || $recursos['rec_estado'] == "Averiado"){
              echo 'disabled';
          }if ($recursos['rec_estado'] == "Deshabilitado") {
           echo '><i class="fa fa-user-plus" style="color:green;"></i></button>
          <input name="habilitado" type="hidden" value="'.$recursos['rec_estado'].'">';
          }else{
          echo '><i class="fa fa-user-times" style="color:red;"></i></button>
          <input name="habilitado" type="hidden" value="'.$recursos['rec_estado'].'">';
        } ?>

        </form>
      </td>
    </tr>
	<?php } ?>
  
  </table>
</div>
</body>
<div id="abrirModal" class="modalDialog">
  <div class="modalbox movedown" id="resultadoContent">
    <a href="#close" title="Close" class="close">X</a>
    <div id="contenidoResultado"> Contenido modalbox </div>
  </div>
</div>
<div id="openModal" class="modalDialog2">
  <div class="modalbox movedown" id="resultadoContent">
    <div id="contenidoResultado2"> <a class="cardbutton" href="#close">Cerrar</a> </div>
  </div>
</div>


<footer class="w3-container w3-margin-top">
  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>
</footer>
</html>