<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 19/11/2016
 * Time: 5:02 PM
 */
require'../../modelo/database.php';
$objData = new Database();

$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$tiempo = date('h:i:s', time());
$data = array();
$data['mensaje'] = null;

//$sth = $objData->prepare('SELECT * FROM zonas WHERE ST_CONTAINS(zonas.coordenadas, POINT(:longitud, :latitud))');
$sth = $objData->prepare('SELECT * FROM rutas_cbasurero WHERE ST_CONTAINS(rutas_cbasurero.segmentos, POINT(:longitud, :latitud)) AND CURTIME() between rutas_cbasurero.hora_inicio and rutas_cbasurero.hora_fin');
$sth->bindParam(':longitud',$longitud);
$sth->bindParam(':latitud',$latitud);
$sth->execute();
$respuesta = $sth->fetchAll();

if(!empty($respuesta)){
    foreach ($respuesta as $key => $valor){
        $data['mensaje'] = 'El Camión de Basura está cerca de tu ubicación. Puedes depositar tu basura en este momento';
    }
}else{
    $data['mensaje'] = 'No hay camiones de basura cerca de ti en estos momentos';
}

$data['tiempo'] = $tiempo;

//if (isset($_POST['latitud']) and isset($_POST['longitud'])){
//    $data['mensaje'] = 'Las coordenadas son: '.$_POST['latitud'].', '.$_POST['longitud'];
//} else{
//    $data['mensaje'] = 'Error en el procesamiento';
//}

echo json_encode($data);

?>