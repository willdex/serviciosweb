<?php
include_once('clsConexion.php');
class Galpon extends Conexion
{
	//atributos
	private $id;
	private $id_empresa;
	private $id_granja;
	private $cantidad_pollo;
	
	//construtor
	public function Galpon()
	{   parent::Conexion();
		$this->id=0;
		$this->id_empresa=0;
		$this->id_gramja=0;
		$this->cantidad_pollo=0;	
	}
	//propiedades de acceso
	public function setId($valor)
	{
		$this->id=$valor;
	}
	public function getId()
	{
		return $this->id;
	}

	public function setCantidad_pollo($valor)
	{
		$this->cantidad_pollo=$valor;
	}
	public function getCantidad_pollo()
	{
		return $this->cantidad_pollo;
	}

	
	
	public function guardar()
	{
     $sql="insert into empresa(nombre,edad) values('$this->nombre','$this->edad')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	
	
	public function buscar()
	{
		$sql="select * from galpon";
		return parent::ejecutar($sql);
	}										

	
}    
?>