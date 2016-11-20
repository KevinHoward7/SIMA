<?php

//nos conectamos a la base de datos
require'database.php';
//llamamos a la clase sesiones
require'sessions.php';
//llamamos a la clase usuario
require'users.php';
$objuser = new Users();
$objuser->login_in();



?>