<?php
include_once('clsConexion.php');
class Viabilidad_celular extends Conexion
{
	private $id;	
	private $antibiotico;
	private $dosis;
	private $tiempo;
	private $vc;
	private $id_hoja_verificacion;
	private $imei;


	public function Viabilidad_celular()
	{
		parent::Conexion();
		$this->id=0;		
		$this->antibiotico="";
		$this->dosis="";
		$this->tiempo="";
		$this->vc="";
		$this->id_hoja_verificacion=0;
		$imei="";
		
		}
	public function preparar($id,$antibiotico,$dosis,$tiempo,$vc,$id_hoja_verificacion,$imei)
	{
		$this->id=$id;		
		$this->antibiotico=$antibiotico;
		$this->dosis=$dosis;
		$this->tiempo=$tiempo;
		$this->vc=$vc;
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->imei=$imei;
	}
	public function get_id()
	{
		return $this->id;
	}
	
	
	public function guardar()
	{
		$sql="INSERT into viabilidad_celular (id,antibiotico,dosis,tiempo,vc,id_hoja_verificacion,imei)values('$this->id','$this->antibiotico','$this->dosis','$this->tiempo','$this->vc','$this->id_hoja_verificacion','$this->imei')";
	
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from viabilidad_celular";
		return parent::ejecutar($sql);
	}	
	public function existe_id($id_viabilidad,$id_hoja)
	{
		$sql="SELECT * from viabilidad_celular where id='$id_viabilidad' and id_hoja_verificacion='$id_hoja' limit 1";
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
		$sql="SELECT * from viabilidad_celular WHERE id_hoja_verificacion='$id_hoja'";
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