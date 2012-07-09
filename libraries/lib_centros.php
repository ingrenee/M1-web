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
class Lib_centros
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
	
function agregar($data=array())
	{
		$data['usuarios_ID']=$this->id;
		$data['creado']=ahora();
		$this->ci->db->insert('cv_centros',$data);
		return $this->ci->db->insert_id();
		}
	function agregar_si_no_existe($nombre)
	{
		
		$tmp=$this->obtener_segun('nombres',$nombre);
		
		if($tmp->num_rows()>0):
		
		 $x=$tmp->result_array();

		 return $x[0]['ID'];

		else:
		
		return $this->agregar(array('nombres'=>$nombre));	
		
		endif;
		
	
		}
	
	
	function obtener_uno($id)
	{
		return $this->ci->db->where('usuarios_ID',$this->id)->where('ID',$id)->get('cv_centros')->row_array();

		}
		
		function obtener_segun($clave,$valor)
	{
		return $this->ci->db->where($clave,$valor)->get('cv_centros');

		}	
		
		
		function obtener_todos()
	{
		
				return $this->ci->db->where('usuarios_ID',$this->id)->order_by('fecha_a','desc')->get('cv_formacion');
		

		}	
	
}
