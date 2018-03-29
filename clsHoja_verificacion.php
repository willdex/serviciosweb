<?php

include_once('clsConexion.php');
class Hoja_verificacion extends Conexion
{
	//atributos
	private $codigo;
	private $firma_Empresa;
	private $firma_Invetsa;
	private $Hora_Ingreso;
	private $Hora_Salida;
	private $id;
	private $id_Empresa;
	private $id_unidad;
	private $id_granja;
	private $Productividad;
	private $Promedio_Mantenimiento;
	private $Puntaje_Control_Indice;
	private $Revision;
	private $sumatoria_Manipulacion_Vacuna;
	private $imei;
	private $fecha;
	private $id_tecnico;
	private $imagen_jefe;
	private $responsable_invetsa;
	private $responsable_incubadora;
	private $total_vc;
	private $puntaje_total;
	private $irregularidad_15;
	private $recomendaciones;
	private $otras_irregularidades;
	
	//construtor
	public function Hoja_verificacion()
	{  
		parent::Conexion();
	 	$this->codigo="";
		$this->firma_empresa="";
		$this->firma_invetsa="";
		$this->hora_ingreso="";
		$this->hora_salida="";
		$this->id=0;
		$this->id_empresa=0;
		$this->id_unidad=0;
		$this->id_granja=0;
		$this->productividad=0;
		$this->promedio_mantenimiento=0;
		$this->puntaje_control_indice=0;
		$this->revision="";
		$this->sumatoria_manipulacion_vacuna=0;	
		$this->imei="";
		$this->fecha="";
		$this->id_tecnico=0;
		$this->imagen_jefe="";
		$this->responsable_invetsa="";
		$this->responsable_incubadora="";
		$this->total_vc=0;
		$this->puntaje_total=0;
		$this->irregularidad_15="";
		$this->recomendaciones="";
		$this->otras_irregularidades="";

	}
	public function Hoja_verificacion2($codigo,$firma_empresa,$firma_invetsa,$hora_ingreso,$hora_salida,$id_sqlite,$id_empresa,$id_unidad,$id_granja,$productividad,$promedio_mantenimiento,$puntaje_control_indice,$revision,$sumatoria_manipulacion_vacuna,$imei,$fecha,$id_tecnico,$imagen_jefe,$responsable_invetsa,$responsable_incubadora,$total_vc,$puntaje_total,$irregularidad_15,$recomendaciones,$otras_irregularidades)
	{
		$this->codigo=$codigo;
		$this->firma_empresa=$firma_empresa;
		$this->firma_invetsa=$firma_invetsa;
		$this->hora_ingreso=$hora_ingreso;
		$this->hora_salida=$hora_salida;
		$this->id_sqlite=$id_sqlite;
		$this->id_empresa=$id_empresa;
		$this->id_unidad=$id_unidad;
		$this->id_granja=$id_granja;
		$this->productividad=$productividad;
		$this->promedio_mantenimiento=$promedio_mantenimiento;
		$this->puntaje_control_indice=$puntaje_control_indice;
		$this->revision=$revision;
		$this->sumatoria_manipulacion_vacuna=$sumatoria_manipulacion_vacuna;	
		$this->imei=$imei;
		$this->fecha=$fecha;
		$this->id_tecnico=$id_tecnico;
		$this->imagen_jefe=$imagen_jefe;
		$this->responsable_invetsa=$responsable_invetsa;
		$this->responsable_incubadora=$responsable_incubadora;
		$this->total_vc=$total_vc;
		$this->puntaje_total=$puntaje_total;
		$this->irregularidad_15=$irregularidad_15;
		$this->recomendaciones=$recomendaciones;
		$this->otras_irregularidades=$otras_irregularidades;

	}

	public function getCodigo()
	{
		return $this->codigo;
	}
	public function getfirma_Empresa()
	{
		return $this->firma_Empresa;
	}
	public function getfirma_Invetsa()
	{
		return $this->firma_Invetsa;
	}
	public function getHora_Ingreso()
	{
		return $this->Hora_Ingreso;
	}

	public function getHora_Salida()
	{
			return $this->Hora_Salida;
	}

	public function getId()
	{
			return $this->id;
	}

	public function getId_Empresa()
	{
		return $this->id_Empresa;
	}
	
	public function getProductividad()
	{
		return $this->Productividad;
	}
	public function getPromedio_Mantenimiento()
	{
		return $this->Promedio_Mantenimiento;
	}
	public function getPuntaje_control_Indice()
	{
		return $this->Puntaje_Control_Indice;
	}
	public function getRevision()
	{
		return $this->Revision;
	}
	public function getSumatoria_Manipulacion_Vacuna()
	{
		return $this->sumatoria_Manipulacion_Vacuna;
	}
	public function getImei()
	{
		return $this->imei;
	}
	public function guardar()
	{
     $sql="INSERT INTO hoja_verificacion(codigo,hora_ingreso,hora_salida,id_empresa,id_unidad,id_granja,productividad,promedio_mantenimiento,puntaje_control_indice,revision,sumatoria_manipulacion_vacuna,imei,id_sqlite,fecha,id_tecnico,responsable_invetsa,responsable_incubadora,total_vc,puntaje_total,irregularidad_15,recomendaciones,otras_irregularidades) values('$this->codigo','$this->hora_ingreso','$this->hora_salida','$this->id_empresa','$this->id_unidad','$this->id_granja','$this->productividad','$this->promedio_mantenimiento','$this->puntaje_control_indice','$this->revision','$this->sumatoria_manipulacion_vacuna','$this->imei','$this->id_sqlite','$this->fecha','$this->id_tecnico','$this->responsable_invetsa','$this->responsable_incubadora','$this->total_vc','$this->puntaje_total','$this->irregularidad_15','$this->recomendaciones','$this->otras_irregularidades')";

	
		$id_hoja=parent::ejecutar_obtener_id($sql);

		if($id_hoja!="-1")
		{
		$direccion_firma_invetsa="hoja_verificacion/firma/".$id_hoja."_firma_invetsa_".$this->fecha.".png";
		$direccion_firma_empresa="hoja_verificacion/firma/".$id_hoja."_firma_empresa_".$this->fecha.".png";
		$direccion_imagen_jefe="hoja_verificacion/imagen/".$id_hoja."_foto_jefe_".$this->fecha.".png";
		
		$this->guardar_imagen_png($this->firma_invetsa,$direccion_firma_invetsa);
		$this->guardar_imagen_png($this->firma_empresa,$direccion_firma_empresa);
		$this->guardar_imagen_png($this->imagen_jefe,$direccion_imagen_jefe);
 		$actualizar="UPDATE hoja_verificacion set firma_invetsa='$direccion_firma_invetsa', firma_empresa='$direccion_firma_empresa', imagen_jefe='$direccion_imagen_jefe' where id='$id_hoja'";
		
		$actualizado=parent::ejecutar($actualizar);

			return true;
		}
		else
		{return false;}
	}

	

	public function existe_id_sqlite($id_sqlite,$imei)
	{
		$sql="SELECT * from hoja_verificacion where id_sqlite='$id_sqlite' and imei='$imei'";
		$consulta=parent::ejecutar($sql);
		
		if(mysqli_num_rows($consulta) != 0 )
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
		$sql="SELECT id from hoja_verificacion where id_sqlite='$id_sqlite' and imei='$imei' limit 1";
		
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


		public function vaciar_registro($id_hoja)
	{	$sql_ML="DELETE from mantenimiento_limpieza where id_hoja_verificacion='$id_hoja'";
		$sql_CI="DELETE from linea_genetica where id_hoja_verificacion='$id_hoja'";
		$sql_CI="DELETE from viabilidad_celular where id_hoja_verificacion='$id_hoja'";
		$sql_CI="DELETE from control_indice where id_hoja_verificacion='$id_hoja'";
		$sql_MD="DELETE from manipulacion_dilucion where id_hoja_verificacion='$id_hoja'";
		$sql_DA="DELETE from detalle_accion where id_hoja_verificacion='$id_hoja'";
		$sql_A="DELETE from accion where id_hoja_verificacion='$id_hoja'";
		$sql_HV="DELETE from hoja_verificacion where id='$id_hoja'";

		$sw_ML=parent::ejecutar($sql_ML);
		$sw_CI=parent::ejecutar($sql_CI);
		$sw_MD=parent::ejecutar($sql_MD);
		$sw_DA=parent::ejecutar($sql_DA);
		$sw_A=parent::ejecutar($sql_A);
		$sw_HV=parent::ejecutar($sql_HV);

		if($sw_HV==true)
		{
			return true;
		}
		else
			{return false;}
	}
	public function get_id_max($id_tecnico,$imei)
	{
		$sql="SELECT max(id) as 'id' from hoja_verificacion where id_tecnico='$id_tecnico' and imei='$imei'";
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
	

	public function get_formulario_por_id($id_formulario)
	{
		$sql="SELECT s.*,e.nombre as 'empresa',u.nombre as 'unidad',te.nombre as 'tecnico' FROM hoja_verificacion s,empresa e,unidad u,tecnico te WHERE s.id_empresa=e.id and s.id_unidad=u.id and s.id_tecnico=te.id and s.id='$id_formulario' ";
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
	public function get_formulario_hoja_por_id($id_formulario)
	{
		$sql="SELECT s.*  FROM hoja_verificacion s  WHERE   s.id='$id_formulario' ";
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
	public function get_formulario_unidad_por_id($id_formulario)
	{
		$sql="SELECT u.nombre as 'unidad'  FROM hoja_verificacion s, unidad u  WHERE  s.id_unidad=u.id   and s.id='$id_formulario' ";
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
		public function get_formulario_granja_por_id($id_formulario)
	{
		$sql="SELECT u.nombre as 'unidad'  FROM hoja_verificacion s, granja u  WHERE  s.id_granja=u.id   and s.id='$id_formulario' ";
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
	public function get_formulario_tecnico_por_id($id_formulario)
	{
		$sql="SELECT  te.nombre as 'tecnico' FROM hoja_verificacion s, tecnico te WHERE  s.id_tecnico=te.id and s.id='$id_formulario' ";
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
	public function get_formulario_empresa_por_id($id_formulario)
	{
		$sql="SELECT  e.nombre as 'empresa' FROM hoja_verificacion s,empresa e WHERE s.id_empresa=e.id  and s.id='$id_formulario' ";
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
		DELETE from linea_genetica;
		DELETE from viabilidad_celular;
		DELETE from control_indice;
		DELETE from mantenimiento_limpieza;
		DELETE from manipulacion_dilucion;
		DELETE from detalle_accion;
		DELETE from accion;
		DELETE from hoja_verificacion;
*/
?>