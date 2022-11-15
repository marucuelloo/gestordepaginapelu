<?php  
	include 'panel/inc/config.php';
	include 'panel/inc/functionBD.php';


?>

<?php

	$base = new GestarBD();
	 $hoy = date("Y-m-d H:m:s");
//Creamos una función que detecte el idioma del navegador del cliente. 
function getUserLanguage() {  
return substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
} 
$user_language=getUserLanguage(); 




if($user_language=='en'){ 
	$idioma=2;
	$lenguage="es";
		$contacto="CONTACTO";
 	$inicio="INICIO";
    $directo="CONTACTO DIRECTO";
    $indirecto="CONTACTO INDIRECTO";
    $nomform="NOMBRE";
    $numapellido="APELLIDO";
    $numform="TELEFONO";
    $asuntoform="ASUNTO";
    $correoform="CORREO";
    $comenform="COMENTARIO";
    $botonform="ENVIAR";
	
} 
elseif($user_language=='es'){ 
 	$idioma=1;
 	$lenguage="es";
 	$contacto="CONTACTO";
 	$inicio="INICIO";
 	$inicio="INICIO";
    $directo="CONTACTO DIRECTO";
    $indirecto="CONTACTO INDIRECTO";
    $numapellido="APELLIDO";
    $nomform="NOMBRE";
    $numform="TELEFONO";
    $asuntoform="ASUNTO";
    $correoform="CORREO";
    $comenform="COMENTARIO";
    $botonform="ENVIAR";
} 

//pruebas
if (isset($_GET['es'])) { 
 $idioma=1;
 $lenguage="es";
 	$contacto="CONTACTO";
 	$inicio="INICIO";
    $directo="CONTACTO DIRECTO";
    $indirecto="CONTACTO INDIRECTO";
    $nomform="NOMBRE ";
    $numform="TELEFONO";
    $numapellido="APELLIDO";
    $asuntoform="ASUNTO";
    $correoform="CORREO";
    $comenform="COMENTARIO";
    $botonform="ENVIAR";
}
if(isset($_GET['en'])){
	$idioma=2;
	$lenguage="en";
	$contacto="CONTACT";
 	$inicio="START";
 	$contacto="CONTACT";
    $inicio="START";
    $directo="DIRECT CONTACT";
    $numapellido="LAST name";
    $indirecto="INDIRECT CONTACT";
    $nomform="NAME";
    $numform="PHONE";
    $asuntoform="AFFAIR";
    $correoform="EMAIL";
    $comenform="COMMENTARY";
     $botonform="SEND";
}

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$ruta= "http://" . $host . $url;

$host= $_SERVER["HTTP_HOST"];



			$consulta="SELECT * FROM pagina ";
		    $resultado=$base->consulta($consulta);
		    while($pagina=$base->mostrar_registros()) {
			 	$portada= $pagina->portada;
			 	$logo= $pagina->logo;
			 	$face= $pagina->face;
			 	$twiter= $pagina->twiter;
			 	$footer= $pagina->footer;
			 	$favicon= $pagina->favicon;
			 	$instagran=$pagina->instagran;
			 	$correo=$pagina->correo;
			 	$direccion=$pagina->direccion;
			 	$telefono=$pagina->telefono;
			 	$color_c=$pagina->color_contenido;
			 	$color_b=$pagina->color_boton;
			 	$color_t=$pagina->color_titulo;
			 	$titulooos=$pagina->titulo;
			 	$fondop=$pagina->colorf;
			}

    $consulta="SELECT * FROM sessiones where idioma=$idioma";
    $resultado=$base->consulta($consulta);
    $titles=[];
    $contents=[];
    $links=[];
    $orders=[];
    $nItems = 0;
    while($pagina=$base->mostrar_registros()) {
    	array_push($titles,$pagina->title_sessiones); 
    	array_push($contents,$pagina->contenido); 
    	array_push($links,'module.php?nombrep='.$pagina->link.'&'.$lenguage); 
    	array_push($orders,$pagina->posicion_y); 
    	$nItems++;
    }

    $consulta1="SELECT * FROM galeria where idioma=$idioma";
    $resultado1=$base->consulta($consulta1);
    $names=[];
    $stitles=[];
    $sliders=[];
    $nsItems = 0;
    while($pagina=$base->mostrar_registros()) {
    	array_push($names,$pagina->nombre); 
    	array_push($stitles,$pagina->titulo); 
    	array_push($sliders,$pagina->slider); 
    	$nsItems++;
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $titulooos ?></title>
	<link rel="stylesheet" href="./css/page.style.css">
	<link rel="stylesheet" href="./css/modal.css">
	<script src="https://use.fontawesome.com/ea122af098.js"></script>
	<link rel="icon" type="image/png" href="img/<?php echo $favicon ?>" />

</head>
<body>

	<header id="index" style="background-image: url(<?php echo "img/".$portada ?>);">
		<div class="nav-bar">
			<div class="btns">
				<button onclick="landPage.toggleMenu()"><i class="fa fa-bars"></i></button>
			</div>
			<div class="logo"><img src="img/<?php echo $logo ?>" alt="Terraquatica">
			</div>
		</div>
		<div id="menu" class="hidden">
			<div class="menu-content">
				<div class="backdrop" onclick="landPage.toggleMenu('hidden')"></div>
				<div id="menu-items"></div>
			</div>
		</div>
		<div class="down-image">
			<img class="down-arrow" src="img/down.gif" alt="">
		</div>
	</header>
	<main class="land-body">
		<div id="items"></div>
		<section class="content">

<div class="w3-container">
 
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <br>
      <center>
      <?php  
      if($idioma=="2"){
      	echo "<h1>Emergency</h1>";
      }else{
      	echo "<h1>Emergencias.</h1>";
      }
      ?>
       
          <?php $consulta11="SELECT * FROM pagina";
			    $resultado=$base->consulta($consulta11);
			    while($pagina=$base->mostrar_registros()) { ?>
			    
			    </br>
		       <ul>
		       <li>
		      <?php echo $pagina->link; ?>
		       </li>
		       </ul>
		       </center>
		        </br>
		         </br>
		       <?php 
		       		}
		       ?>
      </div>
    </div>
  </div>
</div>

<div id="id02" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <br>
      <center>
    
       <main>
		    <section id="contact">
	      		<form class="section" method="POST" action="index.php?suscribir=suscribir" method="POST">
	                  <?php  
					      if($idioma=="2"){
					      	echo "<h1>Subscribe</h1>";
					      }else{
					      	echo "<h1>Suscribete.</h1>";
					      }
					      ?>
					      <table>
					      	<tr>
					      		<td>
					      			<div class="field">
					                    <div class="material-input">      
										 
									      <label name="nombre"><?php echo $nomform ?></label></br>
					                      <input type="text" name="nombre" required>
					                        <span class="icon"><i class="fa fa-user"></i></span>
					                      <span class="highlight"></span>
					                      <span class="bar"></span>
					                    </div>
	                				</div>
					      		</td>
					      	</tr>
					      	<tr>
					      		<td>
					      			<div class="field">
					                    <div class="material-input">   
					                     <label><?php echo $numapellido ?></label> </br>  
					                      <input type="text" name="apellido" required>
					                      <span class="icon"><i class="fa fa-user"></i></span>
					                      <span class="highlight"></span>
					                      <span class="bar"></span>
					                    </div>
					                </div>
					      		</td>
					      	</tr>
					      	<tr>
					      		<td>
					      			<div class="field">
					                    <div class="material-input">   
					                     <label><?php echo $numform ?></label>  </br> 
						                      <input type="text" name="telefono" required>
						                      <span class="icon"><i class="fa fa-phone"></i></span>
						                      <span class="highlight"></span>
						                      <span class="bar"></span>
					                    </div>
					                </div>
					      		</td>
					      	</tr>
					      	<tr>
					      		<td>
					      			<div class="field">
					                    <div class="material-input">      
					                    <label><?php echo $correoform?></label></br>
					                      <input type="email" name="correo" required>
					                      <span class="icon"><i class="fa fa-envelope"></i></span>
					                      <span class="highlight"></span>
					                      <span class="bar"></span>
					                    </div>
					                </div>
					      		</td>
					      	</tr>
					      </table>
	               </br>
	                <div class="field">
	                    <button class="send-btn">Registrar<i class="fa fa-send"></i></button>
	                </div>
	            </form>
	            </br>
	        </section>
        </main>
      </div>
    </div>
  </div>
</div>
				<div class="content-nav">
				<?php
					$consulta="SELECT * FROM modulos where idioma=$idioma";
				    $resultado=$base->consulta($consulta);
				    $modulo;
				    $i = 0;
				    while($modulo[$i]=$base->mostrar_registros()){$i++;}
				    $j = 0;
				    while($j<($i/2)  && $j<sizeof($modulo)){	
				?>
                    <a href="module.php?nombrep=<?php echo $modulo[$j]->nombre; ?>&<?php echo $lenguage ?>" class="nav-link"><?php echo $modulo[$j]->nombre ?></a>
                <?php $j++;} ?>
                  
                <?php while($j < $i && $j<sizeof($modulo)){ ?>
                    <a href="module.php?nombrep=<?php echo $modulo[$j]->nombre; ?>&<?php echo $lenguage ?>" class="nav-link"><?php echo $modulo[$j]->nombre ?></a>
                <?php $j++;}?>
                     <a href="contact.php?<?php echo $lenguage ?>" class="nav-link"><?php echo $contacto ?></a>	
					 <a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link "><?php echo "Administrador" ?></a>
                </div>
                <div class="slides">
                	<div class="slide" data-src="0"></div>
                	<div class="slide" data-src="1"></div>
                </div>
                <div id="module-default">
                </div>
		</section>
	</main>

	<footer>
		<div class="icons">
            <a href="<?php echo $face; ?>" class="icon-link" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a>
            <a href="<?php echo $twiter; ?>" class="icon-link" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a>
			<a href="<?php echo $instagran; ?>" class="icon-link" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a>
            <a href="mailto:<?php echo $correo; ?>" class="icon-link" target="_blank"><i class="fa fa-envelope"></i><span>Correo</span></a>
            <a onclick="document.getElementById('id02').style.display='block'"  class="icon-link " target="_blank"><i class="fa fa-edit"></i><span>Suscribete</span></a>
            
        
		</div>

		<div class="footer-nav">
			<?php
				$consulta="SELECT * FROM modulos where idioma=$idioma";
			    $resultado=$base->consulta($consulta);
			    while($pagina=$base->mostrar_registros()) {
			?>
            <a href="module.php?nombrep=<?php echo $pagina->nombre; ?>&<?php echo $lenguage ?>" class="nav-link"><?php echo $pagina->nombre ?></a>
            <?php 
            	}
            ?>
                <a href="contact.php?<?php echo $lenguage ?>" class="nav-link"><?php echo $contacto ?></a>	
				<a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link"><?php echo "Administrador" ?></a>
		</div>
		<div class="copyright">
			<?php echo $footer ?>
		</div>
	</footer>
	
	<script type="text/javascript">

var colorff = "<?php echo $fondop ?>";
 
function diHola(){
  
  return colorff;
}
	// var x = square('#aa6a28'); //x gets the value 16
	

	</script>
	
	<script src="./js/browserDetect.js"></script>
	<script src="./js/landPage.js"></script>
	<script type="text/javascript">
		var config = new Config(); //IMPORTANT!!! 
		<?php 
			for ($i=0; $i<$nItems;$i++) { ?>
				config.items[<?php echo $i; ?>].params.title = <?php echo "'".$titles[$i]."'"; ?>;
				config.items[<?php echo $i; ?>].params.content = <?php echo "'".$contents[$i]."'"; ?>;
				config.items[<?php echo $i; ?>].params.link = <?php echo "'".$links[$i]."'"; ?>;
				config.items[<?php echo $i; ?>].params.order = <?php echo $orders[$i]; ?>;
			<?php
			}
		?>
		config.slides = [[],[]];
		<?php 
			for ($i=0; $i<$nsItems;$i++) { ?>
				config.slides[<?php echo $sliders[$i]-1; ?>].push({img:'galeria/'+<?php echo "'".$stitles[$i]."'"?>, text:<?php echo "'".$names[$i]."'"; ?>});
			<?php
			}
		?>

		<?php 
			$consulta="SELECT * FROM `submodulos` INNER JOIN modulos ON submodulos.id_modulos_id_sub=modulos.id_modulo WHERE idioma=$idioma LIMIT 4";
			$resultado=$base->consulta($consulta);
		?>
		config.moduleDefault = [
			<?php while ($pagina=$base->mostrar_registros()){ ?>
				{
				 title:'<?php echo $pagina->titulo_sub; ?>',
				 img:'galeria/<?php echo $pagina->imagen_sub; ?>',
				 icon:'<?php echo $pagina->icono; ?>',
				 link:'module.php?nombrep=<?php echo $pagina->nombre?>&<?php echo $lenguage ?>',
				 content:` <?php echo $pagina->contenido; ?> `
				},
			<?php } ?>
		];


		var landPage = (function(PageType,c){
		    return new PageType(c);
		})(LandPage,config);
	</script>

            
</body>
<?php 
if (isset($_GET['suscribir'])) { 
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];



	$query="INSERT INTO `suscriptores` (`id_suscriptores`, `nombre`, `apellido`, `telefono`, `correo`, `fecha`) VALUES (NULL, '$nombre', '$apellido', '$telefono', '$correo', '$hoy')";
	$base->consulta($query);
	?>


<script language="JavaScript" type="text/javascript">
alert("Registrado con exito");
</script>
<?php 
}
?>
<style type="text/css">

/*titulos*/
main.land-body>#items>.item>article>.item-content>.title {
    color: <?php echo $color_t;?> !important;
}
/*letras minusculas*/
main.land-body>#items>.item>article>.item-content>p {

    color: <?php echo $color_c;?>  !important;
}
/*botones */
main.land-body>#items>.item>article>.btn-module {
    background: <?php echo $color_b;?> !important;
    color: <?php echo $color_c;?> ;
}
/*titulos de secciones*/
.nav-link {
    color: <?php echo $color_b;?> !important;
}
.nav-link:before {

    background-color:<?php echo $color_b;?>!important;

}
/*redes sociales y botones*/
.icon-link {
    color: <?php echo $color_b;?>;
    box-shadow: 0 0 0 0 <?php echo $color_b;?>;
}
#menu-items>a:hover {
    color:  <?php echo $color_b;?> !important;
}
#menu-items>a:hover:before {
    background-color: <?php echo $color_b;?> !important;
}
.icon-link:hover {
    box-shadow: 0 0 3px 1px <?php echo $color_b;?>!important;
}
.copyright a {
    text-decoration: none;
    color:<?php echo $color_b;?> !important;
}
.slide-btn:hover {
    color: <?php echo $color_b;?> !important;
   
}

</style>
</html>

