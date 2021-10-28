<?php 
include 'admin/conexion/conexion_web.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="admin/css/styles.css">
    <link rel="stylesheet" href="admin/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Sitio web</title>
</head>
<body class="blue-grey lighten-5">
    <div class="orange accent-4 center">
        <a href="#" class="brand-logo center"><img src="img/logo.png" width="50" class="circle"></a>
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
        $sel_marc= $con->prepare("SELECT foto_principal,precio, departamento, provincia, fraccionamiento, propiedad FROM inventario WHERE marcado = 'SI' ");
        $sel_marc->execute();
        $res_marc = $sel_marc->get_result();

        while($f_marc = $res_marc->fetch_assoc()){
      ?>
      <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img hight="500" width="500" src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
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
    
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title" >Buscador de inmuebles</span>
                <form action="buscar.php" method="post">
                    <div class="row">
                        <div class="col s6">
                            <select id="departamento" name="departamento" required>
                            <option value="" disabled selected>SELECCIONA UN DEPARTAMENTO</option>
                            <?php $sel_departamento =$con->prepare("SELECT * FROM departamentos");
                            $sel_departamento->execute();

                            $res_departamento = $sel_departamento->get_result();
                            while($f_departamento=$res_departamento->fetch_assoc()) { ?>
                            <option value="<?php echo $f_departamento['iddepartamentos'] ?>"><?php echo $f_departamento['departamento'] ?></option>
                            <?php }
                            $sel_departamento->close();
                            ?>
                            </select>
                        </div>
                        <div class="col s6">
                            <div class="res_departamento"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                        <select name="operacion" required  >
                            <option value="" disabled selected  >ELIGE LA OPERACION</option>
                            <option value="VENTA">VENTA</option>
                            <option value="RENTA">RENTA</option>
                            <option value="TRASPASO">TRASPASO</option>
                            <option value="OCUPADO">OCUPADO</option>
                        </select>
                        </div>

                        <div class="col s6">
                        <select name="tipo_inmueble" required >
                            <option value="" disabled selected  >ELIGE EL TIPO DE INMUEBLE</option>
                            <option value="CASA">CASA</option>
                            <option value="TERRENO">TERRENO</option>
                            <option value="LOCAL">LOCAL</option>
                            <option value="DEPARTAMENTO">DEPARTAMENTO</option>
                        </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" name="rango1" title="" id="rango1" required>
                                <label for="rango1">Precio minimo</label>
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field">
                                <input type="number" name="rango2" title="" id="rango2" required>
                                <label for="rango2">Precio maximo</label>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn">Buscar inmueble</button>
                </form>
            </div>    
        </div>
    </div>
</div>

    <!--formulario de contacto-->
    <div class="row">
     <div class="col s12">
       <div class="card">
         <div class="card-content">
             
            <span class="card-title">Contacto</span>
            <div class="row">
                <div class="col s6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121838.20215604223!2d-66.2386089254841!3d-17.39047605037208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373e0d9e4ab27%3A0xa2719ae9532c3e65!2sCochabamba!5e0!3m2!1ses!2sbo!4v1635433363474!5m2!1ses!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" class="z-depth-4" loading="lazy"></iframe>
                </div>
                <div class="col s6">
                <div class="input-field">
                   <input type="text" name="nombre" pattern="[A-Za-z/s ]+"  title=""  id="nombre" required >
                   <label for="nombre">Nombre:</label>
                 </div>
                 <div class="input-field">
                   <input type="text" name="asunto"   title=""  id="asunto"  >
                   <label for="asunto">Asunto:</label>
                 </div>
                 <div class="input-field">
                   <input type="email" name="correo"   title=""  id="correo" required  >
                   <label for="correo">Correo:</label>
                 </div>
                 <div class="input-field">
                   <textarea name="mensaje" rows="8" cols="80" id="mensaje" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
                   <label for="">Mensaje:</label>
                 </div>
                 <button type="button" class="btn" id="enviar">Enviar</button>
                 <div class="resultado">

                 </div>
                </div>
            </div>
         </div>
       </div>
     </div>
   </div>

   <footer class="page-footer red white-text center">
                
                <p>Copyrigth 2021 Sitio Web: Inmobiliaria<br>Universidad Adventista de Bolivia<br><br><br></p>
   </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="admin/js/v0.100.2/materialize.min.js"></script>
    <script src="admin/js/materialize.min.js"></script>
    <script>
        $('.slider').slider();
        $('select').formSelect();



        $('#departamento').change(function(){
            $.post('admin/propiedades/ajax_provincia.php',{
                departamento:$('#departamento').val(),
                
                beforeSend: function(){
                    $('.res_departamento').html("Espere un momento por favor..");
                }
            }, function(respuesta){
                $('.res_departamento').html(respuesta);
            });
        });
        
        $('#enviar').click(function(){
            $.post('email.php',{
                nombre:$('#nombre').val(),
                asunto:$('#asunto').val(),
                correo:$('#correo').val(),
                mensaje:$('#mensaje').val(),
                id_propiedad:$('#id_propiedad').val(),
                
                beforeSend: function(){
                    $('.resultado').html("Espere un momento por favor..");
                }
            }, function(respuesta){
                $('.resultado').html(respuesta);
            });
        });

    </script>
</body>
</html>