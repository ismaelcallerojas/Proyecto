<?php
include 'admin/conexion/conexion_web.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nombre = htmlentities($_POST['nombre']);
$telefono = htmlentities($_POST['telefono']);
$correo = htmlentities($_POST['correo']);
$mensaje = htmlentities($_POST['mensaje']);
$id_propiedad = htmlentities($_POST['id_propiedad']);
$id = '';

$ins = $con->prepare("INSERT INTO comentario VALUES(?,?,?,?,?,?) ");
$ins->bind_param("isssss",$id, $id_propiedad, $nombre, $telefono, $correo, $mensaje);


if ($ins->execute()) {
echo "<h3 style='color:green;'>Su mensaje ha sido enviado</h3>";
}else{
    echo "<h3 style='color:red;'>Su mensaje no pudo ser enviado</h3>";
}

  $ins->close();
  $con->close();
  }else {
    echo "<h3 style='color:red;'>Utilice el formulario</h3>";
  }


 ?>