<?php
include("conexion.proc.php");

$usuario=$_POST['usuarios'];
$recurso=$_POST['recursos'];
$incidencia=$_POST['incidencias'];
$finreserva="UPDATE `incidencias` SET `inc_fecha_solucion` = CURRENT_TIME(), `inc_fin` = 'Si' WHERE `incidencias`.`inc_id` = $incidencia";
$disponible="UPDATE `recursos` SET `rec_estado` = 'Disponible' WHERE `recursos`.`rec_id` = $recurso";

$updateres=mysqli_query($conexion,$finreserva);
  if (!$updateres){
      echo "Error: " . mysqli_error($conexion) . PHP_EOL;
      echo "</br>Errno: " . mysqli_errno($conexion) . PHP_EOL;
      exit;
    }
$updaterec=mysqli_query($conexion,$disponible);
  if (!$updaterec){
      echo "Error: " . mysqli_error($conexion) . PHP_EOL;
      echo "</br>Errno: " . mysqli_errno($conexion) . PHP_EOL;
      exit;
    }
header("Location: reservas.php?inc=ko");
?>