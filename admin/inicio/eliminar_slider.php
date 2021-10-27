<?php 
include '../conexion/conexion.php'; 
$id = htmlentities($_GET['id']);
$ruta = htmlentities($_GET['ruta']);


$del = $con->prepare("DELETE  FROM slider WHERE id = ? ");
$del->bind_param('i',$id);


if($del->execute()){
    unlink($ruta);
    header('location:../extend/alerta.php?msj=Imagen borrada&c=home&p=sl&t=success');
}else{
    header('location:../extend/alerta.php?msj=Imagen no borrada&c=home&p=sl&t=error');
}

$del->close();  
$con->close(); 
?>