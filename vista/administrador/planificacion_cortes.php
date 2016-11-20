<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        html, body { height: 70%; margin: 0; padding: 0; }
        #map { height: 70%; }
    </style>

</head>
<body>

<?php
require_once("../default/head_usuario.php");
require_once("../../modelo/database.php");
$objData = new Database();
?>

    <div class="container">
        <label>
            <h1>
                PLANIFICACION CORTES
            </h1>
        </label>

        <div class="form-group">
            <label for="form_planificaciones" class="col-lg-2 control-label"></label>
            <div class="col-lg-8">
                <table>

                    <td class="col-lg-3">
                        <select class="col-lg-4 form-control" id="dias" name="dias" >
                            <?php
                            $sth = $objData->prepare('SELECT * FROM `tipo_dia` ORDER BY id_tipo_dia ASC');
                            $sth->execute();
                            $result = $sth->fetchAll();
                            foreach ($result as $key => $value){
                                ?>
                                <option value="<?php echo $value['id_dia']; ?>"><?php echo $value['des_tipo_dia']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </td>
                    <td class="col-lg-3">
                        <div class="input-group">
                            <input type="time" class="form-control" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">HORA : MINUTO</span>
                        </div>
                    </td>
                    <td>
                        <select class="col-lg-6 form-control" id="sectores" name="sectores" >
                            <?php
                            $sth = $objData->prepare('SELECT * FROM `sectores` ORDER BY id_sector ASC');
                            $sth->execute();
                            $result = $sth->fetchAll();
                            foreach ($result as $key => $value){
                                ?>
                                <option value="<?php echo $value['id_sector']; ?>"><?php echo $value['nombre sector']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <tr>
                        <input class="form-control" type="text" id="lat" />
                        <input class="form-control" type="text" id="lng" />
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <body>

    <div id="map" class="col-lg-3">
    </div>
    <script type="text/javascript">
        var marker;          //variable del marcador
        var coords = {};    //coordenadas obtenidas con la geolocalización

        //Funcion principal
        initMap = function ()
        {

            //usamos la API para geolocalizar el usuario
            navigator.geolocation.getCurrentPosition(
                function (position){
                    coords =  {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude
                    };
                    setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa


                },function(error){console.log(error);});

        }



        function setMapa (coords)
        {
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 13,
                    center:new google.maps.LatLng(coords.lat,coords.lng),

                });

            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(coords.lat,coords.lng),

            });
            //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica
            //cuando el usuario a soltado el marcador
            marker.addListener('click', toggleBounce);

            marker.addListener( 'dragend', function (event)
            {
                //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("lat").value = this.getPosition().lat();
                document.getElementById("lng").value = this.getPosition().lng();
            });
        }

        //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }


    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANII3qEaGwy_z2mDXDTjZKAi77epgnTiE&callback=initMap">
    </script>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
require_once("../default/footer_usuario.php");
?>