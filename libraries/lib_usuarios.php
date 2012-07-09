<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
 
/**
* Redux Authentication 2
*/
class Lib_usuarios
{
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;
	protected $id;
	/**
	 * account status ('not_activated', etc ...)
	 *
	 * @var string
	 **/
	protected $status;

	/**
	 * __construct
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function __construct()
	{
		$this->ci =& get_instance();

$info=$this->ci->native_session->userdata('login_data_candidatos');
		$this->id=$info['ID'];
	}
	
	function  cv_general($id=false)
	{
			if(!$id):
			$w=array('usuarios_ID'=>$this->id);
			else:

			$w=array('usuarios_ID'=>$id);
			endif;
		 return $this->ci->db->get_where('cv_general',$w)->row_array();
	}
	
	function cv_formacion($id=false)
	{
		
					if(!$id):
			$this->ci->db->where('usuarios_ID',$this->id);
			else:
			$this->ci->db->where('usuarios_ID',$id);
			endif;
		
		
return $this->ci->db->get('cv_formacion');
		}
		
	function cv_experiencia($id=false)
	{
		
			if(!$id):
			$this->ci->db->where('usuarios_ID',$this->id);
			else:
			$this->ci->db->where('usuarios_ID',$id);
			endif;
return $this->ci->db->get('cv_experiencia');
		}		

	
	
	function cv_general_estado()
	{
		$tmp=$this->cv_general();
		$i=0;
		(isset($tmp['nombres']))?$i++:0;
		(isset($tmp['dni']))?$i++:0;
		(isset($tmp['departamento']))?$i++:0;
		(isset($tmp['distrito']))?$i++:0;
		(isset($tmp['pais']))?$i++:0;		
		(isset($tmp['departamento2']))?$i++:0;
		(isset($tmp['distrito2']))?$i++:0;
		(isset($tmp['pais2']))?$i++:0;								
		(isset($tmp['direccion']))?$i++:0;
		(isset($tmp['celular']))?$i++:0;

		return $i;		
		}

	function  cv_formacion_estado()
	{
		$info=$this->ci->native_session->userdata('login_data_candidatos');
		 return $this->ci->db->where('usuarios_ID',$info['ID'])->get('cv_formacion')->num_rows();
		}
		
		function  cv_experiencia_estado()
	{
		$info=$this->ci->native_session->userdata('login_data_candidatos');
		 return $this->ci->db->where('usuarios_ID',$info['ID'])->get('cv_experiencia')->num_rows();
		}
		
		
		function actualizar($arr)
		{
			$info=$this->ci->native_session->userdata('login_data_candidatos');
		$this->id=$info['ID'];
			$this->ci->db->where('ID',$this->id);
			$this->ci->db->limit(1)->update('usuarios',$arr);
			}
			
			
		function actualizar_off($w,$arr)
		{
			

			$this->ci->db->where($w);
			$this->ci->db->limit(1)->update('usuarios',$arr);
			}	
		function obtener_campo($k)
		{
			$this->ci->db->where('ID',$this->id);
			$t=$this->ci->db->limit(1)->select($k)->get('usuarios')->row_array();
			return $t[$k];
			}
			
			
	function obtener_info($id=false)
	{
					if(!$id):
			$this->ci->db->where('ID',$this->id);
			else:
			$this->ci->db->where('ID',$id);
			endif;
		
return $this->ci->db->limit(1)->get('usuarios')->row_array();
		}		
	
}
