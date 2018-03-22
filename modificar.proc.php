<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	//Variables del formulario
	$usuarioantiguo = $_POST["usuarioantiguo"];
	$usuario = $_POST["username"];
	$password = $_POST["pwd"];
	$nombre = $_POST["firstname"];
	$nombreantiguo = $_POST["oldfirstname"];
	$apellido = $_POST["lastname"];
	$apellidoantiguo = $_POST["oldlastname"];
	$mail = $_POST["email"];
	$mailantiguo = $_POST["oldemail"];
	$telf = $_POST["phone"];
	$telfantiguo = $_POST["oldphone"];
	//como solo podemos modificar los permisos con usuario superadministrador, le pongo isset ya que pueden dar error con el resto de usuarios que no pueden cambiar los permisos
	if (isset($_POST["permisos"])) {
		$permisos = $_POST["permisos"];
	}
	if (isset($_POST["oldpermisos"])) {
		$permisosantiguo = $_POST["oldpermisos"];
	}
	//Variables para montar la query
	$updateUsuario="UPDATE `usuarios` SET ";
	$where = " WHERE `usu_user`='$usuarioantiguo'";

	if ($usuarioantiguo == $usuario || empty($usuario)) {
		$updateUsuario = $updateUsuario;
	}else{
		$quser = "`usu_user`='$usuario',";
		$updateUsuario = $updateUsuario.$quser;
	}
	if (empty($password)) {
		$updateUsuario = $updateUsuario;
	}else{
		$password = md5($password);
		$qpwd = " `usu_pwd`='$password',";
		$updateUsuario = $updateUsuario.$qpwd;
	}
	if ($nombreantiguo == $nombre || empty($nombre)) {
		$updateUsuario = $updateUsuario;
	}else{
		$qnom = " `usu_nombre`='$nombre',";
		$updateUsuario = $updateUsuario.$qnom;
	}
	if ($apellidoantiguo == $apellido || empty($apellido)) {
		$updateUsuario = $updateUsuario;
	}else{
		$qapellido = " `usu_apellido`='$apellido',";
		$updateUsuario = $updateUsuario.$qapellido;
	}
	if ($mailantiguo == $mail || empty($mail)) {
		$updateUsuario = $updateUsuario;
	}else{
		$qmail = " `usu_mail`='$mail',";
		$updateUsuario = $updateUsuario.$qmail;
	}
	if ($telfantiguo == $telf || empty($telf)) {
		$updateUsuario = $updateUsuario;
	}else{
		$qtelf = " `usu_telf`='$telf',";
		$updateUsuario = $updateUsuario.$qtelf;
	}
	if (isset($permisosantiguo)) {
		if ($permisosantiguo == $permisos || empty($permisos)) {
			$updateUsuario = $updateUsuario;
		}else{
			$qperm = " `usu_permisos`='$permisos',";
			$updateUsuario = $updateUsuario.$qperm;
		}
	}
	
	//Quitamos la coma del ultimo SET por que si no SQL nos tira error
	$updateUsuario = substr_replace($updateUsuario, "", strlen($updateUsuario)-1);
	$updateUsuario = $updateUsuario.$where; 
	//Si el usuario nos envia el formulario en blanco la query no hara ningun update y nos dara error, para evitar eso uso este condicional
	if ($updateUsuario == "UPDATE `usuarios` SET WHERE `usu_user`='$usuarioantiguo'") {
		header("location: usuarios.php");
	}
	// Lanzamos la query		
	$update=mysqli_query($conexion,$updateUsuario);
	if (!$update) {
		echo "<br>Ha sucedido un error ¯\_(ツ)_/¯</br>";
		exit;
		}
	//Asigna el nuevo nombre de sesion en caso de necesitarlo
	if ($_SESSION["usuario"] == $usuarioantiguo) {
		if ($usuarioantiguo != $usuario) {
			$_SESSION["usuario"] = $usuario;
		}
	}
	header("location: usuarios.php")
?>
</html>