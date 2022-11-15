<?php
include '../inc/config.php';


if (isset($_FILES["file"]))
{
   $reporte = null;
     for($x=0; $x<count($_FILES["file"]["name"]); $x++)
    {
    $file = $_FILES["file"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
     $codigo = $_POST["codigo"];

if($file==""){
$dimensiones = getimagesize($ruta_provisional);
}
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../img/";

    
    if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
        $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {

 $gale="gale_";
    $name2=$gale.$nombre;  


        $src = $carpeta.$name2;
        move_uploaded_file($ruta_provisional, $src);


    $query = "INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('$codigo', '1', '$name2')";
    $results = mysqli_query( $query) or die('la imagen no se subio');

    
 /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('6', '1', '$nombre')";                 
    $bd->consulta($sql);*/
   



        echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
    }
    }
        echo $reporte;
}
?>



