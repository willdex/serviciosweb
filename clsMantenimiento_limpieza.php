<?php
include_once('clsConexion.php');
class Mantenimiento_Limpieza extends Conexion
{
	private $id;
	private $id_hoja_verificacion;
	private $id_vacunador;
	private $nro_maquina;
	private $irregularidad1;
	private $irregularidad2;
	private $irregularidad3;
	private $irregularidad4;
	private $irregularidad5;
	private $irregularidad6;
	private $irregularidad7;
	private $irregularidad8;
	private $irregularidad9;
	private $irregularidad10;
	private $irregularidad11;
	private $irregularidad12;
	private $irregularidad13;
	private $irregularidad14;
	private $irregularidad15;
	private $imei;

	public function Mantenimiento_Limpieza ()
	{
		parent::Conexion();
		$this->id=0;
		$this->id_hoja_verificacion="";
		$this->id_vacunador="";
		$this->nro_maquina="";
		$this->imei="";
	}
		
	public function preparar($id,$id_hoja_verificacion,$id_vacunador,$nro_maquina,$ire_1,$ire_2,$ire_3,$ire_4,$ire_5,$ire_6,$ire_7,$ire_8,$ire_9,$ire_10,$ire_11,$ire_12,$ire_13,$ire_14,$ire_15,$imei)
	{
		$this->id=$id;
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->id_vacunador=$id_vacunador;
		$this->nro_maquina=$nro_maquina;
		$this->irregularidad1=$ire_1;
		$this->irregularidad2=$ire_2;
		$this->irregularidad3=$ire_3;
		$this->irregularidad4=$ire_4;
		$this->irregularidad5=$ire_5;
		$this->irregularidad6=$ire_6;
		$this->irregularidad7=$ire_7;
		$this->irregularidad8=$ire_8;
		$this->irregularidad9=$ire_9;
		$this->irregularidad10=$ire_10;
		$this->irregularidad11=$ire_11;
		$this->irregularidad12=$ire_12;
		$this->irregularidad13=$ire_13;
		$this->irregularidad14=$ire_14;
		$this->irregularidad15=$ire_15;
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
	public function getid_vacunador()
	{
		return $this->id_vacunador;
	}
	
	
	public function guardar()
	{
		$sql="insert into mantenimiento_limpieza(id,id_hoja_verificacion,id_vacunador,nro_maquina,irregularidad1,irregularidad2,irregularidad3,irregularidad4,irregularidad5,irregularidad6,irregularidad7,irregularidad8,irregularidad9,irregularidad10,irregularidad11,irregularidad12,irregularidad13,irregularidad14,irregularidad15,imei)values('$this->id','$this->id_hoja_verificacion','$this->id_vacunador','$this->nro_maquina','$this->irregularidad1','$this->irregularidad2','$this->irregularidad3','$this->irregularidad4','$this->irregularidad5','$this->irregularidad6','$this->irregularidad7','$this->irregularidad8','$this->irregularidad9','$this->irregularidad10','$this->irregularidad11','$this->irregularidad12','$this->irregularidad13','$this->irregularidad14','$this->irregularidad15','$this->imei')";

		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from mantenimiento_limpieza";
		return parent::ejecutar($sql);
	}

	public function get_formulario_por_id_hoja($id_hoja)
	{
		$sql="SELECT v.nombre,m.* from mantenimiento_limpieza m,vacunador v where v.id=m.id_vacunador and m.id_hoja_verificacion='$id_hoja' GROUP BY m.id_hoja_verificacion,id_vacunador";
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