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
if (isset($_GET['edita'])) { 




   $nombre=$_POST["nombre"];
   $apellido=$_POST["apellido"];
 //$o=$_POST["logo"];
 //$imgprincipal=$_POST["portada"];
 //$img1=$_POST["favicon"];  
    $correo=$_POST["correo"]; 
    $pass=$_POST["pass"];
 



                            if( $nombre==""  )
                {

                    
                }else{
                   

$sql="UPDATE administrador SET nombre='$nombre', apellido='$apellido', correo='$correo',pass='$pass' where id='$iduser'";  
$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";   ,imgfondo='$nom',imgprincipal='$nom2',img1='$nomimg1', img2='$nomimg2', img3='$nomimg3',url='$url'
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';

                               echo '   </div>';
}
}

?>




<div class="row">
<div class="col-md-12">
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-comments"></i>Datos del Administrador</div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="javascript:;" class="reload"> </a>
</div>
</div>


<div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                             
                    
                        <th><center>Nombre</center></th>
                        <th><center>Apellido</center></th>
                        <th><center>correo</center></th>
                        <th></th>
                    
                        </thead>
                    <tbody>
                    <?php
                      $consulta="SELECT * FROM administrador where id=$iduser";
                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) { 
?>
                    <tr> 
                        <td><center>
                          <?php echo $fila->nombre; ?>
                           </center>
                        </td>

                        <td>
                        <center>
                        <?php echo $fila->apellido; ?>
                         </center>
                        </td>
                        <td> <center>
                       <?php echo $fila->correo; ?>
                         </center>
                        </td>
                      <td>
                     <a class="btn btn-primary btn-lg" href="?mod=administrador&editar&codigos=<?php echo  '$iduser'; ?>"><i class="icon-pencil"></i></a>
                     </td>
                      </tr>
                        </thead>
                  <?php 
                  } ?>
                    </table>

 
</div>
</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
<?php
if (isset($_GET['editar'])) { 

?>

<div class="row">
<div class="col-md-12">
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-comments"></i>Editar Administrador</div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="javascript:;" class="reload"> </a>
</div>
</div>


<div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
<?php


//SELECT *FROM categoria INNER JOIN catalogo ON categoria.id_categoria = catalogo.id_categoria 
  $consulta="SELECT * FROM administrador where id=$iduser";

                                        /*$consulta="SELECT id_usuarios,nombre,cedula ,apellido, correo, telefono, direccion FROM usuarios ORDER BY id_usuarios ASC ";*/
                                    ?>

                            <tr>
                        
                    <center>
                        <th>Nombre</th>
                         <th>Apellido</th>
                         <th>Correo</th>
                       
                        
                            
                    </thead>
                    <tbody>
<?php
                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) { 
?>
       
                    <tr> 
  <form role="form" action="?mod=administrador&edita=edita" method="post" enctype="multipart/form-data"> 
                  
                        <td>
       
    <input class="form-control" required type="text" id="exampleInputFile"  name="nombre"  value="<?php echo $fila->nombre; ?>" >
                      
                        </td>
                        <td>
       
  <input class="form-control" required type="text" id="exampleInputFile" name="apellido" value="<?php echo $fila->apellido; ?>"  >
                      
                        </td>
                        <td>
       
    <input class="form-control"   required type="email" id="exampleInputFile"  name="correo" value="<?php echo $fila->correo; ?>" >
                      
                        </td>
                       
                    </tr>

  <tr>
                        
                    <center>
                        <th>Contraseña</th>
                <th></th>
                         <th><center>Opción</center></th>
                      
                        
                            
                    </thead>
                    <tbody>
                    </tr>
                    <tr>
                      <td>
       
                <input class="form-control"  required type="password" id="exampleInputFile" name="pass" value="<?php echo $fila->pass; ?>" >
                      
                        </td>
                        <td>
       
                      
                      
                        </td>
                        
                     <td>
                    <center>
                    
                       <center>
<button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Editar  Admin</button>
</center>    
                     </center>
                     </td>
                    </center>
                    <?php } ?>
                    </tbody>
                    </table>

 
</div>
<div class="col-md-10"></div>

</form>



</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
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