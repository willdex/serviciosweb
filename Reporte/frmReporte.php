<?php


ini_set('display_errors', '1');

include_once("mPDF/mpdf/mpdf.php");

//sistema integral demonitoreo.
include_once("../clsSistema_integral.php");
include_once("../clsPuntuacion.php");
include_once("../clsDetalle_puntuacion.php");
include_once("../clsPeso.php");

//formulario twin shot,spravac y zootec
include_once ('../clsServicio_matenimiento.php');
include_once ('../clsInspeccion_visual.php');
include_once ('../clsInspeccion_funcionamiento.php');
include_once ('../clsDetalle_inspeccion_visual.php');
include_once ('../clsDetalle_inspeccion_funcionamiento.php');


rpt_sistema_integral("4");

//rpt_formulario_twin_shot("1");




 function rpt_sistema_integral($id_sim)
{ 
$html='';

$sistema_integral=New Sistema_integral();
$puntuacion= New Puntuacion();
$detalle_puntuacion=New Detalle_puntuacion();
$peso=New Peso();


$id_sistema=$id_sim;

$rpt_sim=$sistema_integral->get_formulario_por_id_sim($id_sistema);

$rpt_puntuacion=$puntuacion->get_formulario_puntuacion_por_id_sim($id_sistema);
$rpt_peso=$peso->get_formulario_peso_por_id_sim($id_sistema);





$html.='
<!DOCTYPE html>
<html lang="es">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <title>SISTEMA INTEGRAL DE MONITOREO</title>
     <style type="text/css">
      
      #tabla_contenido{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
        width: 100%;

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
<td width="80%" align="center" text-shadow: "2px 2px 4px #000000;"> <span style="font-size:25pt;"  color="#5c59a0" >SIM (SISTEMA INTEGRAL DE MONITOREO)</td>
<td width="20%" style="text-align: right;" ><img style="width: 20%"  src="imagen/cabecera.png" ></td></table>
<td width="10%" style="text-align: right;"><span style="font-weight: bold;"><img style="width: 100%" src="imagen/principal.png"></span></td></table>

    <table class="bpmTopnTailC">

      <tr class="headerrow">
        
        <td class="evenrow" >
         <b >EMPRESA:</b> '.$rpt_sim->empresa.'  <br>
         <b>GRANJA:</b>'. $rpt_sim->granja .'<br>
         <b>EDAD: </b>'. $rpt_sim->edad .' años<br>
         <b >SEXO: </b>'. $rpt_sim->sexo.'<br>
        </td>

         <td style="text-align: center;"><b> ZONA:</b>'. $rpt_sim->zona .' <br>
         <b>GALPON:</b> '. $rpt_sim->codigo_galpon .'<br>
         <b>Nro. de POLLOS:</b> '. $rpt_sim->nro_pollos .'<br>
         <b>FECHA:</b> '. $rpt_sim->fecha .'<br>
        </td>

         <td width="50%" style="text-align: right;">        
         <b>Codigo:</b> R.50<br>
         <b>Revision:</b>00<br>
        </td>
      </tr>
   
             
      


    </TABLE>
     

     
    </header>
    <br>

    <main>
   
      <table  id=tabla_contenido>
          <tr>
            <th  id="1" style="background-color: #025522">Peso Corporal</th>
            <th  id="1" style="background-color: #025522">Peso Bursa</th>
            <th  id="1" style="background-color: #025522">Peso de Bazo </th>
            <th  id="1" style="background-color: #025522">Peso de Timo </th>
            <th  id="1" style="background-color: #025522">Peso de Hígado </th>
            <th  id="1" style="background-color: #025522">Indice Bursal </th>
            <th  id="1" style="background-color: #025522">Indice Tímico</th>
            <th  id="1" style="background-color: #025522">Indice Hepático</th>
            <th  id="1" style="background-color: #025522">Bursometro</th>
          </tr>';
         

            if($rpt_peso!="-1"){
            while ($fila=mysqli_fetch_object($rpt_peso)) {
              if($fila->id=="6")
              {
                
               $html.=' <tr style="background:#61579c;">';
                       
              }
              else
              {
                
                $html.='<tr >';
                
              }

            $html.='
                  <td id="2">'.$fila->peso_corporal.'</td>
                  <td id="2">'.$fila->peso_bursa.'</td>
                  <td id="2">'.$fila->peso_brazo.'</td>
                  <td id="2">'.$fila->peso_timo.'</td>
                  <td id="2">'.$fila->peso_higado.'</td>
                  <td id="2">'.$fila->indice_bursal.'</td>
                  <td id="2">'.$fila->indice_timico.'</td>
                  <td id="2">'.$fila->indice_hepatico.'</td>
                  <td id="2">'.$fila->bursometro.'</td>
                  </tr >
                  ';
            }
          }
                 
    $html.='</table><br><br><table id="tamaño">';



            if($rpt_puntuacion!="-1"){
              
            while ($objeto=mysqli_fetch_object($rpt_puntuacion)) {
               $bajo=$objeto->id % 2;
               if($bajo==1){
                $html.='<br><br><tr>';
              }
              $html.='<td > <table id="tabla_puntuacion4">';

              $rpt_detalle_puntuacion=$detalle_puntuacion->get_formulario_detalle_puntuacion_por_id_sim_y_puntuacion($id_sistema,$objeto->id);
              $html.='
                <tr  id="tabla_puntuacion3" style="background-color: #E7F3EB">
                <th colspan=2 id="tabla_puntuacion2">'.
                $objeto->id.' '.$objeto->nombre.'
                

                </th>
                </tr>

              ';
              if($rpt_detalle_puntuacion!="-1"){
              while($fila=mysqli_fetch_object($rpt_detalle_puntuacion)){             
            $html.='

                  <tr style="background-color: #E7F3EB" id="tabla_puntuacion3">
                  <td >'.$fila->nombre.'</td>
                  <td >'.$fila->estado.'</td>
                  </tr><br>

                  ';
            }
          }
           $html.='</table> </td>';
          if($bajo==1){
               $html.='</tr>';
              }
          }
          }
          
              
      $html.='</table><br>';
      $html.='<b>Referencia:</b><br>';
$html.= $rpt_sim->referencia.'<br>';
      $html.='<b>Observaciones:</b><br>';
$html.= $rpt_sim->observaciones.'<br>';
      $html.='<b>Comentarios:</b><br>';
$html.= $rpt_sim->comentarios.'<br>';
 


$html.='<th><h3>IMAGENES</h3></th>';


$html.="<table id='tabla_firmajefe' ><tr>";

$html.="<td><img src='../".$rpt_sim->imagen1."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imegen2."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imegen3."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imegen4."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imagen5."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imagen6."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imagen7."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imagen8."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imagen9."' width='150px'/></td>";
$html.="<td><img src='../".$rpt_sim->imagen10."' width='150px'/></td> </tr></table>";

$html.="<br><br><br><table id=tabla_firmajefe>




<tr >
<th style='background-color: #025522'>IMAGEN DE JEFE DE PLANTA</th>
</tr>
<tr>
<td >
<img src='../".$rpt_sim->imagen_jefe."' width=300px />
</td>
</tr>
</table>
<br>
<br>
<br>
";

$html.="<table >
<tr >
<th style='background-color: #025522'>FIRMA INVETSA</th>
<th style='background-color: #025522'>FIRMA EMPRESA</th>
</tr>
<tr>
<td>
<img src='../".$rpt_sim->firma_invetsa."' width=300px/>
</td>
<td>
<img src='../".$rpt_sim->firma_empresa."' width=300px/>
</td>
</tr>
</table>
";
   /*
if(file_exists("../".$rpt_sim->firma_invetsa))
{
  $contenido=file_get_contents("../".$rpt_sim->firma_invetsa);

header("Content-Type: image/png");
echo $contenido;
}
else
{
  echo "no existe";
}
?>
*/
$html.="
 
  </body>
 
</html>
";

 
 
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

<form method="POST" action="frmReporte.php">
  <Input type="submit" value="Descargar" name="descargar"/>
</form>
