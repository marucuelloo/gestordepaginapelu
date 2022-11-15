
<script src="https://use.fontawesome.com/ea122af098.js"></script>
<link rel="stylesheet" href="./css/fonts.css">
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

                       
if( $x1=="" )
                {             
    echo "
   <script> alert('campos vacios')</script>";
                    echo "<br>";                    
                }
        else
           {


 $consulta="SELECT * FROM submodulos where id_submodulos='$x1'";
 $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) { 
        
                 
                      $imagen=$fila->imagen_sub;
                   

      if($imagen!="" ){
     unlink('../galeria/'.$imagen.'');
    
     }
}
 $consulta="SELECT * FROM subgaleria where id_subgaleria_id_subcategoria='$x1'";
 $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) { 
        
                  
                      $imagen2=$fila->nombre_img;
                   

      if($imagen!="" ){
     unlink('../galeria/'.$imagen2.'');
    
     }

 }

$sql2="delete from subgaleria where id_subgaleria_id_subcategoria='$x1'";
$bd->consulta($sql2);
 

$sql2="delete from submodulos where id_submodulos='$x1'";
$bd->consulta($sql2);


//$sql3="delete from galeria where id_catalogo='$x2'";
//$bd->consulta($sql3);
//echo "Datos Guardados Correctamente";
  echo '<div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Bien!</b> Se Elimino Correctamente... </div>';
}
}
?>


<?php
 $x2=$_GET["codigos"];

?>
      
 <div class="row">
     <div class="col-md-12">
      <div id="Info"></div>
      <div id="Info2"></div>  
<?php

 $consulta="SELECT * FROM modulos  where modulos.id_modulo='$x2'";
  $bd->consulta($consulta);
  $proyecto="";

  while ($fila=$bd->mostrar_registros()) { 
    $proyecto= $fila->nombre;
  }
 $consulta="SELECT * FROM modulos  where modulos.id_modulo='$x2'";
 $bd->consulta($consulta);

?>
 <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Contenido del modulo:<b style="color: #2889b9"> <?php echo  $proyecto ?> </b></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                           
                                                <th class="all">#</th>
                                                <th class="min-phone-l">Titulo</th>
                                                <th class="min-phone-l">Contenido</th>
                                                <th class="none">Imagenes</th>
                                                <th class="none">Eliminar</th>
                                                


                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php


                      $consulta="SELECT * FROM modulos INNER JOIN submodulos ON modulos.id_modulo=submodulos.id_modulos_id_sub WHERE id_modulo=$x2";
                      $bd->consulta($consulta);
                      while ($fila=$bd->mostrar_registros()) { 
                        $id=$fila->id_submodulos;
                        $id2=$fila->id_modulo;
                                ?>   

                            <tr data-id="<?php echo  $id ?>">
                           <td><?php echo  $fila->titulo_sub; ?></td>
                          <td>  <input  id="<?php echo $id,'-titulo_sub'  ?>" class="observeInput form-control input-circle" type="text" value="<?php echo  $fila->titulo_sub ?>" required placeholder="Titulo " name="codigo" />
                              
     
 </td>
    <td>

 <!--    <textarea  id="<?php echo $id,'-contenido'  ?>" class=" form-control input-circle" type="text" value="<?php echo  $fila->contenido; ?>" required placeholder="Codigo de Registro" name="codigo"> <?php echo  $fila->contenido.submodulos; ?>  </textarea> -->
 <textarea id="<?php echo $id,'-contenido'  ?>" class="observeInput form-control input-circle" type="text" value="<?php echo  $fila->contenido ?>" required placeholder="Contenido " name="codigo" /><?php echo  $fila->contenido ?></textarea> 
                            
            </td>

                                               
                                  <td>
                                      <!-- imagen de fondo -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#<?php echo $id2  ?> ">Imagen Fondo </a>
                                 <!-- imagen deperfil -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#imagenprin<?php echo $id  ?>">Imagen Perfil </a>
                                 <!--  imagen de transaccion 1 -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#icono<?php echo $id  ?>">Imagen de Icono </a>
                                 <!-- galeri interna ya esta hecha -->
                                     <a class="btn red btn-outline sbold" data-toggle="modal" href="#galeria<?php echo $id  ?>">Galeria Interna </a>
                                  </td>
                         <td>
                                 <!-- eliminar -->
                                 <a onclick="if(confirmDel() == false){return false;}" class="btn btn-danger btn-lg" href="?mod=portafolioeditar&eliminar=eliminar&codigo=<?php echo  $id; ?>&codigos=<?php echo  $x2 ?>"><i class="icon-trash"></i></a>
                          </td>


                               

                                      <div class="modal fade" id="<?php echo $id2  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Nombre de fondo actual: <n><?php echo  $fila->nombre; ?></n></h4>
                                                </div>
                                                <div class="modal-body">  Imagen de fondo Actual: <img width="80px" src="../galeria/<?php echo  $fila->fondo; ?>">    </div>
                                                <div class="modal-footer">
                                               
                                                <input id="fondo<?php echo  $id ?>" name="fondoedita[]" type="file" multiple class="file-loading">
                         

                                                  <script type="text/javascript">
                                                 $("#fondo<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id2 ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 1,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
                                                  </script>


                                                
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                     



                                       <div class="modal fade" id="imagenprin<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Editar imagen del Submodulo: <?php echo  $fila->titulo_sub; ?></h4>
                                                </div>
                                                <div class="modal-body">Imagen Actual:  <img width="80px" src="../galeria/<?php echo  $fila->imagen_sub; ?>"></div>
                                                <div class="modal-footer">
                                                  
                                                  <input id="perfil1<?php echo  $id ?>" name="imagenprin[]" type="file" multiple class="file-loading">
                                                  <script type="text/javascript">
                                                             $("#perfil1<?php echo  $id ?>").fileinput({
                                                                uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                                uploadAsync: true,
                                                                maxFileCount: 1,
                                                                showBrowse: false,
                                                                browseOnZoneClick: true
                                                            });
                                                   </script>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                       <div class="modal fade" id="galeria<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Cargar Galeria </n></h4>
                                                </div>
                                                <div class="modal-body">Se recomienda un  maximo 10 imagenes.   </div>
                                                <div class="modal-footer">
                                               
                                                <input id="gale<?php echo  $id ?>" name="gale1[]" type="file" multiple class="file-loading">
                         

                                                  <script type="text/javascript">
                                                 $("#gale<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 10,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
                                                  </script>


                                                
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                      <div class="modal fade" id="icono<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Editar Imagen de Icono</h4>
                                                </div>
                                                <center><div class="modal-body">Icono :<span class="icono"><i id="icon_<?php echo $id  ?>" class="fa"></i></span></div></center>
                                                <div class="modal-footer"> 
                                                <input class="form-control input-circle" name="select" id="select_<?php echo $id  ?>" value="<?php echo  $fila->icono; ?>">                                               
                                               <!--  <select class="form-control input-circle" name="select" id="select_<?php echo $id  ?>">
                                                  <option value="fa-equipo">Equipo</option>
                                                  <option value="fa-empresa">Empresa</option>
                                                  <option value="fa-capacitacion">Capacitacion</option>
                                                  <option value="fa-sirena">Sirena</option>
                                                  <option value="fa-buceo">Buceo</option>
                                                  <option value="fa-buceo-c">Buceo cientifico</option>
                                                  <option value="fa-mision">Mision</option>
                                                  <option value="fa-vision">Vision</option>
                                                </select> -->
                                                <script type="text/javascript">
                                                    (function(){
                                                      var select = document.querySelector('#select_<?php echo $id  ?>');
                                                      var icon = document.querySelector('#icon_<?php echo $id  ?>');
                                                      var currentIcon = select.value;
                                                      icon.classList.add(currentIcon);
                                                      select.addEventListener('change',(event)=>{
                                                        event.preventDefault();
                                                        icon.classList.remove(currentIcon);
                                                        currentIcon = select.value;
                                                        icon.classList.add(currentIcon);
                                                      });

                                                    })();
                                                  
                                                </script>
                                                  <script type="text/javascript">
                                                  $(document).ready(function() {  
                                                  $('#select_<?php echo $id  ?>').blur(function(){
                                                      
                                                      $('#Info').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

                                                      var username = $(this).val();       
                                                      var dataString = 'username='+username;
                                                      
                                                      $.ajax({
                                                          type: "POST",
                                                          url: "ajax/editar3.php?codigo=<?php echo  $id ?>",
                                                          data: dataString,
                                                          success: function(data) {
                                                              $('#Info').fadeIn(1000).html(data);
                                                              //alert(data);
                                                          }
                                                      });
                                                  });              
                                              });    
                                              </script>

                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                    <!-- /.modal -->
                                            
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
                                                              url: "ajax/editar2.php?codigo="+data[0]+"&datos="+data[1],
                                                              data: dataString,
                                                              success: function(data) {
                                                                  $('#Info').fadeIn(1000).html(data);
                                                                  //alert(data);
                                                              }
                                                          });
                                                      });              
                                                  }); 


   
                                  </script>
                                  

                                  <style type="text/css">
                                  .icono{
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      padding: 5px;
      background: #191919;
      color:white;
      border-radius: 5px;
      font-size: 24px;
    }
    #select{
      padding: 5px;
      border-radius: 5px;
    }
  </style>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>