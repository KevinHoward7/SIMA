
<?php

//nos conectamos a la BD

require'../database.php';
$objData = new Database();
$id_tipo_delito=$_POST['id_tipo_delito'];
$sth = $objData->prepare(' SELECT * FROM `persona` INNER JOIN procedencia ON persona.id_procedencia=procedencia.id_procedencia WHERE persona.cedula_identidad = :cedula_identidad');


$cedula_identidad=$_POST['ci'];
$sth->bindParam(':cedula_identidad', $cedula_identidad);

$sth->execute();
 $result                      = $sth->fetchAll();
  
        foreach ($result as $key => $value){

        	$id_per=$value['id_persona'];
        	$fecha_nac_val=$value['fecha_nacimiento'];
        }
$fecha_nac_nac=$_POST['fecha_nacimiento'];
        if ($fecha_nac_nac == $fecha_nac_val) {
        	$sth = $objData->prepare('INSERT INTO denuncia values (:id_denuncia, :id_tipo_delito, :des_denuncia, :coordenadax_denuncia, :coordenaday_denuncia, :id_persona, :fecha_denuncia, :imagen_denuncia) ');

$id_denuncia='';
$id_tipo_delito=$_POST['id_tipo_delito'];
$desripcion_denuncia=$_POST['desripcion_denuncia'];
$coordenadax_denuncia="-16.5059623";
$coordenaday_denuncia="-68.1327867";
$id_per="5";
$fecha_denuncia=date("Y")."/".date("m")."/".date("d");
$imagen_denuncia="C:/Users/JHASSIR/Documents/IMG_20161017_0001.jpg";


$sth->bindParam(':id_denuncia', $id_denuncia);
$sth->bindParam(':id_tipo_delito', $id_tipo_delito);
$sth->bindParam(':coordenadax_denuncia', $coordenadax_denuncia);
$sth->bindParam(':coordenaday_denuncia', $coordenaday_denuncia);
$sth->bindParam(':des_denuncia', $desripcion_denuncia);
$sth->bindParam(':id_persona', $id_per);
$sth->bindParam(':fecha_denuncia', $fecha_denuncia);
$sth->bindParam(':imagen_denuncia', $imagen_denuncia);
$sth->execute();


header('location: ../../vista/usuario/denuncias.php'); 

        }else{

header('location: ../../vista/usuario/denuncias.php?error=1'); 
        
        }




?>