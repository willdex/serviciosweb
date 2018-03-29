<?php
include_once('clsConexion.php');
class Detalle_inspeccion_funcionamiento extends Conexion
{
	private $criterio_evaluacion;
	private $id;
	private $id_inspeccion;
	private $imei;
	private $id_servicio;
	private $bueno;
	private $malo;
	private $estado;

	public function Detalle_inspeccion_funcionamiento()
	{
		parent::Conexion();
		$this->criterio_evaluacion="";
		$this->estado=0;
		$this->id=0;
		$this->id_inspeccion="";
		$this->imei="";
		$this->id_servicio=0;
		$this->bueno=0;
		$this->malo=0;
		$this->estado=0;
	}
		
		
	public function preparar($criterio_evaluacion,$id,$id_inspeccion,$id_servicio,$imei,$bueno,$mal,$estado)
	{
		$this->criterio_evaluacion=$criterio_evaluacion;
		$this->id=$id;
		$this->id_inspeccion=$id_inspeccion;		
		$this->imei=$imei;
		$this->id_servicio=$id_servicio;		
		$this->bueno=$bueno;		
		$this->malo=$malo;		
		$this->estado=$estado;		
	}
	public function get_criterio_evaluacion()
	{
		return $this->criterio_evaluacion;
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
		$sql="insert into detalle_inspeccion_funcionamiento(criterio_evaluacion,id,id_inspeccion,id_servicio,imei,bueno,malo,estado)values('$this->criterio_evaluacion','$this->id','$this->id_inspeccion','$this->id_servicio','$this->imei','$this->bueno','$this->malo','$this->estado')";
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from detalle_inspeccion_funcionamiento";
		return parent::ejecutar($sql);
	}
	public function get_formulario_por_id_sm_y_id_inspeccion($id_servicio,$id_inspeccion)
	{
		$sql="SELECT * from detalle_inspeccion_funcionamiento where id_servicio='$id_servicio' and id_inspeccion='$id_inspeccion' order by id asc";
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