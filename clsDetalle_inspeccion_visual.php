<?php
include_once('clsConexion.php');
class Detalle_inspeccion_visual extends Conexion
{
	private $codigo;
	private $descripcion;
	private $id;
	private $id_inspeccion;
	private $id_servicio;
	private $imei;
	private $bueno;
	private $estado;
	private $regular;
	private $malo;

	public function Detalle_inspeccion_visual()
	{
		parent::Conexion();
		$this->codigo=0;
		$this->descripcion="";
		$this->estado=0;
		$this->id=0;
		$this->id_inspeccion=0;
		$this->imei="";
		$this->bueno=0;
		$this->regular=0;
		$this->malo=0;
	}
	public function preparar($codigo,$descripcion,$id,$id_inspeccion,$id_servicio,$imei,$bueno,$regular,$malo,$estado)
	{
		$this->codigo=$codigo;
		$this->descripcion=$descripcion;
		$this->id=$id;
		$this->id_inspeccion=$id_inspeccion;
		$this->id_servicio=$id_servicio;		
		$this->imei=$imei;	
		$this->estado=$estado;	
		$this->bueno=$bueno;	
		$this->regular=$regular;	
		$this->malo=$malo;	
	}
	public function get_codigo()
	{
		return $this->codigo;
	}
	
	public function get_descripcion()
	{
		return $this->descripcion;
	}
	public function get_estado()
	{
		return $this->estado;
	}

	public function get_id()
	{
		return $this->id;
	}
	public function get_id_inspeccion()
	{
		return $this->id_inspeccion;
	}
		public function get_imei()
	{
		return $this->imei;
	}
	
	public function guardar()
	{
		$sql="insert into detalle_inspeccion_visual(codigo,descripcion,id,id_inspeccion,id_servicio,imei,bueno,regular,malo,estado)values('$this->codigo','$this->descripcion','$this->id','$this->id_inspeccion','$this->id_servicio','$this->imei','$this->bueno','$this->regular','$this->malo','$this->estado')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from detalle_inspeccion_visual";
		return parent::ejecutar($sql);
	}	
	public function get_formulario_por_id_sm_y_id_inspeccion($id_servicio,$id_inspeccion)
	{
		$sql="SELECT * from detalle_inspeccion_visual where id_servicio='$id_servicio' and id_inspeccion='$id_inspeccion' order by id asc";
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