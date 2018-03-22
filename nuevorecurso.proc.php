<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	//Variables del formulario
	$recurso = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$tipo = $_POST["tipo"];
	if ($tipo == "Aulas") {
		$foto = "aula101.jpg";
	}elseif ($tipo == "Despachos/Salas") {
		$foto = "despacho02.jpg";
	}elseif ($tipo == "Material de trabajo"){
		$foto = "carrodeportatiles.jpg";
	}
	$queryUsuario="SELECT * FROM `recursos` WHERE `rec_nombre` = '$recurso'";
	$sqlusuario = mysqli_query($conexion, $queryUsuario);
	$filas=mysqli_num_rows($sqlusuario);
	if ($filas == 0) {
	$nuevoUsuario="INSERT INTO `recursos` (`rec_nombre`, `rec_estado`, `rec_tipo`, `rec_desc`, `resc_foto`) VALUES ('$recurso', 'Disponible', '$tipo', '$descripcion','$foto')";
	// Lanzamos la query		
	$nuevo=mysqli_query($conexion,$nuevoUsuario);
	if (!$nuevo) {
		echo "<br>Ha sucedido un error ¯\_(ツ)_/¯</br>";
		exit;
		}
	}else{
		header("location: recursos.php?error='usuexiste'");
	}
	header("location: recursos.php");
?>
</html>