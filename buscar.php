<?php 
include 'admin/conexion/conexion_web.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_departamento = htmlentities($_POST['departamento']);
        $provincia = htmlentities($_POST['provincia']);
        $operacion = htmlentities($_POST['operacion']);
        $tipo_inmueble = htmlentities($_POST['tipo_inmueble']);
        $rango1 = htmlentities($_POST['rango1']);
        $rango2 = htmlentities($_POST['rango2']);
        
        $sel_edo= $con->prepare("SELECT departamento FROM departamentos WHERE iddepartamentos = ? ");
        $sel_edo->bind_param('i', $id_departamento);
        $sel_edo->execute();
        $res_edo = $sel_edo->get_result();
        if($f_edo = $res_edo->fetch_assoc()){
            $departamento = $f_edo['departamento'];
        }

        $sel_marc= $con->prepare("SELECT foto_principal, precio, departamento, provincia, fraccionamiento, propiedad FROM inventario WHERE departamento = ? AND provincia = ? AND operacion = ? AND tipo_inmueble = ? AND precio BETWEEN ? AND ? ");
        $sel_marc->bind_param('ssssdd', $departamento, $provincia, $operacion, $tipo_inmueble,$rango1, $rango2);
        $sel_marc->execute();
        $res_marc = $sel_marc->get_result();

    }else{
        header('location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="admin/css/styles.css">
    <link rel="stylesheet" href="admin/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Sitio web</title>
</head>
<body class="blue-grey lighten-5">
    <div class="orange center">
        <a href="index.php" class="brand-logo center"><img src="img/logo.png" width="50" class="circle"></a>
    </div>

    <div class="slider">
    <ul class="slides">
    <?php
        $sel= $con->prepare("SELECT * FROM slider ");
        $sel->execute();
        $res = $sel->get_result();
        while($f = $res->fetch_assoc()){
    ?>
      <li>
        <img src="admin/inicio/<?php echo $f['ruta']?>"> <!-- random image -->
        <div class="caption center-align">
          <h3>Sitio Web Inmobiliaria</h3>
          <h5 class="light white-text text-lighten-3">“ Tu asesor inmobiliario de confianza”, “Trabajamos por y para tu tranquilidad”</h5>
        </div>
      </li>
      <?php
        }
        $sel->close();
      ?>
    </ul>
  </div>

  <div class="row">
      <?php 
        while($f_marc = $res_marc->fetch_assoc()){
      ?>
      <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
                <span class="card-title"><?php echo '$'. number_format($f_marc['precio'],2); ?></span>
            </div>
            <div class="card-content">
                <p><?php echo $f_marc['fraccionamiento'].' '.$f_marc['departamento'].' '.$f_marc['provincia']; ?></p>
            </div>
            <div class="card-action">
                <a href="ver_mas.php?id=<?php echo $f_marc['propiedad'] ?>">Ver mas..</a>
            </div>
        </div>
      </div>
      <?php 
        }
        $sel_marc->close();
      ?>
  </div>
    <br><br><br><br><br><br><br><br><br><br>

    <footer class="page-footer orange">
          <div class="footer-copyright">
            <div class="container center">
            © 2021 Derechos Reservados - Universidad Adventista de Bolivia
            </div>
          </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="admin/js/v0.100.2/materialize.min.js"></script>
    <script src="admin/js/materialize.min.js"></script>
    <script>
        $('.slider').slider();
    </script>
</body>
</html>