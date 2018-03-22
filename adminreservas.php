<?php 
  include("conexion.proc.php"); 
  session_start();
?>
<script type="text/javascript" src="js/mostrar.js"></script>
<header class="w3-container w3-black"> 
  <h2>Historial de reservas</h2>
</header>
<div class="w3-container">
  <?php
    date_default_timezone_set("Europe/Madrid");
    $date = date('Y/m/d H:i:s ', time());
    $usuario = $_REQUEST['q'];
    $sql = "SELECT * FROM `reservas` WHERE `res_fin` >= '$date' AND `usu_user` = '$usuario'";
    $reserva = mysqli_query($conexion, $sql);
    echo "<table class='w3-table-all w3-hoverable'>
      <thead>
      <tr class='w3-light-grey'>
      <th>Numero de reserva</th>
      <th>Recurso reservado</th>
      <th>Fecha de reserva</th>
      <th>Fecha de cierre</th>
      <th>Modificar reserva</th>
      <th>Eliminar reserva</th>
      </tr>
      </thead>";

    while($res = mysqli_fetch_array($reserva)){
      $fechaini = date_create($res['res_inicio']);//usamos date_create para poder
      $fechafin = date_create($res['res_fin']);
      echo '<tr>
        <td>'.$res['res_id'].'</td>
        <td>'.$res['rec_id'].'</td>
        <td>'.date_format($fechaini, 'd-m-y H:i:s').'</td>
        <td>'.date_format($fechafin, 'd-m-y H:i:s').'</td>
        <td><a href="#showModal" onclick="showModRes("'.$res["rec_id"].'","'.$res['res_inicio'].'","'.$res['res_fin'].'","modificarreserva")"><button class="w3-btn"><i class="fa fa-pencil"></i></button></td>
        <td><button class="w3-btn"><i class="fa fa-times"></i></button></td>
        </tr>';
    }
    echo "</table>";

  ?>

</div>
<footer class="w3-container w3-black">
  <p></p>
</footer>