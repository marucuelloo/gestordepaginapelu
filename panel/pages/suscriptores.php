<div class="row">
        

  <div class="col-md-12">
    <div id="Info"></div>
      <div id="Info2"></div>  
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Suscriptores </b></span>
            </div>
            <div class="tools"> </div>
          </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="all"></th>
                            <th class="min-phone-l">Nombre</th>
                            <th class="min-phone-l">Apellido</th>
                            <th class="min-phone-l">Telefono</th>
                            <th class="none">Correo</th>
                            <th class="none">Fecha de suscripción</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $consulta="SELECT * FROM suscriptores";
                      $bd->consulta($consulta);
                      while ($fila=$bd->mostrar_registros()) { 
                        // $id=$fila->id_sessiones;
                                ?>   
                          <tr>
                            <td><?php echo  $fila->id_suscriptores; ?></td>
                            <td><?php echo  $fila->nombre; ?></td>
                            <td><?php echo  $fila->apellido; ?></td>
                            <td><?php echo  $fila->telefono; ?></td>
                            <td><?php echo  $fila->correo; ?></td>
                            <td><?php echo  $fila->fecha; ?></td>
                           
                          </tr>
                          <?php }
                          ?>
                    </tbody>
                </table>  
            </div>   
          </div>   
        </div>
      </div>
    </div>

                        