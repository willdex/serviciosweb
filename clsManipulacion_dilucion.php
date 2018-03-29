<?php
include_once('clsConexion.php');
class Manipulacion_dilucion extends Conexion
{
	private $descripcion;
	private $id;
	private $id_hoja_verificacion;
	private $puntaje;
	private $imei;
	private $observacion;

	public function Manipulacion_dilucion()
	{
		parent::Conexion();
		$this->descripcion="";
		$this->id=0;
		$this->id_hoja_verificacion=0;
		$this->puntaje=0;
		$this->imei="";
		$this->observacion="";
	}
	public function preparar($descripcion,$id,$id_hoja_verificacion,$puntaje,$imei,$observacion)
	{
		$this->descripcion=$descripcion;
		$this->id=$id;
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->puntaje=$puntaje;
		$this->imei=$imei;
		$this->observacion=$observacion;

	}
	public function getcodigo()
	{
		return $this->codigo;
	}
	public function getdescripcion()
	{
		return $this->descripcion;
	}
	public function getid()
	{
		return $this->id;
	}
	public function getid_hoja_verificacion()
	{
		return $this->id_hoja_verificacion;
	}
	public function getpuntaje()
	{
		return $this->puntaje;
	}
	public function getimei()
	{
		return $this->imei;
	}
	public function guardar()
	{
		$sql="INSERT into manipulacion_dilucion(descripcion,id,id_hoja_verificacion,puntaje,imei,observacion)values('$this->descripcion','$this->id','$this->id_hoja_verificacion','$this->puntaje','$this->imei','$this->observacion')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from manipulacion_dilucion";
		return parent::ejecutar($sql);
	}	
		public function existe_id($id,$id_hoja_verificacion,$imei)
	{
		$sql="SELECT * from manipulacion_dilucion where id='$id' and id_hoja_verificacion='$id_hoja_verificacion' and imei='$imei'";
		
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
	public function get_formulario_por_id_hoja($id_hoja)
	{
		$sql="SELECT * from manipulacion_dilucion WHERE id_hoja_verificacion='$id_hoja' order by id asc";
		$consulta=parent::ejecutar($sql);
				
		if(mysqli_num_rows($consulta) != 0 )
		{
			return $consulta;
		}
		else
		{
			return '-1';
		}
	}	
}

?>