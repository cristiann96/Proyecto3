<?php
$q=$_REQUEST['q'];
include("conexion.proc.php");
session_start();
$sql = "SELECT * FROM `recursos` WHERE `rec_id` = '".$q."'";
$recurso = mysqli_query($conexion, $sql);
while($reserva = mysqli_fetch_array($recurso)){
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jqajax.js"></script>
<div class="w3-card-4 w3-white">
  <div class="w3-container w3-black">
    <h2>Nueva incidencia: <?php echo $reserva['rec_nombre']; ?> </h2>
  </div>
  <form id="formajax" class="w3-container" action="incidencia.proc.php" method="POST">
  	<?php
  	echo '<input type="hidden" name="usuarios" value="'.$_SESSION['username'].'">
    <input type="hidden" name="recursos" value="'.$q.'">';
    ?>
    <p>
	    <label class="w3-text-black"><b>Descripcion de la incidencia</b></label>
		<input class="w3-input w3-border w3-light-gray" name="descripcion" type="text">
	</p>
    <button class="w3-btn w3-black" onclick="nuevaIncidencia()">Enviar</button></p>
  </form>
  <?php } ?>
  <div id="respuesta" class="w3-margin-left w3-margin-right w3-padding-16">
  </div>
</div>

