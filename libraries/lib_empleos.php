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
class Lib_empleos
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
	
	
	public function obtener_todos($w1=array(),$segment=4,$site='templates/listar/',$esc=true,$items=30,$pag=false)
{
	
	
	
	
$config['uri_segment'] = $segment;
$config['per_page']   = $items;
$config['num_links']   = 50;
$config['base_url'] = site_url($site);
$this->ci->db->where($w1,NULL,$esc);
$config['total_rows'] = $this->ci->db->get('entradas')->num_rows();


$this->ci->pagination->initialize($config);
$paginacion=$this->ci->pagination->create_links();
//$this->ci->db->;
$this->ci->db->where($w1,NULL,$esc);

if(!$pag):
$pag=$this->ci->uri->segment($segment);
endif;

$root= $this->ci->db->order_by('creado','desc')->get('entradas',$config['per_page'],$pag);
	
	return array($root,$paginacion);
}
	

	
}
