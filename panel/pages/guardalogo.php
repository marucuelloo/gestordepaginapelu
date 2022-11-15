<?php
include '../inc/config.php';
include '../inc/comun.php';

$bd = new GestarBD;


 $x1=$_GET['codigo'];

//consulto el logo actual
 $ver="SELECT logo FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
        $a=$fila['logo'];

}


   $reporte = null;
     for($x=0; $x<count($_FILES["logo"]["name"]); $x++)
    {
    $file = $_FILES["logo"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imgpag/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {

        $src = $carpeta.$a;
      echo   move_uploaded_file($ruta_provisional, $src);
 /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('6', '1', '$nombre')";                 
    $bd->consulta($sql);*/
   
       // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
 	}
    }
       // echo $reporte;

?>