<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
include("conexion.proc.php");
if (isset($_REQUEST['errorpwd'])) {
	$errorpwd=$_REQUEST['errorpwd'];
}
if (isset($_REQUEST['erroruser'])) {
	$erroruser=$_REQUEST['erroruser'];
}
if (isset($_REQUEST['logout'])) {
	$login=$_REQUEST['logout'];
}
?>
<head>
	<title>Inicio de sesión</title>
</head>
<body>
<form class="w3-container" action="login.proc.php" method="POST">
        <div class="w3-section">
        <?php if (isset($login)) {
          	echo '<label class="w3-text-red"> Para acceder a la pagina necesitas iniciar sesion </label><br/>';
          }
          ?>
          <label><b>Username</b></label>
          <?php if (isset($erroruser)) {
          	echo '<label class="w3-text-red"> El usuario es incorrecto </label>';
          }
          ?>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usuario" required>
          <label><b>Password</b></label>
          <?php if (isset($errorpwd)) {
          	echo '<label class="w3-text-red"> La contraseña es incorrecta </label>';
          }
          ?>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pwd" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
        </div>
      </form>
</body>
</html>