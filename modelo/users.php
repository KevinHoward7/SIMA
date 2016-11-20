<?php

class Users{
    
    public $objDb;
    public $objSe;
    public $result;
    public $rows;
    public $useropc;
    
    public function __construct(){
        
        $this->objDb = new Database();
        $this->objSe = new Sessions();
        
    }
    
    public function login_in(){
        
            $sth = $this->objDb->prepare('SELECT * FROM usuario U inner join privilegio P '
                    . 'on U.id_privilegio = P.id_privilegio WHERE U.usuario = :usuario AND U.password = (:pass)');
            
       $password=$_POST["pass"];
        
//      $pass=sha1(md5($password));
     $pass=($password);
        $sth->bindParam(':usuario', $_POST["usuario"]);
            $sth->bindParam(':pass',$pass);
            
            $sth->execute();
            
            $result = $sth->fetchAll();
            
            if($result){
                
                $profile = $result[0]['des_privilegio'];
                
                switch($profile){
                    case 'Usuario':
                        $this->objSe->init();
                        $this->objSe->set('id_usuario', $result[0]['id_usuario']);
                        $this->objSe->set('usuario', $result[0]['usuario']);
                        $this->objSe->set('password', $result[0]['password']);
                        $this->objSe->set('id_privilegio', $result[0]['id_privilegio']); 
                        $this->objSe->set('id_persona', $result[0]['id_persona']); 
                        
                        header('Location: ../vista/usuario/index_usuario.php');
            break;
                    case 'Administrador':
                          $this->objSe->init();
                        $this->objSe->set('id_usuario', $result[0]['id_usuario']);
                        $this->objSe->set('usuario', $result[0]['usuario']);
                        $this->objSe->set('password', $result[0]['password']);
                        $this->objSe->set('id_privilegio', $result[0]['id_privilegio']); 
                        $this->objSe->set('id_persona', $result[0]['id_persona']); 
                       
                        header('Location: ../vista/administrador/index_admin.php');
            break;
                }
                
            }else{
                header('Location: ../index.php?error=1');
            }       
    }
    
}

?>