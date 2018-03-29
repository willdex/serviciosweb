<?php
include_once('clsConexion.php');
class Tecnico extends Conexion
{
	//atributos
	private $id;
	private $nombre;
	private $codigo;

	
	//construtor
	public function Tecnico()
	{   parent::Conexion();
		$this->id=0;
		$this->nombre="";	
		$this->codigo="";
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
	public function getCodigo()
	{
		return $this->codigo;
	}
	
	
	public function guardar()
	{
     $sql="insert into tecnico(nombre,codigo) values('$this->nombre','$this->codigo')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	
	
	public function buscar()
	{
		$sql="select * from tecnico";
		return parent::ejecutar($sql);
	}	
	public function buscar_por_codigo($codigo)
	{
		$sql="select * from tecnico where codigo='$codigo' limit 1";
		return parent::ejecutar($sql);
	}											

	
}    
?>