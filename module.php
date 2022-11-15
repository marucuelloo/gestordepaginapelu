<?php
	
			
	include 'panel/inc/config.php';
	include 'panel/inc/functionBD.php';

	$base = new GestarBD(); 

function getUserLanguage() {  
return substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
} 
$user_language=getUserLanguage(); 

		$idioma=1;
 	$contacto="CONTACTO";
 	$inicio="INICIO";
 	$lenguage="es";
//pruebas
if (isset($_GET['es'])) { 
 	$idioma=1;
 	$contacto="CONTACTO";
 	$inicio="INICIO";
 	$lenguage="es";
}

if(isset($_GET['en'])){
	$idioma=2;
	$contacto="CONTACT";
 	$inicio="START";
 	$lenguage="en";
}

if((isset($_GET['nombrep']))=="" ){
$nombrep="EMPRESA";
}else{
 $nombrep=$_GET["nombrep"]; 
}
	$consulta="SELECT * FROM pagina";
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
	}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $titulooos ?></title>
	<link rel="stylesheet" href="./css/module.style.css">
	<script src="https://use.fontawesome.com/ea122af098.js"></script>
	<link rel="icon" type="image/png" href="img/<?php echo $favicon ?>" />
</head>
<body>
	<div id="background"></div>
	<header>
        <a href="index.php?<?php echo $lenguage ?>" class="logo"> <img src="img/<?php echo $logo ?>" alt="Logo"> </a>
        <a href="#" class="togleBtn" onclick="toggleNav()"><i class="fa fa-bars"></i></a>
        <div id="content-nav" class="hidden">
		    <a href="index.php?<?php echo $lenguage ?>" class="nav-link "><?php echo $inicio ?></a>
		    <?php
					$consulta="SELECT * FROM modulos where idioma=$idioma";
				    $resultado=$base->consulta($consulta);
				    while($pagina=$base->mostrar_registros()) {
			?>
		   			<a href="module.php?nombrep=<?php echo $pagina->nombre; ?>&<?php echo $lenguage ?>" class="nav-link <?php echo (($pagina->nombre == $nombrep)?'active':''); ?>"><?php echo $pagina->nombre; ?></a>
		    <?php
		    } 
		    ?>
		    <a href="contact.php?<?php echo $lenguage ?>" class="nav-link "><?php echo $contacto ?></a>
			<a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link "><?php echo "Administrador" ?></a>
		</div>
	</header>
    <main>
        <section id="subs">
	    </section>
	    <div id="modal-view" class="hide">
	    	<div class="modal-body">
	    		<div class="backdrop"></div>
	    		<a href="#" class="close-btn" onclick="hideModal()">
	    			<i class="fa fa-close"></i>
	    		</a>
	    		<div class="slide">
                	<div id="galeria"></div>
	    		</div>
	    		<div class="content">
	    			<h2 id="modal-title" class="title"></h2>
	    			<p  id="modal-content" class="text"></p>
	    		</div>
	    	</div>
	    </div>
	</main>
<footer>
		<div class="icons">
            <a href="<?php echo $face; ?>" class="icon-link" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a>
            <a href="<?php echo $twiter; ?>" class="icon-link" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a>
			<a href="<?php echo $instagran; ?>" class="icon-link" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a>
            <a href="mailto:<?php echo $correo; ?>" class="icon-link" target="_blank"><i class="fa fa-envelope"></i><span>Correo</span></a>
            
             <?php 
            if($lenguage=="es"){
                ?>
            <a href="index.php?es" class="icon-link"  ><i class="fa fa-language"></i><span>Español</span></a>
        <?php 
            }else{
                ?>
                <a href="index.php?en" class="icon-link"  ><i class="fa fa-language"></i><span>Ingles</span></a>
                <?php
            }
            ?>
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
	<script src="./js/modulePage.js"></script>
<?php 
	
			$consulta="SELECT * FROM modulos where nombre='".$nombrep."' AND idioma=$idioma";
			$resultado=$base->consulta($consulta);
			while($pagina=$base->mostrar_registros()) {
			
			 $title=$pagina->nombre;
			$background=$pagina->fondo;
			
			}
		 ?>


	<script>
		var galeria = null;
		var params = {
		    title: "<?php echo $title; ?>",
		    background: "galeria/<?php echo $background; ?>",
		    subs: 
		      [ 
		      	<?php 
		      	$consulta2="SELECT * FROM submodulos INNER JOIN modulos ON submodulos.id_modulos_id_sub=modulos.id_modulo
		    		 WHERE modulos.nombre='".$nombrep."'";
	    			$resultado2=$base->consulta($consulta2);	
				    while($pagina=$base->mostrar_registros()){
				    	?>
		      			{title:'<?php echo $pagina->titulo_sub; ?>',img:'galeria/<?php echo $pagina->imagen_sub; ?>',icon:'<?php echo $pagina->icono; ?>',content:`<?php echo $pagina->contenido; ?>`},
				    	<?php
				    }
				?>
			]
		  };
		var module = (function(){
			params.gal = initG();
			return new Module(params);
		})();

		function initG(){
			let gal = document.querySelector('#galeria');
			let srcs = {
				<?php 
				$consulta4="SELECT * FROM submodulos INNER JOIN modulos ON submodulos.id_modulos_id_sub=modulos.id_modulo
		    		 WHERE modulos.nombre='".$nombrep."'";
		    		 $resultado2=$base->consulta($consulta4);
		    		 $bd = new GestarBD;    
				while($sub=$base->mostrar_registros()){ 
					$idgale=$sub->id_submodulos;
					echo '"'.$sub->titulo_sub.'" : ['; 
						$consulta3="SELECT * FROM `subgaleria` where `id_subgaleria_id_subcategoria`= '$idgale'";
		    			$resultado3 =$bd->consulta($consulta3);
						while($ruta= $bd->mostrar_registros()){ echo '"galeria/'.$ruta->nombre_img.'",'; } 
					echo '],';
				}
				?>
			};
			console.log(srcs);
			return new Slide(gal,3000,srcs);
		}

	</script>
	<style type="text/css">

/*titulos*/
main.land-body>#items>.item>article>.item-content>.title {
    letter-spacing: 0px;
    font-size: 2.5rem;
    color: <?php echo $color_t;?> !important;
    text-transform: uppercase;
    line-height: 1.25;
}
/*letras minusculas*/
main.land-body>#items>.item>article>.item-content>p {
    text-align: center;
    font-size: 1rem;
    line-height: 1.5;
    color: <?php echo $color_c;?>  !important;
    padding: 15px 0;
    font-kerning: none;
}
/*botones */
main.land-body>#items>.item>article>.btn-module {
    padding: 8px 30px;
    border-radius: 2px;
    background: <?php echo $color_b;?> !important;
    align-self: center;
    text-decoration: none;
    color: <?php echo $color_c;?> ;
    text-transform: uppercase;
    font-size: 12px;
    transition: .3s ease-out;
}
/*titulos de secciones*/
.nav-link {
    padding: 5px;
    margin: 20px;
    position: relative;
    text-transform: uppercase;
    color: <?php echo $color_b;?> !important;
    text-decoration: none;
    font-size: 1rem;
}
.nav-link:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background-color:<?php echo $color_b;?>!important;
    transition: ease 0.3s all;
    transform: translateX(-50%);
}
/*redes sociales y botones*/
.icon-link {
    position: relative;
    height: 40px !important;
    width: 40px !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 0;
    margin: 0px 25px;
    color: <?php echo $color_b;?>;
    border: 1px solid;
    border-top: transparent;
    border-bottom: transparent;
    box-shadow: 0 0 0 0 <?php echo $color_b;?>;
    border-radius: 50%;
    transition: ease 0.6s box-shadow;
    text-decoration: none;
    font-size: 24px;
    padding: 25px;
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
figure.article-circle figcaption:before, figure.article-circle figcaption:after {

    border: 3px solid <?php echo $color_b;?>!important;

}
figure.article-circle figcaption .context .title {
    font-size: 1.75rem;
    color: <?php echo $color_b;?>!important;
    text-transform: uppercase;
    font-weight: lighter;
}
figure.article-circle figcaption i {
    color: <?php echo $color_b;?>!important;
   
}
h2.title {
    color: <?php echo $color_t;?>!important;
  
}
.modal-body>.slide:before, .modal-body>.slide:after {

    background-color: <?php echo $color_b;?>!important;
    
}
.close-btn {
 
    color:  <?php echo $color_b;?>!important;
 
}
.copyright a {
    text-decoration: none;
    color:<?php echo $color_b;?> !important;
}

</style>
</body>
</html>