
<?php

class Buscadorper_exe{
    
    public $objCon;


    public function __construct() { 
        
        //nos conectamos a la base de datos...
        require '../../modelo/database.php';
        $this->objCon = new DataBase();
        
    }
    
    
 public function buscar($word = FALSE, $num = FALSE) {
     
     if($num == 1){
         $sth = $this->objCon->prepare('SELECT * FROM persona WHERE cod_documento LIKE "%'.$word.'%" ' );
         $sth->execute();
         return $sth->fetchAll();
     }  else {
       echo "Usuario inexsistente";
     }
 }}
    
    


?>