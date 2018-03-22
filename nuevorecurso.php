<!DOCTYPE html>
<html>
<?php
	session_start();
	include("conexion.proc.php");
	if($_SESSION['permisos']=="leer" || $_SESSION['permisos']=="modificar"){
		if ($_SESSION['usuario']!=$_POST['usuario']) {
			header("location: index.php");
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
<title>Nuevo Recurso</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<form class="w3-container w3-card-4 w3-light-grey" action="nuevorecurso.proc.php" method="POST">
  <h2>Nuevo recurso</h2>
  
  <p><label>Nombre del recurso</label>
  <input class="w3-input w3-border" name="nombre" type="text" required></p>
  
  <p><label>Descripcion</label>
  <input class="w3-input w3-border" name="descripcion" type="text" required></p>

  <p><label>Tipo</label>
  <select class="w3-select" name="tipo" required>
	  <option value="" disabled selected>Selecciona el tipo de recurso</option>
	  <option value="Aulas">Aulas</option>
	  <option value="Despachos/Salas">Despachos/Salas</option>
	  <option value="Material de trabajo">Material de trabajo</option>
  </select></p>
  <button class="w3-btn w3-blue-grey w3-margin-bottom">Añadir recurso</button>
  <a href="usuarios.php" class="w3-btn w3-blue-grey w3-right"> Volver </a>

</form>

</body>
</html> 
