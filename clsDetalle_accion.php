<?php
include_once ('clsEmpresa.php');
include_once('clsConexion.php');
class Detalle_accion extends Conexion
{
	private $encontrado;
	private $esperado;
	private $id;
	private $id_accion;
	private $id_hoja_verificacion;
	private $imei;

	public function Detalle_accion()
	{
		parent::Conexion();
		$this->encontrado="";
		$this->esperado="";
		$this->id=0;
		$this->id_accion=0;
		$this->id_hoja_verificacion=0;
		$this->imei="";
	}
	public function preparar($encontrado,$esperado,$id,$id_accion,$id_hoja_verificacion,$imei)
	{
		$this->encontrado=$encontrado;
		$this->esperado=$esperado;
		$this->id=$id;
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->id_accion=$id_accion;
		$this->imei=$imei;

	}
	public function getencontrado()
	{
		return $this->encontrado;
	}
	public function getesperado()
	{
		return $this->esperado;
	}
	public function getid()
	{
		return $this->id;
	}
	public function getid_accion()
	{
		return $this->id_accion;
	}
	public function getimei()
	{
		return $this->imei;
	}
	public function guardar()
	{
		$sql="INSERT into detalle_accion(encontrado,esperado,id,id_accion,id_hoja_verificacion,imei)values('$this->encontrado','$this->esperado','$this->id','$this->id_accion','$this->id_hoja_verificacion','$this->imei')";
		
	
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from detalle_accion";
		return parent::ejecutar($sql);
	}	

	public function get_formulario_por_id_hoja_y_id_accion($id_hoja,$id_accion)
	{
		$sql="SELECT * from detalle_accion WHERE id_hoja_verificacion='$id_hoja' and id_accion='$id_accion' order by id asc  ";
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