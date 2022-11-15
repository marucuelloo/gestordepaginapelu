<?php
include '../inc/config.php';
include '../inc/comun.php';

$bd = new GestarBD;

 $x1=$_GET['codigo'];


if($_FILES["imgportada"]!=""){
                    $ver="SELECT imagen FROM sessiones WHERE id_sessiones='$x1'";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $b=$fila->imagen;
                                                             }
            
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["imgportada"]["name"]); $x++)
                          {
                          $file = $_FILES["imgportada"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../img/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 // $gale="fondo_";
                                 // $name2=$gale.$a.$nombre;  
                                 // $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$b;
                                 echo   move_uploaded_file($ruta_provisional, $src);              
                                    }
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["imgportada"]["name"]); $x++)
                                    {
                                     $file = $_FILES["imgportada"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                 //     unlink('../../img/'.$b.'');//acá le damos la direccion exacta del archivo
                                 //       $gale="fondo_";
                                 // $name2=$gale.$a.$nombre;  
                                 // $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$b;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;

if($_FILES["imgportadaf"]!=""){
                    $ver="SELECT imagenf FROM sessiones WHERE id_sessiones='$x1'";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $b=$fila->imagenf;
                                                             }
            
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["imgportadaf"]["name"]); $x++)
                          {
                          $file = $_FILES["imgportadaf"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../img/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 // $gale="fondo_";
                                 // $name2=$gale.$a.$nombre;  
                                 // $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$b;
                                 echo   move_uploaded_file($ruta_provisional, $src);              
                                    }
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["imgportadaf"]["name"]); $x++)
                                    {
                                     $file = $_FILES["imgportadaf"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                 //     unlink('../../img/'.$b.'');//acá le damos la direccion exacta del archivo
                                 //       $gale="fondo_";
                                 // $name2=$gale.$a.$nombre;  
                                 // $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$b;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;

//video de fondo


if($_FILES["imgportadav"]!=""){
                    $ver="SELECT imagenf FROM sessiones WHERE id_sessiones='$x1'";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $b=$fila->imagenf;
                                                             }
            
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["imgportadav"]["name"]); $x++)
                          {
                          $file = $_FILES["imgportadav"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../img/";

                               

                                 // $gale="fondo_";
                                 // $name2=$gale.$a.$nombre;  
                                 // $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$b;
                                 echo   move_uploaded_file($ruta_provisional, $src);              
                                   
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["imgportadav"]["name"]); $x++)
                                    {
                                     $file = $_FILES["imgportadav"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                 //     unlink('../../img/'.$b.'');//acá le damos la direccion exacta del archivo
                                 //       $gale="fondo_";
                                 // $name2=$gale.$a.$nombre;  
                                 // $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$b;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 
                                   }//fin for
                           }//fin else
}//fin edita fondo;




    if($_FILES["fondoedita"]!=""){
                    $ver="SELECT fondo,nombre FROM modulos WHERE id_modulo='$x1'";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $a=$fila->nombre;
                                             $b=$fila->fondo;

                                                             }
            
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["fondoedita"]["name"]); $x++)
                          {
                          $file = $_FILES["fondoedita"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../galeria/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 $gale="fondo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `modulos` SET `fondo` = '$name3' WHERE `modulos`.`id_modulo` = $x1";                 
                                 $bd->consulta($sql);
                                    }
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["fondoedita"]["name"]); $x++)
                                    {
                                    $file = $_FILES["fondoedita"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../galeria/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     unlink('../../galeria/'.$b.'');//acá le damos la direccion exacta del archivo
                                       $gale="fondo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `modulos` SET `fondo` = '$name3' WHERE `modulos`.`id_modulo` = $x1";                 
                                 $bd->consulta($sql);
                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;

    if($_FILES["imagenprin"]!=""){
                    $ver="SELECT titulo_sub,imagen_sub FROM submodulos WHERE id_submodulos=$x1";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $a=$fila->titulo_sub;
                                             $b=$fila->imagen_sub;

                                                             }
              if($a==""){
                  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
                        }
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["imagenprin"]["name"]); $x++)
                          {
                          $file = $_FILES["imagenprin"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../galeria/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 $gale="submodulo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `submodulos` SET `imagen_sub` = '$name3' WHERE `submodulos`.`id_submodulos` = $x1";                 
                                 $bd->consulta($sql);
                                    }
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["imagenprin"]["name"]); $x++)
                                    {
                                    $file = $_FILES["imagenprin"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../galeria/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                      unlink('../../galeria/'.$b.'');//acá le damos la direccion exacta del archivo
                                       $gale="submodulo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `submodulos` SET `imagen_sub` = '$name3' WHERE `submodulos`.`id_submodulos` = $x1";                 
                                 $bd->consulta($sql);
                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;

   if($_FILES["icono"]!=""){
                    $ver="SELECT titulo_sub,icono FROM submodulos WHERE id_submodulos=$x1";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $a=$fila->titulo_sub;
                                             $b=$fila->icono;

                                                             }
              if($a==""){
                  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
                        }
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["icono"]["name"]); $x++)
                          {
                          $file = $_FILES["icono"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../galeria/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 $gale="logo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `submodulos` SET `icono` = '$name3' WHERE `submodulos`.`id_submodulos` = $x1";                 
                                 $bd->consulta($sql);
                                    }
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["icono"]["name"]); $x++)
                                    {
                                    $file = $_FILES["icono"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../galeria/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     unlink('../../galeria/'.$b.'');//acá le damos la direccion exacta del archivo
                                      $gale="logo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `submodulos` SET `icono` = '$name3' WHERE `submodulos`.`id_submodulos` = $x1";                 
                                 $bd->consulta($sql);
                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;
if($_FILES["gale1"]!=""){

 $x1=$_GET['codigo'];
 $ver="SELECT * FROM submodulos WHERE id_submodulos='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
      $a=$fila->titulo;

}

   $reporte = null;
     for($x=0; $x<count($_FILES["gale1"]["name"]); $x++)
    {
    $file = $_FILES["gale1"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    $codigo = $_GET["codigo"];


    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../galeria/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
   
    else
    {

 $gale="gale_interna";
    $name2=$gale.$a.$nombre;  

$name3 = preg_replace('[\s+]','', $name2);
         $src = $carpeta.$name3;
       echo  move_uploaded_file($ruta_provisional, $src);
$codigo;


   //  $query = "INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   // ('$codigo', '1', '$name3')";

   $query = "INSERT INTO `subgaleria` (`id_subgaleria`, `nombre_img`, `id_subgaleria_id_subcategoria`) VALUES (NULL, '$name3', '$x1');";
   $bd->consulta($query);

 }
    }
    

}


?>