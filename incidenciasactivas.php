<?php 
  include("conexion.proc.php"); 
  session_start();
?>
      <header class="w3-container w3-black"> 
        <h2>Incidencias Activas</h2>
      </header>
      <div class="w3-container">
        <?php
              $usuario=$_SESSION['username'];
              if ($_SESSION['permisos']=='admin' || $_SESSION['permisos']=='jefaso'){
                $sql="SELECT `incidencias`.*, `recursos`.`rec_nombre` FROM `recursos` INNER JOIN `incidencias` ON `incidencias`.`rec_id` = `recursos`.`rec_id` WHERE `incidencias`.`inc_fin` = 'No'";
              }
              else{
                $sql="SELECT `incidencias`.*, `recursos`.`rec_nombre` FROM `recursos` INNER JOIN `incidencias` ON `incidencias`.`rec_id` = `recursos`.`rec_id` WHERE `incidencias`.`inc_fin` = 'No' AND `incidencias`.`usu_user` = '$usuario'";
              }

              $incidencia = mysqli_query($conexion, $sql);
              echo "<table class='w3-table w3-bordered'>
                      <thead>
                        <tr class='w3-light-grey'>
                          <th>Numero de incidencia</th>
                          <th>Recurso averiado</th>
                          <th>Fecha de incidencia</th>
                          <th>Resolver incidencia</th>
                        </tr>
                      </thead>";

              while($inc = mysqli_fetch_array($incidencia)){
                $fechaini = date_create($inc['inc_fecha_incidencia']);//usamos date_create para poder
                echo '<tr>
                <td>'.$inc['inc_id'].'</td>
                <td>'.$inc['rec_nombre'].'</td>
                <td>'.date_format($fechaini, 'd-m-y H:i:s').'</td>
                <td>';
                     if ($_SESSION['permisos']=='admin' || $_SESSION['permisos']=='jefaso'){

                    echo '<form  id="formajax" action="modincidencias.proc.php" method="POST" >
                      <input type="hidden" name="usuarios" value="'.$_SESSION['username'].'">
                      <input type="hidden" name="recursos" value="'.$inc['rec_id'].'">
                      <input type="hidden" name="incidencias" value="'.$inc['inc_id'].'">
                      <input class="w3-button w3-light-grey w3-margin-bottom" type="submit" name="incidencia" onclick="ejecutarIncidencia()" value="Cerrar incidencia">';
                    }
                 echo'</form>
                </td>
                </tr>';
              }
              echo "</table>";
          ?>
      <div id="respuesta" class="w3-container w3-margin">
        
      </div>
      </div>
      <footer class="w3-container w3-black">
        <p></p>
      </footer>