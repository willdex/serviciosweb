<?php
$dato=json_decode(file_get_contents("php://input"),true);

$para_tecnico  = $dato['de'] ; 
$para_cliente  = $dato['para'] ;  
$nombre_tecnico = $dato['nombre_tecnico'];
$nombre_formulario = $dato['formulario'];
$id_formulario = $dato['id_formulario']; 
$descripcion = $dato['descripcion']; 


$direccion_pagina="http://www.invetsa.com";
// Cuerpo o mensaje


/*
************* --------------------- ****************
ENVIAR CORREO

http://localhost/invetsa-www/Reporte/enviar_correo/enviar_correo.php?email_tecnico=edgarq354@gmail.com&email_cliente=edgarq354@gmail.com&nombre_tecnico=JORGE&nombre_formulario=SIM&id_formulario=2


-------------------- ************************ ----------------------
VER EL FORMULARIO EN UNA *URL*

http://localhost/invetsa-www/Reporte/frmReporte.php?opcion=sistema_integral&numero=3



$direccion_pagina="http://localhost/invetsa-www/Reporte/frmReporte.php?opcion=sistema_integral&numero=".$id_formulario;

*/


$titulo="Respaldo de formulario del registrado.";
 
$mensaje = '
<html lang="es"><body>
<b>
 Tecnico {{nombre_tecnico}}<br>
 Nº: {{numero_formulario}}<br>
 Formulario {{nombre_formulario}}
 <br>
 <br>

 Descripción del Tecnico {{descripcion}}<br>
 </b>
 <br>
 <br>
 <br>


    <section class="imagen_footer"> <img src="http://www.invetsa.com/logo.png" style=" max-width:50px; max-height:50px;"></section>
    <section class="texto_footer">
        <p> 
            Somos una corporación pionera en importación y comercialización de productos<br>
             de uso veterinario que cuenta con 25 años de experiencia y una gestión orientada <br>
             a la excelencia operativa, brindando servicios y consultoría permanente en salud,<br>
              nutrición y tecnología animal.
        </p>
    </section>
     

<center>
<a href="'.$direccion_pagina.'" style=" background-color: #4CAF50;  
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px; " target="_blank"><table style="font-size:inherit;line-height:inherit;padding:0px;border:0px" height="49" cellpadding="0" cellspacing="0">Ver el Formulario </a>
 </center>


 </body></html>

';
 

$mensaje=str_replace('{{nombre_tecnico}}',$nombre_tecnico, $mensaje);
$mensaje=str_replace('{{nombre_formulario}}',$nombre_formulario, $mensaje);
$mensaje=str_replace('{{numero_formulario}}',$id_formulario, $mensaje);
$mensaje=str_replace('{{descripcion}}',$descripcion, $mensaje);

 

// Cabecera que especifica que es un HMTL
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'From: Respaldo de formulario del Tecnico <info@global-net-wifi.com.bo>' . "\r\n";
$cabeceras .= 'Cc: info@global-net-wifi.com.bo' . "\r\n";
$cabeceras .= 'Bcc: info@global-net-wifi.com.bo' . "\r\n";

// enviamos el correo!
$exito=mail($para_cliente, $titulo, $mensaje, $cabeceras);

if($exito){
print json_encode( array('suceso' =>'1' ,'mensaje'=>'Correo enviado correctamente. XD' ));
}else{
print json_encode( array('suceso' =>'2' ,'mensaje'=>'Hubo un inconveniente. Contacta a un administrador.'.error_get_last()['message']));
}

/*
header('Location: enviado.html');



if($via_de_mensaje=="gmail")
{

}else if($via_de_mensaje=="hotmail")
{

}else if($via_de_mensaje=="yahoo")
{

}else
{
	

}






require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.global-net-wifi.com.bo"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "info@global-net-wifi.com.bo"; // Correo completo a utilizar
$mail->Password = "GLOBALNETWIFI"; // Contraseña
$mail->Port =25; // Puerto a utilizar
$mail->From = "info@global-net-wifi.com.bo"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Imvetsa <info@global-net-wifi.com.bo>";
$mail->addAddress($para_tecnico); // Esta es la dirección a donde enviamos 
$mail->addCC("info@global-net-wifi.com.bo"); // Copia
$mail->addBCC("info@global-net-wifi.com.bo"); // Copia oculta
$mail->isHTML(true); // El correo se envía como HTML
$mail->Subject ="Correo de respaldo" ; // Este es el titulo del email.
$body = $mensaje;
$mail->Body = $body; // Mensaje a enviar
$mail->AltBody =$titulo ; // Texto sin html
//$mail->addAttachment("imagenes/phpmailer.png", "imagen.png");
$exito = $mail->send(); // Envía el correo.

 

if($exito){
json_encode( array('suceso' =>'1' ,'mensaje'=>'Correo enviado correctamente. XD' ));
}else{
json_encode( array('suceso' =>'2' ,'mensaje'=>'Hubo un inconveniente. Contacta a un administrador.'.$mail->ErrorInfo));
}

*/





?>
