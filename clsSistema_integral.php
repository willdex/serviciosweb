<?php
include_once('clsConexion.php');
class Sistema_Integral extends Conexion
{
	private $codigo;	
	private $edad;
	private $id;
	private $id_empresa;
	private $id_galpon;
	private $id_granja;
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
	private $observaciones;
	private $revision;
	private $fecha;
	private $nro_pollos;
	private $sexo;
	private $id_sqlite;
	private $imei;
	private $firma_invetsa;
	private $firma_empresa;
	private $id_tecnico;
	private $imagen_jefe;
	private $comentarios;
	private $referencia;

	public function Sistema_Integral()
	{
		parent::Conexion();
		$this->codigo="";		
		$this->edad="";
		$this->id=0;
		$this->id_empresa="";
		$this->id_galpon="";
		$this->id_granja="";
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
		$this->observaciones="";
		$this->revision="";
		$this->fecha="";
		$this->nro_pollos="";
		$this->sexo="";
		$this->id_sqlite="";
		$this->imei="";
		$this->firma_invetsa="";
		$this->firma_empresa="";
		$this->id_tecnico=0;
		$this->imagen_jefe="";
		$this->comentarios="";
		$this->referencia="";

		}
		
	public function preparar($codigo,$edad,$id_empresa,$id_galpon,$id_granja,
		$imagen1,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,
		$observaciones,$revision,$fecha,$nro_pollos,$sexo,$id_sqlite,$imei,$firma_invetsa,$firma_empresa,$id_tecnico,$imagen_jefe,$comentarios,$referencia)
	{
		$this->codigo=$codigo;
		$this->edad=$edad;	
		$this->id_empresa=$id_empresa;
		$this->id_galpon=$id_galpon;
		$this->id_granja=$id_granja;
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
		$this->observaciones=$observaciones;
		$this->revision=$revision;
		$this->fecha=$fecha;
		$this->nro_pollos=$nro_pollos;
		$this->sexo=$sexo;
		$this->id_sqlite=$id_sqlite;
		$this->imei=$imei;
		$this->firma_invetsa=$firma_invetsa;
		$this->firma_empresa=$firma_empresa;
		$this->id_tecnico=$id_tecnico;
		$this->imagen_jefe=$imagen_jefe;
		$this->comentarios=$comentarios;
		$this->referencia=$referencia;
	}
	public function get_codigo()
	{
		return $this->codigo;
	}
	
	public function get_edad()
	{
		return $this->edad;
	}
	public function get_id()
	{
		return $this->id;
	}
	public function get_id_empresa()
	{
		return $this->id_empresa;
	}
	
	public function get_id_galpon()
	{
		return $this->id_galpon;
	}
	
	public function get_id_granja()
	{
		return $this->id_granja;
	}
	
	public function get_imagen1()
	{
		return $this->imagen1;
	}
	public function get_imagen2()
	{
		return $this->imagen2;
	}
	public function get_imagen3()
	{
		return $this->imagen3;
	}
	public function get_imagen4()
	{
		return $this->imagen4;
	}
	public function get_imagen5()
	{
		return $this->imagen5;
	}
	public function get_observaciones()
	{
		return $this->observaciones;
	}
	public function get_revision()
	{
		return $this->revision;
	}
	public function get_fecha()
	{
		return $this->fecha;
	}
	public function get_nro_pollos()
	{
		return $this->nro_pollos;
	}

	public function get_sexo()
	{
		return $this->sexo;
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
		$sql="INSERT into sistema_integral(codigo,edad,id_empresa,id_galpon,id_granja,observaciones,revision,fecha,nro_pollos,sexo,id_sqlite,imei,id_tecnico,comentarios,referencia)values('$this->codigo','$this->edad','$this->id_empresa','$this->id_galpon','$this->id_granja','$this->observaciones','$this->revision','$this->fecha','$this->nro_pollos','$this->sexo','$this->id_sqlite','$this->imei','$this->id_tecnico','$this->comentarios','$this->referencia')";
		

		$id_sistema=parent::ejecutar_obtener_id($sql);
		
		if($id_sistema!="-1")
		{
		$direccion_firma_invetsa="sistema_integral_de_monitoreo/firma/".$id_sistema."_firma_invetsa_".$this->fecha.".png";
		$direccion_firma_empresa="sistema_integral_de_monitoreo/firma/".$id_sistema."_firma_empresa_".$this->fecha.".png";
		$direccion_foto_jefe="sistema_integral_de_monitoreo/imagen/".$id_sistema."_foto_jefe_".$this->fecha.".png";

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
		$this->guardar_imagen_png($this->firma_empresa,$direccion_firma_empresa);
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

 		$actualizar="UPDATE sistema_integral set 
 		firma_invetsa='$direccion_firma_invetsa', 
 		firma_empresa='$direccion_firma_empresa', 
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
 		where id='$id_sistema'";
		
		$actualizado=parent::ejecutar($actualizar);

			return true;
		}
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from sistema_integral";
		return parent::ejecutar($sql);
	}	
	public function existe_id_sqlite($id_sqlite,$imei)
	{
		$sql="SELECT * from sistema_integral where id_sqlite='$id_sqlite' and imei='$imei'";
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
		$sql="SELECT id from sistema_integral where id_sqlite='$id_sqlite' and imei='$imei' limit 1";

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

	
		public function vaciar_registro($id_sistema)
	{
		$sql_PESO="DELETE from peso where id_sistema='$id_sistema'";
		$sql_PUNT="DELETE from puntuacion where id_sistema='$id_sistema'";
		$sql_D_P="DELETE from detalle_puntuacion where id_sistema='$id_sistema'";
		$sql_SI="DELETE from sistema_integral where id='$id_sistema'";
		

		$sw_PESO=parent::ejecutar($sql_PESO);
		$sw_D_P=parent::ejecutar($sql_D_P);
		$sw_PUNT=parent::ejecutar($sql_PUNT);
		$sw_SI=parent::ejecutar($sql_SI);
		

		if($sw_SI==true)
		{
			return true;
		}
		else
			{return false;}
	}

	
		 

	public function get_id_max($id_tecnico,$imei)
	{
		$sql="SELECT max(id) as 'id' from sistema_integral where id_tecnico='$id_tecnico' and imei='$imei'";
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

	public function get_formulario_por_id_sim($id_formulario)
	{
		$sql="SELECT s.*,e.nombre as 'empresa',gr.nombre as 'granja',gr.zona,ga.codigo as 'codigo_galpon',te.nombre as 'tecnico' FROM sistema_integral s,empresa e,granja gr,galpon ga,tecnico te WHERE s.id_empresa=e.id and s.id_granja=gr.id and s.id_galpon=ga.id and s.id_tecnico=te.id and s.id='$id_formulario'";
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

?>