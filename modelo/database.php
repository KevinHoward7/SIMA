<?php
//CLASE PARA CONECTAR LA BASE DE DATOS
class Database extends PDO{
    
    public function __construct() {
        try{
            parent::__construct('mysql:host=localhost;dbname=sima','root','');
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (Exception $ex) {
            echo $ex . '<br>';
            die('Error al conectar a la base de datos.');
        }
        
    }
    
}