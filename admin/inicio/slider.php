<?php include '../extend/header.php'; ?>

    <div class="col s6">
        <h3 class="header">Cargar imagenes para slider</h3>
        <div class="row">
        <div class="col s12">
        <div class="card">
            <div class="card-content">
                <form action="ins_slider.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="file-field input-field">
                        <div class="waves-effect waves-light btn">
                            <span><i class="material-icons left">add_a_photo</i>Imagen:</span>
                            <input type="file" name="ruta[]"multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn ">Guardar</button>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>

<div class="row cargador">
    <div class="col s12 center">
    <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <?php
                    $sel_img = $con->prepare("SELECT * FROM slider ");
                    $sel_img->execute();
                    $res_img = $sel_img->get_result();
                    while($f_img = $res_img->fetch_assoc()){?>
                    
                    <button onclick="swal({
                                title: 'Esta seguro que desea eliminar la imagen?',
                                text: 'Al eliminarlo, no podra recuperarlo!',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si, eliminarlo!'
                                }).then(function() {
                                    location.href='eliminar_img.php?id=<?php echo $f_img['id'] ?>&ruta=<?php echo $f_img['ruta'] ?>';})">
                                    <img src="<?php echo $f_img['ruta'] ?>" alt=""></button>
                    <?php 
                    }
                    $sel_img->close();
                    $con->close();
                    ?>
            </div>
        </div>
    </div>
</div>
<?php include '../extend/scripts.php'; ?>
<script>
    $('.cargador').hide();
    $('.form').submit(function(event){
        $('.cargador').show();
    });
</script>
</body>
</html>