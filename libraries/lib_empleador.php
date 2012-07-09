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
class Lib_empleador
{
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;

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

	}


	function  obtener_uno($id)
	{
		return $this->ci->db->where('ID',$id)->limit(1)->get('empleador')->row_array();
		}
		function  obtener_donde($campo,$id)
	{
		return $this->ci->db->where($campo,$id)->get('empleador');
		}

	function actualizar($w,$datos)
	{

		return $this->ci->db->update('empleador',$datos,$w);

	}
	function obtener($limit)
	{
		return $this->ci->db->limit($limit)->where('estado','activo')->order_by('ID','desc')->get('empleador');
		
		}
		function rubro($id)
		{
			$tmp=$this->ci->db->select('rubro')->limit(1)->where('ID',$id)->get('rubros')->row_array();
			 return $tmp['rubro'];
			}

}
