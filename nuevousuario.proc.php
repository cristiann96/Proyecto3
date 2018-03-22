<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	//Variables del formulario
	$usuario = $_POST["username"];
	$password = $_POST["pwd"];
	$password = md5($password);
	$nombre = $_POST["firstname"];
	$apellido = $_POST["lastname"];
	$mail = $_POST["email"];
	$telf = $_POST["phone"];
	$permisos = $_POST["permisos"];
	$queryUsuario="SELECT * FROM `usuarios` WHERE `usu_user` = '$usuario'";
	$sqlusuario = mysqli_query($conexion, $queryUsuario);
	$filas=mysqli_num_rows($sqlusuario);
	if ($filas == 0) {
	$nuevoUsuario="INSERT INTO `usuarios` (`usu_user`, `usu_pwd`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_telf`, `usu_permisos`, `usu_habilitado`, `usu_foto`) VALUES ('$usuario', '$password', '$nombre', '$apellido', '$mail', '$telf', '$permisos', 'si', 'img/hombre.png')";
	// Lanzamos la query		
	$nuevo=mysqli_query($conexion,$nuevoUsuario);
	if (!$nuevo) {
		echo "<br>Ha sucedido un error ¯\_(ツ)_/¯</br>";
		exit;
		}
	}else{
		header("location: usuarios.php?error='usuexiste'");
	}
	header("location: usuarios.php");
?>
</html>