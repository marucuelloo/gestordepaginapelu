<?php if($idioma=$_GET['idioma']==2) { 
    $idioma="ingles";
    $idioma2=2;
}else{
    $idioma="espanol";
     $idioma2=1;
}
?>
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

//eliminar 
if (isset($_GET['eliminar'])) { 

        $x1=$_GET["codigo"];                    
        if( $x1=="" ){
            echo "<script> alert('campos vacios')</script>";
            echo "<br>";
        }else{

        $consulta="SELECT * FROM galeria where id_galeria='$x1'";
        $bd->consulta($consulta);
        while ($fila=$bd->mostrar_registros()) { 
             $idd= $fila->id_galeria;

                $bd1 = new GestarBD;  
                $bd1->consulta($consulta);
                 while ($fila1=$bd1->mostrar_registros()) 
                { 
                    $elimina=$fila1->titulo;
                    $tipoimg=$fila1->nombre;
                }
                if($elimina!="")
                unlink('../galeria/'.$elimina.'');//acá le damos la direccion exacta del archivo
         
                 }

                
               

                        $sql3="delete from galeria where id_galeria='$x1'";
                        $bd->consulta($sql3);
                     
           
                                    //echo "Datos Guardados Correctamente";
                                    echo '<div class="alert alert-success alert-dismissable">
                                                <i class="fa fa-check"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <b>Bien!</b> Se Elimino Correctamente... </div>';
            }

}



if (isset($_GET['crear'])) { 


 $fondoe= $_FILES["fondo"];
 $nombress=$_POST["nombre"];
 $posicion=$_POST["posicion"];



               
                 if( $nombress==""  ){

                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                                }else{

         if($_FILES["fondo"]!=""){
                    
            
                          $reporte = null;
                          for($x=0; $x<count($_FILES["fondo"]["name"]); $x++)
                          {
                         $file = $_FILES["fondo"];
                         $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../galeria/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 $gale="galeria_";
                                 $name2=$gale.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                   move_uploaded_file($ruta_provisional, $src);
                                 $sql="INSERT INTO `galeria` (`id_galeria`, `nombre`, `titulo`
                                 , `slider`, `idioma`) VALUES (NULL, '$nombress', '$name3','$posicion','$idioma2');";                 
                                 $bd->consulta($sql);


                                            //echo "Datos Guardados Correctamente";
                                            echo '<div class="alert alert-success alert-dismissable">
                                                        <i class="fa fa-check"></i>
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <b>Bien!</b> Datos Registrados Correctamente... ';

                  
                                               echo '   </div>';
                                    }
                              }//fin for
                          
                         
}//fin edita fondo;
    }
}
?>
<div class="row">
    <div class="col-md-12">
    <div class="caption font-dark">
               <center> <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Galerias </span></center>
            </div>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-comments"></i>Crear Galeria</div>
                        <div class="tools">
                            
                            <a href="javascript:;" class="reload"> </a>
                        </div>
                </div>
                <div class="portlet-body">
                        <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                        <form role="form" action="?mod=galeria&crear=crear&idioma=<?php echo $idioma2 ?>" method="post" enctype="multipart/form-data">              
                                            <th>Titulo</th>
                                            <th>Imagen de Fondo</th>
                                            <th>Posicion</th>
                                            <th></th>
                                            </thead>
                                        <tbody>
                                        <tr> 

                                            <td><center>
                                               <input   required type="text" name="nombre" required class="form-control"> 
                                            </td>
                                             <td><center>
                                             <input class="form-control" type="file" name="fondo[]" />
                                               
                                            </td>
                                             <td>
                                            <select class="form-control"  name="posicion">
                                              <option value="2" selected><p>Derecha</p> </option> 
                                              <option  value="1" ><b>izquida</b></option>
                                            </select>
                                               
                                            </td>
                                         
                                           
                                            <td><center>
                                                <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Registrar Modulo</button>
                                                </center>
                                            </td>
                                        </form>
                                        </tr>
                                         </tr>
                                            </thead>
                                    </table>
                        </div>
                </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->





<style type="text/css">
   
    table {width:100%;box-shadow:0 0 10px #ddd;text-align:left}
  
    td {padding:5px;border:solid #ddd;border-width:0 0 1px;
    }
        .editable span{display:block;}
        .editable span:hover {background:url(img/edit.png) 30% 0  no-repeat; cursor:pointer}

        a.link   
{   
 text-decoration:none;   
 border-bottom: thin dashed;
} 
        
        td input{height:24px;width:200px;border:1px solid #ddd;padding:0 5px;margin:0;border-radius:6px;vertical-align:middle}
        a.enlace{display:inline-block;width:24px;height:24px;margin:0 0 0 5px;overflow:hidden;text-indent:-999em;vertical-align:middle}
            .guardar{background:url(img/save.png) 0 0 no-repeat}
            .cancelar{background:url(img/cancel.png) 0 0 no-repeat}
    
    .mensaje{display:block;text-align:center;margin:0 0 20px 0}
        .ok{display:block;padding:10px;text-align:center;background:green;color:#fff}
        .ko{display:block;padding:10px;text-align:center;background:red;color:#fff}
</style>

<div class="row">
<div class="col-md-12">
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-comments"></i>Registros de galeria</div>
<div class="tools">
<a href="javascript:;" class="reload"> </a>
</div>
</div>


<div class="portlet-body">
        <div class="table-scrollable">
        
<table class="editinplace table table-striped table-hover">
            <tr>
                <th>Cod.</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Eliminar</th>
                
            </tr>
        </table>
    </div>
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>
    $(document).ready(function() 
    {
        /* OBTENEMOS TABLA */
        $.ajax({
            type: "GET",
            url: "pages/editinplace2.php?tabla=1&idioma=<?php echo $idioma ?>"
        })
        .done(function(json) {
            json = $.parseJSON(json)
            for(var i=0;i<json.length;i++)
            {
                $('.editinplace').append(
                    "<tr><td class='id'width='10%' >"+json[i].id+"</td><td class='editable' data-campo='nombre' width='40%' ><span><a class='link'>"+json[i].nombre+"</a></span></td><td width='10%'> <img width='100px'  src='../galeria/"+json[i].titulo+"''> </td ><td width='10%'><a onclick='if(confirmDel() == false){return false;}' class='btn btn-danger btn-lg' href='?mod=galeria&eliminar&codigo="+json[i].id+"&idioma=<?php echo $idioma2 ?>'><i class='icon-trash'></i></a></td></tr>");
            }
        });
        
        var td,campo,valor,id;
        $(document).on("click","td.editable span",function(e)
        {
            e.preventDefault();
            $("td:not(.id)").removeClass("editable");
            td=$(this).closest("td");
            campo=$(this).closest("td").data("campo");
            valor=$(this).text();
            id=$(this).closest("tr").find(".id").text();
            td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a><a class='enlace cancelar' href='#'>Cancelar</a>");
        });
        
        $(document).on("click",".cancelar",function(e)
        {
            e.preventDefault();
            td.html("<span><a class='link'>"+valor+"</a></span>");
            $("td:not(.id)").addClass("editable");
        });
        
        $(document).on("click",".guardar",function(e)
        {
            $(".mensaje").html("<img src='img/loading.gif'>");
            e.preventDefault();
            nuevovalor=$(this).closest("td").find("input").val();
            if(nuevovalor.trim()!="")
            {
                $.ajax({
                    type: "POST",
                    url: "pages/editinplace2.php<?php $idioma ?>",
                    data: { campo: campo, valor: nuevovalor, id:id }
                })
                .done(function( msg ) {
                    $(".mensaje").html(msg);
                    td.html("<span><a class='link'>"+nuevovalor+"</a></span>");
                    $("td:not(.id)").addClass("editable");
                    setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
                });
            }
            else $(".mensaje").html("<p class='ko'>Debes ingresar un valor</p>");
        });
    });
    
    </script>
</div>
</div>
<!-- <a class="btn red btn-outline sbold derecha" data-toggle="modal" href="#1">¿Ayuda? </a> -->
</div>
</div>
</div>
</div>
</div>