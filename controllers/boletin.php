<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Boletin extends CI_Controller {





  function  __construct() {

        parent::__construct();        

    }

	

	

	function b01()

	{

		

		$id=$this->uri->segment(3);

		

		

			

			if(strlen($id)>5):
       $tmp=$this->db->limit(1)->select('email_contacto,acepta')->where('md5(email_contacto)',$id)->get('empleador');
		
	//	$data['content']=$this->load->view('empleo/index.tpl.php',$data,true);
	
	if($tmp->num_rows()>0):
$tmp=$tmp->row_array();


if((int)$tmp['acepta']==2):
$clave=rand(1000,9999);
$fecha=ahora();
$s='update empleador set acepta=3, pass="'.$clave.'",modificado="'.$fecha.'" where md5(email_contacto)="'.$id.'" ';
$this->db->query($s);
endif;

		$this->native_session->set_userdata('email_recuperacion',$tmp['email_contacto']);
		else:
		
		$this->native_session->set_userdata('email_recuperacion',false);
		
endif;




else:
$this->native_session->set_userdata('email_recuperacion',false);
endif;
		//$this->output->cache(30);

		
//exit();
		//http://hayempleo.com/registro/recuperar
		
		redirect('registro/recuperar');

		}



}