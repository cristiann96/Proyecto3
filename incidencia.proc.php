<?php
include("conexion.proc.php");

$usuario=$_POST['usuarios'];
$recurso=$_POST['recursos'];
$sql="INSERT INTO `incidencias` (`usu_user`,`rec_id`)
	VALUES ('$usuario','$recurso')";
$modificacion="UPDATE `recursos` SET `rec_estado` = 'Averiado' WHERE `recursos`.`rec_id` = $recurso";
echo $sql;
echo "<br>";
$insert=mysqli_query($conexion,$sql);
  if (!$insert){
      echo "Error: " . mysqli_error($conexion) . PHP_EOL;
      echo "</br>Error: " . mysqli_error($conexion) . PHP_EOL;
      exit;
    }
$update=mysqli_query($conexion,$modificacion);
  if (!$insert){
      echo "Error: " . mysqli_error($conexion) . PHP_EOL;
      echo "</br>Error: " . mysqli_error($conexion) . PHP_EOL;
      exit;
    }
echo $_GET['incidencia'];
header("Location: reservas.php")
?>