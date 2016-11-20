
<?php

//nos conectamos a la BD

require'../database.php';
$objData      = new Database();

$sth          = $objData->prepare('UPDATE usuario set usuario = :usuario, password = :password, id_privilegio = :id_privilegio, id_persona = :id_persona WHERE id_usuario = :id_usuario');

$id_usuario   = $_POST['id'];
$id_privilegio = $_POST['id_privilegio'];
$usuario       = $_POST['email'];
$password     = $_POST['password'];
$id_persona   = $_POST['idper'];





$sth->bindParam(':id_usuario', $id_usuario);
$sth->bindParam(':usuario', $usuario);
$sth->bindParam(':password', $password);
$sth->bindParam(':id_privilegio', $id_privilegio);
$sth->bindParam(':id_persona', $id_persona);



$sth->execute();

header('location: ../../vista/administrador/panel.php');

?>