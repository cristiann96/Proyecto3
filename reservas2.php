<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>Reservas</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/ejercicios.js"></script>
<script type="text/javascript" src="js/url.js"></script>
<script type="text/javascript" src="js/reservas.js"></script>
<script type="text/javascript" src="js/mostrar.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/boton.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jqajax.js"></script>


<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<?php
$modalreserva="hola";
if (isset($_REQUEST['res'])) {
 $modalreserva=$_REQUEST['res'];
}
if (isset($_REQUEST['inc'])) {
 $modalreserva=$_REQUEST['inc'];
}
include("conexion.proc.php");
    if (isset($_REQUEST['recursos'])){
      $sqlrec = "SELECT * FROM recursos WHERE rec_tipo = '".$_REQUEST['recursos']."'";
    }
    else{
      $sqlrec = "SELECT * FROM recursos";
    }

?>
<?php if ($modalreserva=="ok") {
?>
<body class="w3-light-grey w3-content" style="max-width:1920px" onload="showUser('Todo'); document.getElementById('reservasActivas').style.display='block'">
<?php }else if ($modalreserva=="ko") {
?>
<body class="w3-light-grey w3-content" style="max-width:1920px" onload="showUser('Todo'); document.getElementById('incidenciasActivas').style.display='block'">
<?php }else{
?>
<body class="w3-light-grey w3-content" style="max-width:1920px" onload="showUser('Todo')">
<?php } ?>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#openModal"  onclick="showModal('<?php echo $_SESSION['username']; ?>')" class="w3-bar-item w3-button w3-padding-large">INICIO</a>
    <?php if (isset($_SESSION ['username'])){ ?>
    <div class="w3-dropdown-hover w3-hide-small">
      <!-- Navbar - Reservas -->

      <button class="w3-padding-large w3-button" title="Reservas">RESERVAS <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="#" class="w3-bar-item w3-button" onclick="document.getElementById('reservasActivas').style.display='block'">Reservas activas</a>
        <a href="#openModal" class="w3-bar-item w3-button" onclick="showModal('q','historialreservas')">Historial de reservas</a>

      <!-- Navbar - Incidencias -->

      </div>
    </div>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="Incidencias">INCIDENCIAS <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="#openModal" class="w3-bar-item w3-button" onclick="showModal('q','incidenciasActivas')">Incidencias en curso</a>
        <?php if($_SESSION['permisos']=='administrador' || $_SESSION['permisos']=='jefaso'){ ?>
        <a href="#openModal" class="w3-bar-item w3-button" onclick="showModal('q','historialincidencias')">Incidencias resueltas</a>
        <?php } ?>
      </div>
    </div>  
      <?php if($_SESSION['permisos']=='administrador' || $_SESSION['permisos']=='jefaso'){ ?>
      <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-padding-large w3-button" title="Incidencias"> ADMINISTRACION <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <a href="usuarios.php" class="w3-bar-item w3-button">Administrar Usuarios</a>
          <a href="recursos.php" class="w3-bar-item w3-button">Administrar Recursos</a>
        </div>
      </div>
      <?php } ?>

    <!-- Navbar - Usuario -->

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
    <div id="navBuscar">
      <a href="#" class="w3-padding-large w3-hover-red w3-hide-small w3-bar-item w3-right" onclick="showInput()"><i class="fa fa-search"></i></a>
    </div>
  </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#band" class="w3-bar-item w3-button w3-padding-large">INICIO</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large">RESERVAS</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">INCIDENCIAS</a>
</div>


<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:10%; margin-right:10%;">

  <!-- Header -->

  <header id="portfolio">
    <div class="w3-container w3-margin-top"><br/>
    <h1><b>Intranet: Reservas</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filtros:</span> 
      <button id="todo" class="w3-button w3-black" onclick="showUser('Todo'), todito()">Todo</button>
      <button id="aulas" class="w3-button w3-white" onclick="showUser('Aulas'), aulas()"><i class="fa fa-book w3-margin-right"></i>Aulas</button>
      <button id="despachos" class="w3-button w3-white w3-hide-small" onclick="showUser('Despachos/Salas'), despachos()"><i class="fa fa-users w3-margin-right"></i>Despachos/Salas</button>
      <button id="material" class="w3-button w3-white w3-hide-small" onclick="showUser('Material de trabajo'), material()"><i class="fa fa-laptop w3-margin-right"></i>Material de trabajo</button>
    </div>
    </div>
  </header>
  
  <!-- Seccion principal de la pagina, cargado mediante AJAX desde el archivo filtros.php-->
<div id="txtHint"><b>Cargando...</b></div>

<!-- Cajas modales-->
  <div id="reservasActivas" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-black"> 
        <span onclick="document.getElementById('reservasActivas').style.display='none'; change_my_url()" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Reservas Activas</h2>
      </header>
      <div class="w3-container">
        <?php
          $usuario=$_SESSION['username'];
              $sql = "SELECT `reservas`.*, `recursos`.`rec_estado`, `recursos`.`rec_nombre`
                      FROM `recursos`
                      INNER JOIN `reservas` ON `reservas`.`rec_id` = `recursos`.`rec_id` WHERE `reservas`.`res_fin` = '0000-00-00 00:00:00' AND `recursos`.`rec_estado` = 'Reservado' AND `reservas`.`usu_user` = '$usuario'";
              $reserva = mysqli_query($conexion, $sql);
              echo "<table class='w3-table w3-bordered'>
                      <thead>
                        <tr class='w3-light-grey'>
                          <th>Numero de reserva</th>
                          <th>Recurso reservado</th>
                          <th>Fecha de reserva</th>
                          <th>Cerrar Reserva</th>
                        </tr>
                      </thead>";

              while($res = mysqli_fetch_array($reserva)){
                $fechaini = date_create($res['res_inicio']);//usamos date_create para poder
                $nombre = "liberar_form_recursos".$res['rec_id'];
                echo '<tr>
                <td>'.$res['res_id'].'</td>
                <td>'.$res['rec_nombre'].'</td>
                <td>'.date_format($fechaini, 'd-m-y H:i:s').'</td>
                <td>
                  <form id="'.$nombre.'" action="modreservas.proc.php" method="GET" >
                    <input type="hidden" name="usuarios" value="'.$_SESSION['username'].'">
                    <input type="hidden" name="recursos" value="'.$res['rec_id'].'">
                    <input type="hidden" name="reservas" value="'.$res['res_id'].'">
                    <input type="button" class="w3-button w3-light-grey w3-margin-bottom" onclick="ConfirmarLiberacion('.$res['rec_id'].')" type="submit" name="reserva" value="Liberar">
                  </form>
                </td>
                </tr>';
              }
              echo "</table>";

          ?>

      </div>
      <footer class="w3-container w3-black">
        <p></p>
      </footer>
    </div>
  </div>


<!-- ModalBox que mediante Javascript/Jquery cambia el contenido -->


  <div id="openModal" class="modalDialog">
    <div class="modalbox movedown" id="resultadoContent">
      <a href="#close" title="Close" class="close">X</a>
      <div id="contenidoResultado">Contenido resultado</div>
    </div>
  </div>


  <!-- Footer -->
  
  <footer class="w3-container w3-padding-32">
  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

<!-- End page content -->
</div>
<div class="w3-container w3-margin-top"><br/>
    <h1><b>Intranet: Reservas</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filtros:</span> 
      <button id="todo" class="w3-button w3-black" onclick="showUser('Todo'), todito()">Todo</button>
      <button id="aulas" class="w3-button w3-white" onclick="showUser('Aulas'), aulas()"><i class="fa fa-book w3-margin-right"></i>Aulas</button>
      <button id="despachos" class="w3-button w3-white w3-hide-small" onclick="showUser('Despachos/Salas'), despachos()"><i class="fa fa-users w3-margin-right"></i>Despachos/Salas</button>
      <button id="material" class="w3-button w3-white w3-hide-small" onclick="showUser('Material de trabajo'), material()"><i class="fa fa-laptop w3-margin-right"></i>Material de trabajo</button>
    </div>
    </div>
</footer>
</body>
</html>
