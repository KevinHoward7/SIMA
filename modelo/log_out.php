<?php

require'sessions.php';

$objSe = new Sessions();
$objSe->init();
$objSe->destroy();

header('location: ../index.php');

