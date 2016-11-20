<?php
require_once("../default/head_usuario.php");

// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null ;

?>
    <br><br><br><br><br>
<script type="text/javascript">

if (navigator.geolocation) {
  var tiempo_de_espera = 3000;
  navigator.geolocation.getCurrentPosition(mostrarCoordenadas, mostrarError, { enableHighAccuracy: true, timeout: tiempo_de_espera, maximumAge: 0 } );
}
else {
  ("La Geolocalización no es soportada por este navegador");
}

function mostrarCoordenadas(position) {
  ("Latitud: " + position.coords.latitude + ", Longitud: " + position.coords.longitude);


}

function mostrarError(error) {
  var errores = {1: 'Permiso denegado', 2: 'Posición no disponible', 3: 'Expiró el tiempo de respuesta'};
  ("Error: " + errores[error.code]);
}



</script>
 
 
     
<div class="container-form-denuncia"><div class="container form-denuncia">
    <div class="row">
        <div class="col-lg-offset-3 col-md-6 col-lg-offset-3">
            <form action="../../modelo/crud_usuario/insertar_denuncia.php" method="post" class="form form-horizontal">
            <?php if($err==1){
                echo "<div class='alert alert-danger'>". "<a href='#'' class='close' data-dismiss='alert' aria-label='close'>"."&times;."."</a>"."Cedula de Identidad Inexistente"."</div>"."<br />";
            }
            
            ?>
                <div>
                    <h2 class="text-center">Denuncia</h2>
                </div>
                <div class="form-group">
                    <label for="ci">Cedula de Identidad:</label>
                    <input type="text" class="form-control" name="ci" id="ci" placeholder="Ingrese su nro de cedula de identidad">
                </div>

                <?php
require'../../modelo/database.php';
$objData = new Database();
$sth2 = $objData->prepare('SELECT * FROM procedencia');
$sth2->execute();
$result = $sth2->fetchAll();

?>
                <div class="form-group">
                    <label for="tipoDenuncia">Procedencia:</label>
                    <select name="id_procedencia" id="id_procedencia" class="form-control">
                    <option value="">Seleccion una opcion </option>
                  <?php foreach ($result as $key => $value){  ?>
                    <option value="<?php echo $value['id_procedencia']; ?>"><?php echo $value['des_procedencia']; }?></option>
                       
                     
                    </select>
                </div>


                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Ingrese su fecha de nacimiento">
<!--                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Ingrese sus fecha de nacimiento">-->
                </div>

<?php

$sth = $objData->prepare('SELECT * FROM tipo_delito');
$sth->execute();
$result = $sth->fetchAll();
?>

                <div class="form-group">
                    <label for="tipoDenuncia">Tipo de Denuncia:</label>
                    <select name="id_tipo_delito" id="id_tipo_delito" class="form-control">
                    <option value="">Seleccion una opcion </option>
                    <?php foreach ($result as $key => $value){  ?>
                    <option value="<?php echo $value['id_tipo_delito']; ?>"><?php echo $value['des_delito'];}?></option>
                       
                     
                    </select>
                </div>


                <div class="form-group">
                    <label for="desc">Descripción:</label>
                    <textarea name="desripcion_denuncia" id="desripcion_denuncia" cols="30" rows="10" class="form-control" placeholder="Ingrese la descripción de su Denuncia..."></textarea>
                </div>

               
                <div class="form-group">
                    <label for="img">Subir Imágen:</label>
                    <input type="file" name="imgen_denuncia" id="imgen_denuncia" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="button" id="button" class="btn btn-primary center-block">
                </div>



            </form>
        </div>
    </div>
</div></div>


<?php
require_once("../default/footer_usuario.php");
?>