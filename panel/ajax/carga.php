<?php

//include '../inc/comun.php';
include '../inc/config.php';
//include '../inc/functionBD.php';
include '../inc/comun.php';

$bd = new GestarBD;


//include('dbcon.php');

if($_REQUEST)
{ 
$x1=$_GET['codigo'];


	$consulta="SELECT * FROM submodulos where id_submodulos='$x1'";
    $bd->consulta($consulta);
     sleep(1);
    while ($fila=$bd->mostrar_registros()) {
 	$a= $fila->imagen_sub;
 	$b= $fila->icono;

 											}
if (isset($_GET['fondo'])) {

if($a!="" and  $b!="" ) // not available
  {
  
    echo '<div class="progress active">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="50" style="width: 100%">

                <span class="sr-only"> 100% Complete (danger) </span>

             </div>
            </div>
              <a class="btn red btn-outline sbold derecha" data-toggle="modal" href="?mod=crear">Completado </a>';
  
  }
	else if($a!="" )
	{
	echo '<div class="progress ">
   			<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10" style="width: 50%">

                <span class="sr-only"> 50% Complete (danger) </span>

             </div>
            </div>';
            
	}  
  else 
  {
  echo '<div class="progress  ">
       <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="01" aria-valuemin="0" aria-valuemax="100" style="width: 01%">
                                            <span class="sr-only"> 01% Complete </span>
                                        </div>
            </div>';
          


  }
}
}?>