<?php
require_once("../default/head_admin.php"); 
?>
<?php
//nos conectamos a la BD
require'../../modelo/database.php';
$objData = new Database();

$sth = $objData->prepare('SELECT * FROM `usuario` INNER JOIN privilegio ON usuario.id_privilegio=privilegio.id_privilegio INNER JOIN persona ON usuario.id_persona=persona.id_persona INNER JOIN procedencia ON persona.id_procedencia=procedencia.id_procedencia');

$sth->execute();

$result2 = $sth->fetchAll();

?>
<div class="container">
           <div class="table-responsive">
            <table border="1" class="table table-striped table-hover ">
            <tr>
                <td colspan="6"><h1>Panel de Administrador</h1></td>
            </tr>
            <tr>
                <td>Cedula de Identidad</td>
                <td>Usuario</td>
                <td>Contraseña</td>
                <td>Privilegio</td>
                <td colspan="2">Acciones</td>
            </tr>
            <?php
            
            if($result2){
                foreach ($result2 as $key => $value2) {?>
            <tr>
           <td><?php echo $value2['cedula_identidad']." ".$value2['des_procedencia'];?></td>
            <td><?php echo $value2['usuario'];?></td>
            <td><?php echo $value2['password'];?></td>
            <td><?php echo $value2['des_privilegio'];?></td>
          
             
             
                                                     
            <td> 
                       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#EditarUsuario" data-idu="<?php echo $value2['id_usuario'];?>"data-idp="<?php echo $value2['id_persona'];?>"   data-email="<?php echo $value2['usuario'];?>" data-password="<?php echo $value2['password'];?>" data-ci="<?php echo $value2['cedula_identidad']." ".$value2['des_procedencia'];?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>     
                       <?php require_once('modals/modal_editar.php');
                     ?>                               
</td>
    
                                        
  
                
            </tr>
            <?php
                
            }
            
                
            }else{?>
            <tr>
                <td colspan="4">No hay registros para mostrar</td>
            </tr><?php
                
            }
            ?>
            
        </table>     
        </div>
        
         <a href="#miventana" class="btn btn-info btn-lg" data-toggle="modal">Registrar Usuario Nuevo</a>
   <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4>Registro de Usuario</h4>
               </div>
               <div class="modal-body">
                  
                    <div class="container">
              <form name="buscador" action="resulbus.php" method="POST">
            <label>Introduzca el numero de Cedula de Identidad:</label>
            <input type="tel" maxlength="7" minlength="7"  name="word" />
            <input type="submit" value="BUSCAR" />
        </form> 
      </div> 

               </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-prymary" data-dismiss="modal">Close</button>
                </div>
           </div>
       </div>
   </div> 
</div>
<?php
require_once("../default/footer_admin.php"); 
?>
