<?php 
  include("conexion.proc.php"); 
  session_start();
?>

<header class="w3-container w3-black"> 
        <h2>Historial de incidencias</h2>
      </header>
      <div class="w3-container">
        <?php
          $usuario=$_SESSION['username'];
              $sql="SELECT `incidencias`.*, `recursos`.`rec_nombre` FROM `recursos` INNER JOIN `incidencias` ON `incidencias`.`rec_id` = `recursos`.`rec_id` WHERE `incidencias`.`inc_fin` = 'Si'";
              $incidencia = mysqli_query($conexion, $sql);
              echo "<table class='w3-table-all w3-hoverable'>
                      <thead>
                        <tr class='w3-light-grey'>
                          <th>Numero de incidencia</th>
                          <th>Recurso averiado</th>
                          <th>Fecha de apertura</th>
                          <th>Fecha de cierre</th>
                        </tr>
                      </thead>";

              while($inc = mysqli_fetch_array($incidencia)){
                $fechaini = date_create($inc['inc_fecha_incidencia']);//usamos date_create para poder
                $fechafin = date_create($inc['inc_fecha_solucion']);
                echo '<tr>
                <td>'.$inc['inc_id'].'</td>
                <td>'.$inc['rec_nombre'].'</td>
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