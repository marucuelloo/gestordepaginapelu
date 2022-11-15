<?php


include '../inc/config.php';

$idioma=$_GET['idioma'];
if($idioma=="ingles")
	$x4=2;
else
	$x4=1;


if (isset($_POST) && count($_POST)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{
		$query=$db->query("update modulos set ".$_POST["campo"]."='".$_POST["valor"]."' where id_modulo='".intval($_POST["id"])."' limit 1");
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
		
		$query=$db->query("SELECT * FROM modulos where idioma='".$x4."' ");
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["id_modulo"],
							"nombre"=>$usuarios["nombre"]
						
			);
		}
		echo json_encode($datos);
	}
}
?>