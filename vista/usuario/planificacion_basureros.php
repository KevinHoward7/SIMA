<?php
require_once("../default/head_usuario.php");
?>

    <body>

    <div id="map" style="width:100%;height:600px"></div>

    <script>
        var map = null;
        var infoWindow = null;

        function openInfoWindow(marker) {

            var markerLatLng = marker.getPosition();
            infoWindow.setContent([
                '<strong>Arrástrame para actualizar la posición.</strong><br/>',
                'Consulta si hay camiones de basura cerca de ti<br/>',
                'arrastrando el marcador hasta tu ubicacion'
            ].join(''));
            infoWindow.open(map, marker);

            $.ajax({
                type: "POST",
                url: "procesamientoCoordenadas.php",
                data: { 'latitud': markerLatLng.lat(), 'longitud': markerLatLng.lng() },
                success: function (data) {
                    var arr = JSON.parse(data);
                    alert(arr.mensaje);
                },
                datatype: "json"
            });
        }

        function initialize() {
            var myLatlng = new google.maps.LatLng(-16.5207124,-68.1240775);

            var mapProp = {
                center:new google.maps.LatLng(-16.5207124,-68.1240775),
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP,
                // Style for Google Maps
                styles: [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":30},{"gamma":0.5},{"hue":"#435158"}]}]
            };

            map = new google.maps.Map(document.getElementById("map"),mapProp);
            infoWindow = new google.maps.InfoWindow();
            // Marker
            var marker = new google.maps.Marker({
                position: myLatlng,
                draggable: true,
                map: map,
                title:"Ejemplo marcador arrastrable"
            });

            google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
            google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
        }

        $(document).ready(function() {
            initialize();
        });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANII3qEaGwy_z2mDXDTjZKAi77epgnTiE"></script>

    </body>

<?php
require_once("../default/footer_usuario.php");
?>