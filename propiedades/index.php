<?php include '../extend/header.php'; 

if(isset($_GET['ope'])){
  $operacion = $con->real_escape_string(htmlentities($_GET['ope']));
  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,departamento,provincia,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa FROM inventario WHERE estatus = 'ACTIVO' AND operacion = ? ");
  $sel->bind_param('s',$operacion);
}else{
  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,departamento,provincia,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa FROM inventario WHERE estatus = 'ACTIVO' ");

}

?>

<!--buscador -->
<br>
<div class="row">
    <div class="col s12">
        <nav class="brown lighten-3">
            <div class="nav-wrapper">
                <div class="input-field">
                    <input type="search" name="" id="buscar" autocomplete="off">
                    <label for="buscar"><i class="material-icons left">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--fin buscador -->

<!--tabla de propiedades -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Propiedades</span>
        <table>
          <thead>
            <tr class="cabecera">
              <th>Vista</th>
              <th>Num</th>
              <th>Cliente</th>
              <th>Propiedad</th>
              <th>Precio</th>
              <th>Credito</th>
              <th>Asesor</th>
              <th>Tipo</th>
              <th>Operacion</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <?php
         
          $sel->execute();
          $res = $sel->get_result();
          while ($f =$res->fetch_assoc()) {?>
            <tr>
              <!-- Modal Trigger -->
            <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)" class="btn-floating" value="<?php echo $f['propiedad'] ?>" class="btn modal-trigger"><i class="material-icons">visibility</i></button></td>

              <td><?php echo $f['consecutivo'] ?></td>
              <td><?php echo $f['nombre_cliente'] ?></td>
              <td><?php echo $f['calle_num'].' '.$f['fraccionamiento'].' '.$f['departamento'].' ,'.$f['provincia'] ?></td>
              <td><?php echo "$". number_format($f['precio'],2);  ?></td>
              <td><?php echo $f['forma_pago'] ?></td>
              <td><?php echo $f['asesor'] ?></td>
              <td><?php echo $f['tipo_inmueble'] ?></td>
              <td><?php echo $f['operacion'] ?></td>
              <!--boton de imagenes -->
              <td><a href="imagenes.php?id=<?php echo $f['propiedad'] ?>" class="btn-floating pink"><i class="material-icons">image</i></a></td>
              <!--boton de mapa -->
              <td><a href="mapa.php?mapa=<?php echo $f['mapa'] ?>" class="btn-floating orange"><i class="material-icons">room</i></a></td>

            </tr>
          <?php }
          $sel->close();
          $con->close();
           ?>
        </table>
      </div>
    </div>
  </div>
</div>
<!--fin tabla de propeidad -->

<!--modal emergente -->
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Informaciónr</h4>
      <div class="res_modal">
            <!--ajax -->
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  
  <?php include '../extend/scripts.php'; ?>
  <script>
    $('.modal').modal();

    function enviar(valor){
      $.get('modal.php',{
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