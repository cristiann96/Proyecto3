<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	//Variables del formulario
	$recurso = $_POST["idrecurso"];
	$habilitado = $_POST["habilitado"];
	//Variables para montar la query
	if ($habilitado == "Disponible" OR $habilitado == "Averiado") {
		$updateUsuario="UPDATE `recursos` SET `rec_estado` = 'Deshabilitado' WHERE `rec_id`='$recurso'";
	}else{
		$updateUsuario="UPDATE `recursos` SET `rec_estado` = 'Disponible' WHERE `rec_id`='$recurso'";
	}
	// Lanzamos la query		
	$update=mysqli_query($conexion,$updateUsuario);
	if (!$update) {
		echo "<br>Ha sucedido un error ¯\_(ツ)_/¯</br>";
		exit;
		}
	header("location: recursos.php")
?>
</html>