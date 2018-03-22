<?php
session_start();
include("conexion.proc.php");
$usuario=$_POST['usuario'];
$password=$_POST['pwd'];
$password=md5($password);
$sql="SELECT * FROM usuarios WHERE usu_user = '$usuario'";
$result=mysqli_query($conexion, $sql);
//$filas=mysqli_num_rows($result);
if (mysqli_num_rows($result)>0) {
	$row=mysqli_fetch_array($result);
	if ($row['usu_habilitado']=="si") {
		if ($row['usu_pwd']==$password) {
			switch ($row['usu_permisos']) {
			    case "admin":
			        $_SESSION ['permisos']="admin";
			        break;
			    case "jefaso":
			        $_SESSION ['permisos']="jefaso";
			        break;
			    case "modificar":
			        $_SESSION ['permisos']="modificar";
			        break;
			    case "leer":
			    	$_SESSION ['permisos']="leer";
			    	break;
			}
			$_SESSION['username']=$usuario;

// echo "usuario: ".$usuario."<br>";
// echo "usuario: ".$_SESSION ['username']."<br>";



			// $_SESSION['loggedin']=1;
			//$_SESSION ['start']=time();
			//La sesion expira en una hora
			//$_SESSION ['expire']=$_SESSION ['start']+(60*60);
			header("location: reservas2.php");
		}else{
			header("location: index.php?errorpwd=ok");
		}
	}else{
		header("location: index.php?erroruser=ok");
	}

}else{
	header("location: index.php?erroruser=ok");
}
mysqli_close($conexion);
//echo $_SESSION ['username'];
//echo $usuario;
// echo $password;
echo "<a href='reservas2.php'> Reservas </a>"; 
?>
