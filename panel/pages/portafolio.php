<script LANGUAGE="JavaScript">
function confirmDel(url){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminar este catalogo ?"))
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
    echo "<script> alert('campos vacios')</script>";
                    echo "<br>";                    
                }
        else
           {
$sql2="delete from galeria where id_catalogo='$x1'";
$bd->consulta($sql2);

$sql="delete from catalogo where id_catalogo='$x1'";
$bd->consulta($sql);
//$sql3="delete from galeria where id_catalogo='$x2'";
//$bd->consulta($sql3);
//echo "Datos Guardados Correctamente";
  echo '<div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Bien!</b> Se Elimino Correctamente... </div>';
}
}
 $x2=$_GET["codigos"];

if (isset($_GET['lista'])) { 

   $x2;
   $titulo=$_POST["titulo"];
   $contenido=$_POST["contenido"];
   $imgfondo=$_POST["imgfondo"];
   $imgprincipal=$_POST["imgprincipal"];
   $img1=$_POST["img1"];  
   $img2=$_POST["img2"]; 
   $img3=$_POST["img3"];
   $url=$_POST["url"];


    $foto=$_FILES["foto"]["name"];
    $fotoperfil=$_FILES["imgprincipal"]["name"];
    $fotoimg1=$_FILES["img1"]["name"];      
    $fotoimg2=$_FILES["img2"]["name"];
    $fotoimg3=$_FILES["img3"]["name"];      

if($titulo==""){

                  }else{

     $sql1="SELECT * FROM submodulos where titulo_sub='$titulo' and contenido ='$contenido'";
      $bd->consulta($sql1);
      if ($bd->numeroFilas() > 0) {
                           }else{
  

$sql="INSERT INTO `submodulos` (`titulo_sub`, `contenido`,`id_modulos_id_sub`) VALUES
         ('$titulo', '$contenido','$x2')";                 
$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Registrados Correctamente...  ';

                               echo '   </div>';

}
//litsa cargados 

$ver="SELECT id_submodulos FROM submodulos WHERE titulo_sub='$titulo'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
   $id=$fila->id_submodulos;
}
?>
           <div class="portlet-body">
                                   
                                    <div class="tabbable tabbable-tabdrop">
                                       <ul class="nav nav-tabs">
                                            <li >
                                                <a href="#tab1" data-toggle="tab">Datos del Proyecto</a>
                                            </li>
                                            <li class="active">
                                                <a href="#tab2" data-toggle="tab">Imagen  </a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Logo</a>
                                            </li>
                                        </ul>

<div class="tab-content">
          <div class="tab-pane " id="tab1">
            <div class="col-md-12">
              <div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                    <form role="form" action="#" method="post" enctype="multipart/form-data">
                    
                        <th><center>Titulo de seccion</center></th>
                        <th><center>Contenido</center></th>                  
                    </thead>
                    <tbody>
                    <tr> 
                        <td>
                        <center>
                           <?php echo  $titulo ?>
                           </center>
                        </td>
                        <td>
                        <center>
                           <?php echo  $contenido ?>
                        </center>
                        </td>
                        </tr>
                        </tbody>
                            </center>
                           </form>
                          </tr>
                        </thead>
                    </table>
                  </div>
                </div>


            </div>
          </div>
<!--imagen principal-->
      <div class="tab-pane active" id="tab2">
        <div class="col-md-6">
          <input id="input-711" name="imagenprin[]" type="file" multiple class="file-loading">
            <script type="text/javascript">
                $("#input-711").fileinput({
                    uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                }).on('fileuploaded', function(event, data, previewId, index) {
                    $.ajax({
                      type: "GET",
                      url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                      success: function(data) {
                        $('#Info').fadeIn(1000).html(data);
                      }
                    });
                }) ;

              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              });    

          </script>
        </div>  
            <div class="col-md-6"> 
              <div class="note note-info">
                                        <h4 class="block">Imagen Principal</h4>
                                        <p>Registra la imagen de Principal Para  que sea la que representa tu modulo sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - imagenes ancahas ejemplo 800*1600 </p>
              </div>
            </div>
      </div>

      <div class="tab-pane " id="tab3">
          <div class="col-md-6">
                                                    
                                                    
                                                </div>
                                                <center><div class="modal-body">Icono <span class="icono"><i id="icon_<?php echo $id  ?>" class="fa"></i></span></div></center>
                                                <div class="modal-footer"> 
                                                                                                          
                                                <select class="form-control input-circle" name="select" id="select_<?php echo $id  ?>">
                                                  <option value="fa-equipo">Equipo</option>
                                                  <option value="fa-empresa">Empresa</option>
                                                  <option value="fa-capacitacion">Capacitacion</option>
                                                  <option value="fa-sirena">Sirena</option>
                                                  <option value="fa-buceo">Buceo</option>
                                                  <option value="fa-buceo-c">Buceo cientifico</option>
                                                  <option value="fa-mision">Mision</option>
                                                  <option value="fa-vision">Vision</option>
                                                </select>
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
                                                    
              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              });  
                                                  
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
        <div class="col-md-6"> 
         
                                  
                   <a class="btn red btn-outline sbold derecha" data-toggle="modal" href="?mod=crear">Completado </a>                
                                     
          
        </div>
      </div>


</div>      

<div class="col-md-12"> 
</br>
           <div id="Info"></div>
           </div>       


<?php
}
     
}
//editar titulo


  if (isset($_GET['nuevo'])) { 

?>
  
           <div class="portlet-body">
                                   
                                    <div class="tabbable tabbable-tabdrop">
                                       <ul class="nav nav-tabs">

                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">Subcategorias de modulos</a>
                                            </li>
                                            
                                            
                                        </ul>
<div class="tab-content">
          <div class="tab-pane active" id="tab1">
            <div class="col-md-12">
              <div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                    <form role="form" action="?mod=portafolio&lista=lista&codigos=<?php echo $x2?>" method="post" enctype="multipart/form-data">
                    <center>
                        <th>Titulo </th>
                        <th>Contenido</th>                  
                    </thead>
                    <tbody>
                    <tr> 
                                          <td>
                            <input   type="text" required type="tex" name="titulo" required class="form-control"> 
                        </td>
                        <td>
                           <textarea class="form-control" rows="2"  name="contenido"></textarea>
                       
                        </td>
                        </tr>
                         <tr> 
                        
                        <td>
                           
                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Registrar Subcategoria</button>
                       
                        </td>
                        </tr>
                        </tbody>
                            </center>
                           </form>
                          </tr>
                        </thead>
                    </table>
                  </div>
                </div>


            </div>
          </div>

     
</div>      
<?php
}
?>
   



<!-- Mas scripts en -->

<!-- END QUICK SIDEBAR -->



                         </div>

                         </div>
                              </div>