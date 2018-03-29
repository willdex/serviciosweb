<?php
include_once('clsConexion.php');
class Linea_genetica extends Conexion
{
	private $id;	
	private $descripcion;
	private $cobb;
	private $ross; 
	private $id_hoja_verificacion;
	private $imei;


	public function Linea_genetica()
	{
		parent::Conexion();
		$this->id=0;		
		$this->descripcion="";
		$this->cobb="";
		$this->ross=""; 
		$this->id_hoja_verificacion=0;
		$this->imei=0;
		
		}
	public function preparar($id,$descripcion,$cobb,$ross, $id_hoja_verificacion,$imei)
	{
		$this->id=0;		
		$this->descripcion=$descripcion;
		$this->cobb=$cobb;
		$this->ross=$ross; 
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->imei=$imei;
	}
	public function get_id()
	{
		return $this->id;
	}
	
	
	public function guardar()
	{
		$sql="INSERT into linea_genetica (id,descripcion,cobb,ross, id_hoja_verificacion,imei)values('$this->id','$this->descripcion','$this->cobb','$this->ross', '$this->id_hoja_verificacion','$this->imei')";
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from linea_genetica";
		return parent::ejecutar($sql);
	}	
	public function existe_id($id_linea,$id_hoja)
	{
		$sql="SELECT * from linea_genetica where id='$id_linea' and id_hoja_verificacion='$id_hoja' limit 1";
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
		$sql="SELECT * from linea_genetica WHERE id_hoja_verificacion='$id_hoja' limit 1";
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