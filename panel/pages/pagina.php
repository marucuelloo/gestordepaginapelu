  <link href="assets/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="assets/fileinput.js" type="text/javascript"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
 <link href="https://fonts.googleapis.com/css?family=Bungee|Cambo|Finger+Paint|Frijole|Shadows+Into+Light" rel="stylesheet">
<style>

.aa{
   font-family: 'Frijole', cursive;
  font-size: 100%;

  }
  .a{
   font-family: 'Finger Paint', cursive;
  font-size: 100%;

  }
  .b{
  font-family: 'Cambo', serif;
  font-size: 100%;
  
  }
  .c{
 font-family: 'Bungee', cursive;
  font-size: 100%;
  
  }
  .d{
  font-family: 'Shadows Into Light', cursive;
  font-size: 100%;
  
  } 
</style>       


                            <!-- BEGIN TAB PORTLET-->
<div class="portlet light bordered">

<?php 
if (isset($_GET['edita'])) { 
   $face=$_POST["facebook"]; 
   $twitter=$_POST["twitter"];
   $link=$_POST["link"];
   $footer=$_POST["footer"];
   $fuente=$_POST["fuente"];
   $correo=$_POST["correo"];
   $direccion=$_POST["direccion"];
   $insta=$_POST["instagran"];
   $tel=$_POST["telefono"];
   $id=$_POST["id"];
   $colorb=$_POST["colorb"];
   $colorc=$_POST["colorc"];
   $colort=$_POST["colort"];
   $titulo=$_POST["titulo"];
   $colorf=$_POST["colorf"];

              
$sql="UPDATE `pagina` SET `instagran`='$insta',`face`='$face',`twiter`='$twitter',`link`='$link',`footer`='$footer',`correo`='$correo',`direccion`='$direccion',`telefono`='$tel',`color_titulo`='$colort',`color_boton`='$colorb',`color_contenido`='$colorc',`titulo`='$titulo',`colorf`='$colorf' WHERE `pagina`.`id_pagina` = $id";
 $bd->consulta($sql);

                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';

                             echo '   </div>';
                       
                }

?>                               
                                <div class="portlet-body">
                                   
                                    <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">

                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">Datos Basicos de la página</a>
                                            </li>
                                            <!-- <li >
                                                <a href="#tab2" data-toggle="tab">Imagen de logo</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Imagen de portada</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">favicon</a>
                                            </li> -->
                                           
                                            
                                        </ul>
<div class="tab-content">
  <div class="tab-pane active" id="tab1"> 
    <div class="col-md-12">
      <div class="portlet-body">
          <div class="table-scrollable">
              <table class="table table-striped table-hover">
                <thead>
                      <?php
                       $consulta="SELECT * FROM pagina";
                       $resultado =$bd-> consulta($consulta); 
                       if ($bd->numeroFilas() > 0) {  

                        $bd->consulta($consulta);
                        while ($pagina=$bd->mostrar_registros()) {
                      ?>
                <form role="form" action="?mod=pagina&edita=edita" method="post" enctype="multipart/form-data">              
                    </thead>
                    <tbody>  
                        <th><center>Titulo</center></th>
                        <th><center>Correo Electronico</center></th>
                      <tbody>
                          <tr> 
                            <td>
                               <input class="form-control" type="text" id="exampleInputFile" value="<?php echo $pagina->titulo; ?>"  name="titulo" >
                            </td>
                            <td>
                               <input class="form-control" type="email" id="exampleInputFile"  value="<?php echo $pagina->correo; ?>" name="correo" >  
                            </td>
                           
                          </tr>
                        </div>                 
                      </tbody>
                      <tbody>  
                        <th><center>Color de Fondo</center></th>
                        <th><center>Color-Letras Titulos</center></th>
                      <tbody>
                          <tr> 
                            <td> 
                                  <p style="float: right;">Color Actual: 
                                    <span style="color:#fff; background-color:<?php echo $pagina->colorf; ?>; "> &nbsp; &nbsp; &nbsp;</span> 
                                    
                                  </p><input class="form-control" type="color" id="exampleInputFile"  value="<?php echo $pagina->colorf; ?>" name="colorf" >  
               
                            </td>
                           <td> 
                                  <p style="float: right;">Color Actual: 
                                    <span style="color:#fff; background-color:<?php echo $pagina->color_titulo; ?>; "> &nbsp; &nbsp; &nbsp;</span> 
                                    
                                  </p><input class="form-control" type="color" id="exampleInputFile"  value="<?php echo $pagina->color_titulo; ?>" name="colort" >  
               
                            </td>
                          </tr>
                        </div>                 
                      </tbody>
                      <tbody>  
                        <th><center>Color-letras contenido</center></th>
                        <th><center>Color Componentes</center></th>
                      <tbody>
                          <tr> 
                            <td>
                            <p style="float: right;">Color Actual: 
                                    <span style=" background-color:<?php echo $pagina->color_contenido; ?>; "> &nbsp; &nbsp; &nbsp;</span> 
                            </p>
                               <input class="form-control" type="color" id="exampleInputFile" value="<?php echo $pagina->color_contenido; ?>"  name="colorc" >
                            </td>
                            <td> 
                            <p style="float: right;">Color Actual: 
                                    <span style="background-color:<?php echo $pagina->color_boton; ?>; "> &nbsp; &nbsp; &nbsp;</span> 
                            </p>
                                  <input class="form-control" type="color" id="exampleInputFile"  value="<?php echo $pagina->color_boton; ?>" name="colorb" >  
               
                            </td>
                          </tr>
                        </div>                 
                      </tbody>
                    <tbody>  
                        <th><center>facebook</center></th>
                        <th><center>Twitter</center></th>
                      <tbody>
                          <tr> 
                            <td>
                              <input type="hidden" name="id" value="<?php echo $pagina->id_pagina; ?>">
                               <input class="form-control" type="text" id="exampleInputFile" value="<?php echo $pagina->face; ?>"  name="facebook" >
                            </td>
                            <td> 
                                  <input class="form-control" type="text" id="exampleInputFile"  value="<?php echo $pagina->twiter; ?>" name="twitter" >  
               
                            </td>
                          </tr>
                        </div>                 
                      </tbody>
                          <tbody>  
                        <th><center>Instagran</center></th>
                         <th><center>Telefono</center></th>
                      <tbody>
                          <tr> 
                            <td>
                               <input class="form-control" type="text" id="exampleInputFile" value="<?php echo $pagina->instagran; ?>"  name="instagran" >
                            </td>
                            <td> 
                                  <input class="form-control" type="text" id="exampleInputFile" value="<?php echo $pagina->telefono; ?>"  name="telefono" >
               
                            </td>
                          </tr>
                        </div>                 
                      </tbody> 
                       <th><center>Pie de pagina</center></th>
                        <th><center>Dirección</center></th>   
                      </tr>
                        <tbody>
                          <tr> 
                            <td>
                                  <textarea class="form-control" rows="2"  name="footer"><?php echo $pagina->footer; ?></textarea>
                            </td>
                            <td>
                                   <textarea class="form-control" rows="2"  name="direccion"><?php echo $pagina->direccion; ?></textarea>
                            </td>
                          </tr>                
                        </tbody>  
                        <tbody>
                          <tr> 
                            
                            <td colspan="2"><center>
                                   <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Guardar Cambios</button></center>
                            </td>
                          </tr>                
                        </tbody>  

                   
                     </div>                 
                    </tbody>  
              </table>
                </form>
          </div>
      </div>
    </div>
  </div>
  <div class="tab-pane " id="tab2">
    <div class="col-md-6">
          <input id="input-711" name="logo[]" type="file" multiple class="file-loading">
                <script type="text/javascript">
                $("#input-711").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina; ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                });
                </script>
        </div>  
      <div class="col-md-6"> 
        <div class="note note-info">
        <span>
          
    </span>
                                        <h4 class="block">Imagen de logo</h4>
                                        <p> Para Insertar tu imagen de logo sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Preferilemente Imagenes tipo "PNG" </p>
        </div>
<!-- actualiza el itframe -->
      

      </div>

    </div>
    <!-- foto de portada -->
    <div class="tab-pane" id="tab3">
      <div class="col-md-6">
      <input id="inputportada" name="portada[]" type="file" multiple class="file-loading">
                <script type="text/javascript">
                $("#inputportada").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                });
                </script>
      </div>
<div class="col-md-6"> 
  <div class="note note-info">
                                        <h4 class="block">Imagen de portada</h4>
                                        <p>Para insertar la imagen panorámica, sugerimos lo siguiente:</br>
                                        - Imagen de menos de 1MB de peso.</br>
                                        - Medidas 1080 alto x 7000 de ancho (píxeles).</p>

  </div>
</div>
</div>
    <!-- foto de favicon -->
     <div class="tab-pane" id="tab4">
       <div class="col-md-6">
         <input id="inputfavicon" name="favicon[]" type="file" multiple class="file-loading">

                  <script type="text/javascript">
                  $("#inputfavicon").fileinput({
                      uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                      uploadAsync: true,
                      maxFileCount: 1,
                      showBrowse: false,
                      browseOnZoneClick: true
                  });
                  </script>
        </div>
  <div class="col-md-6"> 
      <div class="note note-info">

                                        <h4 class="block">Imagen para el favicon</h4>
                                        <p>Para insertar la imagen para el favicon, sugerimos lo siguiente:</br>
                                        - Imagen de menos de 1MB de peso.</br>
                                        - Medidas 50px alto x 50px de ancho.</p>
      </div>
    
      </div>

      </div>
    </div>
  </div>
      <?php
  }
}
?>
                                                      
      </div>
    </div>
  </div>
</div>