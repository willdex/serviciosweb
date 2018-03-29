<?php
include_once('clsConexion.php');
class Empresa extends Conexion
{
	//atributos
	private $id;
	private $nombre;
	
	//construtor
	public function Empresa()
	{   parent::Conexion();
		$this->id=0;
		$this->nombre="";	
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

	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	public function getNombre()
	{
		return $this->nombre;
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
		$sql="select * from empresa";	
			return parent::ejecutar($sql);

	}
										

	
}    
?>