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
class Lib_correo
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
		
	
	}
	

	
	
	
function enviar($p=array('encargado'=>'renee morales','ID'=>9999),$template='',$data=array('asunto'=>'Test','destino'=>'ing.renee.sis@gmail.com'))
{

$this->ci->email->from('administrador@hayempleo.com', 'hayEmpleo.com');
$this->ci->email->to($data['destino']);

$this->ci->email->bcc('renee17_@hotmail.com');

$this->ci->email->subject($data['asunto']);
$m=$this->open($template,$p);




$this->ci->email->message($m);

$this->ci->email->send();



	}

function open($tpl='./templates/registro.html',$p=array())
{
	$tmp=file_get_contents($tpl);


	$tmp=str_replace('images/','http://www.hayempleo.com/templates/images/',$tmp);


		foreach($p as $k  => $v):
		$tmp=str_replace($k,$v,$tmp);
		endforeach;




	 return $tmp;

	}


	
}
