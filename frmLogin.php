<?php
include_once('clsTecnico.php');

switch ($_GET['opcion']) {
	case 'login':
		login();
		break;
	
	default:
		
		break;
}

function login()
{
	$dato=json_decode(file_get_contents("php://input"),true);
	 $codigo=$dato['codigo'];  
   $tecnico=new Tecnico();
   $sql=$tecnico->buscar_por_codigo($codigo);

   if(mysqli_num_rows($sql) != 0  ) { 
      $consulta=array(); 
      while($fila = mysqli_fetch_assoc($sql)) {  
       array_push($consulta, $fila);
      } 

    $dato['mensaje']='Bienvenido ';
    $dato['suceso']='1';
    $dato['perfil']=$consulta;
    print json_encode($dato);
   }
    else
   {
    print json_encode(array("mensaje"=>'Codigo Incorrecto.',"suceso"=>"2"));
   }
}

?>