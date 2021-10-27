<?php 
include 'admin/conexion/conexion_web.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/css/styles.css">
    <link rel="stylesheet" href="admin/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Sitio web</title>
</head>
<body class="blue-grey lighten-5">
    <nav class="red">
        <a href="#" class="brand-logo center">Logo</a>
    </nav>

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
          <h3>Empresa</h3>
          <h5 class="light grey-text text-lighten-3">slogan de la empresa</h5>
        </div>
      </li>
      <?php
        }
        $sel->close();
      ?>
    </ul>
  </div>

  <div class="row">
      <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="admin/inicio/slider/772.jpg">
                <span class="card-title">precio</span>
            </div>
            <div class="card-content">
                <p>Direccion</p>
            </div>
            <div class="card-action">
                <a href="#">Ver mas..</a>
            </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="admin/inicio/slider/772.jpg">
                <span class="card-title">precio</span>
            </div>
            <div class="card-content">
                <p>Direccion</p>
            </div>
            <div class="card-action">
                <a href="#">Ver mas..</a>
            </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="admin/inicio/slider/772.jpg">
                <span class="card-title">precio</span>
            </div>
            <div class="card-content">
                <p>Direccion</p>
            </div>
            <div class="card-action">
                <a href="#">Ver mas..</a>
            </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="admin/inicio/slider/772.jpg">
                <span class="card-title">precio</span>
            </div>
            <div class="card-content">
                <p>Direccion</p>
            </div>
            <div class="card-action">
                <a href="#">Ver mas..</a>
            </div>
        </div>
      </div>
  </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="admin/js/v0.100.2/materialize.min.js"></script>
    <script src="admin/js/materialize.min.js"></script>
    <script>
        $('.slider').slider();
    </script>
</body>
</html>