<?php
include_once('clsConexion.php');
class Granja extends Conexion
{
	//atributos
	private $id;
	private $id_empresa;
	private $zona;
	
	//construtor
	public function Granja()
	{   parent::Conexion();
		$this->id=0;
		$this->id_empresa=0;
		$this->zona=0;
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

	public function setZona($valor)
	{
		$this->zona=$valor;
	}
	public function getZona()
	{
		return $this->zona;
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
		$sql="select * from granja";
		return parent::ejecutar($sql);
	}										

	
}    
?>