<?php

//include '../inc/comun.php';
include '../inc/config.php';
//include '../inc/functionBD.php';include '../inc/config.php';
include '../inc/comun.php';

$bd = new GestarBD;

$x1=$_GET['codigo'];

 if(isset($_POST['prod']) && !empty($_POST['prod'])){
         // echo join(",",$_POST['prod']);
foreach($_POST['prod'] as $url){ // insert }

 $url2 = str_replace("watch?v=", "embed/", $url, $count);

$url3 = str_replace("&", "?", $url2, $count);

 $consulta2="INSERT INTO galeria (tipoimg, nomimg, des, url, id_catalogo) VALUES ('2', '$url', 'video', '$url3', '$x1')";
$bd->consulta($consulta2);

echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Videos Guardados con exito  ';

                               echo '   </div>';

 }

}else{
   echo 'failed';
 }



?>