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
class Lib_experiencia
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
		$this->ci->db->insert('cv_experiencia',$data);
		return $this->ci->db->insert_id();
		}
	
	
	function obtener_uno($id)
	{
		return $this->ci->db->where('usuarios_ID',$this->id)->where('ID',$id)->get('cv_experiencia')->row_array();

		}
		
		
	function borrar($id)
	{
		return $this->ci->db->where('usuarios_ID',$this->id)->where('ID',$id)->limit(1)->delete('cv_experiencia');

		}
		
		
		
		function obtener_todos()
	{
		
				return $this->ci->db->where('usuarios_ID',$this->id)->order_by('fecha_a','desc')->get('cv_experiencia');
		

		}	
	
}
