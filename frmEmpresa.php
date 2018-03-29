<?php
include_once ('clsEmpresa.php');

switch ($_GET['opcion']) {
	case 'get_empresa':
		get_empresa();
		break;
	
	default:
		
		break;
}

function get_empresa()
{
	 $obj= new Empresa();	

           $resultado=$obj->buscar();
           $empresas= array(); 
        while($fila=mysqli_fetch_object( $resultado)) {
 array_push($empresas, $fila);
    }
          print json_encode($empresas)	;
           
 	
}
?>