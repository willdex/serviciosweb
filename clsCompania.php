<?php
include_once('clsConexion.php');
class Compania extends Conexion
{
	//atributos
	private $id;
	private $nombre;
	
	//construtor
	public function Compania()
	{   parent::Conexion();
		$this->id=0;
		$this->nombre="";	
	}
	public function Compania2($nombre)
	{   parent::Conexion();
		$this->id=0;
		$this->nombre=$nombre;	
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
     $sql="insert into compania(nombre) values('$this->nombre')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	
	
	public function buscar()
	{
		$sql="select * from compania";
		return parent::ejecutar($sql);
	}										

	
}    
?>