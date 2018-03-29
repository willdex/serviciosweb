<?php

include_once("mpdf/mpdf.php");
include_once('../clsHoja_verificacion.php');
include_once('../clsAccion.php');
include_once('../clsDetalle_accion.php');
include_once('../clsManipulacion_dilucion.php');
include_once('../clsMantenimiento_limpieza.php');
include_once('../clsControl_indice.php');
include_once('../clsLinea_genetica.php');
include_once('../clsViabilidad_celular.php');



$id_hoja=$_GET['id'];

$hoja_verificacion=New Hoja_verificacion();
$accion= New Accion();
$manipulacion_dilucion=New Manipulacion_dilucion();
$control_indice=New Control_indice();
$linea_genetica=New Linea_genetica();
$viabilidad_celular=New Viabilidad_celular();
$mantenimiento_limpieza=New Mantenimiento_limpieza();

$rpt_hoja=$hoja_verificacion->get_formulario_hoja_por_id($id_hoja);
$rpt_empresa=$hoja_verificacion->get_formulario_empresa_por_id($id_hoja);
$rpt_unidad=$hoja_verificacion->get_formulario_unidad_por_id($id_hoja);
$rpt_tecnico=$hoja_verificacion->get_formulario_tecnico_por_id($id_hoja);

$rpt_accion=$accion->get_formulario_por_id_hoja($id_hoja);
$rpt_manipulacion_dilucion=$manipulacion_dilucion->get_formulario_por_id_hoja($id_hoja);
$rpt_control_indice=$control_indice->get_formulario_por_id_hoja($id_hoja);
$rpt_viabilidad_celular=$viabilidad_celular->get_formulario_por_id_hoja($id_hoja);
$rpt_linea_genetica=$linea_genetica->get_formulario_por_id_hoja($id_hoja);
$rpt_mantenimiento_limpieza=$mantenimiento_limpieza->get_formulario_por_id_hoja($id_hoja);


$html='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AUDITORIA DE VACUNACION</title>
    

     <style type="text/css">
       #tabla_contenido,#tabla_puntuacion{
        border:1px solid #000; 
        margin: 5px;
        align-content: top;
        background: #d9ffcc;
       }
       #tabla_puntuacion
       {
        width: 350px;
       }
       th, #tr_cabecera{
         background-color: #4CAF50;
        color: white;
         border: 2px solid #000;

       }

        .a1 {width:905px; text-align: left; border: 0px;  position: relative;
        padding-left: 20px; }

        .gordo{

          width: 800px;
        }

        .border-lb {border: 0px 0px 0px 0px; border-width: 0 2px 2px 0px; text-align: left;}
        
        .xmen{width: 912px; border: 0px 0px 0px 0px; border-width: 0 0 2px 2px; text-align: left;}
        
        .foto1 {position: relative; background-color: #025522; left: 500px; top: 200px;    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);}

          .foto2 {position: relative; background-color: #025522; left: 500px; top: 160px;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);}

        .volve {height: 30px;}

        .fuu {height: 40px}

       #tr_cabecera>td
       {

        color: black;
       }
       #tabla_contenido tr ,#tabla_contenido tr td, #accion tr td,#manipulacion tr td,#control tr td
       {
        border: 1px solid #000;
        padding-left: 8px;

       }
        #irregularidades tr th
       {
        border: 0px solid #000;
        padding-left: 8px;
        width: 30px;

       }
       #irregularidades tr td
       {
        border: 2px solid #000;
        padding-left: 8px;
        border-bottom: 1px;
        order-left: 1px;
        width: 30px;
       
       }

       #vacunador tr{
        width: 5220px;

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
       
       }
       body{
         font-family: arial;
       }
       #accion
       {
        width: 400px;
       }
       #ire ,#ire_l
       {
        border: 1px solid #000;
        text-align: center;
        padding: 0px;
       }
     </style>';

$html.='     
  </head>
  <body>
    <header class="clearfix">
    <TABLE>
      <tr>
        <td width="50px">
          <img style="width: 50px; height: 50px" src="imagen/invetsa.png">
         </td>
         <td align="center">
         <h2  >INFORME DE AUDITORÍA DE VACUNACIÓN</h2>
         <h3  >Inversion Veterinaria S.A.</h3>
        </td>
         <td style="text-align: right">
         <span style="margin-left: 50px">Codigo: '.$rpt_hoja->codigo.' <br>
         Revision: '.$rpt_hoja->revision.'<br></span>
        </td>
        </tr>
      </table>  
';

   $html.='

   <br>
   <table style="width:100%;">
      <tr>
        <td style="text-align: left;  ">
         <b>Empresa: </b>'.$rpt_empresa->empresa.'  <br>
         <b>Granja: </b>'.$rpt_granja->nombre.' <br>
         <b>Unidad: </b>'.$rpt_unidad->unidad.'<br>
         <b>Responsable de Invetsa:</b> '.$rpt_hoja->responsable_invetsa.'<br>
      </td>
        

        <td style="text-align: left;" colspan="2"> 
        <b> Fecha:</b> '.$rpt_hoja->fecha.'<br>
        <b>Hora ingreso:'.$rpt_hoja->hora_ingreso.' </b> <br>
        <b>Hora salida:</b>'.$rpt_hoja->hora_salida.'<br>
        <b> Responsable Incubadora:</b> '.$rpt_hoja->responsable_incubadora.'<br>
        </td>
        <td>
        </td>
      </tr>

   </TABLE>

   <br>
   ';

$html.='     
    </header>
   <main>
      <table id=tabla_contenido  style="width:100%;">
          <tr id=tr_cabecera>
            
            <th colspan="2" style="background-color: #025522" class="fuu">Linea Genética</th>
            <th colspan="1" style="background-color: #025522" class="fuu">Cobb</th>
            <th colspan="1" style="background-color: #025522" class="fuu">Ross</th>
          </tr>

            <tr style="background-color:#E7F3EB">
              <td colspan="2">'.$rpt_linea_genetica->descripcion.'</td>
              <td>'.$rpt_linea_genetica->cobb.'</td>
              <td colspan="1" >'.$rpt_linea_genetica->ross.'</td>
            </tr>
           
            <tr >
            <th colspan="4" style="background-color: #025522" class="fuu">Laboratorio de Preparación de Vacuna</th>
            </tr>

            <tr>
              <th class="volve">ESPERADO</th>
              <th>ENCONTRADO</th>
              <th>ESPERADO</th>
              <th>ENCONTRADO</th>
            </tr>
   ';
               
          
       
        $detalle_ac=New Detalle_accion();
        $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,1);
        $html.='<tr style="background-color:#E7F3EB">';
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==1){
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==4)
            {
            $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

        $html.='<tr style="background-color:#E7F3EB">';
         $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,1);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==2){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==5)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

         $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,1);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==3){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==6)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';
           
         

             
 
 

$html.='     
<tr>
 <th colspan="4" style="background-color: #025522" class="fuu">Equipo Invetsa-Temp y Otros</th>
</tr>
            <tr class="volve">
              <th>ESPERADO</th>
              <th>ENCONTRADO</th>
              <th>ESPERADO</th>
              <th>ENCONTRADO</th>
            </tr>
';

     
          
 

            


 
        $detalle_ac=New Detalle_accion();
        $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
         $html.='<tr style="background-color:#E7F3EB">';
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==1){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==9)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
         $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==2){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==10)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==3){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==11)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';
          

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==4){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==12)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==5){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==13)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==6){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==14)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==7){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==15)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,2);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==8){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==16)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';
     

          
       

 
$html.='     
<tr>
<th colspan="4" style="background-color: #025522" class="fuu">Sala de Vacunación</th>
</tr>
            <tr class="volve">
              <th>ESPERADO</th>
              <th>ENCONTRADO</th>
              <th>ESPERADO</th>
              <th>ENCONTRADO</th>
            </tr>

 ';
    
      $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,3);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==1){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==6)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,3);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==2){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==7)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,3);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==3){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==8)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';;

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,3);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==4){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==9)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>';

          $html.='<tr style="background-color:#E7F3EB">';
           $rpt_detalle_accion=$detalle_ac->get_formulario_por_id_hoja_y_id_accion($id_hoja,3);
          while ($fila=mysqli_fetch_object($rpt_detalle_accion)) {
            if($fila->id==5){
          $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }else if($fila->id==10)
            {
           $html.='
            <td>'.$fila->esperado.'</td>
            <td>'.$fila->encontrado.'</td>
            ';
            }

          }
          $html.='</tr>
            </table>
          ';



$html.='
   
        <br>
   
          <table id=manipulacion style="width:100%;"> 
          <tr>
          <th colspan=3 style="background-color: #025522" class="fuu">MANIPULACION Y DILUCION DE LA VACUNA CONGELADA</th>
          </tr>
    
      
        <tr>
          <td colspan="2" style="background-color:#E7F3EB">
            <b>Asigna con (x)si el procedimiento estuviese siendo seguido:(Puntaje M&aacute;ximo 2.0) <b>
          </td>
          <td colspan="1" width="80px" style="background-color:#E7F3EB">
            <b>Puntaje <b>
          </td>
        </tr>
';         

     
          while ($fila=mysqli_fetch_object($rpt_manipulacion_dilucion)) {
            
             $html.='
               <tr colspan="1" style="background-color:#E7F3EB;"   >
                <td><b>'.$fila->id.'</b></td>

                <td colspan="1" > 
                 '.$fila->descripcion.' <b>'.$fila->observacion.'</b>
                </td>

                <td  colspan="1"><b>
                  '.$fila->puntaje.'</b>
                </td>
                </tr>
              ';
            
          }
         
       
 
$html.='  <tr id=tr_cabecera>
            <td colspan="2"><b>SUMATORIA</b></td>
            <td ><b>'.$rpt_hoja->sumatoria_manipulacion_vacuna.'</b></td>
          </tr>
          
       
      </TABLE><br>
      <hr>


';

$html.='     
 <table id=manipulacion  style=" background-color:#E7F3EB; border-spacing:0px; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;"> 
          <tr>
          <th colspan=4 style="background-color: #025522" class="fuu">MANTENIMIENTO Y LIMPIEZA DE LAS VACUNADORAS ACCUVAC</th>
          </tr>

         <tr>
          <td>
             Asignar con una (x) kas irregularidades encontradas: (Puntaje Máximo Promedio 1.5)<br><br><br>  
          </td>
         </tr>

         <tr>
          <td style="padding-left: 0px;">
    
          <table id="manteminimiento" style="padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; width:100%;" > 
          <tr>
          <th id=tr_cabecera colspan="10 ">Nombre del Vacunador</th>
          <th id=tr_cabecera colspan="4">Nº de Maquina</th>
          <th colspan="15" >
          
          <table id="irregularidades"  style="width:100%;">
          <tr > 
          <th id=tr_cabecera colspan="15" class="fuu">IRREGULARIDADES</th>
          </tr>
          <tr id=tr_cabecera colspan="15" class="fuu" style="font-family:bloc;">
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            </tr>
          </table>

          </th>
          </tr>

   ';

           
 
          while ($fila=mysqli_fetch_object($rpt_mantenimiento_limpieza)) {
 

$html.='     
          <tr  >
          <th style="background-color:#E7F3EB;" colspan="10"><font color="black">'.$fila->nombre.'</font></th>
          <th style="background-color:#E7F3EB;" colspan="4"><font color="black">'.$fila->nro_maquina.'</th>
          <th  style="background-color:#E7F3EB;     border: 2px solid #000;" colspan="15"><font color="black">
          <table id="irregularidades"  style="width:100%;">
          <tr >
            <td  style="border: 2px none #000; border-left: 2px none #000;">'.$fila->irregularidad1.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad2.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad3.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad4.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad5.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad6.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad7.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad8.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad9.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad10.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad11.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad12.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad13.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad14.'</td>
            <td  style="border: 2px none #000; border-left: 2px solid #000;">'.$fila->irregularidad15.'</td>
            </tr>
            </table>
          </th>
          </tr>
             
          ';
 
          }
         
     
 

$html.='          
        </table>
</td>
</tr>
<tr>
<td>
        <br>
   
<b>Promedio: '.$rpt_hoja->promedio_mantenimiento.'</b><br>  
     
      
      
        
       
      



      <h3>IRREGULARIDADES</h3>
      1.-Acumulo de suciedad o puntos en sucios en la placa de sensores Twin Touch<br>
      2.-Falta de uno o mas tornillos visibles.<br>
      3.-Presi&oacute;n de aire comprimido fuera de rango recomendado(65-75 psi para Twin Shot/Zootec)<br>
      4.-Colocación incorrecta de la aguja (bisel hacia arriba)<br>
      5.-Inadecuada regulación de la salida de la aguja o agujas, que provoca que vacuna quede en la parte interna de la maquina.<br> 
6.-Colocación inadecuada de las jeringas y/o mangueras descartables.<br>
7.-Falta de calibración de la dosis 0.2 ml en Marek y 0.1 ml en Oleosas.<br> 
8.-No verificar la calibración de la dosis de la maquina cada 2,000 pollos vacunados.<br>
9.-No cumplen con el cambio de agujas de la maquina cada 2,000 pollos vacunados.<br>
10.-No tienen asperjadores con alcohol para la limpieza de la maquina cada 500 pollos vacunados.<br>
11.-No se lavan las manos y desinfectan antes de  realizar el cambio de agujas de las maquinas.<br>
12.-Acumulo de suciedad entre el modulo inyector y el modulo inferior de la maquina.<br>
13.-Desarmado incorrecto y lavado inadecuado de las maquinas, uso de detergente y material abrasivos.<br>
14.-Inadecuada esterilización de la válvula de control, debe ser a 121° C, a 15 psi de presión por 20 minutos envuelto en papel craf.<br>
15.-Otras irregularidades. Especificar : <b>'.$rpt_hoja->irregularidad_15.'</b><br>
      
      </td>
      </tr>
</table>
';

$html.='     
<hr>

  <table id=control style=" background-color:#E7F3EB; border-spacing:0px; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;"> 
          <tr>
          <th colspan=4 style="background-color: #025522" class="fuu">CONTROL DE INDICE DE EFICIENCIA DE VACUNACIONY PRODUCTIVIDAD</th>
          </tr>  

         <tr>
           <td>
             (Puntaje Máximo Índice de Eficiencia  5.5)  
           </td>
         </tr>
        
        <tr>
          <td style="padding-left: 0px;">
            
       
          <table id=control> 
          <tr   >
          <th   style="background-color:#025522" >Nombre del Vacunador</th>
          <th  style="background-color:#025522">Nº Pollos Vacunados/Hora</th>
          <th width="80px" style="background-color:#025522">Puntaje</th>
          <th   style="background-color:#025522">Nº Pollos controlados</th>
          <th style="background-color:#025522">Nº Pollos no vacunado</th>
          <th width="80" style="background-color:#025522">Heridos</th>
          <th width="80" style="background-color:#025522">Mojados</th>
          <th  style="background-color:#025522">Mala posición</th>
          <th  style="background-color:#025522">Nº Pollos vacunad correctame</th>
          <th   style="background-color:#025522">% de Eficiencia</th>
          </tr>
';
     
          
          while ($fila=mysqli_fetch_object($rpt_control_indice)) {
      

    $html.='     
            <tr>
            <td>'.$fila->vacunador.'</td>
            <td>'.$fila->nro_pollos_vacunado.'</td>
            <td>'.$fila->puntaje.'</td>
            <td>'.$fila->nro_pollos_controlados.'</td>
            <td>'.$fila->nro_pollos_no_vacunados.'</td>
            <td>'.$fila->nro_heridos.'</td>
            <td>'.$fila->nro_mojados.'</td>
            <td>'.$fila->nro_mala_posicion.'</td>
            <td>'.$fila->nro_pollos_vacunados_correctamente.'</td>
             <td>'.$fila->indice_eficiencia.'</td>
            </tr>
          ';

    
          }
         
       
 

$html.='     
      <tr>
        <td style="background-color:#E7F3EB">Promedio</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
      </tr>
    
       <tr>
        <td style="background-color:#E7F3EB">Sumatoria</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
      </tr>
      
';

$html.='     
        
      
    
      </TABLE>
          </td>
        </tr>
        <tr>
          <td>
           <b>PUNTAJE:'.$rpt_hoja->puntaje_control_indice.' </b>
          </td>
        </tr>
      </table>

         
 ';

   

$html.='     
<br>
<hr>
<br>

<table id=control  style="width:100%;">
<tr>
  <th colspan="2" style="background-color:#025522" class="fuu"> PUNTAJE TOTAL OBTENIDO</th>
</tr>
<tr>
  <td style="background-color:#E7F3EB">MANIPULACION Y DILUCION DE LA VACUNA CONGELADA</td>
  <td style="background-color:#E7F3EB">'. $rpt_hoja->sumatoria_manipulacion_vacuna.'</td>
</tr>
<tr>
  <td style="background-color:#E7F3EB">MANTENIMIENTO Y LIMPIEZA DE LAS VACUNADORAS ACCUVAC</td>
  <td style="background-color:#E7F3EB">'. $rpt_hoja->promedio_mantenimiento.'</td>
</tr>
<tr>
  <td style="background-color:#E7F3EB">INDICE DE EFICIENCIA DE VACUNACION</td>
  <td style="background-color:#E7F3EB">'.$rpt_hoja->puntaje_control_indice.'</td>
</tr>
<tr>
  <td style="background-color:#E7F3EB">PRODUCTIVIDAD</td>
  <td style="background-color:#E7F3EB">'.$rpt_hoja->productividad.'</td>
</tr>
<tr>
  <td style="background-color:#E7F3EB"><b>PUNTAJE TOTAL </b></td>
  <td style="background-color:#E7F3EB"><b>'.$rpt_hoja->puntaje_total.'</b></td>
</tr>
</table>

<br>
<hr>
<h3>VIABILIDAD CELULAR</h3>
<table id=control style="width:100%;">
<tr class="fuu">
  <th style="background-color:#025522;" >ANTIBIOTICO</th>
  <th style="background-color:#025522;" >DOSIS</th>
  <th style="background-color:#025522;"   >TIEMPO (min)</th>
  <th style="background-color:#025522;"  >VC % </th>
</tr>
';
     

while ($fila=mysqli_fetch_object($rpt_viabilidad_celular)) {

$html.='     
  <tr>
    <td style="background-color:#E7F3EB;"><p style="color:black;">'.$fila->antibiotico.'</td>
  <td style="background-color:#E7F3EB;"><p style="color:black;">'.$fila->dosis.'</td>
  <td style="background-color:#E7F3EB;"><p style="color:black;">'.$fila->tiempo.'</td>
  <td style="background-color:#E7F3EB;"><p style="color:black;">'.$fila->vc.'</td>
  </tr>
';
}

$html.=' 
 
  <tr>
    <td class="xmen" style="background-color:#E7F3EB" colspan="3"><p style=color:black;><b>VC:Viabilidad Celular</b></td>
    <td class="border-lb" style="background-color:#E7F3EB"  ><p style="color:black;" align=right><b>'.$rpt_hoja->total_vc.'</b></td>
    </tr> 
  ';




$html.=' 
 
</table><br>

<hr>
<h3>RECOMENDACIONES</h3>
'.$rpt_hoja->recomendaciones.'
<br>

<hr>';





$src_imagen_jefe='imagen/invetsa.png';
$src_firma_invetsa='imagen/invetsa.png';
$src_firma_empresa='imagen/invetsa.png';
 if(file_exists("../".$rpt_hoja->firma_invetsa))
{
  $src_firma_invetsa="../".$rpt_hoja->firma_invetsa;
}
 if(file_exists("../".$rpt_hoja->firma_empresa))
{
  $src_firma_empresa="../".$rpt_hoja->firma_empresa;
}
if(file_exists("../".$rpt_hoja->imagen_jefe))
{
  $src_imagen_jefe="../".$rpt_hoja->imagen_jefe;
}

 

$html.=' 
 <table id=tabla_contenido class="foto1">
<tr>
<th style="background-color:#025522;">IMAGEN DEL RESPONSABLE</th>
</tr>
<tr>
<td style="background-color:#fff;">
<img src="'.$src_imagen_jefe.'" width="300px"/>
</td>
</tr>
</table>
<br>
<br>
<br>
 
 
 <table id=tabla_contenido class="foto2">
<tr>
<th style="background-color:#025522;">JEFE DE PLANTA DE INCUBACIÓN</th>
<th style="background-color:#025522;">FIRMA INVETSA</th>
</tr>
<tr>
<td style="background-color:#fff;">
<img src="'.$src_firma_empresa.'" width="300px"/>
</td>
<td style="background-color:#fff;"> 
<img src="'.$src_firma_invetsa.'" width="300px"/>
</td>
</tr>
</table>

 
    
  </body>
 
</html>
';

//echo $html;
 


$mPDF=new mPDF("c","A4");
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mPDF->writeHTML($html);

//$mPDF->Output("reporte.pdf","D");
$mPDF->Output("reporte.pdf","I");
if(isset($_POST['descargar']))
{
  $mPDF->Output("reporte.pdf","D");
}
 

?>

