<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	if($_SESSION['permisos']=="leer"){
		if ($_SESSION['usuario']!=$_POST['usuario']) {
			header("location: principal.php");
		}

	}
?>
<style type="text/css">
	input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>
<title>Modificar usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<form class="w3-container w3-card-4 w3-light-grey" action="modificar.proc.php" method="POST">
  <h2>Modificar usuario</h2>
  <h4>Los campos que se dejen en blanco no se modificarán</h4><br>
  <p><label>Nombre de usuario</label>
  <input class="w3-input w3-border" name="username" type="text" value="<?php echo $_POST['usuario'] ?>"></p>
  <input name="usuarioantiguo" type="hidden" value="<?php echo $_POST['usuario'] ?>">
	
  <p><label>Contraseña</label>
	<input class="w3-input w3-border" name="pwd" type="password"></p>
  
  <p><label>Nombre</label>
  <input class="w3-input w3-border" name="firstname" type="text" value="<?php echo $_POST['nombre'] ?>"></p>
  <input class="w3-input w3-border" name="oldfirstname" type="hidden" value="<?php echo $_POST['nombre'] ?>"></p>


  <p><label>Apellido</label>
  <input class="w3-input w3-border" name="lastname" type="text" value="<?php echo $_POST['apellido'] ?>"></p>
  <input class="w3-input w3-border" name="oldlastname" type="hidden" value="<?php echo $_POST['apellido'] ?>"></p>


  <p><label>Correo electronico</label>
  <input class="w3-input w3-border" name="email" type="text" value="<?php echo $_POST['mail'] ?>"></p>
  <input class="w3-input w3-border" name="oldemail" type="hidden" value="<?php echo $_POST['mail'] ?>"></p>

  <p><label>Telefono</label>
  <input class="w3-input w3-border" name="phone" type="number" value="<?php echo $_POST['telf'] ?>"></p>
  <input class="w3-input w3-border" name="oldphone" type="hidden" value="<?php echo $_POST['telf'] ?>"></p>

  <!--<p><label>Permisos</label>
  <input class="w3-input w3-border" name="permissions" type="text" value="<?php echo $_POST['permisos'] ?>"></p>-->
  <?php 
  if ($_SESSION['permisos']== "jefaso") {
  ?>
  <p><label>Permisos</label>
  <select class="w3-select" name="permisos">
	  <option value="" disabled selected>Selecciona que permisos asignar</option>
	  <option value="leer">Lectura</option>
	  <option value="modificar">Modificacion</option>
	  <option value="admin">Administrador</option>
  </select></p>
  <input class="w3-input w3-border" name="oldpermisos" type="hidden" value="<?php echo $_POST['permisos'] ?>">
  <?php
	}
  ?>
  <button class="w3-btn w3-blue-grey w3-margin-bottom">Register</button>
  <a href="principal.php" class="w3-btn w3-blue-grey w3-right"> Volver </a>

</form>

</body>
</html> 
