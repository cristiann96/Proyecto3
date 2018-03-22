<?php
session_start();
include("conexion.proc.php");
?>

<h3>Reservas Activas</h3>
  <table class="w3-table-all">
    <tr>
      <th>Inicio Reserva</th>
      <th>Final Reserva</th>
      <th>Usuario</th>
    </tr>
  <?php
  $q = $_REQUEST['q'];
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