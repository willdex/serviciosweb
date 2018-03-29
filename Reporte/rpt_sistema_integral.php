<?php
include_once("../clsSistema_integral.php");
include_once("../clsPuntuacion.php");
include_once("../clsDetalle_puntuacion.php");
include_once("../clsPeso.php");
include_once("mpdf/mpdf.php");




$sistema_integral=New Sistema_integral();
$puntuacion= New Puntuacion();
$detalle_puntuacion=New Detalle_puntuacion();
$peso=New Peso();

$id_sistema=$_GET['id'];

$rpt_sim=$sistema_integral->get_formulario_por_id_sim($id_sistema);
$rpt_puntuacion=$puntuacion->get_formulario_puntuacion_por_id_sim($id_sistema);
$rpt_peso=$peso->get_formulario_peso_por_id_sim($id_sistema);
$rpt_detalle_puntuacion=$detalle_puntuacion->get_formulario_detalle_puntuacion_por_id_sim_y_puntuacion($id_sistema,$id_puntuacion);


 

$html.='

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet"  href="mPDF/style.css">
    <meta charset="utf-8">
    <title>SISTEMA INTEGRAL DE MONITOREO</title>
      
       
<style type="text/css">
       #tabla_contenido,#tabla_puntuacion{
        border:1px solid #000; 
        margin: 5px;
        align-content: top;
        background: #E7F3EB;
       }
       #tabla_puntuacion
       {
        width: 350px;
       }
       th, #tr_cabecera{
         background-color: #025522;
        color: white;
         border: 2px solid #000;

       }
      table th{
        color:white;
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
     </style>



  </head>
  <body>
    <header class="clearfix">
    <TABLE class="titulo_tabla1">
      <tr>
        <td>
          <img style="width: 50px; height: 50px" src="imagen/invetsa.png"> 

         </td>
         <td align="center">
         <h2 >SIM (SISTEMA INTEGRAL DE MONITOREO)</h2>
         <h3  >Invetsa Veterinaria S.A.</h3>
        </td>
        <td>
         Codigo:'.$rpt_sim->codigo.'  <br>
         Revision:'.$rpt_sim->revision.'   
        </td>
      </tr>
 
    </TABLE>
   ';


 


 $html.='

 
   <table style="width:100%;">
      <tr>
        <td style="text-align: left;  ">
          EMPRESA:'.  $rpt_sim->empresa.' <br>
         GRANJA:'. $rpt_sim->granja.'<br>
         ZONA:'.$rpt_sim->zona.' <br>
         GALPON:'.$rpt_sim->codigo_galpon.'  <br>
      </td>
        

        <td style="text-align: left;" colspan="2"> 
         FECHA:'.$rpt_sim->fecha.'<br>
         EDAD:'.$rpt_sim->edad.' <br>
         SEXO:'.$rpt_sim->sexo.'<br>
         Nro. de POLLOS:'.$rpt_sim->nro_pollos.'<br>
        </td>
      </tr>

   </TABLE>
</header>
   ';

$html.='

    
      <table id=tabla_contenido border="0.5" cellpadding="3" bordercolor="#000000">
          <tr >
            <th><font size="3">Peso Corporal</font></th>
            <th><font size="3">Peso Bursa</font> </th>
            <th><font size="3">Peso de Brazo</font> </th>
            <th><font size="3">Peso de Timo</font> </th>
            <th><font size="3">Peso de Higado</font> </th>
            <th><font size="3">Indice Bursal </font></th>
            <th><font size="3">Indice Timico</font></th>
            <th><font size="3">Indice Hepatico</font></th>
            <th><font size="3">Bursometro</font></th>
          </tr>
            
            <tbody>
';
            
          
          
           

            if($rpt_peso!="-1"){
            while ($fila=mysqli_fetch_object($rpt_peso)) {
              if($fila->id=="6")
              {
                
                $html.=' <tr style="background:#5c59a0; color:#fff;">';
                         
              }
              else
              {
                
               $html.=' <tr>';
                 
              }
           $html.='
                  <td>'.$fila->peso_corporal.'</td>
                  <td>'.$fila->peso_bursa.'</td>
                  <td>'.$fila->peso_brazo.'</td>
                  <td>'.$fila->peso_timo.'</td>
                  <td>'.$fila->peso_higado.'</td>
                  <td>'.$fila->indice_bursal.'</td>
                  <td>'.$fila->indice_timico.'</td>
                  <td>'.$fila->indice_hepatico.'</td>
                  <td>'.$fila->bursometro.'</td>
                  </tr>
                  ';
            }
          }
          
$html.='           </tbody>       
      </table>
      <table>
';    

 

            if($rpt_peso!="-1"){
              
            while ($objeto=mysqli_fetch_object($rpt_puntuacion)) {
              $bajo=$objeto->id % 2;
             
              if($bajo==1){
                $html.='<tr>';
              }
              $html.='<td>
                    <div ><table id=tabla_puntuacion >';
              $rpt_detalle_puntuacion=$detalle_puntuacion->get_formulario_detalle_puntuacion_por_id_sim_y_puntuacion($id_sistema,$objeto->id);
              $html.='
                <tr>
                <th colspan=2>
                '.$objeto->id.' '.$objeto->nombre.'
                </th>
                </tr>
              ';
              if($rpt_detalle_puntuacion!="-1"){
              while($fila=mysqli_fetch_object($rpt_detalle_puntuacion)){
           $html.='
                  <tr>
                  <td>'.$fila->nombre.'</td>
                  <td>'.$fila->estado.'</td>
                  </tr>
                  ';
            }
          }
          $html.='</table></div>';

          }
          if($bajo==0){
               $html.='</tr>';
              }
              $html.='</td>';
          }
             

$html.='</table>

<br>
';
   
 
 
   


$html.='
</div>
<ul>
<b>Observaciones:</b><br>
 '. $rpt_sim->observaciones.'
<br>
<br>
<b>Comentarios:</b><br>
  '.$rpt_sim->comentarios.'
<br>
<br>
</ul>';

 

$src_imagen_jefe='imagen/invetsa.png';
$src_firma_invetsa='imagen/invetsa.png';
$src_firma_empresa='imagen/invetsa.png';

$src_imagen1="../".$rpt_sim->imagen1; 
$src_imagen2="../".$rpt_sim->imagen2; 
$src_imagen3="../".$rpt_sim->imagen3; 
$src_imagen4="../".$rpt_sim->imagen4; 
$src_imagen5="../".$rpt_sim->imagen5; 
$src_imagen6="../".$rpt_sim->imagen6; 
$src_imagen7="../".$rpt_sim->imagen7; 
$src_imagen8="../".$rpt_sim->imagen8; 
$src_imagen9="../".$rpt_sim->imagen9; 
$src_imagen10="../".$rpt_sim->imagen10; 


 if(file_exists("../".$rpt_sim->firma_invetsa))
{
  $src_firma_invetsa="../".$rpt_sim->firma_invetsa;
}
 if(file_exists("../".$rpt_sim->firma_empresa))
{
  $src_firma_empresa="../".$rpt_sim->firma_empresa;
}
if(file_exists("../".$rpt_sim->imagen_jefe))
{
  $src_imagen_jefe="../".$rpt_sim->imagen_jefe;
}


$html.='
 

         <table id=tabla_contenido border="0.5" cellpadding="3" bordercolor="#000000">
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

 


 <table id=tabla_contenido class="foto1">
<tr>
<th>IMAGEN DEL RESPONSABLE</th>
</tr>
<tr>
<td>
<img src="'.$src_imagen_jefe.'" width="300px" />
</td>
</tr>
</table>
<br>
<br>
<br>
 
 
 <table id=tabla_contenido class="foto2">
<tr>
<th>JEFE DE PLANTA DE INCUBACIÓN</th>
<th>FIRMA INVETSA</th>
</tr>
<tr>
<td>
<img src="'.$src_firma_empresa.'" width="300px"/>
</td>
<td>
<img src="'.$src_firma_invetsa.'" width="300px"/>
</td>
</tr>
</table>

  </body>
 
</html>';

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


    </main>
    <footer>
  
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
 
</html>

