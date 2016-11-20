
<?php

//nos conectamos a la BD

require'../database.php';
$objData = new Database();

//print_r($_POST);

$sth = $objData->prepare('INSERT INTO usuario values (:id_usuario, :usuario, :password, :id_privilegio, :id_persona) ');

$id_usuario='';
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$id_privilegio = '1';
$id_persona = $_POST['id'];





$sth->bindParam(':id_usuario', $id_usuario);
$sth->bindParam(':usuario', $usuario);
$sth->bindParam(':password',sha1(md5($password)));
$sth->bindParam(':id_privilegio', $id_privilegio);
$sth->bindParam(':id_persona', $id_persona);




$sth->execute();

header('location: ../../vista/administrador/panel.php');
?>