<?php
//include '../inc/comun.php';

include '../inc/config.php';


//include('dbcon.php');
if($_REQUEST)
{


	$username 	= $_REQUEST['username'];
	$query = "SELECT * FROM token WHERE token = '".strtolower($username)."'";
	sleep(1);
	
       

        $result=$db->query($query);

         while( $row = $result->fetch_object() ) {
      
         $token=$row->idtoken;
         $limite2=$row->limite;

                                                    }


$count="SELECT count(id_token) FROM administrador WHERE id_token='$token'";    
$suma1 = $db->query($count);




 while ($fila =$suma1->fetch_row()) {
        $suma=$fila[0]; 
 }  



	if($result->num_rows > 0 ) {
	
		

         if($limite2<=$suma) {

			echo '<div style="color:red" id="Success">limite de codigo alcansado</div>';

		                	  }else{

			echo '<div style="color:green" id="Error">Codigo correcto</div>';	
								   }								
		
	}
	else{  
		


		echo '<div style="color:red" id="Success">Codigo Incorrecto</div>';

			 
	}

	
}?>


