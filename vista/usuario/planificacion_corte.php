<?php
require_once("../default/head_usuario.php");
require_once("../../modelo/database.php");
$objData = new Database();
?>
<?php

$sth = $objData->prepare('SELECT planificacion_corte.fecha_hora_inicio, planificacion_corte.fecha_hora_fin, zonas.nombre_zona


FROM planificacion_corte JOIN sectores ON sectores.id_sector = planificacion_corte.id_sector JOIN zonas ON zonas.id_zona = sectores.id_zona 
');

?>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th><h3>Fecha - Hora Inicio</h3></th>
                <th><h3>Fecha - Hora Fin</h3></th>
                <th><h3>Zona</h3></th>


            </tr>

                    <?php
                    $sth->execute();
                    $result = $sth->fetchAll();
                    $id = 1;
                    foreach ($result as $key => $value){
                        ?><tr class="table table-hover">
                            <th><?php echo $id?></th>
                            <th><?php echo $value['fecha_hora_inicio']?></th>
                            <th><?php echo $value['fecha_hora_fin']?></th>
                            <th><?php echo $value['nombre_zona']?></th>
                        </tr>
                        <?php
                        $id++;
                    }
                    ?>

            </thead>
            <tbody>
            <tr>

            </tr>
            </tbody>
        </table>
    </div>
    <br><br><br><br><br>    <br><br><br><br><br>


<?php
require_once("../default/footer_usuario.php");
?>