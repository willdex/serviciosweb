<?php

include_once('clsConexion.php');
class Centros extends Conexion
{
	private $id;
	private $nombre;
	private $direccion;
	private $latitud;
	private $longitud;
	private $tipo;

	public function Centros()
	{  


		
		parent::Conexion();
		$this->id=0;
		$this->nombre="";
		$this->direccion="";
		$this->tipo="";
		$this->latitud=0;
		$this->longitud=0;
		
	}
	public function preparar($id,$nombre,$direccion,$tipo,$latitud,$longitud)
	{
		parent::Conexion();
		$this->id=$id;
		$this->direccion=$direccion;
		$this->nombre=$nombre;
		$this->tipo=$tipo;
		$this->latitud=$latitud;
		$this->longitud=$longitud;
	}
	

	public function guardar()
	{
		$sql="INSERT into centros(id,nombre,direccion,tipo,latitud,longitud)values('$this->id','$this->nombre','$this->direccion','$this->tipo','$this->latitud','$this->longitud')";

		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from centros";
		return parent::ejecutar($sql);
	}	

	

}

?>