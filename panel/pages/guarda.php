<?php

include '../inc/config.php';
include '../inc/comun.php';

$bd = new GestarBD;
  $x1=$_GET['codigo'];

  //////////////////
//guardar portada
//////////////////7    
if($_FILES["portada"]!=""){
  $im=$_FILES["portada"];
  $ver="SELECT portada FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
   while ($fila=$bd->mostrar_registros()) { 
        $a=$fila->portada;
  }
}

//cosulta logo
if($_FILES["logo"]!=""){
  $im=$_FILES["logo"];
  $ver="SELECT logo FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
  while ($fila=$bd->mostrar_registros()) { 
  $a=$fila->logo;                                                                         
    }
 }

//consultafavicon
if($_FILES["favicon"]!=""){
 $im=$_FILES["favicon"];
 $ver="SELECT favicon FROM pagina WHERE id_pagina='$x1'";
 $bd->consulta($ver);
 while ($fila=$bd->mostrar_registros()) { 
        $a=$fila->favicon;
   }
}
   $reporte = null;
     for($x=0; $x<count($im["name"]); $x++)
        {
        $file = $im;
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
        
        else
        {


                unlink('../../img/'.$a.'');//acá le damos la direccion exacta del archivo
         
               
          if($_FILES["logo"]!=""){
                                 $gale="logo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `pagina` SET `logo` = '$name3' WHERE `pagina`.`id_pagina` = $x1";                 
                                 $bd->consulta($sql);
                               }
            if($_FILES["favicon"]!=""){
                                 $gale="favicon_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `pagina` SET `favicon` = '$name3' WHERE `pagina`.`id_pagina` = $x1";                 
                                 $bd->consulta($sql);
                               }
                                 if($_FILES["portada"]!=""){
                                 $gale="portada_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `pagina` SET `portada` = '$name3' WHERE `pagina`.`id_pagina` = $x1";                 
                                 $bd->consulta($sql);
                               }
           
        
        }
      }
 ?>
