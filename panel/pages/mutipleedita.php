<script LANGUAGE="JavaScript">
function confirmDel(url){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminarlo se eliminara todo el contenido ?"))
    window.location.href = url;
else
    return false ;
}
</script>




<?php
 
  $x22=$_GET["codigos"];
  $x11=$_GET["codigo"];
  $foto=$_GET["foto"];

if (isset($_GET['eliminar'])) { 
      $x22=$_GET["codigos"];
      $x11=$_GET["codigo"];
      $foto=$_GET["foto"];
             
  if( $foto=="" )
                {
                
   
                    
                }
            else
                {

                $consulta="SELECT * FROM galeria where id_galeria='$foto'";
                $bd->consulta($consulta);
                while ($fila=$bd->mostrar_registros()) { 
                    
                            
                              $elimina=$fila->nomimg;
                              $tipoimg=$fila->tipoimg;

}
if($tipoimg==1){
unlink('../img/'.$elimina.'');//acá le damos la direccion exacta del archivo
}

$sql="delete from galeria where id_galeria='$foto'";
$bd->consulta($sql);


                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... </div>';



}

}








 if (isset($_GET['edita2'])) { 
      $x22=$_GET["codigos"];
      $x11=$_GET["codigo"];
      $foto=$_GET["foto"];
      $des=$_POST["des"];
      $foto2=$_FILES["imagen"]["name"];
      $urll=$_POST["url"];


$ver="SELECT nomimg FROM `galeria` WHERE id_galeria='$foto'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 

         $a=$fila->nomimg;
}


 $nom='$a';

 if($foto2!="" )
                {

$foto=$_FILES["imagen"]["name"];
                        $fototmp = $_FILES["imagen"]["tmp_name"];


                         
                            ini_set('memory_limit', '512M');

                           

                            copy($fototmp,"images".$foto);
                            $thumb=new thumbnail("images".$foto);
                            $thumb->size_width(600);//setea el ancho de la copia
                          
                            $thumb->save("../img/$a");            //guardarla en el servidor
                                           



}



//$sql="UPDATE catalogo SET contenido='$contenido' where id_catalogo='$x1'";  
//$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";   ,imgfondo='$nom',imgprincipal='$nom2',img1='$nomimg1', img2='$nomimg2', img3='$nomimg3',url='$url'
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente...  por favor verificar revisando la pagina web ';

                               echo '   </div>';



}

?>



 <div class="row">
     <div class="col-md-12">
       



 
<div id="Info"></div>
<div id="Info2"></div>

<script>
function myFunction() {
    location.reload(true);
}
</script>

 <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Editar Galerias</span>
                                    </div>
                                    <div class="tools"> 
                             
  <button class="btn red btn-outline sbold" onclick="myFunction()">Actualizar Cambios</button></div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                           
                                                <th class="all">Titulo</th>
                                                 <th class="min-phone-l">Tipo de archivo</th>
                                                <th class="min-phone-l">Editar</th>
                                                <th class="min-phone-l">Descripción</th>
                                               
                                                <th class="none">Eliminar</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php




                      $consulta="SELECT * FROM galeria where id_catalogo='$x11'";
                      $bd->consulta($consulta);
                      while ($fila=$bd->mostrar_registros()) { 
                        $id=$fila->id_galeria;
                                ?>   

                                            <tr>
                                                 <td>
 <?php  if($fila->tipoimg==1){
              echo '<IMG SRC="../img/'.$fila->nomimg.'" WIDTH=80 HEIGHT=80 BORDER=2>';
            }else{
            echo '<IMG SRC="../panelcatalogo/img/youtubepanelz.jpg" WIDTH=80 HEIGHT=80 BORDER=2>';
            }
            ?>
            </td>
              <td>   
  
          <?php  if($fila->tipoimg==1){
                echo "IMAGEN"; 
            }else{
                echo "VIDEO"; 
            }
            ?>
           
    
            </td>
<td>
<!-- <form method="post" action="?mod=mutipleedita&edita2&codigos=<?php echo  $x22 ?>&codigo=<?php echo  $x11 ?>&foto=<?php echo  $fila->id_galeria ?>" enctype="multipart/form-data"> -->

 <?php  if($fila->tipoimg==1){
?>
    <a class="btn red btn-outline sbold" data-toggle="modal" href="#<?php echo $id  ?> ">Editar Imagen</a>

<div class="modal fade" id="<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Editar Imagenes de Galeria</h4>
                                                </div>
                                                <div class="modal-body"> Cambiaras la siguiente imagen <img width="50px" src="../img/<?php echo  $fila->nomimg ?>"></div>
                                                <div class="modal-footer">
                                               
                                                <input id="fondo<?php echo  $id ?>" name="galeria[]" type="file" multiple class="file-loading">
                         

                                                  <script type="text/javascript">
                                                 $("#fondo<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo2=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 1,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true,


                                                  });
                                                  </script>


                                                
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div><?php
                // echo '<input type="file" name="imagen" value="imagen" >'; 
               // echo '<button type="submit" class="btn btn-primary" name="editar" id="editar" value="Editar"><i class="fa fa-pencil"></i></button>'; ?>
             <!--   </form> -->
         <?php   }else{?>
<input  id="username<?php echo $id  ?>2" class=" form-control input-circle" type="text" value="<?php echo  $fila->url ?>" required placeholder="Codigo de Registro" name="codigo" /> 

   
                              <script type="text/javascript">
                              $(document).ready(function() {  
                              $('#username<?php echo $id  ?>2').blur(function(){
                                  
                                  $('#Info').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

                                  var username = $(this).val();       
                                  var dataString = 'username='+username;
                                  
                                  $.ajax({
                                      type: "POST",
                                      url: "ajax/editarvideo.php?codigo=<?php echo  $id ?>",
                                      data: dataString,
                                      success: function(data) {
                                          $('#Info').fadeIn(1000).html(data);
                                          //alert(data);
                                      }
                                  });
                              });              
                          });    
                          </script>
            

<?php 
                 // echo '<input  class="form-control" type="text" name="url" value="'.$fila['url'].'" ><br>'; 
            }
            ?>

</td>
 

    <td>

    <textarea  maxlength="50" id="username<?php echo $id  ?>" class=" form-control input-circle" type="text" value="<?php echo  $fila->des ?>" required placeholder="Descripcion" name="codigo"><?php echo  $fila->contenido ?> <?php echo  $fila->des ?></textarea>
                              <script type="text/javascript">
                              $(document).ready(function() {  
                              $('#username<?php echo $id  ?>').blur(function(){
                                  
                                  $('#Info').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

                                  var username = $(this).val();       
                                  var dataString = 'username='+username;
                                  
                                  $.ajax({
                                      type: "POST",
                                      url: "ajax/editardes.php?codigo=<?php echo  $id ?>",
                                      data: dataString,
                                      success: function(data) {
                                          $('#Info').fadeIn(1000).html(data);
                                          //alert(data);
                                      }
                                  });
                              });              
                          });    
                          </script>
            </td>

                                               
                                 
                              <td>  <a onclick="if(confirmDel() == false){return false;}" class="btn btn-danger" href="?mod=mutipleedita&eliminar&codigos=<?php echo  $x22 ?>&codigo=<?php echo  $x11 ?>&foto=<?php echo  $fila->id_galeria ?>"><i class="icon-trash"></i></a>     </td>      
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

                                <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>