<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();
$q = $_GET['q'];
include("conexion.proc.php");
    if ($q == "Todo"){
        $sql="SELECT * FROM recursos";
    }elseif(($q == "Averiado") || ($q == "Disponible") || ($q == "Reservado")) {
        $sql="SELECT * FROM recursos WHERE rec_estado = '".$q."'";
    }else{
        $sql="SELECT * FROM recursos WHERE rec_tipo = '".$q."'";
    }
$result = mysqli_query($conexion,$sql);
$cont=0;
do { echo '<div class="w3-row-padding">';
    while($row = mysqli_fetch_array($result)) {
         echo '
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="img/'.$row['resc_foto'].'" alt="'.$row['rec_nombre'].'" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>'.$row['rec_nombre'].'</b></p>
        <div style="height:70px;">
        <p><b>Descripcion: </b>'.$row['rec_desc'].'</p>
        <p><b>Estado: </b><i class="fa fa-circle fa-fw"';
        if ($row['rec_estado']=='Disponible') {
           echo 'style="color:green"';
        } 
        if ($row['rec_estado']=='Averiado') {
           echo 'style="color:orange"';
        }
        if ($row['rec_estado']=='Deshabilitado') {
           echo 'style="color:black"';
        }  
        echo '></i>'.$row['rec_estado'].'</p>
        </div>';
         echo '<div style="height:50px; margin-bottom: 5px;">';
        echo '</div>';
        if (isset($_SESSION['username'])) {
          if($row['rec_estado']=="Averiado" OR $row['rec_estado'] == "Deshabilitado"){
            echo "<button class='w3-btn w3-grey w3-disabled w3-margin-bottom'>Reservar</button>";
            echo '<div class="w3-right"><button class="w3-button" type="submit"><i class="fa fa-exclamation-triangle fa-fw"></i></button></div>';
          }
          else{?>
            <a href='#openModal'  onclick='showModal("<?php echo $row['rec_id']; ?>","reservar")'><button class='w3-btn w3-grey w3-margin-bottom'>Reservar</button></a>
            <div class="w3-right"><a href="#openModal"><button class="w3-button" type="submit" onclick='showModal("<?php echo $row['rec_id']; ?>","nuevaincidencia")'><i class="fa fa-exclamation-triangle fa-fw"></i></button></a></div>
            <?php
          }
        }

     echo '</div>  
    </div>';
        $cont++;
    } echo "</div>";
}while(($cont%3!=0)&&(mysqli_num_rows($result)!=$cont)); 

mysqli_close($conexion);
?>
</body>
</html>