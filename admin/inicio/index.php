<?php include '../extend/header.php'; 
$sel = $con->prepare("SELECT propiedad FROM inventario WHERE operacion = ? ");
$sel->bind_param('s', $operacion);
?>

<div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-image">
        <img src="../img/bg20.jpg" height="200px">
          <span class="card-title white-text"><b>VENTAS</b></span>
          <h4 align="center" class="white-text">
          
          <?php 
            $operacion ='VENTA';
            $sel->execute();
            $res_venta = $sel->get_result();
            echo mysqli_num_rows($res_venta);
          ?><a href="../propiedades/index.php?ope=VENTA" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
          </h4>
          
        </div>
        <div class="card-content">
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-image">
        <img src="../img/bg20.jpg" height="200px">
          <span class="card-title white-text"><b>RENTADOS</b></span>
          <h4 align="center" class="white-text">
          
          <?php 
            $operacion ='RENTA';
            $sel->execute();
            $res_renta = $sel->get_result();
            echo mysqli_num_rows($res_renta);
          ?><a href="../propiedades/index.php?ope=RENTA" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
          </h4>
          
        </div>
        <div class="card-content">
        </div>
      </div>
    </div>

<div class="row">
<div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-image">
        <img src="../img/bg20.jpg" height="200px">
          <span class="card-title white-text"><b>TRASPASOS</b></span>
          <h4 align="center" class="white-text">
          
          <?php 
            $operacion ='TRASPASO';
            $sel->execute();
            $res_traspaso = $sel->get_result();
            echo mysqli_num_rows($res_traspaso);
          ?><a href="../propiedades/index.php?ope=TRASPASO" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
          </h4>
          
        </div>
        <div class="card-content">
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-image">
        <img src="../img/bg20.jpg" height="200px">
          <span class="card-title white-text"><b>OCUPADO</b></span>
          <h4 align="center" class="white-text">
          
          <?php 
            $operacion ='OCUPADO';
            $sel->execute();
            $res_ocupado = $sel->get_result();
            echo mysqli_num_rows($res_ocupado);
          ?><a href="../propiedades/index.php?ope=OCUPADO" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
          </h4>
          
        </div>
        <div class="card-content">
        </div>
      </div>
    </div>

</div>

<div class="row">
  <div class="col s12">
  <div class="card blue-grey darken-1">
    <div class="card-content white-text border-0">
      <h4 align="center">COMENTARIOS</h4>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width tabs-transparent">
        <li class="tab"><a class="active" href="#nuevos">Nuevos</a></li>
        <li class="tab"><a href="#resueltos">Resueltos</a></li>
      </ul>
    </div>
    <div class="card-content white">
      <div id="nuevos">
        <table>
           <th>Vista</th>
           <th>Solicitante</th>
           <th>Telefono</th>
           <th>Correo</th>
           <th>Mensaje</th>
           <?php
           $sel_com = $con->prepare("SELECT * FROM comentario WHERE estatus = ? ");
           $sel_com->bind_param('s', $estatus);
           $estatus = 'NUEVO';
           $sel_com->execute();
           $res_nuevo = $sel_com->get_result();
           while ($fn =$res_nuevo->fetch_assoc()) { ?>
           <tr>
           <td class="borrar">
              <button data-target="modal1" onclick="enviar(this.value)" value="<?php echo $fn['id_propiedad'] ?>" class="btn-floating modal-trigger" title="Visualizar todos los datos de esta propiedad"><i class="material-icons">visibility</i>
              </button>
            </td> 
             <td><?php echo $fn['nombre'] ?></td>
             <td><?php echo $fn['tel'] ?></td>
             <td><?php echo $fn['correo'] ?></td>
             <td><?php echo $fn['mensaje'] ?></td>
           </tr>
           <?php } ?>
        </table>
      </div>
      <div id="resueltos">
      <table>
           <th>Vista</th>
           <th>Solicitante</th>
           <th>Telefono</th>
           <th>Correo</th>
           <th>Mensaje</th>
           <?php
           $sel_com = $con->prepare("SELECT * FROM comentario WHERE estatus = ? ");
           $sel_com->bind_param('s', $estatus);
           $estatus = 'RESUELTO';
           $sel_com->execute();
           $res_resuelto = $sel_com->get_result();
           while ($fr =$res_resuelto->fetch_assoc()) { ?>
           <tr>
           <td class="borrar">
              <button data-target="modal1" onclick="enviar(this.value)" value="<?php echo $fr['id_propiedad'] ?>" class="btn-floating modal-trigger" title="Visualizar todos los datos de esta propiedad"><i class="material-icons">visibility</i>
              </button>
            </td> 
             <td><?php echo $fr['nombre'] ?></td>
             <td><?php echo $fr['tel'] ?></td>
             <td><?php echo $fr['correo'] ?></td>
             <td><?php echo $fr['mensaje'] ?></td>
           </tr>
           <?php } ?>
        </table>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>


<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Información</h4>
      <div class="res_modal">
      </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close btn-floating btn-small waves-effect waves-light red"><i class="material-icons">clear</i></a>
    </div>
  </div>
  

  <?php include '../extend/scripts.php'; ?>
  <script>

    function enviar(valor){
      $.get('../propiedades/modal.php',{
        id:valor,
        
        beforeSend: function(){
            $('.res_modal').html("Espere un momento por favor..");
        }
    }, function(respuesta){
        $('.res_modal').html(respuesta);
    });
}


  </script>

    </body>
    
</html>