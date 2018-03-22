<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();
include("conexion.proc.php");
$q = $_GET['q'];
$sql="SELECT * FROM usuarios WHERE usu_user = '".$q."'";
$result = mysqli_query($conexion,$sql);
while($usuarios = mysqli_fetch_array($result)){
echo '<div class="card">
      <img src="'.$usuarios['usu_foto'].'" alt="'.$usuarios['usu_nombre'].' '.$usuarios['usu_apellido'].'" style="width:100%">
      <h1>'.$usuarios['usu_nombre'].' '.$usuarios['usu_apellido'].'</h1>
      <p class="title"><i class="fa fa-key fa-fw"></i> '.$usuarios['usu_permisos'].'</p>
      <p><i class="fa fa-envelope-o fa-fw"></i> '.$usuarios['usu_mail'].'</p>
      <p><i class="fa fa-phone fa-fw"></i> '.$usuarios['usu_telf'].'</p>
     <p><a href="#close"><button class="cardbutton">Cerrar</button></a></p>
    </div>';
}
mysqli_close($conexion);
?>
</body>
</html>