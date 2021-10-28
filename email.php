<?php
include 'admin/conexion/conexion_web.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($_POST as $campo => $valor){    
        $variable="$".$campo."='".htmlentities($valor)."';";
        eval($variable);
    }

    $header = "MIME-vERSION 1.0 \r\n";
    $header .= "Content-Type: text/html; charset=iso-8859-1 \r\n";
    $header .= "From: {$nombre} <{$correo}> \r\n";

    $mail = mail("blanco2723@gmail.com", $asunto, $mensaje, $header);
    if($mail){
        echo "<h3 style='color:green;'>Su mensaje ha sido enviado</h3>";
    }else{
        echo "<h3 style='color:red;'>Su mensaje no pudo ser enviado</h3>";
     }

    $con->close();
}else{
    echo "<h3 style='color:red;'>Utilice el formulario</h3>";
}

?>