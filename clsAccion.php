<?php

include_once('clsConexion.php');
class Accion extends Conexion
{
	private $id;
	private $id_hoja_verificacion;
	private $nombre;
	private $imei;

	public function Accion()
	{  


		
		parent::Conexion();
		$this->id=0;
		$this->id_hoja_verificacion="";
		$this->nombre="";
		$this->imei="";
		
	}
	public function preparar($id,$id_hoja_verificacion,$nombre,$imei)
	{
		parent::Conexion();
		$this->id=$id;
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->nombre=$nombre;
		$this->imei=$imei;
	}
	public function getid()
	{
		return $this->id;
	}
	public function getid_hoja_verificacion()
	{
		return $this->id_hoja_verificacion;
	}
	public function getnombre()
	{
		return $this->nombre;
	}

	public function getimei()
	{
		return $this->imei;
	}

	public function guardar()
	{
		$sql="insert into accion(id,id_hoja_verificacion,nombre,imei)values('$this->id','$this->id_hoja_verificacion','$this->nombre','$this->imei')";

		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from accion";
		return parent::ejecutar($sql);
	}	

		public function existe_id($id_sqlite,$id_hoja_verificacion,$imei)
	{
		$sql="SELECT * from accion where id='$id_sqlite' and id_hoja_verificacion='$id_hoja_verificacion' and imei='$imei'";
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
	public function get_id_por_sqlite($id_sqlite,$imei)
	{
		$sql="SELECT id from accion where id_sqlite='$id_sqlite' and imei='$imei' limit 1";
		$consulta=parent::ejecutar($sql);
		
		if(mysqli_num_rows($consulta) != 0)
		{
			return mysqli_fetch_assoc($consulta)['id'];
		}
		else
		{
			return "-1";
		}
	}
	public function get_formulario_por_id_hoja($id_hoja)
	{
		$sql="SELECT * from accion WHERE id_hoja_verificacion='$id_hoja' order by id asc";
		$consulta=parent::ejecutar($sql);
				
		if(mysqli_num_rows($consulta)!= 0 )
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