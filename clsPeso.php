<?php
include_once('clsConexion.php');
class Peso extends Conexion
{
	private $bursometro;
	private $id;
	private $id_sistema;
	private $indice_bursal;
	private $indice_hepatico;
	private $indice_timico;
	private $peso_bursa;
	private $peso_brazo;
	private $peso_corporal;
	private $peso_higado;
	private $peso_timo;
	private $imei;

	public function Peso()
	{
		parent::Conexion();
		$this->bursometro="";
		$this->id=0;
		$this->id_sistema="";
		$this->indice_bursal="";
		$this->indice_hepatico="";
		$this->indice_timico="";
		$this->pedo_bursa="";
		$this->peso_brazo="";
		$this->peso_corporal="";
		$this->peso_higado="";
		$this->peso_timo="";
		$this->imei="";
		
		}
		
	public function preparar($bursometro,$id,$id_sistema,$indice_bursal,$indice_hepatico,$indice_timico,$peso_bursa,$peso_brazo,$peso_corporal,$peso_higado,$peso_timo,$imei)
	{
		$this->bursometro=$bursometro;
		$this->id=$id;
		$this->id_sistema=$id_sistema;
		$this->indice_bursal=$indice_bursal;	
		$this->indice_hepatico=$indice_hepatico;
		$this->indice_timico=$indice_timico;	
		$this->peso_bursa=$peso_bursa;
		$this->peso_brazo=$peso_brazo;
		$this->peso_corporal=$peso_corporal;
		$this->peso_higado=$peso_higado;
		$this->peso_timo=$peso_timo;
		$this->imei=$imei;
	}
	public function get_bursometro()
	{
		return $this->bursometro;
	}
	public function get_id()
	{
		return $this->id;
	}
	public function get_id_sistema()
	{
		return $this->id_sistema;
	}
	public function get_indice_bursal()
	{
		return $this->indice_bursal;
	}

	public function get_indice_hepatico()
	{
		return $this->indice_hepatico;
	}
	public function get_indice_timico()
	{
		return $this->indice_timico;
	}
	public function get_peso_bursa()
	{
		return $this->pedo_bursa;
	}
	public function get_peso_brazo()
	{
		return $this->peso_brazo;
	}
	public function get_peso_corporal()
	{
		return $this->peso_corporal;
	}
	public function get_peso_higado()
	{
		return $this->peso_higado;
	}
	public function get_peso_timo()
	{
		return $this->peso_timo;
	}
	
	public function guardar()
	{
		$sql="INSERT into peso(bursometro,id,id_sistema,indice_bursal,indice_hepatico,indice_timico,peso_bursa,peso_brazo,peso_corporal,peso_higado,peso_timo,imei)values('$this->bursometro','$this->id','$this->id_sistema','$this->indice_bursal','$this->indice_hepatico','$this->indice_timico','$this->peso_bursa','$this->peso_brazo','$this->peso_corporal','$this->peso_higado','$this->peso_timo','$this->imei')";

		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="SELECT * from peso";
		return parent::ejecutar($sql);
	}	
	public function existe_id($id,$id_sistema,$imei)
	{
		$sql="SELECT * from peso where id='$id'  and id_sistema='$id_sistema' and imei='$imei' limit 1";

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
	public function get_formulario_peso_por_id_sim($id_sistema)
	{
		$sql="SELECT * from peso where id_sistema='$id_sistema' order by id asc";
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