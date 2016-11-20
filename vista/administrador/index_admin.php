      
      <?php
      //se invoca al menu y cabecera del html
      require_once("../default/head_admin.php"); 
      ?>
      <?php
      //se referencia la BD
      require'../../modelo/database.php';
      $objData                      = new Database();
      //Se realiza la consulta
      $sth                          = $objData->prepare('SELECT *
      FROM persona WHERE id_persona = :id_persona');
      //Se realiza la comparacion de campos
      $sth->bindParam(':id_persona',$id_per);
      //se ejecuta la consulta
      $sth->execute();
      //se guardan los datos en un array
      $result4                      = $sth->fetchAll();
      ?>
      <div class                    ="container">
      <fieldset>
      <legend>Datos del Usuario</legend>
      <?php
      
      if($result4){
      //se imprimen los datos del array 
      foreach ($result4 as $key     => $value) {?>
      
      <label>Cedula de Identidad:</label>
      <?php echo $value['cedula_identidad'];?><br>
      <label>Nombres:</label>
      <?php echo $value['nombres'];?><br>
      
      <label>Apellidos:</label>
      <?php echo $value['apellido_p'].$value['apellido_m'];?><br>
      <label>Usuario:</label>
      <?php echo $nameU;?><br>
      <label>Direccion:</label>
      <?php echo $value['direccion'];?><br>
      <label>Fecha de Nacimiento:</label>
      <?php echo $value['fecha_nacimiento'];?><br>
      <?php }}?>                                      
      </fieldset>    
      </div>
      <?php
      // se invoca al footer de la pagina
      require_once("../default/footer_admin.php");
      ?>