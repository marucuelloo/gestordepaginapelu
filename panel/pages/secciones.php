
<script LANGUAGE="JavaScript">
  function confirmDel(url){
  //var agree = confirm("¿Realmente desea eliminarlo?");
  if (confirm("¿Realmente desea eliminar este proyecto se eliminara todo su contenido y galerias ?"))
      window.location.href = url;
  else
      return false ;
  }
</script>
<?php 
  if (isset($_GET['eliminar'])) { 
  $x1=$_GET["codigo"];            
        if( $x1=="" ){             
            echo "
           <script> alert('campos vacios')</script>";
                            echo "<br>";                    
                        }
                else
                   {
                     $consulta="SELECT * FROM sessiones where id_sessiones='$x1'";
                     $bd->consulta($consulta);
                     while ($fila=$bd->mostrar_registros()) { 
                                 $elimina=$fila->imagen;
                              }
                                        unlink('../img/'.$elimina.'');//acá le damos la direccion exacta del archivo
   
              $sql2="delete from sessiones where id_sessiones='$x1'";
              $bd->consulta($sql2);

                echo '<div class="alert alert-success alert-dismissable">
                      <i class="fa fa-check"></i>
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Bien!</b> Se Elimino Correctamente... </div>';
            
        }
      }
?>

      
<div class="row">
        

  <div class="col-md-12">
    <div id="Info"></div>
      <div id="Info2"></div>  
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Contenido de secciones de pagina en <b style="color: #2889b9"><?php echo $idioma="Español";?></b></span>
            </div>
            <div class="tools"> </div>
          </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="all"></th>
                            <th class="min-phone-l">Titulo</th>
                            <th class="min-phone-l">Contenido</th>
                            <th class="min-phone-l">Link</th>
                           <!--  <th class="min-phone-l">Color de fondo</th> -->
                            <!-- <th class="none">Imagen</th> -->
                            <!-- <th class="none">Ubicacion y estilo</th> -->
                            <th class="none">Eliminar</th>
                        </tr>
                    </thead>
                     <?php 
                      $consulta="SELECT * FROM sessiones where idioma=1";
                      $bd->consulta($consulta);
                      
                    
                      ?>
                    <tbody>
                    <?php
                     
                      while ($fila=$bd->mostrar_registros()) { 
                        $id=$fila->id_sessiones;
                                ?>   

                          <tr >
                          <td ><?php echo  $fila->title_sessiones; ?></td>
                          <td><input  id="<?php echo $id,'-title_sessiones';  ?>" class="observeInput form-control input-circle" type="text" value="<?php echo $fila->title_sessiones; ?>" dato="" required placeholder="Titulo" name="codigo" />
                          </td>
                          <td>
                        
                            <textarea  id="<?php echo $id,'-contenido' ?>" class="observeInput form-control input-circle" type="text" value="<?php echo  $fila->contenido; ?>"  required placeholder="contenido"  name="codigo"> <?php echo $fila->contenido; ?>  </textarea>
                            </td>
                          <td>
                          <input  id="<?php echo $id,'-link'  ?>" class="observeInput form-control input-circle" type="text" value="<?php echo  $fila->link ?>" required placeholder="Link " name="codigo" />
                          </td>
                         
                                   
                         <td>
                                 <!-- eliminar -->
                                 <a onclick="if(confirmDel() == false){return false;}" class="btn btn-danger btn-lg" href="?mod=secciones&eliminar=eliminar&codigo=<?php echo  $fila->id_sessiones; ?>"> <i class="icon-trash"></i></a>
                          </td>



<div class="modal fade" id="<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Nombre de la seccion: <n><?php echo  $fila->title_sessiones; ?></n></h4>
      </div>
        <div class="modal-body">  Imagen Actual: <img width="80px" src="../img/<?php echo  $fila->imagen ?>">    </div>
          <div class="modal-footer">
            <input id="fondo<?php echo  $id ?>" name="imgportada[]" type="file" multiple class="file-loading">
              <script type="text/javascript">
                                                 $("#fondo<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 1,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
              </script>
          </div>
        </div>
      </div>
    </div>

<!--imagen de fondo-->
<div class="modal fade" id="f<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Nombre de la seccion: <n><?php echo  $fila->title_sessiones; ?></n></h4>
      </div>
        <div class="modal-body">  Imagen de fondo actual: <img width="80px" src="../img/<?php echo  $fila->imagenf ?>">    </div>
          <div class="modal-footer">
            <input id="fondof<?php echo  $id ?>" name="imgportadaf[]" type="file" multiple class="file-loading">
              <script type="text/javascript">
                                                 $("#fondof<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 1,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
              </script>
          </div>
        </div>
      </div>
    </div>

    <!--Video de fondo-->
<div class="modal fade" id="v<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Nombre de la seccion: <n><?php echo  $fila->title_sessiones; ?></n></h4>
      </div>
        <div class="modal-body">  Video de fondo</div>
          <div class="modal-footer">
            <input id="fondov<?php echo  $id ?>" name="imgportadav[]" type="file" multiple class="file-loading">
              <script type="text/javascript">
                                                 $("#fondov<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 1,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
              </script>
          </div>
        </div>
      </div>
    </div>


<div class="modal fade" id="<?php echo $id  ?>1" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Posicion Y de : <n><?php echo  $fila->title_sessiones; ?></n></h4>
      </div>
        <div class="modal-body">posicion actual:  <?php echo  $fila->posicion_y; ?>  </div>
          <div class="modal-footer">
              <input  id="<?php echo $id,'-posicion_y'  ?>" class="observeInput form-control input-circle" type="text" value="<?php echo  $fila->posicion_y ?>" required placeholder="Link " name="codigo" />
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="<?php echo $id  ?>2" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Posicion de imagen: <n><?php echo  $fila->title_sessiones; ?></n></h4>
      </div>
        <div class="modal-body">posicion actual:  <?php echo  $fila->posicion_x; ?> </div>
          <div class="modal-footer">
          <select   id="<?php echo $id,'-posicion_x'  ?>" class="observeInput form-control input-circle" type="text"  required  name="codigo">
            <option value="1">Izquierda</option>
            <option value="2">Centro</option>
            <option value="3">Derecha</option>
          </select>
             
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="<?php echo $id  ?>3" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Animacion de imagen: <n><?php echo  $fila->style; ?></n></h4>
      </div>
        <div class="modal-body">Animacion actual:  <?php echo  $fila->style; ?> </div>
          <div class="modal-footer">
          <select   id="<?php echo $id,'-style'  ?>" class="observeInput form-control input-circle" type="text"  required  name="codigo">
            <option value="1">Entrar de arriba</option>
            <option value="2">Centro</option>
            <option value="3">salir de izquierda</option>
            <option value="4">mover al centro</option>
            <option value="5">Video</option>
          </select>
             
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </tr>
   <?php 
          }
          ?>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
              
                                      
                         </div>
                           </div>
                              </div>
                               

<script type="text/javascript">
$(document).ready(function(){


       $(".btn").click(function(){
        $(".modal-identity").text($(this).parents("tr").attr("data-id"));
      });
});
</script>


                                          

                                    <script type="text/javascript">
                                                      $(document).ready(function() {  
                                                      $('.observeInput').blur(function(e){
                                                          console.log(e);
                                                          e.preventDefault();
                                                          $('#Info').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

                                                          let username = $(this).val();       
                                                          let dataString = 'username='+username;
                                                          let data = this.id.split('-');
                                                          $.ajax({
                                                              type: "POST",
                                                              url: "ajax/editar.php?codigo="+data[0]+"&datos="+data[1]+"&idioma=<?php echo $idioma; ?>",
                                                              data: dataString,
                                                              success: function(data) {
                                                                  $('#Info').fadeIn(1000).html(data);
                                                                  //alert(data);
                                                              }
                                                          });
                                                      });              
                                                  });    
                                  </script>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>