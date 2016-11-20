 <form name="crud"  method="post" action="../../modelo/crud_admin/modificarusu_exe.php" id="actualidarDatos">
<div class="modal fade" id="EditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Usuario</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
          <div class="form-group">
            <label for="codigo" class="control-label">Codigo de Documento:</label>
            <input type="hidden" class="form-control" id="idper" name="idper" readonly="readonly">
            <input type="hidden" class="form-control" id="id" name="id" readonly="readonly">
            <input type="text" class="form-control" id="cod_documento" name="cod_documento" readonly="readonly">
		  </div>
		  <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
		  </div>
		  <div class="form-group">
            <label for="codigo" class="control-label">Contraseña:</label>
            <input type="text" class="form-control" id="password" name="password" readonly="readonly">
		  </div>
        <div class="form-group">
		<label for="select" class="col-lg-2 control-label">Privilegio:</label>
        <select class="form-control" id="id_privilegio" name="id_privilegio">
        
         <option value="1">Administrador</option>
          <option value="2">Usuario</option>
          
        </select>
          </div>
       
           
           <input type="submit" value="MODIFICAR" class="btn btn-block btn-primary" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
</form>