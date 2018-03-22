<?php 
  include("conexion.proc.php"); 
  session_start();
?>

<header class="w3-container w3-black"> 
  <h2>Historial de reservas</h2>
</header>
<div class="w3-container">
  <?php
    $usuario=$_SESSION['username'];
    $sql = "SELECT `reservas`.*, `recursos`.`rec_estado`, `recursos`.`rec_nombre`
    FROM `recursos`
    INNER JOIN `reservas` ON `reservas`.`rec_id` = `recursos`.`rec_id` WHERE `reservas`.`res_acabada` = 'Si' AND `reservas`.`usu_user` = '$usuario'";
    $reserva = mysqli_query($conexion, $sql);
    echo "<table class='w3-table-all w3-hoverable'>
      <thead>
      <tr class='w3-light-grey'>
      <th>Numero de reserva</th>
      <th>Recurso reservado</th>
      <th>Fecha de reserva</th>
      <th>Fecha de cierre</th>
      </tr>
      </thead>";

    while($res = mysqli_fetch_array($reserva)){
      $fechaini = date_create($res['res_inicio']);//usamos date_create para poder
      $fechafin = date_create($res['res_fin']);
      echo '<tr>
        <td>'.$res['res_id'].'</td>
        <td>'.$res['rec_nombre'].'</td>
        <td>'.date_format($fechaini, 'd-m-y H:i:s').'</td>
        <td>'.date_format($fechafin, 'd-m-y H:i:s').'</td>
        </tr>';
    }
    echo "</table>";

  ?>

</div>
<footer class="w3-container w3-black">
  <p></p>
</footer>