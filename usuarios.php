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
		header("location: login.php?logout=ok");
	}
	$sqlusers = "SELECT * FROM `usuarios`";
	$query = mysqli_query($conexion, $sqlusers);
?>
<head>
	<title>Pagina principal</title>
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
    <h1><b>Intranet: Usuarios</b></h1>
    <h4>Lista de usuarios del sistema</h4>
    <div class="w3-section w3-bottombar w3-padding-16">
      <?php if ($_SESSION['permisos']=="jefaso" || $_SESSION['permisos']=="admin"){ ?>
      <span class="w3-margin-right">Añadir usuario:</span> 
      <a href="nuevousuario.php"><button class="w3-button w3-blue-gray w3-hover-light-blue">Nuevo usuario</button></a>
      <?php } ?>
    </div>
    </div>
  </header>

  <table class="w3-table-all">
    <tr class="w3-blue-gray">
      <th>Usuario</th>
      <th>Permisos</th>
      <th>Modificar</th>
      <th>Eliminar</th>
      <th>Modificar Reservas</th>
    </tr>
    <?php

    while($usuarios = mysqli_fetch_array($query)){
    ?>
    <tr class="w3-white">
      <td><a href="#openModal" onclick="mostrarUser('<?php echo $usuarios['usu_user']; ?>')"<?php echo '>'.$usuarios['usu_user'].'</a></td>
      <td>'.$usuarios['usu_permisos'].'</td>
      <td>
        <form action="modificar.php" method=POST>
          <input name="usuario" type="hidden" value="'.$usuarios['usu_user'].'">
          <input name="pwd" type="hidden" value="'.$usuarios['usu_pwd'].'">
          <input name="nombre" type="hidden" value="'.$usuarios['usu_nombre'].'">
          <input name="apellido" type="hidden" value="'.$usuarios['usu_apellido'].'">
          <input name="mail" type="hidden" value="'.$usuarios['usu_mail'].'">
          <input name="telf" type="hidden" value="'.$usuarios['usu_telf'].'">
          <input name="permisos" type="hidden" value="'.$usuarios['usu_permisos'].'">
          <button class="w3-btn"';
          if($_SESSION['permisos']=="leer"){
            if ($_SESSION['usuario']!=$usuarios['usu_user']) {
              echo 'disabled';
            }
          }
          echo '><i class="fa fa-pencil"></i></button>
        </form>
      </td>
      <td>
        <form action="eliminar.proc.php" method=POST>
          <input name="usuario" type="hidden" value="'.$usuarios['usu_user'].'">
          <button class="w3-btn"';
          if($_SESSION['permisos']=="leer" || $_SESSION['permisos']=="modificar" || $usuarios['usu_user'] == $_SESSION['username']){
              echo 'disabled';
          }if ($usuarios['usu_habilitado'] == "no") {
           echo '><i class="fa fa-user-plus" style="color:green;"></i></button>
          <input name="habilitado" type="hidden" value="'.$usuarios['usu_habilitado'].'">';
          }else{
          echo '><i class="fa fa-user-times" style="color:red;"></i></button>
          <input name="habilitado" type="hidden" value="'.$usuarios['usu_habilitado'].'">';
        } ?>
        
        </form>
      </td>
      <td>
      <a href="#abrirModal" onclick="showModal('<?php echo $usuarios['usu_user']; ?>','adminreservas')"><i class="fa fa-calendar"></i></a>

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
<div id="showModal" class="modalDialog">
  <div class="modalbox movedown" id="resultadoContent">
    <a href="#close" title="Close" class="close">X</a>
    <div id="contenidoResultado3"> Contenido modalbox </div>
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