<?php


include '../inc/config.php';


$idioma=$_GET['idioma'];

if($idioma=="espanol"){
	$x4=1;
}
if($idioma=="ingles"){
	$x4=2;
}

if (isset($_POST) && count($_POST)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{
		$query=$db->query("update galeria set ".$_POST["campo"]."='".$_POST["valor"]."' where id_galeria='".intval($_POST["id"])."' limit 1");
		if ($query) echo "<span class='ok'>Valores modificados correctamente.</span>";
		else echo "<span class='ko'>".$db->error."</span>";
	}
}

if (isset($_GET) && count($_GET)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{   
		// select * from editinplace order by idusuario asc
		
		$query=$db->query("SELECT * FROM galeria where idioma='".$x4."'");
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["id_galeria"],
							"nombre"=>$usuarios["nombre"],
							"titulo"=>$usuarios["titulo"]
						
			);
		}
		echo json_encode($datos);
	}
}
?>