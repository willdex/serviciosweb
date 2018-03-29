<?php
include_once('clsConexion.php');
class Puntuacion extends Conexion
{
	private $id;	
	private $id_sistema;
	private $id_sqlite;
	private $nombre;
	private $imei;

	public function puntuacion()
	{
		parent::Conexion();
		$this->id=0;		
		$this->id_sistema="";
		$this->id_sqlite="";
		$this->nombre="";
		$this->imei="";
		
		}
	public function preparar($id,$nombre,$id_sistema,$imei,$id_sqlite)
	{
		$this->id=$id;
		$this->id_sistema=$id_sistema;	
		$this->id_sqlite=$id_sqlite;	
		$this->nombre=$nombre;	
		$this->imei=$imei;	

	}
	public function get_id()
	{
		return $this->id;
	}
	
	public function get_id_sistema()
	{
		return $this->id_sistema;
	}
	public function get_nombre()
	{
		return $this->nombre;
	}
	
	public function guardar()
	{
		$sql="INSERT into puntuacion(id,id_sistema,nombre,imei,id_sqlite)values('$this->id','$this->id_sistema','$this->nombre','$this->imei','$this->id_sqlite')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from puntuacion";
		return parent::ejecutar($sql);
	}	
	public function existe_id($id_puntuacion,$id_sistema,$imei)
	{
		$sql="SELECT * from puntuacion where id='$id_puntuacion' and id_sqlite='$id_sistema'  and imei='$imei'limit 1";

		 

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
	public function get_formulario_puntuacion_por_id_sim($id_sqlite)
	{
		$sql="SELECT * from puntuacion where id_sistema='$id_sqlite' order by id asc";
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