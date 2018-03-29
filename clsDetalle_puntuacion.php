<?php
include_once('clsConexion.php');
class Detalle_puntuacion extends Conexion
{
	private $estado;
	private $id;	
	private $id_puntuacion;
	private $id_sistema;
	private $nombre;

	public function Detalle_puntuacion()
	{
		parent::Conexion();
		$this->estado="";
		$this->id=0;		
		$this->id_puntuacion="";
		$this->id_sistema=0;
		$this->id_sqlite_puntuacion=0;
		$this->id_sqlite_sistema=0;
		$this->nombre="";
		
		}
	public function preparar($id,$nombre,$estado,$id_puntuacion,$id_sistema,$imei,$id_sqlite_puntuacion,$id_sqlite_sistema)
	{
		$this->nombre=$nombre;	
		$this->estado=$estado;
		$this->id=$id;
		$this->id_puntuacion=$id_puntuacion;	
		$this->id_sistema=$id_sistema;			
		$this->id_sqlite_puntuacion=$id_sqlite_puntuacion;			
		$this->id_sqlite_sistema=$id_sqlite_sistema;			
		$this->imei=$imei;	
	}
	public function get_estado()
	{
		return $this->estado;
	}
	public function get_id()
	{
		return $this->id;
	}
	
	public function get_id_puntuacion()
	{
		return $this->id_puntuacion;
	}
	public function get_nombre()
	{
		return $this->nombre;
	}
	
	public function guardar()
	{
		$sql="INSERT into detalle_puntuacion(id,nombre,estado,id_puntuacion,id_sistema,imei,id_sqlite_puntuacion,id_sqlite_sistema)values('$this->id','$this->nombre','$this->estado','$this->id_puntuacion','$this->id_sistema','$this->imei','$this->id_sqlite_puntuacion','$this->id_sqlite_sistema')";
	
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="SELECT * from detalle_puntuacion";
		return parent::ejecutar($sql);
	}

	public function existe_id($id,$id_puntuacion,$id_sqlite,$imei)
	{
		$sql="SELECT * from detalle_puntuacion where id='$id' and id_puntuacion='$id_puntuacion' and id_sqlite_sistema='$id_sqlite' and imei='$imei' limit 1";
		 
		
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

			public function get_id_puntuacion_por_sqlite($id_sqlite_puntuacion,$imei)
	{
		$sql="SELECT id from puntuacion where id_sqlite='$id_sqlite_puntuacion'  and imei='$imei' limit 1";

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

	public function get_formulario_detalle_puntuacion_por_id_sim_y_puntuacion($id_sistema,$id_puntuacion)
	{
		$sql="SELECT * from detalle_puntuacion where id_sistema='$id_sistema' and id_puntuacion='$id_puntuacion' order by id asc";
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