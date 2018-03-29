<?php
include_once('clsConexion.php');
class Servicio_Mantenimiento extends Conexion
{
	private $codigo;	
	private $fecha;
	private $firma_invetsa;
	private $firma_jefe_planta;
	private $hora_ingreso;
	private $hora_salidas;
	private $id;
	private $id_compania;
	private $maquina;
	private $id_tecnico;
	private $revision;
	private $id_sqlite;
	private $imei;
	private $formulario;
	private $imagen_jefe;
	private $jefe_planta;
	private $encargado_maquina;
	private $ultima_visita;
	private $plana_de_incubacion;
	private $direccion;

	private $imagen1;
	private $imagen2;
	private $imagen3;
	private $imagen4;
	private $imagen5;
	private $imagen6;
	private $imagen7;
	private $imagen8;
	private $imagen9;
	private $imagen10; 

	public function Servicio_Mantenimiento()
	{
		parent::Conexion();
		$this->codigo="";		
		$this->fecha="";
		$this->firma_invetsa="";
		$this->firma_jefe_planta="";
		$this->hora_ingreso="";
		$this->hora_salidas="";
		$this->id=0;
		$this->id_compania="";
		$this->maquina="";
		$this->id_tecnico="";
		$this->revision="";
		$this->id_sqlite="";
		$this->imei="";
		$this->formulario="";
		$this->imagen_jefe="";
		$this->jefe_planta="";
		$this->encargado_maquina="";
		$this->ultima_visita="";
		$this->planta_de_incubacion="";
		$this->direccion="";

		$this->imagen1="";
		$this->imagen2="";
		$this->imagen3="";
		$this->imagen4="";
		$this->imagen5="";
		$this->imagen6="";
		$this->imagen7="";
		$this->imagen8="";
		$this->imagen9="";
		$this->imagen10="";
		}
		
	public function Servicio_Mantenimiento2($codigo,$fecha,$firma_invetsa,$firma_jefe_planta,$hora_ingreso,$hora_salidas,$id_compania,$maquina,$id_tecnico,$revision,$id_sqlite,$imei,$formulario,$foto_jefe,$jefe_planta,$encargado_maquina,$ultima_visita,$planta_de_incubacion,$direccion,
	$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10  )
	{
		
		$this->codigo=$codigo;
		$this->fecha=$fecha;	
		$this->firma_invetsa=$firma_invetsa;
		$this->firma_jefe_planta=$firma_jefe_planta;
		$this->hora_ingreso=$hora_ingreso;
		$this->hora_salidas=$hora_salidas;
		$this->id_compania=$id_compania;	
		$this->maquina=$maquina;
		$this->id_tecnico=$id_tecnico;
		$this->revision=$revision;
		$this->id_sqlite=$id_sqlite;
		$this->imei=$imei;
		$this->formulario=$formulario;
		$this->imagen_jefe=$foto_jefe;
		$this->jefe_planta=$jefe_planta;
		$this->encargado_maquina=$encargado_maquina;
		$this->ultima_visita=$ultima_visita;
		$this->planta_de_incubacion=$planta_de_incubacion;
		$this->direccion=$direccion;

		$this->imagen1=$imagen1;
		$this->imagen2=$imagen2;	
		$this->imagen3=$imagen3;
		$this->imagen4=$imagen4;
		$this->imagen5=$imagen5;
		$this->imagen6=$imagen6;
		$this->imagen7=$imagen7;
		$this->imagen8=$imagen8;
		$this->imagen9=$imagen9;
		$this->imagen10=$imagen10;
	}
	public function get_codigo()
	{
		return $this->codigo;
	}
	
	public function get_fecha()
	{
		return $this->fecha;
	}
	public function get_firma_invetsa()
	{
		return $this->firma_invetsa;
	}
	public function get_firma_jefe_planta()
	{
		return $this->firma_jefe_planta;
	}
	
	public function get_hora_ingreso()
	{
		return $this->hora_ingreso;
	}
	
	public function get_hora_salidas()
	{
		return $this->hora_salidas;
	}
	
	public function get_id()
	{
		return $this->id;
	}
	
	public function get_id_compania()
	{
		return $this->id_compania;
	}
	
	
	public function get_id_tecnico()
	{
		return $this->id_tecnico;
	}
	
	public function get_revision()
	{
		return $this->revision;
	}
	public function get_id_sqlite()
	{
		return $this->id_sqlite;
	}
	public function get_imei()
	{
		return $this->imei;
	}
	
	
	public function guardar()
	{

		$sql="INSERT into servicio_mantenimiento(codigo,fecha,firma_invetsa,firma_jefe_planta,hora_ingreso,hora_salidas,id_compania,maquina,id_tecnico,revision,id_sqlite,imei,formulario,jefe_planta,encargado_maquina,ultima_visita,planta_de_incubacion,direccion )values('$this->codigo','$this->fecha','$this->firma_invetsa','$this->firma_jefe_planta','$this->hora_ingreso','$this->hora_salidas','$this->id_compania','$this->maquina','$this->id_tecnico','$this->revision','$this->id_sqlite','$this->imei','$this->formulario','$this->jefe_planta','$this->encargado_maquina','$this->ultima_visita','$this->planta_de_incubacion','$this->direccion' )";
   	
   		$id_servicio_mantenimiento=parent::ejecutar_obtener_id($sql);
		

		if($id_servicio_mantenimiento!="-1")
		{
		$direccion_firma_invetsa="servicio_mantenimiento/firma/".$id_servicio_mantenimiento."_firma_invetsa_".$this->fecha.".png";
		$direccion_firma_empresa="servicio_mantenimiento/firma/".$id_servicio_mantenimiento."_firma_empresa_".$this->fecha.".png";
		$direccion_foto_jefe="servicio_mantenimiento/imagen/".$id_servicio_mantenimiento."_foto_jefe_".$this->fecha.".png";

		$direccion_imagen_1="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_1_".$this->fecha.".png";
		$direccion_imagen_2="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_2_".$this->fecha.".png";
		$direccion_imagen_3="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_3_".$this->fecha.".png";
		$direccion_imagen_4="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_4_".$this->fecha.".png";
		$direccion_imagen_5="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_5_".$this->fecha.".png";
		$direccion_imagen_6="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_6_".$this->fecha.".png";
		$direccion_imagen_7="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_7_".$this->fecha.".png";
		$direccion_imagen_8="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_8_".$this->fecha.".png";
		$direccion_imagen_9="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_9_".$this->fecha.".png";
		$direccion_imagen_10="sistema_integral_de_monitoreo/imagen/".$id_sistema."_imagen_10_".$this->fecha.".png";
		
		$this->guardar_imagen_png($this->firma_invetsa,$direccion_firma_invetsa);
		$this->guardar_imagen_png($this->firma_jefe_planta,$direccion_firma_empresa);
		$this->guardar_imagen_png($this->imagen_jefe,$direccion_foto_jefe);

		$this->guardar_imagen_png($this->imagen1,$direccion_imagen_1);
		$this->guardar_imagen_png($this->imagen2,$direccion_imagen_2);
		$this->guardar_imagen_png($this->imagen3,$direccion_imagen_3);
		$this->guardar_imagen_png($this->imagen4,$direccion_imagen_4);
		$this->guardar_imagen_png($this->imagen5,$direccion_imagen_5);
		$this->guardar_imagen_png($this->imagen6,$direccion_imagen_6);
		$this->guardar_imagen_png($this->imagen7,$direccion_imagen_7);
		$this->guardar_imagen_png($this->imagen8,$direccion_imagen_8);
		$this->guardar_imagen_png($this->imagen9,$direccion_imagen_9);
		$this->guardar_imagen_png($this->imagen10,$direccion_imagen_10);

 		$actualizar="UPDATE servicio_mantenimiento set
 		 firma_invetsa='$direccion_firma_invetsa',
 		 firma_jefe_planta='$direccion_firma_empresa',
 		imagen1='$direccion_imagen_1',
 		imagen2='$direccion_imagen_2',
 		imagen3='$direccion_imagen_3',
 		imagen4='$direccion_imagen_4',
 		imagen5='$direccion_imagen_5',
 		imagen6='$direccion_imagen_6',
 		imagen7='$direccion_imagen_7',
 		imagen8='$direccion_imagen_8',
 		imagen9='$direccion_imagen_9',
 		imagen10='$direccion_imagen_10',
 		 imagen_jefe='$direccion_foto_jefe'
 		  where id='$id_servicio_mantenimiento'";
		
		$actualizado=parent::ejecutar($actualizar);

			return true;
		}
		else
			return false;
	}
	public function buscar()
	{
		$sql="SELECT * from servicio_mantenimiento";
		return parent::ejecutar($sql);
	}	

	public function existe_id_sqlite($id_sqlite,$imei)
	{
		$sql="SELECT * from servicio_mantenimiento where id_sqlite='$id_sqlite' and imei='$imei'";
		$consulta=parent::ejecutar($sql);
		
		if(mysqli_num_rows($consulta) != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_id_por_sqlite($id_sqlite,$imei)
	{
		$sql="SELECT id from servicio_mantenimiento where id_sqlite='$id_sqlite' and imei='$imei' limit 1";
		$consulta=parent::ejecutar($sql);
		
		if(mysqli_num_rows($consulta) != 0)
		{
			return mysqli_fetch_assoc($consulta)['id'];
		}
		else
		{
			return "-1";
		}
	}
	public function guardar_imagen($dato,$file)
	{
		if($dato!="")
		{
		$success=file_put_contents($file, $dato);
		}
	}

	public function guardar_imagen_png($dato,$file)
	{
		if($dato!="")
		{

    // Imagen png codificada en base64.
    $v_imagen_Base64 = "data:image/png;base64,".$dato;

    // Eliminamos data:image/png; y base64, de la cadena que tenemos
    // Hay otras formas de hacerlo
    list(, $v_imagen_Base64) = explode(';', $v_imagen_Base64);
    list(, $v_imagen_Base64) = explode(',', $v_imagen_Base64);

    // Decodificamos $Base64Img codificada en base64.
    $v_imagen_Base64 = base64_decode($v_imagen_Base64);
    
    // Escribimos la información obtenida en un archivo para que se cree la imagen correctamente
    $file=str_replace(".txt", ".png", $file);
    file_put_contents($file, $v_imagen_Base64);
		}
	}

	public function vaciar_registro($id_SM)
	{

		$sql_detalle_DL="DELETE from detalle_limpieza where id_servicio='$id_SM'";
		$sql_detalle_L="DELETE from limpieza where id_servicio='$id_SM'";
		$sql_detalle_DIF="DELETE from detalle_inspeccion_funcionamiento where id_servicio='$id_SM'";
		$sql_detalle_DIV="DELETE from detalle_inspeccion_visual where id_servicio='$id_SM'";
		$sql_detalle_IF="DELETE from inspeccion_funcionamiento where id_servicio='$id_SM'";
		$sql_detalle_IV="DELETE from inspeccion_visual where id_servicio='$id_SM'";
		$sql_detalle_SM="DELETE from servicio_mantenimiento where id='$id_SM'";

		$sw_DL=parent::ejecutar($sql_detalle_DL);
		$sw_L=parent::ejecutar($sql_detalle_L);
		$sw_DIF=parent::ejecutar($sql_detalle_DIF);
		$sw_DIV=parent::ejecutar($sql_detalle_DIV);
		$sw_IF=parent::ejecutar($sql_detalle_IF);
		$sw_IV=parent::ejecutar($sql_detalle_IV);
		$sw_SM=parent::ejecutar($sql_detalle_SM);

		if($sw_SM==true)
		{
			return true;
		}
		else
			{return false;}
	}

	public function get_id_max($id_tecnico,$imei)
	{
		$sql="SELECT max(id) as 'id' from servicio_mantenimiento where id_tecnico='$id_tecnico' and imei='$imei'";
		$consulta=parent::ejecutar($sql);
		if(mysqli_num_rows($consulta) != 0 )
		{$fila=mysqli_fetch_object($consulta);
			if($fila->id!=null)
			{
			 return $fila->id;	
			}
			else
			{
				return "1";
			}
			
		}
		else
		{
			return '1';
		}
	}
	public function get_formulario_por_id_y_maquina($id_formulario)
	{
		$sql="SELECT s.*,c.nombre as 'compania',c.direccion as 'direccion',te.nombre as 'tecnico' FROM servicio_mantenimiento s,compania c ,tecnico te WHERE s.id_compania=c.id and s.id_tecnico=te.id and s.id='$id_formulario' ";
		$consulta=parent::ejecutar($sql);
				
		if(mysqli_num_rows($consulta) != 0 )
		{$fila=mysqli_fetch_object($consulta);
			return $fila;
		}
		else
		{
			return '-1';
		}
	}		
}
/*
		DELETE from detalle_limpieza ;
		DELETE from limpieza ;
		DELETE from detalle_inspeccion_funcionamiento;
		DELETE from detalle_inspeccion_visual ;
		DELETE from inspeccion_funcionamiento ;
		DELETE from inspeccion_visual ;
		DELETE from servicio_mantenimiento ;


*/
?>