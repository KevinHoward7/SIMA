<?php
require_once("../default/head_usuario.php");
?>

<div class="container-form-denuncia"><div class="container form-denuncia">
    <div class="row">
        <div class="col-lg-offset-3 col-md-6 col-lg-offset-3">
            <form action="" method="post" class="form form-horizontal">
                <div>
                    <h2 class="text-center">Denuncia</h2>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese su nombre..">
                </div>


                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos..">
                </div>

                <div class="form-group">
                    <label for="tipoDenuncia">Tipo de Denuncia:</label>
                    <select name="tipoDenuncia" id="tipoDenuncia" class="form-control">
                        <option value="">Foco de Basura</option>
                        <option value="">Fuga de agua</option>
                        <option value="">Otros</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="desc">Descripción:</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" placeholder="Ingrese la descripción de su Denuncia..."></textarea>
                </div>

                <div class="form-group">
                    <label for="date">Fecha y Hora:</label>
                    <input type="datetime-local" name="" id="date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="img">Subir Imágen:</label>
                    <input type="file" name="" id="img" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="" id="" class="btn btn-primary center-block">
                </div>



            </form>
        </div>
    </div>
</div></div>


<?php
require_once("../default/footer_usuario.php");
?>