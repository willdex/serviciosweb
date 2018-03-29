<?php

ini_set('display_errors', '1');

include_once("mpdf/mpdf.php");

include_once ('../clsServicio_matenimiento.php');
include_once ('../clsInspeccion_visual.php');
include_once ('../clsInspeccion_funcionamiento.php');
include_once ('../clsLimpieza.php');
include_once ('../clsDetalle_inspeccion_visual.php');
include_once ('../clsDetalle_inspeccion_funcionamiento.php');
include_once ('../clsDetalle_limpieza.php');



rpt_servicio_mantenimiento("51");

function rpt_servicio_mantenimiento($id_inspeccion)
{ 

$id_servicio=$_GET['id'];

$servicio_mantenimiento=New Servicio_mantenimiento();
$inspeccion_visual= New Inspeccion_visual();
$inspeccion_funcionamiento=New Inspeccion_funcionamiento();
$detalle_inspeccion_visual=New Detalle_inspeccion_visual();
$detalle_inspeccion_funcionamiento=New Detalle_inspeccion_funcionamiento();
$limpieza=New Limpieza();
$detalle_limpieza=New Detalle_limpieza();

$rpt_sm=$servicio_mantenimiento->get_formulario_por_id_y_maquina($id_servicio);
$rpt_inspeccion_visual=$inspeccion_visual->get_formulario_por_id_sm($id_servicio);
$rpt_inspeccion_funcionamiento=$inspeccion_funcionamiento->get_formulario_por_id_sm($id_servicio);
$rpt_limpieza=$limpieza->get_formulario_por_id_sm($id_servicio);

$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
$rpt_d_inf=$detalle_inspeccion_funcionamiento->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
//$rpt_detalle_puntuacion=$detalle_puntuacion->get_formulario_detalle_puntuacion_por_id_sim_y_puntuacion($id_sistema,$id_puntuacion);


$html.='
<!DOCTYPE html>
<html lang="es">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <title>INFORME DE MANTENIMIENTO (TWIN SHOT)</title>
     <style type="text/css">
      
      #tabla_contenido{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
      width: 100%;
table-layout: fixed;
display: block;
align-content=center
           table-layout: fixed;
vertical-align: middle;
display: block;
    margin-left: auto;
    margin-right: auto;


               }

               #tabla_contenido2{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
        width: 80%;
align-content=center
           table-layout: fixed;
vertical-align: middle;
display: block;
    margin-left: auto;
    margin-right: auto;


               }


      #tabla_firmajefe{
     left: 500px; top: 200px;    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    align-content=center
           table-layout: fixed;
      vertical-align: middle;
    display: block;
    margin-left: auto;
    margin-right: auto;

             }

      #tabla_puntuacion{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
        width: 100%;
           table-layout: fixed;
                 }
      
      #tabla_puntuacion2{
        border:1px solid #000; 
        background: #025522";
        width: 100%;
           }

      #tabla_puntuacion3{
        border:1px solid #000; 
        align-content: top;
        color: white;
        background: #025522";

}
       #tabla_puntuacion4{

      width: 100%;

           }

                     #puntajetotal {
            width: 700px;

}


       #tamaño{
                   border:1px solid #000; 

           table-layout: fixed;
      vertical-align: top;
      border

         }


       th{
        background-color: #4CAF50;
        color: white;
        height: 50px;
        text-align: center;
                    

       }
       
        #1{
        background-color: #4CAF50;
        color: white;
        height: 75px;
        width: 70px;
        text-align: center;
        font-size: 17px;
        font-family: Times New Roman", Times, serif;

       }

       #2{
        
        text-align: center;
        font-size: 17px;
        font-family: Times New Roman", Times, serif;

       }
       
      #izquierda{
       float: left;
       padding :10px;

     }
       #derecha{
        float: left;
       padding :10px;

   }
      


      
       td{
        height: 40px;
       }
       div{
        height: 100%;
       }
       table
       {
        border-collapse: collapse;
        font-family: arial;
       }
       img
       {
         border: 0px solid #000;
       }
       h4{
          text-align: center;
          font-size: 20px;
          color: #5c59a0;
          border-color= red;

       }
       
       img.center {
 margin: auto;
    display: block; 


}


                 
     </style>
  </head>
  <body>
    <header class="clearfix">
    <table width="100%" style="border-bottom: 0px solid #fffff; vertical-align: middle; font-family: serif; font-size: 9pt; color: #5c59a0;"><tr>
<td width="10%"><img style="width: 30%" src="imagen/incuba.jpg"></td>
<td width="80%" align="center" text-shadow: "2px 2px 4px #000000;"> <span style="font-size:25pt;"  color="#5c59a0" >INFORME DE MANTENIMIENTO (TWIN SHOT)</td>
<td width="20%" style="text-align: right;" ><img style="width: 20%"  src="imagen/cabecera.png" ></td></table>
<td width="10%" style="text-align: right;"><span style="font-weight: bold;"><img style="width: 100%" src="imagen/principal.png"></span></td></table>
';

$html.='
    <table class="bpmTopnTailC">

      <tr class="headerrow">
        
        <td class="evenrow" >
         <b>Compañia:</b> '.$rpt_sm->compania.'<br>
         <b>Planta de incubación:</b>'.$rpt_sm->planta_de_incubacion.' <br>
         <b>Dirección: </b>'.$rpt_sm->direccion.'<br>
         <b >Jefe de planta: </b>'.$rpt_sm->jefe_planta.'<br>
         <b >Encargado de Maquinas: </b>'.$rpt_sm->encargado_maquina.'<br>
        </td>

        <td  >
         <b>Fecha:</b> '.$rpt_sm->fecha.'<br>
         <b>Hora de ingreso:</b> '.$rpt_sm->hora_ingreso.'<br>
         <b>Codigo de maquina:</b> '.$rpt_sm->maquina.'<br>
         <b>Última visita:</b> '.$rpt_sm->ultima_visita.'</br>


        </td>

         <td width="15%" style="text-align: right;">        
         <b>Codigo:</b> '.$rpt_sm->codigo.'<br>
         <b>Revision:</b>'.$rpt_sm->revision.'<br>
        </td>
      </tr>
    </TABLE>
     

     
    </header>
  <br><br>  <br>';

   $html.='<main>
      <table id=tabla_contenido style="font-size:12px">
         
          <tr id=tr_cabecera  >            
            <th colspan="16" style="background-color: #025522">   <h3>1.- Inpección Visual</h3>
</th> </tr>

           
                   
           <tr  style="background-color: #4CAF50" >
              <td style="color: white" align=center>Código</td>
              <td colspan="4" style="color: white" align=center>Descripción</td>
              <td style="color: white" align=center >Bueno</td>
              <td style="color: white" align=center>Malo</td>
              <td style="color: white" align=center>Código</td>
              <td colspan="4" style="color: white" align=center>Descripción</td>
              <td style="color: white" align=center>Bueno</td>
              <td style="color: white" align=center>Malo</td>
            </tr>
              

              <tr  style=background-color:#E7F3EB>

              <td colspan="7" style="color: black" align=center>ESTRUCTURA</td>  
              <td colspan="7" style="color: black" align=center>ACCESORIOS</td>

            </tr>
            ';

$html.='<tr  style=background-color:#E7F3EB>';
            
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==1){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
            ';
            }else if($fila->id==42||$fila->id==44)
            {
              if($fila->id==42){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }
          }
$html.='</tr>';



$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==2){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
            ';
            }else if($fila->id==39||$fila->id==41)
            {
              if($fila->id==39){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==3){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==45)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';



$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==4){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==46)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';


$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==5){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==47)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';


$html.='<tr  style=background-color:#E7F3EB>
         <td colspan="7" style="color: green" align=center >ACCESORIOS</td> ';
         $rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
             if($fila->id==48)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }

$html.='</tr>';  

$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==6){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==49)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';



$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==7){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==50)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';


$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==8){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==51)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';






$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
              if($fila->id==9||$fila->id==11)
            {
              if($fila->id==9){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }else if($fila->id==52)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';



$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==12){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==53)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';






$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==13){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==54)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';






$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
              if($fila->id==14||$fila->id==16)
            {
              if($fila->id==14){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }else if($fila->id==55)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==18){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==56)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';



 

$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==19){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==57)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';



$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==20){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==58)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';


$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==21){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==59)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';


$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==22){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==60)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==23){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==61)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==24){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==62)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==25){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==63)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==26){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==64)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==27){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==65)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==28){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==67)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';





$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==29){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
            }else if($fila->id==66)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';





$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
            if($fila->id==30||$fila->id==32)
            {
              if($fila->id==30){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          } 
          }
          $html.= ' <td colspan="8" align=center style=color:green>JERINGAS Y TUBERIAS</td>';
$html.='</tr>';





$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
              if($fila->id==33||$fila->id==35)
            {
              if($fila->id==33){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }else if($fila->id==68)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }
          }
$html.='</tr>';





$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
              if($fila->id==36||$fila->id==38)
            {
              if($fila->id==36){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }else   if($fila->id==69||$fila->id==71)
            {
              if($fila->id==69){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }
          }
$html.='</tr>';




$html.='<tr  style=background-color:#E7F3EB>';
$rpt_d_inv=$detalle_inspeccion_visual->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inv)) {
             if($fila->id==17)
            {
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
            <td colspan="4" align=center>'.$fila->descripcion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
          }else   if($fila->id==72||$fila->id==74)
            {
              if($fila->id==72){
            $html.= ' 
            <td  align=center>'.$fila->codigo.'</td>
              <td colspan="4"  align=center>'.$fila->descripcion.'</td>
              <td  align=center>'.$fila->estado.'</td>';
            }else{
            $html.='  
              <td  align=center>'.$fila->estado.'</td>
            ';
            }
          }
          }
$html.='</tr>';







$html.='
         


          </table>
          </main>
          <br>          ';
 while ($fila=mysqli_fetch_object( $rpt_inspeccion_visual)) {


 $html.='<br><b>Observaciones: '. $fila->observaciones;


 $html.='.</b><br>';
 $html.='<br><br><b>Piezas Cambiadas:'. $fila->piezas_cambiadas;
 $html.='.</b><br> ';
 
  }

        $html.='

 <br><br><br> <table id=tabla_contenido2 style="font-size:12px">
         
          <tr id=tr_cabecera  >            
            <th colspan="3" style="background-color: #025522" class="fuu">    <h3>2.- Inspección del Funcionamiento</h3>
</th> </tr>

           
                   
           <tr  style="background-color: #4CAF50" >
              <td style="color: white" align=center>Criterios de Evaluación</td>
              <td style="color: white" align=center>Bueno</td>
              <td style="color: white" align=center>Malo</td>
            </tr>';
               


$rpt_d_inf=$detalle_inspeccion_funcionamiento->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,1);
          while ($fila=mysqli_fetch_object($rpt_d_inf)) {
             $html.='<tr  style=background-color:#E7F3EB>'; 
            $html.= ' 
            <td  style="color: black" align=center>'.$fila->criterio_evaluacion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox"  ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
           $html.='</tr>';
          }




   $html.='  </table><br><br>
        ';
 
$rpt_inspeccion_funcionamiento=$inspeccion_funcionamiento->get_formulario_por_id_sm($id_servicio);
         while ($fila=mysqli_fetch_object($rpt_inspeccion_funcionamiento)) {
          if($fila->id==1){
         $html.='<br><b>Observaciones:</b>'.$fila->observaciones.'<br><br>'; 
         $html.=' <b>Frecuencia de Uso:'.$fila->frecuencia_de_uso.'</b><br>';
            }
          }

        $html.='

   <br><table id=tabla_contenido style="font-size:12px">
         
          <tr id=tr_cabecera  >            
            <th colspan="3" style="background-color: #025522" class="fuu">    <h3>3.-Limpieza y Desinfección</h3>
             </th>
              </tr>

             <tr  style="background-color: #4CAF50" >
              <td style="color: white" align=center>Criterios de Evaluación</td>
              <td style="color: white" align=center>Bueno</td>
              <td style="color: white" align=center>Malo</td>
            </tr>';
 

           
$rpt_d_inf=$detalle_inspeccion_funcionamiento->get_formulario_por_id_sm_y_id_inspeccion($id_servicio,2);
          while ($fila=mysqli_fetch_object($rpt_d_inf)) {
             $html.='<tr  style=background-color:#E7F3EB>'; 
            $html.= ' 
            <td  style="color: black" align=center>'.$fila->criterio_evaluacion.'</td>
            <td  align=center><input type="checkbox" ';
            if($fila->estado==1){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>
              <td  align=center><input type="checkbox" ';

              if($fila->estado==3){
             $html.=' checked="yes" ' ;
            }
            $html.='></td>';
           $html.='</tr>';
          }



                   
            $html.='
</table>
        ';

        $rpt_inspeccion_funcionamiento=$inspeccion_funcionamiento->get_formulario_por_id_sm($id_servicio);
         while ($fila=mysqli_fetch_object($rpt_inspeccion_funcionamiento)) {
          if($fila->id==2){
         $html.='<br><b>Observaciones:</b>'.$fila->observaciones.'<br><br>'; 
         $html.=' <b>Cantidad de Aves Vacunadas / Dia:'.$fila->frecuencia_de_uso.'</b><br>';
            }
          }


$src_imagen_jefe='';
$src_firma_invetsa='';
$src_firma_empresa='';

$src_imagen1="../".$rpt_sm->imagen1; 
$src_imagen2="../".$rpt_sm->imagen2; 
$src_imagen3="../".$rpt_sm->imagen3; 
$src_imagen4="../".$rpt_sm->imagen4; 
$src_imagen5="../".$rpt_sm->imagen5; 
$src_imagen6="../".$rpt_sm->imagen6; 
$src_imagen7="../".$rpt_sm->imagen7; 
$src_imagen8="../".$rpt_sm->imagen8; 
$src_imagen9="../".$rpt_sm->imagen9; 
$src_imagen10="../".$rpt_sm->imagen10; 


 if(file_exists("../".$rpt_sm->firma_invetsa))
{
  $src_firma_invetsa="../".$rpt_sm->firma_invetsa;
}
 if(file_exists("../".$rpt_sm->firma_jefe_planta))
{
  $src_firma_empresa="../".$rpt_sm->firma_jefe_planta;
}
if(file_exists("../".$rpt_sm->imagen_jefe))
{
  $src_imagen_jefe="../".$rpt_sm->imagen_jefe;
}


 $html.='<table id=tabla_contenido border="0.5" cellpadding="3" bordercolor="#000000">
          <tr >
            <th colspan="5"><font size="4">IMAGENES</font></th> 
          </tr>
            
            <tbody>
             <TR>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen1.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen2.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen3.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen4.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen5.'"></td>
              </TR>
              <TR>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen6.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen7.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen8.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen9.'"></td>
                <td style="background-color:#fff;"><img style="height: 200px; width: 200px;" src="'.$src_imagen10.'"></td>
              </TR>
          
 
            </tbody>       
      </table>

 


  ';

 

$html.="<br><br><br><table id=tabla_firmajefe>




<tr >
<th style='background-color: #025522'>IMAGEN DE JEFE DE PLANTA</th>
</tr>
<tr>
<td >
<img src='".$src_imagen_jefe."' width=300px />
</td>
</tr>
</table>
<br>
<br>
<br>
";

$html.="<table >
<tr >
<th style='background-color: #025522'>FIRMA JEFE PLANTA</th>
<th style='background-color: #025522'>FIRMA POR INVETSA</th>
</tr>
<tr>
<td>
<img src='".$src_firma_empresa."' width=300px/>
</td>
<td>
<img src='".$src_firma_invetsa."' width=300px/>
</td>
</tr>
</table>
";
 
$html.='
  </body>
 
</html>
';





$mPDF=new mPDF("c","A4");
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mPDF->writeHTML($html);

//$mPDF->Output("reporte.pdf","D");
$mPDF->Output("reporte.pdf","I");
if(isset($_POST['descargar']))
{
  $mPDF->Output("reporte.pdf","D");
}
}


?>


    </main>
    <footer>
  
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
 
</html>

