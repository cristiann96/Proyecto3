<?php
$q=$_REQUEST['q'];
include("conexion.proc.php");
$sql = "SELECT * FROM `recursos` WHERE `rec_id` = '".$q."'";
$recurso = mysqli_query($conexion, $sql);
while($reserva = mysqli_fetch_array($recurso)){
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jqajax.js"></script>
<div class="w3-card-4 w3-white">
  <div class="w3-container w3-black">
    <h2>Reservar <?php echo $reserva['rec_nombre']; ?> </h2>
  </div>
  <form id="formajax" class="w3-container" action="incidencias.php" method="POST">
    <p>      
	    <label class="w3-text-black"><b>Fecha inicio</b></label>
	    <input class="w3-input w3-border w3-light-gray" name="fechaini" type="datetime-local" required>
	</p>
    <p>      
	    <label class="w3-text-black"><b>Fecha final</b></label>
	    <input class="w3-input w3-border w3-light-gray" name="fechafin" type="datetime-local" required>
	</p>
    <p>
    <input name="recurso" type="hidden" value="<?php echo $reserva['rec_id']; ?>">
    <button class="w3-btn w3-black" onclick="ejecutarReserva()">Reservar</button></p>
  </form>
  <div id="respuesta" class="w3-margin-left w3-margin-right w3-padding-16">
    Aqui van los errores
  </div>
  <div id="mostrarReservas" class="w3-margin-left w3-margin-right w3-padding-16">
  <h3>Reservas Activas</h3>
  <table class="w3-table-all">
    <tr>
      <th>Inicio Reserva</th>
      <th>Final Reserva</th>
      <th>Usuario</th>
    </tr>
  <?php
  $queryReservas="SELECT * FROM `reservas` WHERE `res_fin` >= CURRENT_TIMESTAMP AND `rec_id` = $q";
  $qreserva = mysqli_query($conexion,$queryReservas);
  $filas = mysqli_num_rows($qreserva);
  if ($filas == 0) {
  	 echo '<tr>
      <td> No hay reservas activas para este recurso</td>
      <td></td>
      <td></td>
      </tr>';
  }else{
	  while ($res = mysqli_fetch_array($qreserva)) {
	  echo '<tr>
	      <td>'.$res['res_inicio'].'</td>
	      <td>'.$res['res_fin'].'</td>
	      <td>'.$res['usu_user'].'</td>
	      </tr>';
	  
	  }
  } 
  ?>
</table>
</div>
</div>
<?php } ?>
