<?php
require_once("../default/head_admin.php"); 
?>

<?php

//llamamos la clase libros donde vamos a buscar...
require '../../modelo/crud_admin/buscadorper_exe.php';
$objBook = new Buscadorper_exe();

$words = explode(' ',$_POST['word']);
$num = count($words);

$result = $objBook->buscar($_POST['word'], $num);

?>
<div class="container">
            <table border="1" class="table table-striped table-hover ">
             <tr>
        <th>CI</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>Direccion</th>
        <td colspan="2">Acciones</td>
    </tr><?php 
    if($result){
        foreach ($result as $key => $value) {?>
            <tr>

            
                <td><?php echo $value['cedula_identidad'];?></td>
                <td><?php echo $value['nombres'];?></td>
                <td><?php echo $value['apellido_p'].$value['apellido_m'];?></td>
                <td><?php echo $value['fecha_nacimiento'];?></td>
                <td><?php echo $value['direccion'];?></td>
                 <td> 
                       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#RegistroUsuarios" data-ci="<?php echo $value['cedula_identidad'];?>" data-id="<?php echo $value['id_persona'];?>"><i class='glyphicon glyphicon-plus'></i> Seleccionar</button>     
                       <?php require_once('modals/modal_registrarusu.php');
                     ?>                               
</td>
            </tr>
            <?php
        
        }
    }else{?>
        <tr>
            <td colspan="7">No hubo ningun resultado...</td>
        </tr>
        <?php
        
    }
    ?>
            
        </table>     
        
          
</div>
<!DOCTYPE html>
<?php
require_once("../default/footer_admin.php"); 
?>