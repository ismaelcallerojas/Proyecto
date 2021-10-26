<?php include '../extend/header.php'; 

include '../extend/permiso.php';

?>
<!--Formulario de registro de usuarios -->
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Alta de Usuarios</span>
                <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
                    <div class="input-field">
                        <input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 4 A 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{4,15}" id="nick" onblur="may(this.value, this.id)">
                        <label for="nick">Nick: </label>
                    </div>
                    <div class="validacion"></div>
                        <div class="input-field">
                            <input type="password" name="pass1" title="CONTRASEÑA CON NÚMEROS, LETRAS, ENTRE 8 A 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
                            <label for="pass1">Contraseña:</label>
                        </div>
                        <div class="input-field">
                            <input type="password" title="CONTRASEÑA CON NÚMEROS, LETRAS MAYÚSCULAS Y MINÚSCULAS, ENTE 8 A 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
                            <label for="pass2">Verificar Contraseña:</label>
                        </div>
                    <select name="nivel" required>
                        <option value="" disabled selected>ELIJE UN NIVEL DE USUARIO</option>
                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                        <option value="ASESOR">ASESOR</option>
                    </select>
                    <div class="input-field">
                        <input type="text" name="nombre" required title="Nombre del Usuario" id="nombre" onblur="may(this.value, this.id)">
                        <label for="nombre">Nombre completo del usuario: </label>
                    </div>
                    <div class="input-field">
                        <input type="email" name="correo" title="Correo electronico" id="correo">
                        <label for="email">Correo electronico:</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="waves-effect waves-light btn red">
                            <span><i class="material-icons left">add_a_photo</i>Foto:</span>
                            <input type="file" name="foto" id="">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn black" id="btn_guardar">Guardar <i class="material-icons right">send</i></button>
                </form>
            </div>
        </div>
    </div>
</div><!--Fin del formulario de registro de usuarios -->

<!--Buscador de usuarios -->
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
<!--Fin del buscador de usuarios -->
>

<?php include '../extend/scripts.php'; ?>
    <script src="../js/validacion.js"></script>
    </body>
</html>