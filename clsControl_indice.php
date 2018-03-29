<?php
include_once('clsConexion.php');
class Control_indice extends Conexion
{
	private $id;
	private $id_hoja_verificacion;
	private $id_vacunador;
	private $nro_heridos;
	private $nro_mala_posicion;
	private $nro_mojados;
	private $nro_pollos_controlados;
	private $nro_pollos_no_vacunados;
	private $nro_pollos_vacunado;
	private $nro_pollos_vacunados_correctamente;
	private $puntaje;
	private $imei;
    private $indice_eficiencia;

	public function Control_indice ()
	{
		parent::Conexion();
		$this->id=0;
		$this->id_hoja_verificacion="";
		$this->id_vacunador="";
		$this->nro_heridos="";
		$this->nro_mala_posicion="";
		$this->nro_mojados="";
		$this->nro_pollos_controlados="";
		$this->nro_pollos_no_vacunados="";
		$this->nro_pollos_vacunado="";
		$this->nro_pollos_vacunados_correctamente="";
		$this->puntaje=0;
		$this->imei="";
        $this->indice_eficiencia="";
	}
		
	public function preparar($id,$id_hoja_verificacion,$id_vacunador,$nro_heridos,$nro_mala_posicion,$nro_mojados,$nro_pollos_controlados,$nro_pollos_no_vacunados,$nro_pollos_vacunado,$nro_pollos_vacunados_correctamente,$puntaje,$imei,$indice_eficiencia)
	{
		$this->id=$id;
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->id_vacunador=$id_vacunador;
		$this->nro_heridos=$nro_heridos;
		$this->nro_mala_posicion=$nro_mala_posicion;
		$this->nro_mojados=$nro_mojados;
		$this->nro_pollos_controlados=$nro_pollos_controlados;
		$this->nro_pollos_no_vacunados=$nro_pollos_no_vacunados;
		$this->nro_pollos_vacunado=$nro_pollos_vacunado;
		$this->nro_pollos_vacunados_correctamente=$nro_pollos_vacunados_correctamente;
		$this->puntaje=$puntaje;
		$this->imei=$imei;
        $this->indice_eficiencia=$indice_eficiencia;

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
	public function getnro_heridos()
	{
		return $this->nro_heridos;
	}
	public function getnromala_posicion()
	{
		return $this->nro_mala_posicion;
	}
	public function getnro_mojados()
	{
		return $this->nro_mojados;
	}
	public function getnro_pollos_controlados()
	{
		return $this->nro_pollos_controlados;
	}
	public function getnro_pollos_no_vacunados()
	{
		return $this->nro_pollos_no_vacunados;
	}
	public function getnro_pollos_vacunados()
	{
		return $this->nro_pollos_vacunado;
	}
	public function getnro_pollos_vacunados_correctamente()
	{
		return $this->nro_pollos_vacunados_correctamente;
	}
	public function getnro_puntaje()
	{
		return $this->puntaje;
	}
	public function getimei()
	{
		return $this->imei;
	}
    public function getindice_eficiencia()
	{
		return $this->indice_eficiencia;
	}
	public function guardar()
	{
    
		$sql="INSERT into control_indice(id,id_hoja_verificacion,id_vacunador,nro_heridos,nro_mala_posicion,nro_mojados,nro_pollos_controlados,nro_pollos_no_vacunados,nro_pollos_vacunado,nro_pollos_vacunados_correctamente,puntaje,imei,indice_eficiencia)values('$this->id','$this->id_hoja_verificacion','$this->id_vacunador','$this->nro_heridos','$this->nro_mala_posicion','$this->nro_mojados','$this->nro_pollos_controlados','$this->nro_pollos_no_vacunados','$this->nro_pollos_vacunado','$this->nro_pollos_vacunados_correctamente','$this->puntaje','$this->imei','$this->indice_eficiencia')";
 
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from control_indice";
		return parent::ejecutar($sql);
	}	
	public function get_formulario_por_id_hoja($id_hoja)
	{
		$sql="SELECT c.*,v.nombre as'vacunador' from control_indice c,vacunador v WHERE c.id_vacunador=v.id and  c.id_hoja_verificacion='$id_hoja' order by c.id asc";
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


class Sum_pro_control_indice extends Conexion
{
	private $id_hoja_verificacion;
	private $suma1;
	private $suma2;
	private $suma3;
	private $suma4;
	private $suma5;
	private $suma6;
	private $suma7;
	private $suma8;
	private $suma9;
	private $pro1;
	private $pro2;
	private $pro3;
	private $pro4;
	private $pro5;
	private $pro6;
	private $pro7;
	private $pro8;
	private $pro9;

	private $imei; 

	public function Sum_pro_control_indice ()
	{
		parent::Conexion();
		$this->id_hoja_verificacion="";
		$this->suma1="0";
		$this->suma2="0";
		$this->suma3="0";
		$this->suma4="0";
		$this->suma5="0";
		$this->suma6="0";
		$this->suma7="0";
		$this->suma8="0";
		$this->suma9="0";
		$this->pro1="0";
		$this->pro2="0";
		$this->pro3="0";
		$this->pro4="0";
		$this->pro5="0";
		$this->pro6="0";
		$this->pro7="0";
		$this->pro8="0";
		$this->pro9="0";
		
		$this->imei="";
	}
		
	public function preparar(
		$suma1,
		$suma2,
		$suma3,
		$suma4,
		$suma5,
		$suma6,
		$suma7,
		$suma8,
		$suma9,
		$pro1,
		$pro2,
		$pro3,
		$pro4,
		$pro5,
		$pro6,
		$pro7,
		$pro8,
		$pro9,
		$id_hoja_verificacion,
		$imei)
	{
		
		$this->suma1=$suma1;
		$this->suma2=$suma2;
		$this->suma3=$suma3;
		$this->suma4=$suma4;
		$this->suma5=$suma5;
		$this->suma6=$suma6;
		$this->suma7=$suma7;
		$this->suma8=$suma8;
		$this->suma9=$suma9;
		$this->pro1=$pro1;
		$this->pro2=$pro2;
		$this->pro3=$pro3;
		$this->pro4=$pro4;
		$this->pro5=$pro5;
		$this->pro6=$pro6;
		$this->pro7=$pro7;
		$this->pro8=$pro8;
		$this->pro9=$pro9;
		
 
		$this->id_hoja_verificacion=$id_hoja_verificacion;
		$this->imei=$imei; 

	}
	 
	public function getid_hoja_verificacion()
	{
		return $this->id_hoja_verificacion;
	}


	public function getimei()
	{
		return $this->imei;
	} 

	public function guardar()
	{
    
		$sql="insert into sum_pro_control_indice(
			suma1,
			suma2,
			suma3,
			suma4,
			suma5,
			suma6,
			suma7,
			suma8,
			suma9,
			pro1,
			pro2,
			pro3,
			pro4,
			pro5,
			pro6,
			pro7,
			pro8,
			pro9,
			id_hoja_verificacion,
			imei
			)values( 
				'$this->id_hoja_verificacion',
				'$this->suma1',
				'$this->suma2',
				'$this->suma3',
				'$this->suma4',
				'$this->suma5',
				'$this->suma6',
				'$this->suma7',
				'$this->suma8',
				'$this->suma9',
				'$this->pro1',
				'$this->pro1',
				'$this->pro2',
				'$this->pro3',
				'$this->pro4',
				'$this->pro5',
				'$this->pro6',
				'$this->pro7',
				'$this->pro8',
				'$this->pro9',
				'$this->imei'
			)";
 

		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}
	public function buscar()
	{
		$sql="select * from sum_pro_control_indice";
		return parent::ejecutar($sql);
	}	
	public function get_formulario_por_id_hoja($id_hoja)
	{
		$sql="SELECT c.*,v.nombre as'vacunador' from control_indice c,vacunador v WHERE c.id_vacunador=v.id and  c.id_hoja_verificacion='$id_hoja' order by c.id asc";
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
