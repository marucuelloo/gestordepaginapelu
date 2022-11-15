<?php        
    include 'panel/inc/config.php';
    include 'panel/inc/functionBD.php';
 $base = new GestarBD(); 

function getUserLanguage() {  
return substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
} 
$user_language=getUserLanguage(); 
 $idioma=1;
    $lenguage="es";
    $contacto="CONTACTO";
    $inicio="INICIO";
    $formcon="ENVÍENOS SU CONSULTA";
    $directo="CONTACTO DIRECTO";
    $indirecto="CONTACTO INDIRECTO";
    $nomform="NOMBRE Y APELLIDO";
    $numform="TELEFONO";
    $asuntoform="ASUNTO";
    $correoform="CORREO";
    $comenform="COMENTARIO";
    $botonform="ENVIAR";


if(isset($_GET['es'])){
    $idioma=1;
    $lenguage="es";
    $contacto="CONTACTO";
    $inicio="INICIO";
    $formcon="ENVÍENOS SU CONSULTA";
    $directo="CONTACTO DIRECTO";
    $indirecto="CONTACTO INDIRECTO";
    $nomform="NOMBRE Y APELLIDO";
    $numform="TELEFONO";
    $asuntoform="ASUNTO";
    $correoform="CORREO";
    $comenform="COMENTARIO";
    $botonform="ENVIAR";
} 
//prueba

if(isset($_GET['en'])){
 $idioma=2;
    $contacto="CONTACT";
    $inicio="START";
    $lenguage="en";
    $formcon="SEND US YOUR QUERY";
    $directo="DIRECT CONTACT";
    $indirecto="INDIRECT CONTACT";
    $nomform="NAME AND SURNAME";
    $numform="PHONE";
    $asuntoform="AFFAIR";
    $correoform="EMAIL";
    $comenform="COMMENTARY";
     $botonform="SEND";
}
    $consulta="SELECT * FROM pagina  ";
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

  if (isset($_GET['enviar'])) { 

  echo  $nombre=$_POST["nombre"];
  echo  $telefono2=$_POST["telefono"];
  echo  $asunto=$_POST["asunto"];
  echo  $correo2=$_POST["correo"];
  echo  $comentario=$_POST["comentario"];
 
                //$cs=mysqli_query($sql,$conexion);

                    $casilla = $correo;
                    $cabeceras = "From: "  .$correo2.  "\r\n";
                    $cabeceras .= "Reply-To: ".$correo2. "\r\n";
                    // $cabeceras .= "CC: apps@zippyttech.com\r\n";
                    $cabeceras .= "MIME-Version: 1.0\r\n";
                    $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $mensaje = '<html><body>';
                    $mensaje = '<center>';
                   
                    $mensaje .= '<table rules="all" border="1" style="border-color: #666;" cellpadding="10">';
                    $mensaje .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . $nombre . "</td></tr>";
                    $mensaje .= "<tr><td><strong>Telefono:</strong> </td><td>" . $telefono2  . "</td></tr>";
                    $mensaje .= "<tr><td><strong>correo:</strong> </td><td>" . $correo2 . "</td></tr>";
                    $mensaje .= "<tr><td><strong>Asunto:</strong> </td><td>" . $asunto . "</td></tr>";
                    $mensaje .= "<tr><td><strong>mensaje </strong> </td><td>" . $comentario. "</td></tr>";
                    $mensaje .= "</table>";
                    $mensaje .= '</br>';
                    $mensaje .= "</body></html>";
                   
                    

                  $bool = mail($correo2, $asunto, $mensaje, $cabeceras);
                  
                    if($bool){
                        echo '<div class="form-box">
                                Enviado
                                </div>';
                    }
                    else{
                    //echo "<script > alert('no se Recuperaron sus datos correctamente el  correo: $destino no  se encuentra registrado ')</script>";
                    echo '<div class="form-box">
                             no se envio
                                </div>';
                }
                
            
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
            <a href="index.php?<?php echo $lenguage ?>" class="nav-link "><?php echo $inicio; ?></a>
            <?php
                    $consulta="SELECT * FROM modulos where idioma=$idioma";
                    $resultado=$base->consulta($consulta);
                    while($pagina=$base->mostrar_registros()) {
            ?>
                    <a href="module.php?nombrep=<?php echo $pagina->nombre; ?>&<?php echo $lenguage ?>" class="nav-link "><?php echo $pagina->nombre; ?></a>
            <?php
            } 
            ?>
            <a href="contact.php?<?php echo $lenguage ?>" class="nav-link active"><?php echo $contacto ?></a>
            <a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link "><?php echo "Administrador" ?></a>
        </div>
    </header>
    <main>
	    <section id="contact">
         
            <div class="section">
                <h2 class="title with-border-botton"><?php echo $directo ?></h2>
                <span href="#" class="field info with-border-botton">
                    <span class="icon circle"><i class="fa fa-map-marker"></i></span>
                    <div class="info-content">
                        <span></span>
                        <p><?php echo $direccion ?></p>
                    </div>
                </span>
                <span href="#" class="field info">
                    <span class="icon circle"><i class="fa fa-phone"></i></span>
                    <div class="info-content">
                        <span></span>
                         <p><?php echo $telefono ?></p>
                    </div>
                </span>

                <h2 class="title with-border-botton"><?php echo $indirecto ?></h2>
                <a href="<?php echo $face; ?>" class="field link with-border-botton">
                    <span class="icon circle"><i class="fa fa-facebook"></i></span>
                    Facebook
                </a>
                <a href="<?php echo $twiter?>" class="field link with-border-botton">
                    <span class="icon circle"><i class="fa fa-twitter"></i></span>
                    Twitter
                </a>
                <a href="<?php echo $instagran?>" class="field link with-border-botton">
                    <span class="icon circle"><i class="fa fa-instagram"></i></span>
                    Instragram
                </a>
                <a href="mailto:<?php echo $correo; ?>"title="<?php echo $correo ?>" class="field link">
                    <span class="icon circle"><i class="fa fa-envelope"></i></span>
                    Email
                </a>
            </div>
	    </section>
	</main>
	<footer>
        <div class="icons">
            <a href="<?php echo $face; ?>" class="icon-link" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a>
            <a href="<?php echo $twiter; ?>" class="icon-link" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a>
            <a href="<?php echo $instagran; ?>" class="icon-link" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a>
            <a href="mailto:<?php echo $correo; ?>" class="icon-link" target="_blank"><i class="fa fa-envelope"></i><span>Correo</span></a>
            
                <?php 
            if($lenguage=="en"){
                ?>
            <a href="contact.php?es" class="icon-link"  ><i class="fa fa-language"></i><span>Español</span></a>
            <a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link "><?php echo "Administrador" ?></a>
            <a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link "><?php echo "Administrador" ?></a>
            <a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link "><?php echo "Administrador" ?></a>
        <?php 
            }else{
                ?>
              
          
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
             <a href="panel/login.php?<?php echo $lenguage ?>" class="nav-link active"><?php echo "Administrador" ?></a> 
        </div>
        <div class="copyright">
            <?php echo $footer ?>
        </div>
    </footer>
    <script src="./js/modulePage.js"></script>
	<script>
		var module = (function(){

		})();
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
h2.title {
    color: <?php echo $color_t;?>!important;
    text-align: center;
    width: 100%;
    font-size: 30px;
    padding: 15px 0;
}
.material-input>input {
    font-size: 18px;
    padding: 10px 10px 10px 5px;
    display: block;
    width: 300px;
    border: none;
    border-bottom: 1px solid <?php echo $color_b;?>!important;
    background: #111;
    color: white;
}
.material-input>input:focus~label, .material-input>input:valid~label {
    top: -20px;
    font-size: 14px;
    color: <?php echo $color_b;?>;
}
.material-input>.bar:before, .material-input>.bar:after {
    position: absolute;
    background: <?php echo $color_b;?>;
   
}
button.send-btn {
    -webkit-tap-highlight-color: transparent;
    color: <?php echo $color_c;?>;
    background-color: <?php echo $color_b;?>!important;
}
.circle {
  
    background:  <?php echo $color_b;?>!important;
   
}  
.field.link {
    color: <?php echo $color_b;?>!important;
}
a.field.link:hover {
    background:<?php echo $color_c;?>!important;
}
.field.info, .field.link {
    color: <?php echo $color_b;?>!important;
   
}
.copyright a {
    text-decoration: none;
    color:<?php echo $color_b;?> !important;
}
</style>
</body>
</html>