<?php
include_once('clsConexion.php');
class Unidad extends Conexion
{
	//atributos
	private $id;
	private $id_empresa;
	private $nombre;
	
	//construtor
	public function Unidad()
	{   parent::Conexion();
		$this->id=0;
		$this->id_empresa=0;
		$this->nombre=0;
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


	
	
	public function guardar()
	{
     $sql="insert into unidad(nombre,edad) values('$this->nombre','$this->edad')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	
	
	public function buscar()
	{
		$sql="select * from unidad";
		return parent::ejecutar($sql);
	}										

	
}    
?>