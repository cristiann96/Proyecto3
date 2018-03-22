<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	//Variables del formulario
	$recursoantiguo = $_POST["recursoantiguo"];
	$recurso = $_POST["recurso"];
	$descripcion = $_POST["descripcion"];
	$descripcionantiguo = $_POST["descripcionantiguo"];
	$tipo = $_POST["tipo"];
	$tipoantiguo = $_POST["tipoantiguo"];
	$idrec = $_POST["idrec"];

	//Variables para montar la query
	$updateRecurso="UPDATE `recursos` SET ";
	$where = " WHERE `rec_id`='$idrec'";

	if ($recursoantiguo == $recurso || empty($recurso)) {
		$updateRecurso = $updateRecurso;
	}else{
		$qrec = "`rec_nombre`='$recurso',";
		$updateRecurso = $updateRecurso.$qrec;
	}
	if ($descripcionantiguo == $descripcion || empty($descripcion)) {
		$updateRecurso = $updateRecurso;
	}else{
		$qdesc = " `rec_desc`='$descripcion',";
		$updateRecurso = $updateRecurso.$qdesc;
	}
	if ($tipoantiguo == $tipo || empty($tipo)) {
		$updateRecurso = $updateRecurso;
	}else{
		$qtipo = " `rec_tipo`='$tipo',";
		$updateRecurso = $updateRecurso.$qtipo;
	}
	
	
	//Quitamos la coma del ultimo SET por que si no SQL nos tira error
	$updateRecurso = substr_replace($updateRecurso, "", strlen($updateRecurso)-1);
	$updateRecurso = $updateRecurso.$where; 
	//Si el usuario nos envia el formulario en blanco la query no hara ningun update y nos dara error, para evitar eso uso este condicional
	if ($updateRecurso == "UPDATE `recuros` SET WHERE `rec_id`='$idrec'") {
		header("location: usuarios.php");
	}
	// Lanzamos la query		
	$update=mysqli_query($conexion,$updateRecurso);
	if (!$update) {
		echo "<br>Ha sucedido un error ¯\_(ツ)_/¯</br>";
		exit;
		}

	header("location: recursos.php")
?>
</html>