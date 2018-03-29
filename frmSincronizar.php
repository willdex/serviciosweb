<?php
include_once ('clsCentros.php');
//maquina zootec... maquina stwin shot... maquina spravac
include_once ('clsServicio_matenimiento.php');
include_once ('clsInspeccion_visual.php');
include_once ('clsInspeccion_funcionamiento.php');
include_once ('clsLimpieza.php');
include_once ('clsDetalle_inspeccion_visual.php');
include_once ('clsDetalle_inspeccion_funcionamiento.php');
include_once ('clsDetalle_limpieza.php');

//parte de rodrigo SISTEMA INTEGRAL DE MONITOREO
include_once('clsSistema_integral.php');
include_once('clsPuntuacion.php');
include_once('clsDetalle_puntuacion.php');
include_once('clsPeso.php');

//hoja de verificacion...
include_once('clsHoja_verificacion.php');
include_once('clsAccion.php');
include_once('clsDetalle_accion.php');
include_once('clsManipulacion_dilucion.php');
include_once('clsMantenimiento_limpieza.php');
include_once('clsControl_indice.php');
include_once('clsLinea_genetica.php');
include_once('clsViabilidad_celular.php');


switch ($_GET['opcion']) 
{
	case 'cargar_datos_servicio_mantenimiento':

  $dato=json_decode(file_get_contents("php://input"),true);
   $js_servicio=$dato['servicio_mantenimiento'];
   $js_inspeccion_visual=$dato['inspeccion_visual'];
   $js_detalle_inspeccion_visual=$dato['detalle_inspeccion_visual'];
   $js_inspeccion_funcionamiento=$dato['inspeccion_funcionamiento'];
   $js_detalle_inspeccion_funcionamiento=$dato['detalle_inspeccion_funcionamiento'];
   $js_limpieza=$dato['limpieza'];
   $js_detalle_limpieza=$dato['detalle_limpieza'];

    cargar_datos_formulario_de_maquinas($js_servicio,$js_inspeccion_visual,$js_detalle_inspeccion_visual,$js_inspeccion_funcionamiento,$js_detalle_inspeccion_funcionamiento,$js_limpieza,$js_detalle_limpieza);

		break;

    case 'cargar_datos_hoja_verificacion':

      $dato=json_decode(file_get_contents("php://input"),true);

      $js_hoja_verificacion=$dato['hoja_verificacion'];
      $js_accion=$dato['accion'];
      $js_detalle_accion=$dato['detalle_accion'];
      $js_manipulacion_dilucion=$dato['manipulacion_dilucion'];
      $js_mantenimiento_limpieza=$dato['mantenimiento_limpieza'];
      $js_control_indice=$dato['control_indice'];
      $js_sum_pro_control_indice=$dato['sum_pro_control_indice'];
      $js_linea_genetica=$dato['linea_genetica'];
      $js_viabilidad_celular=$dato['viabilidad_celular'];

     cargar_hoja_verificacion($js_hoja_verificacion,$js_accion,$js_detalle_accion,$js_manipulacion_dilucion,$js_control_indice,$js_linea_genetica,$js_viabilidad_celular,$js_mantenimiento_limpieza,$js_sum_pro_control_indice);
   
    break;

    case 'cargar_datos_sistema_integral':
    
      $dato=json_decode(file_get_contents("php://input"),true);
      $js_sistema_integral=$dato['sistema_integral'];
      $js_puntuacion=$dato['puntuacion'];
      $js_detalle_puntuacion=$dato['detalle_puntuacion'];
      $js_peso=$dato['peso'];
      cargar_datos_Sistema_Integral($js_sistema_integral,$js_puntuacion,$js_detalle_puntuacion,$js_peso);
    break;
     case 'cargar_centros':
    
      $dato=json_decode(file_get_contents("php://input"),true);
      $js_centros=$dato['centros'];
      cargar_centros($js_centros);
    break;
	
	default:
		
		break;
}

//REGISTRO DE LA MAQUINA SPRA-VAC.. MAQUINA STWIN SHOT... MAQUINA SPRAVAC
function cargar_datos_formulario_de_maquinas($js_servicio,$js_inspeccion_visual,$js_detalle_inspeccion_visual,$js_inspeccion_funcionamiento,$js_detalle_inspeccion_funcionamiento,$js_limpieza,$js_detalle_limpieza)
{
    $array = json_decode($js_servicio);
    $total_SM=0;
    $registrado_SM=0;
    $id_SM=0;
    
    $total_IV=0;
    $registrado_IV=0;
    $total_DIV=0;
    $registrado_DIV=0;
    $total_IF=0;
    $registrado_IF=0;
    $total_DIF=0;
    $registrado_DIF=0;
    $total_L=0;
    $registrado_L=0;
    $total_DL=0;
    $registrado_DL=0;

  try
  {
    foreach($array as $obj)
    {
      //inicio se registro de SERVICIO MANTENIMIENTO.
            			     $id=$obj->id;
                        $fecha=$obj->fecha;
                        $hora_ingreso=$obj->hora_ingreso;
                        $hora_salidas=$obj->hora_salidas;
                        $codigo=$obj->codigo;
                        $revision=$obj->revision;
                        $firma_jefe_planta=$obj->firma_jefe;
                        $firma_invetsa=$obj->firma_invetsa;
                        $maquina=$obj->maquina;
                        $id_tecnico=$obj->id_tecnico;
                        $id_compania=$obj->id_compania;
                         $imei=$obj->imei;
                        $formulario=$obj->formulario;
                        $imagen_jefe=$obj->imagen_jefe;
                        $jefe_planta=$obj->jefe_planta;
                        $encargado_maquina=$obj->encargado_maquina;
                        $ultima_visita=$obj->ultima_visita;
                        $planta_de_incubacion=$obj->planta_de_incubacion;
                        
                        $direccion=$obj->direccion;
                        $encargado_maquina=$obj->encargado_maquina;

                           $imagen1=$obj->imagen1;
                          $imagen2=$obj->imagen2;
                          $imagen3=$obj->imagen3;
                          $imagen4=$obj->imagen4;
                          $imagen5=$obj->imagen5;
                          $imagen6=$obj->imagen6;
                          $imagen7=$obj->imagen7;
                          $imagen8=$obj->imagen8;
                          $imagen9=$obj->imagen9;
                          $imagen10=$obj->imagen10;



                       $servicio_m=new Servicio_Mantenimiento();
                       $servicio_m->Servicio_Mantenimiento2($codigo,$fecha,$firma_invetsa,$firma_jefe_planta,$hora_ingreso,$hora_salidas,
                        $id_compania,$maquina,$id_tecnico,$revision,$id,$imei,$formulario,$imagen_jefe,$jefe_planta,
                        $encargado_maquina,$ultima_visita,$planta_de_incubacion,$direccion,$encargado_maquina,
                        $imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10 
                       );


                       $exi=$servicio_m->existe_id_sqlite($id,$imei);
                      
            
                       if($exi!=true)
                       {
                        $g=$servicio_m->guardar();
                       
                       	 if($g==true)
                       	 {
                           $id_SM=$servicio_m->get_id_por_sqlite($id,$imei);
                       	 	$registrado_SM=$registrado_SM+1;
                       	 }
                        
                       } 



                       $total_SM=$total_SM+1;               
    }
  //fin del registro del SERVICIO MANTENIMIENTO..

  if($registrado_SM>0)
  {
  // Inicio de registro de INSPECCION VISUAL si se registro correctamente en SERVICIO MANTENIMIENTO.
  $array = json_decode($js_inspeccion_visual);

  foreach($array as $obj)
  {
    //inicio se registro de INSPECCION VISUAL.
                      $id=$obj->id;
                      $observaciones=$obj->observaciones;
                      $piezas_cambiadas=$obj->piezas_cambiadas;
                      $id_sqlite=$obj->id_servicio;
                      $imei=$obj->imei;    

                      $servicio_m=new Servicio_Mantenimiento();
                     $id_servicio=$servicio_m->get_id_por_sqlite($id_sqlite,$imei);
                     
                     $inspeccion_v=new Inspeccion_visual();


                     $inspeccion_v->preparar($observaciones,$piezas_cambiadas,$id_servicio,$id,$imei);
                     
                     if($id_servicio!=-1 )
                     {

                      $g=$inspeccion_v->guardar();
                       if($g==true)
                       {
                        $registrado_IV=$registrado_IV+1;
                       }
                     } 
                     $total_IV=$total_IV+1;                                  
  }

// Fin de registro de INSPECCION VISUAL si se registro correctamente en SERVICIO MANTENIMIENTO.     

  // Inicio de registro de DETALLE INSPECCION VISUAL si se registro correctamente en SERVICIO MANTENIMIENTO.
  $array = json_decode($js_detalle_inspeccion_visual);

  foreach($array as $obj)
  {
  //inicio se registro de DETALLE INSPECCION VISUAL.
                     $id=$obj->id;
                    $id_inspeccion=$obj->id_inspeccion;
                    $id_sqlite=$obj->id_servicio;
                    $codigo=$obj->codigo;
                    $descripcion=$obj->descripcion;
                    $estado=$obj->estado;
                    $imei=$obj->imei;
                    $bueno=$obj->bueno;
                    $regular=$obj->regular;
                    $malo=$obj->malo;
                   
                 
                    $servicio_m=new Servicio_Mantenimiento();
                     $id_servicio=$servicio_m->get_id_por_sqlite($id_sqlite,$imei);
                      
                   $detalle_inspeccion_v=new Detalle_inspeccion_visual();
                   $detalle_inspeccion_v->preparar($codigo,$descripcion,$id,$id_inspeccion,$id_servicio,$imei,$bueno,$regular,$malo,$estado);
  
                   if($id_servicio!=-1)
                   {    
                    $g=$detalle_inspeccion_v->guardar();
                    if($g==true)
                    {
                      $registrado_DIV=$registrado_DIV+1;
                    }
                   }
              $total_DIV=$total_DIV+1;
  }
  // Fin de registro de DETALLE INSPECCION VISUAL si se registro correctamente en SERVICIO MANTENIMIENTO.               


  // Inicio de registro de INSPECCION FUNCIONAMIENTO si se registro correctamente en SERVICIO MANTENIMIENTO.

  $array = json_decode($js_inspeccion_funcionamiento);
  foreach($array as $obj)
  {
  //inicio se registro de INSPECCION FUNCIONAMIENTO.
                    $id=$obj->id;
                    $observaciones=$obj->observaciones;
                    $frecuencia_de_uso=$obj->frecuencia;
                    $id_sqlite=$obj->id_servicio;
                    $imei=$obj->imei;
                    


                    $servicio_m=new Servicio_Mantenimiento();
                   $id_servicio=$servicio_m->get_id_por_sqlite($id_sqlite,$imei);
                   
                   $inspeccion_f=new Inspeccion_funcionamiento();
                   $inspeccion_f->preparar($observaciones,$frecuencia_de_uso,$id_servicio,$id,$imei);
        
                   if($id_servicio!=-1)
                   {
                    $g=$inspeccion_f->guardar();
                    if($g==true)
                    {
                      $registrado_IF=$registrado_IF+1;
                    }
                   } 
                   $total_IF=$total_IF+1;
                                
  }
  // Fin de registro de INSPECCION FUNCIONAMIENTO si se registro correctamente en SERVICIO MANTENIMIENTO.     

  // Inicio de registro de DETALLE INSPECCION FUNCIONAMIENTO si se registro correctamente en SERVICIO MANTENIMIENTO.
  $array = json_decode($js_detalle_inspeccion_funcionamiento);

  foreach($array as $obj)
  {
  //inicio se registro de DETALLE INSPECCION FUNCIONAMIENTO.
                     $id=$obj->id;
                    $id_inspeccion=$obj->id_inspeccion;
                    $criterio_evaluacion=$obj->criterio_evaluacion;
                     $id_sqlite=$obj->id_servicio;
                    $imei=$obj->imei;
                    $bueno=$obj->bueno;
                    $malo=$obj->malo;
                    $estado=$obj->estado;
                   
                   
                    $servicio_m=new Servicio_Mantenimiento();
                     $id_servicio=$servicio_m->get_id_por_sqlite($id_sqlite,$imei);
                  
                   $detalle_inspeccion_f=new Detalle_inspeccion_funcionamiento();
                   $detalle_inspeccion_f->preparar($criterio_evaluacion,$id,$id_inspeccion,$id_servicio,$imei,$bueno,$malo,$estado);
        
                   if($id_servicio!=-1)
                   {
                    $g=$detalle_inspeccion_f->guardar();                  
                    if($g==true)
                    {
                      $registrado_DIF=$registrado_DIF+1;
                    }
                   }    
                   $total_DIF=$total_DIF+1;                            
  }
  // Fin de registro de DETALLE INSPECCION FUNCIONAMIENTO si se registro correctamente en SERVICIO MANTENIMIENTO. 

/*

    $array = json_decode($js_limpieza);
  foreach($array as $obj)
  {
  //inicio se registro de LIMPIEZA.
                    $id=$obj->id;
                    $observaciones=$obj->observaciones;
                    $cantidad_de_aves=$obj->cantidad_de_aves;
                    $id_sqlite=$obj->id_servicio;
                     $imei=$obj->imei;

                    $servicio_m=new Servicio_Mantenimiento();
                   $id_servicio=$servicio_m->get_id_por_sqlite($id_sqlite,$imei);
                   
                   $limpieza=new Limpieza();
                   $limpieza->preparar($observaciones,$cantidad_de_aves,$id_servicio,$id,$imei);
        
                   if($id_servicio!=-1)
                   {
                    $g=$limpieza->guardar();
                    if($g==true)
                    {
                      $registrado_L=$registrado_L+1;
                    }
                   } 
                   $total_L=$total_L+1;
                                
  }


  $array = json_decode($js_detalle_limpieza);

  foreach($array as $obj)
  {
  //inicio se registro de DETALLE INSPECCION FUNCIONAMIENTO.
                     $id=$obj->id;
                    $id_inspeccion=$obj->id_inspeccion;
                    $criterio_evaluacion=$obj->criterio_evaluacion;
                    $bueno=$obj->bueno;
                    $malo=$obj->malo;
                     $id_sqlite=$obj->id_servicio;
                    $imei=$obj->imei;
                   
                   
                    $servicio_m=new Servicio_Mantenimiento();
                     $id_servicio=$servicio_m->get_id_por_sqlite($id_sqlite,$imei);
                  
                   $detalle_limpieza=new Detalle_limpieza();
                   $detalle_limpieza->preparar($criterio_evaluacion,$id,$id_inspeccion,$id_servicio,$imei,$bueno,$malo);
        
                   if($id_servicio!=-1)
                   {
                    $g=$detalle_limpieza->guardar();                  
                    if($g==true)
                    {
                      $registrado_DL=$registrado_DL+1;
                    }
                   }    
                   $total_DL=$total_DL+1;                            
  }
  // Fin de registro de DETALLE LIMPIEZA si se registro correctamente en SERVICIO MANTENIMIENTO. 


*/
  }


if($total_SM==$registrado_SM && $total_IV==$registrado_IV && $total_DIV==$registrado_DIV && $total_IF==$registrado_IF && $total_DIF==$registrado_DIF && $id_SM!=0 && $total_SM>0)
{
   print json_encode(array("mensaje"=>'Se guardo correctamente',"id_servicio_mantenimiento"=>$id_SM,"suceso"=>"1"));
}
else
{
  /*  echo " total_SM=".$total_SM.
    " registrado_SM=".$registrado_SM.
    " ID=".$id_SM.
    
    " total_IV=".$total_IV.
    " registrado_IV=".$registrado_IV.
    " total_DIV=".$total_DIV.
    " registrado_DIV=".$registrado_DIV.
    " total_IF=".$total_IF.
    " registrado_IF=".$registrado_IF.
    " total_DIF=".$total_DIF.
    " registrado_DIF=".$registrado_DIF.
    " total_L=".$total_L.
    " registrado_L=".$registrado_L.
    " total_DL=".$total_DL.
    " registrado_DL=".$registrado_DL;
*/
  $servicio_m2=new Servicio_Mantenimiento();
  $sw=$servicio_m2->vaciar_registro($id_SM);
   print json_encode(array("mensaje"=>'Vuelva a intentarlo en otro momento.',"suceso"=>"2"));  
}
 
  
  } //fin de Try
  catch(Exception $e)
  {
  print json_encode(array("mensaje"=>'Error al registrar.',"suceso"=>"2"));
  }

  } //fin de funcion cargar datos


  //sistema integral de monitoreo
  function cargar_datos_Sistema_Integral($js_sistema_integral,$js_puntuacion,$js_detalle_puntuacion,$js_peso)
  {
    $array=json_decode($js_sistema_integral);

    $id_SI=0;
    $total_PESO=0;
    $total_PUNT=0;
    $total_D_P=0;
    $total_SI=0;
    $registrado_PESO=0;
    $registrado_PUNT=0;
    $registrado_D_P=0;
    $registrado_SI=0;

    
    
    try
    {
        foreach($array as $obj)
        {
            $id=$obj->id;
            $codigo=$obj->codigo;
            $revision=$obj->revision;
            $edad=$obj->edad;
            $sexo=$obj->sexo;
            $observaciones=$obj->observaciones;
            $imagen1=$obj->imagen1;
            $imagen2=$obj->imagen2;
            $imagen3=$obj->imagen3;
            $imagen4=$obj->imagen4;
            $imagen5=$obj->imagen5;
            $imagen6=$obj->imagen6;
            $imagen7=$obj->imagen7;
            $imagen8=$obj->imagen8;
            $imagen9=$obj->imagen9;
            $imagen10=$obj->imagen10;
            $fecha=$obj->fecha;
            $nro_pollos=$obj->nro_pollos;
            $id_galpon=$obj->id_galpon;
            $id_granja=$obj->id_granja;
            $id_empresa=$obj->id_empresa;
            $imei=$obj->imei;
            $firma_invetsa=$obj->firma_invetsa;
            $firma_empresa=$obj->firma_empresa;
            $id_tecnico=$obj->id_tecnico;
            $imagen_jefe=$obj->imagen_jefe;
            $comentarios=$obj->comentarios;
            $referencia=$obj->referencia;
            
            $sistema_integral_m=new Sistema_Integral();
            
            $sistema_integral_m->preparar($codigo,$edad,$id_empresa,$id_galpon,$id_granja,
              $imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,
              $observaciones,$revision,$fecha,$nro_pollos,$sexo,$id,$imei,$firma_invetsa,$firma_empresa,$id_tecnico,$imagen_jefe,$comentarios,$referencia);

            $exi=$sistema_integral_m->existe_id_sqlite($id,$imei);
            
            if($exi!=true)
            {
                $g=$sistema_integral_m->guardar();
                if($g==true)
                { $id_SI=$sistema_integral_m->get_id_por_sqlite($id,$imei);
                    $registrado_SI=$registrado_SI+1;
                }
            }
            
            $total_SI=$total_SI+1; 
        } 
        
        if($registrado_SI>0)
        {
            //inicio registro de Puntuacion
            $array=json_decode($js_puntuacion);
            
            foreach($array as $obj)
            {
               $id=$obj->id;
               $id_sistema=$obj->id_sistema;
               $nombre=$obj->nombre;
               $imei=$obj->imei;
               
               $sistema_integral_m=new Sistema_Integral();
               $id_sistema_m=$sistema_integral_m->get_id_por_sqlite($id_sistema,$imei);
               
               $puntuacion_s=new Puntuacion();
               $puntuacion_s->preparar($id,$nombre,$id_sistema_m,$imei,$id_sistema);
               $exi=$puntuacion_s->existe_id($id,$id_sistema,$imei);

               if($id_sistema_m!=-1&&$exi!=true)
               {
                $g=$puntuacion_s->guardar();
                if($g==true)
                {
                  $registrado_PUNT=$registrado_PUNT+1;
                }
               }
               $total_PUNT=$total_PUNT+1;
            }
            
            $array = json_decode($js_detalle_puntuacion);
            foreach($array as $obj)
            {
                //registro de Detalle Puntuacion
                $id=$obj->id;
                $nombre=$obj->nombre;
                $estado=$obj->estado;
                $id_puntuacion=$obj->id_puntuacion;
                 $id_sistema=$obj->id_sistema;
                $imei=$obj->imei;
                
                $sistema_integral_m=new Sistema_Integral();
               $id_sistema_m=$sistema_integral_m->get_id_por_sqlite($id_sistema,$imei);
               $detalle_puntuacion_s=new Detalle_puntuacion(); 

               $detalle_puntuacion_s->preparar($id,$nombre,$estado,$id_puntuacion,$id_sistema_m,$imei,$id_puntuacion,$id_sistema);
               $exi=$detalle_puntuacion_s->existe_id($id,$id_puntuacion,$id_sistema_m,$imei);

               if($id_sistema_m!=-1&&$exi!=true)
               {
                $g=$detalle_puntuacion_s->guardar();
                if($g==true)
                {
                  $registrado_D_P=$registrado_D_P+1;
                }
               }
               $total_D_P=$total_D_P+1;
                //continuar..... ultimo
            }
//registrar PESO
             $array = json_decode($js_peso);
            foreach($array as $obj)
            {
                $id=$obj->id;
                $peso_corporal=$obj->peso_corporal;
                $peso_bursa=$obj->peso_bursa;
                $peso_brazo=$obj->peso_brazo;
                $peso_timo=$obj->peso_timo;
                $peso_higado=$obj->peso_higado;
                $indice_bursal=$obj->indice_bursal;
                $indice_timico=$obj->indice_timico;
                $indice_hepatico=$obj->indice_hepatico;
                $bursometro=$obj->bursometro;
                $id_sistema=$obj->id_sistema;
                $imei=$obj->imei;

                $sistema_integral_m=new Sistema_Integral();
               $id_sistema_m=$sistema_integral_m->get_id_por_sqlite($id_sistema,$imei);
               $peso=new Peso();
               $peso->preparar($bursometro,$id,$id_sistema_m,$indice_bursal,$indice_hepatico,$indice_timico,$peso_bursa,$peso_brazo,$peso_corporal,$peso_higado,$peso_timo,$imei);
               $exi=$peso->existe_id($id,$id_sistema_m,$imei);
              
            
               if($id_sistema_m!=-1&&$exi!=true)
               {
                $g=$peso->guardar();
                if($g==true)
                {
                  $registrado_PESO=$registrado_PESO+1;
                }
               }
               $total_PESO=$total_PESO+1;
                //continuar..... ultimo
            }
        
              
    }

    if($total_SI==$registrado_SI && $id_SI>0 && $total_PESO==$registrado_PESO && $total_PUNT==$registrado_PUNT && $total_D_P==$registrado_D_P && $total_SI>0)
    {
      print json_encode(array("mensaje"=>'Se guardo correctamente ',"id_sistema_integral"=>$id_SI,"suceso"=>"1"));
    }
    else
    { 
      //echo "total_SI=".$total_SI." registrado_SI=".$registrado_SI." total_PESO=".$total_PESO." registrado_PESO=".$registrado_PESO." total_PUNT=".$total_PUNT." registrado_PUNT=".$registrado_PUNT." total_D_P=".$total_D_P." registrado_D_P=".$registrado_D_P;
        $sistema_m2=new Sistema_Integral();
        $sw=$sistema_m2->vaciar_registro($id_SI);
     print json_encode(array("mensaje"=>'Vuelva a intentarlo.',"suceso"=>"2"));   
    }
  }catch(Exception $e)
  {
    print json_encode(array("mensaje"=>'Error al registrar.',"suceso"=>"2"));
  }
}
  //REGISTRO DE LA MAQUINA TWIN SHOT





function cargar_hoja_verificacion($js_hoja_verificacion,$js_accion,$js_detalle_accion,$js_manipulacion_dilucion,$js_control_indice,$js_linea_genetica,$js_viabilidad_celular,$js_mantenimiento_limpieza,$js_sum_pro_control_indice)
{
    $total_HV=0;
    $registrado_HV=0;
    $id_HV=0;
    
    $total_CI=0;
    $registrado_CI=0;
     $total_SCI=0;
    $registrado_SCI=0;
    $total_MD=0;
    $registrado_MD=0;
    $total_DA=0;
    $registrado_DA=0;
    $total_AC=0;
    $registrado_AC=0;
    $total_LG=0;
    $registrado_LG=0;
    $total_VC=0;
    $registrado_VC=0;
    $total_ML=0;
    $registrado_ML=0;
   

    $array = json_decode($js_hoja_verificacion);
    $total=0;
    $registrado=0;
  try
  {
  
    foreach($array as $obj)
    {
      //inicio se registro de HOJA_VERIFICACION
                 
                        $codigo=$obj->codigo;
                        $firma_empresa=$obj->firma_empresa;
                        $firma_invetsa=$obj->firma_invetsa;
                        $hora_ingreso=$obj->hora_ingreso;
                        $hora_salida=$obj->hora_salidas;
                        $id_sqlite=$obj->id;
                        $id_empresa=$obj->id_empresa;
                        $id_unidad=$obj->id_unidad;
                        $id_granja=$obj->id_granja;
                        $productividad=$obj->productividad;
                        $promedio_mantenimiento=$obj->promedio_mantenimiento;
                        $puntaje_control_indice=$obj->puntaje_control_indice;
                        $revision=$obj->revision;
                        $sumatoria_manipulacion_vacuna=$obj->sumatoria_manipulacion_vacuna;
                        $imei=$obj->imei;
                        $fecha=$obj->fecha;
                        $id_tecnico=$obj->id_tecnico;
                        $imagen_jefe=$obj->imagen_jefe;
                        $responsable_invetsa=$obj->responsable_invetsa;
                        $responsable_incubadora=$obj->responsable_incubadora;
                        $total_vc=$obj->total_vc;
                        $puntaje_total=$obj->puntaje_total;
                        $irregularidad_15=$obj->irregularidad_15;
                        $recomendaciones=$obj->recomendaciones;
                        $otras_irregularidades=$obj->otras_irregularidades;


                       $hoja_verificacion=new Hoja_verificacion();
                       $hoja_verificacion->Hoja_verificacion2($codigo,$firma_empresa,$firma_invetsa,$hora_ingreso,$hora_salida,$id_sqlite,$id_empresa,$id_unidad,$id_granja,$productividad,$promedio_mantenimiento,$puntaje_control_indice,$revision,$sumatoria_manipulacion_vacuna,$imei,$fecha,$id_tecnico,$imagen_jefe,$responsable_invetsa,$responsable_incubadora,$total_vc,$puntaje_total,$irregularidad_15,$recomendaciones,$otras_irregularidades);


                       $exi=$hoja_verificacion->existe_id_sqlite($id_sqlite,$imei);
                     
                       if($exi!=true||$exi==false)
                       {
                     
                      
                        $g=$hoja_verificacion->guardar();

                         if($g==true)
                         {
                             $id_HV=$hoja_verificacion->get_id_por_sqlite($id_sqlite,$imei);
                             $registrado_HV=$registrado_HV+1;
                         }
                        
                       } 


                       $total_HV=$total_HV+1;    

    }
  //fin del registro del HOJA VERIFICACION..

  if($registrado_HV>0)
  {
 //inicio de registro de LINEA GENETICA ..  
  $array = json_decode($js_linea_genetica);
  foreach($array as $obj)
  {
    //inicio se registro de LINEA GENETICA.
   
                      $id=$obj->id;
                      $descripcion=$obj->descripcion;
                      $cobb=$obj->cobb;
                      $ross=$obj->ross; 
                      $id_hoja_verificacion=$obj->id_hoja_verificacion;
                      $imei=$obj->imei;
                       
                   
                      $hoja_verificacion=new Hoja_verificacion();
                     $id_hoja_verificacion_m=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                       
                   $linea_genetica=new Linea_genetica();
                   $linea_genetica->preparar($id,$descripcion,$cobb,$ross, $id_hoja_verificacion_m,$imei);
  
                   if($id_hoja_verificacion_m!=-1)
                   {     
                    $g=$linea_genetica->guardar();
                     if($g==true)
                     {
                      $registrado_LG=$registrado_LG+1;
                     }
                   }
                   $total_LG=$total_LG+1; 
                   
                                  
  }

  // Inicio de registro de ACCION si se registro correctamente en SERVICIO MANTENIMIENTO.
  $array = json_decode($js_accion);

  foreach($array as $obj)
  {
    //inicio se registro de ACCION.
                      $id_sqlite=$obj->id;
                      $id_hoja_verificacion=$obj->id_hoja_verificacion;
                      $nombre=$obj->nombre;
                      $imei=$obj->imei;    

                      $hoja_verificacion=new Hoja_verificacion();
                     $id_hoja_verificacion=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                     
                     $accion=new Accion();


                     $accion->preparar($id_sqlite,$id_hoja_verificacion,$nombre,$imei);
                     $exi=$accion->existe_id($id_sqlite,$id_hoja_verificacion,$imei);
                     if($id_hoja_verificacion!=-1 && $exi!=true)
                     {

                      $g=$accion->guardar();
                      if($g==true)
                      {
                        $registrado_AC=$registrado_AC+1;
                      }
                      
                     }
                     $total_AC=$total_AC+1; 
                                  
  }
// Fin de registro de ACCION si se registro correctamente en SERVICIO MANTENIMIENTO.     

  // Inicio de registro de DETALLE ACCION si se registro correctamente en SERVICIO MANTENIMIENTO.
  $array = json_decode($js_detalle_accion);

  foreach($array as $obj)
  {
  //inicio se registro de DETALLE ACCION.
                    $id=$obj->id;
                    $esperado=$obj->esperado;
                    $encontrado=$obj->encontrado;
                    $id_accion=$obj->id_accion;
                    $id_hoja_verificacion=$obj->id_hoja_verificacion;
                    $imei=$obj->imei;


                     $hoja_verificacion=new Hoja_verificacion();
                     $id_hoja_verificacion_m=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                       
                   $detalle_accion=new Detalle_accion();
                   $detalle_accion->preparar($encontrado,$esperado,$id,$id_accion,$id_hoja_verificacion_m,$imei);
  
                   if($id_accion!=-1)
                   {     
                    $g=$detalle_accion->guardar();
                     if($g==true)
                     {
                      $registrado_DA=$registrado_DA+1;
                     }
                   }
                   $total_DA=$total_DA+1;                                
  }
  // Fin de registro de DETALLE ACCION si se registro correctamente en SERVICIO MANTENIMIENTO.               


  // Inicio de registro de MANIPULACION DILUCION si se registro correctamente en SERVICIO MANTENIMIENTO.

  $array = json_decode($js_manipulacion_dilucion);
  foreach($array as $obj)
  {
  //inicio se registro de MANIPULACION DILUCION.

                    $id=$obj->id;
                    $descripcion=$obj->descripcion;
                    $id_hoja_verificacion=$obj->id_hoja_verificacion;
                    $puntaje=$obj->puntaje;
                    $imei=$obj->imei;
                    $observacion=$obj->observacion;
                    $otras_irregularidades=$obj->otras_irregularidades;

                    $hoja_verificacion=new Hoja_verificacion();
                   $id_hoja_verificacion=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                
                   
                   $manipulacion_dilucion=new Manipulacion_dilucion();


                   $manipulacion_dilucion->preparar($descripcion,$id,$id_hoja_verificacion,$puntaje,$imei,$observacion,$otras_irregularidades);
        
                   $exi=$manipulacion_dilucion->existe_id($id,$id_hoja_verificacion,$imei);
                   if($id_hoja_verificacion!=-1 && $exi!=true)
                   {
                    $g=$manipulacion_dilucion->guardar();
                    if($g==true)
                    {
                      $registrado_MD=$registrado_MD+1;
                    }
                   } 
                   $total_MD=$total_MD+1;                                
  }
  // Fin de registro de MANIPULACION DILUCION si se registro correctamente en SERVICIO MANTENIMIENTO.     

  // Inicio de registro de MANTENIMIENTO LIMPIEZA si se registro correctamente en .
  $array = json_decode($js_mantenimiento_limpieza);
  foreach($array as $obj)
  {
  //inicio se registro de MANTENIMIENTO LIMPIEZA.

                    $id=$obj->id;
                    $id_hoja_verificacion=$obj->id_hoja_verificacion;
                    $id_vacunador=$obj->id_vacunador;
                    $nro_maquina=$obj->nro_maquina;
                    $irregularidad1=$obj->irregularidad1;
                    $irregularidad2=$obj->irregularidad2;
                    $irregularidad3=$obj->irregularidad3;
                    $irregularidad4=$obj->irregularidad4;
                    $irregularidad5=$obj->irregularidad5;
                    $irregularidad6=$obj->irregularidad6;
                    $irregularidad7=$obj->irregularidad7;
                    $irregularidad8=$obj->irregularidad8;
                    $irregularidad9=$obj->irregularidad9;
                    $irregularidad10=$obj->irregularidad10;
                    $irregularidad11=$obj->irregularidad11;
                    $irregularidad12=$obj->irregularidad12;
                    $irregularidad13=$obj->irregularidad13;
                    $irregularidad14=$obj->irregularidad14;
                    $irregularidad15=$obj->irregularidad15;
                    $imei=$obj->imei;
                   
                   
                   $hoja_verificacion=new Hoja_verificacion();
                   $id_hoja_verificacion=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                  
                   $mantenimiento_limpieza=new Mantenimiento_limpieza();
                   $mantenimiento_limpieza->preparar($id,$id_hoja_verificacion,$id_vacunador,$nro_maquina,$irregularidad1,$irregularidad2,$irregularidad3,$irregularidad4,$irregularidad5,$irregularidad6,$irregularidad7,$irregularidad8,$irregularidad9,$irregularidad10,$irregularidad11,$irregularidad12,$irregularidad13,$irregularidad14,$irregularidad15,$imei);
        
                   if($id_hoja_verificacion!=-1)
                   {
                    $g=$mantenimiento_limpieza->guardar(); 
                    if($g==true)
                    {
                      $registrado_ML=$registrado_ML+1;
                    }                   
                   }                                
                   $total_ML=$total_ML+1;
  }
  // Fin de registro de MANTENIMIENTO LIMPIEZA si se registro correctamente en . 

 // Inicio de registro de CONTROL INDICE si se registro correctamente en .
  $array = json_decode($js_control_indice);
  foreach($array as $obj)
  {
  //inicio se registro de CONTROL INDICE.

                    $id_sqlite=$obj->id;
                    $id_hoja_verificacion=$obj->id_hoja_verificacion;
                    $id_vacunador=$obj->id_vacunador;
                    $nro_heridos=$obj->nro_heridos;
                    $nro_mala_posicion=$obj->nro_mala_posicion;
                    $nro_mojados=$obj->nro_mojados;
                    $nro_pollos_controlados=$obj->nro_pollos_controlados;
                    $nro_pollos_no_vacunados=$obj->nro_pollos_no_vacunados;
                    $nro_pollos_vacunado=$obj->nro_pollos_vacunado;
                    $nro_pollos_vacunados_correctamente=$obj->nro_pollos_vacunados_correctamente;
                    $puntaje=$obj->puntaje;
                    $imei=$obj->imei;
                    $indice_eficiencia=$obj->indice_eficiencia;
                   
                   
                   $hoja_verificacion=new Hoja_verificacion();
                   $id_hoja_verificacion=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                  
                   $control_indice=new Control_indice();
                   $control_indice->preparar(
                    $id_sqlite,
                    $id_hoja_verificacion,
                    $id_vacunador,
                    $nro_heridos,
                    $nro_mala_posicion,
                    $nro_mojados,
                    $nro_pollos_controlados,
                    $nro_pollos_no_vacunados,
                    $nro_pollos_vacunado,
                    $nro_pollos_vacunados_correctamente,
                    $puntaje,
                    $imei,
                    $indice_eficiencia);
                  
              //  echo "id_hoja:".$id_hoja_verificacion;
                   if($id_hoja_verificacion!=-1)
                   {
                    $g=$control_indice->guardar(); 
                    if($g==true)
                    {
                      $registrado_CI=$registrado_CI+1;
                    }                   
                   }                                
                   $total_CI=$total_CI+1;
  }
  // Fin de registro de CONTROL INDICE si se registro correctamente en . 


// Inicio de registro de CONTROL INDICE si se registro correctamente en .
  $array = json_decode($js_sum_pro_control_indice);
  foreach($array as $obj)
  {
  //inicio se registro de SUMATORIA PROMEDIO CONTROL INDICE.

                    $suma1=$obj->sum1;
                    $suma2=$obj->sum2;
                    $suma3=$obj->sum3;
                    $suma4=$obj->sum4;
                    $suma5=$obj->sum5;
                    $suma6=$obj->sum6;
                    $suma7=$obj->sum7;
                    $suma8=$obj->sum8;
                    $suma9=$obj->sum9;
                    $pro1=$obj->pro1;
                    $pro2=$obj->pro2;
                    $pro3=$obj->pro3;
                    $pro4=$obj->pro4;
                    $pro5=$obj->pro5;
                    $pro6=$obj->pro6;
                    $pro7=$obj->pro7;
                    $pro8=$obj->pro8;
                    $pro9=$obj->pro9;

                    $id_hoja_verificacion=$obj->id_hoja_verificacion;
                    $imei=$obj->imei; 
                   
                   $hoja_verificacion=new Hoja_verificacion();
                   $id_hoja_verificacion=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                  
                   $sum_pro_control_indice=new Sum_pro_control_indice();
                   $sum_pro_control_indice->preparar(
                                      $suma1,
                                      $suma2,
                                      $suma3,
                                      $suma4,
                                      $suma5,
                                      $suma6,
                                      $suma7,
                                      $suma8,
                                      $suma9,
                                      $pro1,
                                      $pro2,
                                      $pro3,
                                      $pro4,
                                      $pro5,
                                      $pro6,
                                      $pro7,
                                      $pro8,
                                      $pro9,
                                      $id_hoja_verificacion,
                                      $imei);
        
                   if($id_hoja_verificacion!=-1)
                   {
                    $g=$sum_pro_control_indice->guardar(); 
                    if($g==true)
                    {
                      $registrado_SCI=$registrado_SCI+1;
                    }                   
                   }                                
                   $total_SCI=$total_SCI+1;
  }
  // Fin de registro de CONTROL INDICE si se registro correctamente en . 

//inicio de registro de VIABILIDA CELULAR ..  
  
  $array = json_decode($js_viabilidad_celular);

  foreach($array as $obj)
  {
    //inicio se registro de VIABILIDA CELULAR.
                      $id=$obj->id;
                      $antibiotico=$obj->antibiotico;
                      $dosis=$obj->dosis;
                      $tiempo=$obj->tiempo;
                      $vc=$obj->vc;
                      $id_hoja_verificacion=$obj->id_hoja_verificacion;
                      $imei=$obj->imei;
                       

                      
                      $hoja_verificacion=new Hoja_verificacion();
                     $id_hoja_verificacion_m=$hoja_verificacion->get_id_por_sqlite($id_hoja_verificacion,$imei);
                       
                   $viabilidad_celular=new Viabilidad_celular();
                   $viabilidad_celular->preparar($id,$antibiotico,$dosis,$tiempo,$vc,$id_hoja_verificacion_m,$imei);
  
                   if($id_hoja_verificacion_m!=-1)
                   {     
                    $g=$viabilidad_celular->guardar();
                     if($g==true)
                     {
                      $registrado_VC=$registrado_VC+1;
                     }
                   }
                   $total_VC=$total_VC+1;  
                                  
  }
  

  }//fin del If registrado de ............HOJA DE VERIFICACION.......

if($total_HV==$registrado_HV && $total_LG==$registrado_LG && $total_CI==$registrado_CI && $total_MD==$registrado_MD && $total_DA==$registrado_DA && $total_AC==$registrado_AC && $total_VC==$registrado_VC  && $total_ML==$registrado_ML && $id_HV>0 && $total_HV>0)
{  
  print json_encode(array("mensaje"=>'Se guardo correctamente',"id_hoja_verificacion"=>$id_HV,"suceso"=>"1"));
 }
 else
 {
 //echo "total_HV=".$total_HV." registrado_HV=".$registrado_HV." total_LG=".$total_LG." registrado_LG=".$registrado_LG." total_CI=".$total_CI." registrado_CI=".$registrado_CI." total_MD=".$total_MD." registrado_MD=".$registrado_MD." total_DA=".$total_DA." registrado_DA=".$registrado_DA." total_AC=".$total_AC." registrado_AC=".$registrado_AC." total_VC=".$total_VC." registrado_VC=".$registrado_VC." id_HV".$id_HV." total_HV=".$total_HV;
  
        $hoja_m2=new Hoja_verificacion();
        $sw=$hoja_m2->vaciar_registro($id_HV);

  print json_encode(array("mensaje"=>'Vuelva a intentarlo.',"suceso"=>"2"));
 } 
  
  } //fin de Try
  catch(Exception $e)
  {
  print json_encode(array("mensaje"=>'Error al registrar.',"suceso"=>"2"));
  }

  } //fin de funcion cargar datos





function cargar_centros($js_centros)
{
    $array = json_decode($js_centros);
    $total=0;
    $registrado=0;
  try
  {
  
    foreach($array as $obj)
    {
      //inicio se registro de HOJA_VERIFICACION
                 
                        $id=$obj->id;
                        $nombre=$obj->nombre;
                        $direccion=$obj->direccion;
                        $latitud=$obj->latitud;
                        $longitud=$obj->longitud;
                        $tipo=$obj->tipo;
                        


                       $centros=new Centros();
                        $centros->preparar($id,$nombre,$direccion,$tipo,$latitud,$longitud);
                        
                        $g=$centros->guardar();
                         if($g==true)
                         {
                          
                             $registrado=$registrado+1;
                         }
                  
                       $total=$total+1;    

    }

  //fin del registro del HOJA VERIFICACION..

if($total==$registrado)
{  
  print json_encode(array("mensaje"=>'Se guardo correctamente',"registrado"=>$registrado,"suceso"=>"1"));
 }
 else
 {
  print json_encode(array("mensaje"=>'Vuelva a intentarlo.',"suceso"=>"2"));
 } 
  
  } //fin de Try
  catch(Exception $e)
  {
  print json_encode(array("mensaje"=>'Error al registrar.',"suceso"=>"2"));
  }

  } //fin de funcion cargar datos


?>