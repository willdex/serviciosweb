<?php

include_once('clsConexion.php');
class Indice_eficiencia extends Conexion
{
	private $id;
	private $puntaje;
	private $minimo;
	private $maximo;

	public function Indice_eficiencia()
	{  


		
		parent::Conexion();
		$this->id=0;
		$this->puntuje="";
		$this->minimo="";
		$this->maximo="";
		
	}
	 
 
	public function buscar()
	{
		$sql="select * from indice_eficiencia";
		return parent::ejecutar($sql);
	}	

		 
}

?>