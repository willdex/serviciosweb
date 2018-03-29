<?php
include_once ('clsEmpresa.php');
include_once ('clsTecnico.php');
include_once ('clsCompania.php');
include_once ('clsGalpon.php');
include_once ('clsUnidad.php');
include_once ('clsGranja.php');
include_once ('clsMaquina.php');
include_once ('clsVacunador.php');
include_once ('clsSistema_integral.php');
include_once ('clsServicio_matenimiento.php');
include_once ('clsHoja_verificacion.php');
include_once ('clsIndice_eficiencia.php');

switch ($_GET['opcion']) {
	case 'get_empresa':
		get_empresa();
		break;
	
	default:
		$dato['suceso']="0";
		$dato['mensaje']="Error descargar los datos.";
		 print json_encode($dato);
		 
		break;
}

function get_empresa()
{
	$dato=json_decode(file_get_contents("php://input"),true);
	 $emp= new Empresa();	
	 $tec= new Tecnico();	
	 $com= new Compania();	
	 $gal= new Galpon();	
	 $gra= new Granja();	
	 $maq= new Maquina();	
	 $vac= new Vacunador();
	 $uni= new Unidad();
	 $ine= new Indice_eficiencia();
	 //formularios.

	 $sim= new Sistema_Integral();
	 $ser_man= new Servicio_Mantenimiento();
	 $hoja= new Hoja_verificacion();

	 $id_tecnico=$dato['id_tecnico'];
	 $imei=$dato['imei'];
	 if(isset($id_tecnico) && isset($imei))
	 {

	 	
           $resultado_emp=$emp->buscar();
           $resultado_tec=$tec->buscar();
           $resultado_com=$com->buscar();
           $resultado_gal=$gal->buscar();
           $resultado_gra=$gra->buscar();
           $resultado_maq=$maq->buscar();
           $resultado_vac=$vac->buscar();
           $resultado_uni=$uni->buscar();
           $resultado_ine=$ine->buscar();

           
       
           $id_sim=$sim->get_id_max($id_tecnico,$imei);
           $id_ser_man=$ser_man->get_id_max($id_tecnico,$imei);
           $id_hoja=$hoja->get_id_max($id_tecnico,$imei);
          
           $empresas= array(); 
           $tecnicos=array();
           $companias=array();
           $galpones=array();
           $granjas=array();
           $maquinas=array();
           $vacunas=array();
           $unidades=array();
           $indice_efi=array();
           //formularios.
		}

if(mysqli_num_rows($resultado_emp) != 0 && mysqli_num_rows($resultado_tec) != 0 && mysqli_num_rows($resultado_com) != 0	&& mysqli_num_rows($resultado_gal) != 0 && mysqli_num_rows($resultado_gra) != 0	&& mysqli_num_rows($resultado_maq) != 0	&& mysqli_num_rows($resultado_vac) != 0 && mysqli_num_rows($resultado_uni)!=0	) {  

		while($fila = mysqli_fetch_assoc($resultado_emp)) { array_push($empresas, $fila); } 

		while($fila = mysqli_fetch_assoc($resultado_tec)) { array_push($tecnicos, $fila); } 

		while($fila = mysqli_fetch_assoc($resultado_com)) { array_push($companias, $fila); } 

		while($fila = mysqli_fetch_assoc($resultado_gal)) { array_push($galpones, $fila); } 

		 while($fila=mysqli_fetch_assoc( $resultado_gra)) {	array_push($granjas, $fila); }

		 while($fila=mysqli_fetch_assoc( $resultado_maq)) { array_push($maquinas, $fila);  }

		 while($fila=mysqli_fetch_assoc( $resultado_vac)) { array_push($vacunas, $fila);  }
		 
		 while($fila=mysqli_fetch_assoc( $resultado_uni)) { array_push($unidades, $fila);  }

		 while($fila=mysqli_fetch_assoc( $resultado_ine)) { array_push($indice_efi, $fila);  }

 			$dato['empresa']=$empresas;
		    $dato['tecnico']=$tecnicos;
		    $dato['compania']=$companias;
		    $dato['galpon']=$galpones;
		    $dato['granja']=$granjas;
		    $dato['maquina']=$maquinas;
		    $dato['vacunador']=$vacunas;
		    $dato['unidad']=$unidades;
		    $dato['indice_eficiencia']=$indice_efi;

		    $dato['id_hoja_verificacion']=$id_hoja;
		    $dato['id_servicio_mantenimiento']=$id_ser_man;
		    $dato['id_sistema_integral']=$id_sim;

		    $dato['suceso']="1";
		     $dato['mensaje']="Se actualizo la base de datos del celular correctamente.";

} else
		{
			$dato['suceso']="0";
			 $dato['mensaje']="Error al descargar los datos.";
		}

          print json_encode($dato)	;
           
 	
}
?>