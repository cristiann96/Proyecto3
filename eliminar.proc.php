<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	//Variables del formulario
	$usuario = $_POST["usuario"];
	$habilitado = $_POST["habilitado"];
	//Variables para montar la query
	if ($habilitado == "si") {
		$updateUsuario="UPDATE `usuarios` SET `usu_habilitado` = 'no' WHERE `usu_user`='$usuario'";
	}else{
		$updateUsuario="UPDATE `usuarios` SET `usu_habilitado` = 'si' WHERE `usu_user`='$usuario'";
	}
	// Lanzamos la query		
	$update=mysqli_query($conexion,$updateUsuario);
	if (!$update) {
		echo "<br>Ha sucedido un error ¯\_(ツ)_/¯</br>";
		exit;
		}
	header("location: usuarios.php")
?>
</html>