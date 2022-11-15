<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="?mod=principal">
                        <img src="./img/<?php echo  $logoadmin; ?>" style="width: 110px" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                     <?php if(isset($_SESSION["products"])!=""){
                                        ?>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                               <i class="icon-basket"></i>
                                <span class="username username-hide-on-mobile">Compras </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                               
                                           <li>
                                    <a href="?mod=view_cart">
                                        <i class="icon-basket"></i>Servicios en Carro
                                        <span class="badge badge-success"> <?php 
                                    if(isset($_SESSION["products"])){
                                        echo count($_SESSION["products"]); 
                                    }else{
                                        echo 0; 
                                    }
                                    ?> </span>
                                    </a>
                                </li>
                                      
                             
                            </ul>
                        </li>
                          <?php
                                    } ?>
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="./logout.php" onclick="window.location = './logout.php'" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
     
        <div class="page-container">
           
            <div class="page-sidebar-wrapper">
              
                <div class="page-sidebar navbar-collapse collapse">
                  
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                       
                     
                        <li class="nav-item start active open">
                            <a href="?mod=principal" class="nav-link nav-toggle">
                                <i class="icon-wrench"></i>
                                <span class="title">Opciones Principales</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                             <li class="nav-item start ">
                                    <a href="?mod=principal" class="nav-link ">
                                        <i class="fa fa-home"></i>
                                        <span class="title">INICIO</span>
                                      
                                    </a>
                                </li>
                    
                               
                                <li class="nav-item start ">
                                    <a href="?mod=pagina" class="nav-link ">
                                        <i class="fa fa-paper-plane-o"></i>
                                    
                                        
                                        <span class="title">Principal</span>
                                      
                                    </a>
                                </li>


                                <li class="nav-item start ">
                                    <a href="?mod=secciones" class="nav-link ">
                                        <i class="fa fa-bars"></i>                                       
                                        <span class="title">Secciones</span>
                                      
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-bars"></i>
                                        <span class="title">Secciones</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        <li class="nav-item  ">
                                            <a href="?mod=secciones" class="nav-link ">
                                                <span class="title">Español</span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item  ">
                                            <a href="?mod=secciones&idioma=2" class="nav-link ">
                                                <span class="title">Ingles</span>
                                            </a>
                                        </li> -->
                                    <!-- </ul>
                                </li> --> 
                                


                                <!-- <li class="nav-item start ">
                                    <a href="?mod=crear" class="nav-link ">
                                        <i class="fa fa-tasks"></i>                                       
                                        <span class="title">Módulos</span>
                                      
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-tasks"></i>
                                        <span class="title">Modulos</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        <li class="nav-item  ">
                                            <a href="?mod=crear" class="nav-link ">
                                                <span class="title">Español</span>
                                            </a>
                                        </li>


                                        
                                       <li class="nav-item  ">
                                            <a href="?mod=crear&idioma=2" class="nav-link ">
                                                <span class="title">Ingles</span>
                                            </a>
                                        </li> -->
                                    <!-- </ul>
                                </li> --> 
                                   <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-picture-o"></i>
                                        <span class="title">Galerias</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        <li class="nav-item  ">
                                            <a href="?mod=galeria&idioma=1" class="nav-link ">
                                                <span class="title">Español</span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item  ">
                                            <a href="?mod=galeria&idioma=2" class="nav-link ">
                                                <span class="title">Ingles</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                                <li class="nav-item start ">
                                    <a href="?mod=suscriptores" class="nav-link ">
                                        <i class="fa fa-paper-plane-o"></i>
                                    
                                        
                                        <span class="title">Suscriptores</span>
                                      
                                    </a>
                                </li>
                                <li>
                                </br>
                                </li>
                                <li>
                                <?php
$host= $_SERVER["HTTP_HOST"];
$mas="?es";
$mass="?en";
$ruta= "/tutorial/index.php";
$linkk= "http://" . $host.$ruta.$mas;
$linkkk= "http://" . $host.$ruta.$mass;
?>
 <center>
<a target="_black"  class="btn btn-verde text-uppercase" href="<?php echo $linkk;?>"><i class="fa fa-globe"></i>Web en Español</a>
</center>
                                </li>
                                </br>
                              
                                 <li>
                                </br>
                                </li>
                            </ul>
                        </li>
                    
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                  
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                   