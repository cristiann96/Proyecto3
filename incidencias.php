<?php
session_start();
include("conexion.proc.php");
//Definimos la zona horaria y guardamos la fecha actual en date
date_default_timezone_set("Europe/Madrid");
$date = date('Y/m/d H:i:s ', time());
$dateEs = date('d/m/Y H:i:s ', time());
//Comprobamos que se haya introducido una fecha
if (isset($_POST['fechaini']) AND isset($_POST['fechafin']) AND isset($_POST['recurso'])) {
	if (!empty($_POST['fechaini']) AND !empty($_POST['fechafin'])) {
		$recurso = $_POST['recurso'];
		$usuario = $_SESSION['username'];
		//Asignamos fecha inicio y fecha final
		$fechaini = $_POST['fechaini'];
		//echo "Has introducido: ".$fechaini."<br>";
		$fechafin = $_POST['fechafin'];
		//echo "Has introducido: ".$fechafin."<br>";
		//Convertimos las fechas introducidas a un formato mas entendible
		$dateini = date_create($fechaini);
      	$datefin = date_create($fechafin);
      	$dateini = date_format($dateini, 'd-m-y H:i:s');
      	$datefin = date_format($datefin, 'd-m-y H:i:s');
      	//echo "Las fechas convertidas son: ".$dateini. " y ".$datefin."<br/>";
		//Comprobamos que las fechas no esten invertidas
		if ($fechaini<$fechafin OR $fechafin>$fechaini) {
			//Comprobamos que la fecha no haya pasado ya
			if ($fechaini>$dateEs OR $fechafin>$dateEs) {
				//echo "Fecha valida <br/>";
				//Leer reservas de la bbdd
				$queryReservas="SELECT * FROM `reservas` WHERE `res_fin` >= '$date' AND `rec_id` = $recurso";
				//echo $queryReservas."<br/>";
				$qreserva = mysqli_query($conexion,$queryReservas);
				$filas = mysqli_num_rows($qreserva);
				if ($filas == 0) {
					//echo "No hay reservas activas para este recurso <br/>";
					//Si no hay resultados para la query significa que no hay reservas activas por lo tanto podemos hacer el insert directamente
					$insertReserva="INSERT INTO `reservas` (`res_inicio`,`res_fin`,`usu_user`,`rec_id`)
					VALUES ('$fechaini','$fechafin','$usuario','$recurso')";
					$insert=mysqli_query($conexion,$insertReserva);
					if (!$insert){
				      echo "Error: " . mysqli_error($conexion) . PHP_EOL;
				      echo "</br>Errno: " . mysqli_errno($conexion) . PHP_EOL;
				      exit;
				    }
				}else{
					//echo "Hay ".$filas." reservas activas <br/>";
					$contador = 0;
					 while ($res = mysqli_fetch_array($qreserva)) {
					 	//Convertimos las fechas de la bbdd a un formato mas entendible
					 	$bbddini = date_create($res['res_inicio']);
      					$bbddfin = date_create($res['res_fin']);
      					$bbddini = date_format($bbddini, 'd-m-y H:i:s');
      					$bbddfin = date_format($bbddfin, 'd-m-y H:i:s');
					 	if ($dateini>=$bbddini AND $dateini<=$bbddfin) { 
					 		$contador=1;
					 		break;
					 	}
					 	if ($datefin>=$bbddini AND $datefin<=$bbddfin){ 
					 		$contador=1;
					 		break;
					 	}
					 	if ($dateini<=$bbddini AND $datefin>=$bbddfin) { 
					 		$contador=1;
					 		break;
					 	}
					 	if ($dateini>=$bbddini AND $datefin<=$bbddfin){ 
					 		$contador=1;
					 		break;
					 	}
					 	/*if ($dateini==$bbddini AND $datefin==$bbddfin){ 
					 		$contador++;
					 	}*/

					 }
					 if ($contador == 0) {
					 	echo "Reserva introducida correctamente";
					 	$insertReserva="INSERT INTO `reservas` (`res_inicio`,`res_fin`,`usu_user`,`rec_id`)
						VALUES ('$fechaini','$fechafin','$usuario','$recurso')";
						$insert=mysqli_query($conexion,$insertReserva);
						if (!$insert){
					      echo "Error: " . mysqli_error($conexion) . PHP_EOL;
					      echo "</br>Errno: " . mysqli_errno($conexion) . PHP_EOL;
					      exit;
					    }
					 }else{
					 	echo "Ya hay reservas en las fechas que has introducido, por favor introduce un periodo sin reservas";
					 }
				}





			}else{
				echo "No podemos reservar un recurso en el pasado :( <br/>";
			}
		}else{
			echo "La fecha de inicio es mayor que la fecha final";
		}	
	}else{
		echo "Una fecha esta vacia";
	}
}else{
	echo "Ha sucedido un error";
}

