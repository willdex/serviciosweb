<?php

try{
$dato=json_decode(file_get_contents("php://input"),true);
$firma_1=$dato['firma_1'];
$firma_2=$dato['firma_2'];
save_json($firma_1,"servicio_mantenimiento/firma_1.txt");
save_json($firma_2,"servicio_mantenimiento/firma_2.txt");


print json_encode(array("mensaje"=>'Se guardo correctamente ',"suceso"=>"1"));
}
 catch(Exception $e)
  {
print json_encode(array("mensaje"=>'No se pudo guardar la imagen ',"suceso"=>"2"));
}
 
/*
mostrar_imagen("firma_1.txt");
mostrar_imagen("firma_2.txt");
*/

  function save_json($dato,$file)
{
	$success=file_put_contents($file, $dato);
}
function mostrar_imagen($nombre)
{
	if(file_exists($nombre))
	{		
		$json=file_get_contents($nombre);
		 	 header('content-type: image/jpeg');
		echo base64_decode($json);
	}
	else
	{
		echo "No existe la imagen";
	}
}
?>