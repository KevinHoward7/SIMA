                          <form name="crud"  method="post" action="../../modelo/crud_admin/nuevousu_exe.php">
                            <div class="modal fade" id="RegistroUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Registrar Usuario</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div id="datos_ajax"></div>
                                    <div class="form-group">
                                      <label for="codigo" class="control-label">Codigo de Documento:</label>
                                      <input type="hidden" class="form-control" id="id" name="id" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                      <label for="codigo" class="control-label">Codigo de Documento:</label>
                                      <input type="text" class="form-control" id="cod_documento" name="cod_documento" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                      <label for="email" class="control-label">Usuario:</label>
                                      <input type="email" class="form-control" name="usuario" id="usuario">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="codigo" class="control-label">Contraseña:</label>
                                      <input type="text" class="form-control" name="password" id="password" >
                                    </div>
                                    
                                    
                                    
                                    <br><br><br>
                                    <input type="submit" value="REGISTRAR" class="btn btn-block btn-success" />
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>