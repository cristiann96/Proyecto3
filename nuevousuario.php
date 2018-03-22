<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	if($_SESSION['permisos']=="leer" || $_SESSION['permisos']=="modificar"){
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
<title>Nuevo usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<form class="w3-container w3-card-4 w3-light-grey" action="nuevousuario.proc.php" method="POST">
  <h2>Nuevo usuario</h2>
  
  <p><label>Nombre de usuario</label>
  <input class="w3-input w3-border" name="username" type="text" required></p>

  <p><label>Contraseña</label>
	<input class="w3-input w3-border" name="pwd" type="password" required></p>
  
  <p><label>Nombre</label>
  <input class="w3-input w3-border" name="firstname" type="text" required></p>

  <p><label>Apellido</label>
  <input class="w3-input w3-border" name="lastname" type="text" required></p>

  <p><label>Correo electronico</label>
  <input class="w3-input w3-border" name="email" type="text" required></p>

  <p><label>Telefono</label>
  <input class="w3-input w3-border" name="phone" type="number" required></p>

  <?php 
  if ($_SESSION['permisos']== "jefaso" || $_SESSION['permisos']=="admin") {
  ?>
  <p><label>Permisos</label>
  <select class="w3-select" name="permisos" required>
	  <option value="" disabled selected>Selecciona que permisos asignar</option>
	  <option value="leer">Lectura</option>
	  <option value="modificar">Modificacion</option>
	  <option value="admin">Administrador</option>
  </select></p>
  <input class="w3-input w3-border" name="oldpermisos" type="hidden" value="<?php echo $_POST['permisos'] ?>">
  <?php
	}
  ?>
  <button class="w3-btn w3-blue-grey w3-margin-bottom">Añadir usuario</button>
  <a href="usuarios.php" class="w3-btn w3-blue-grey w3-right"> Volver </a>

</form>

</body>
</html> 
