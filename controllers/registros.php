<?php

/*

 * ----------------------------------------------------------------------------

 * "THE BEER-WARE LICENSE" :

 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you

 * can do whatever you want with this stuff. If we meet some day, and you think

 * this stuff is worth it, you can buy me a beer in return Mathew Davies

 * ----------------------------------------------------------------------------

 */

class Registros extends CI_Controller {



	/**

	 * index

	 *

	 * @return void

	 * @author Mathew

	 **/





	 function email($str)

	 {

		 $this->form_validation->set_message('email', 'El email ya esta en uso.');

		 return !(bool)$this->db->where('email',$str)->get('usuarios')->num_rows();



		 }



	 function email_2($str)

	 {





		 

		 $t=$this->db->select('email,ID,estado')->where('email',$str)->limit(1)->get('usuarios');

		 

		 if($t->num_rows()):

				$h=$t->row_array();

				//print_r($h);

				if($h['estado']=='activado'):

				

				return true;

				elseif($h['estado']=='pendiente'):

				$this->form_validation->set_message('email_2', 'Aún no  activas tu registro.');

				 return false;

				else:

				

				$this->form_validation->set_message('email_2"', 'Tu cuenta parece estar bloqueada.');

				return false;

				

				endif;

					 

		 else:

 		 $this->form_validation->set_message('email_2', 'El email no existe.');

		 return false;

		 endif;

		// exit();



		 }

/*-----------------------------------------------------------------------*/
 function email_3($str)

	 {



		 $t=$this->db->select('email,ID,estado')->where('email',$str)->limit(1)->get('usuarios');

		 

		 if($t->num_rows()):

				$h=$t->row_array();

				//print_r($h);

				if($h['estado']=='activado' ):
$this->form_validation->set_message('email_3', 'Tu cuenta ya esta activada.');
				return false;
				elseif($h['estado']=='pendiente'):
				return true;

				else:

				

				$this->form_validation->set_message('email_3', 'Tu cuenta parece estar bloqueada.');

				return false;

				

				endif;

					 

		 else:

 		 $this->form_validation->set_message('email_3', 'El email no existe.');

		 return false;

		 endif;

		// exit();



		 }



/*-----------------------------------------------------------------------*/
		 function exito()

		 {

			 //$email=$this->uri->segment(3);

			 $data=array();

			 $data['email']=$this->native_session->flashdata('email_info');

			$this->native_session->set_flashdata('email_info',$data['email']);

$data['content']=$this->load->view('registros/exito',$data,true);

$this->load->view('template2_candidatos',$data);



			 }


function verificafecha($str)
{
	$tmp=explode('/',$str);
	//$t=checkdate(@(int)$tmp[1],@(int)$tmp[2],@(int)$tmp[0]);
	//var_dump($t);
//	exit();
	if(checkdate(@(int)$tmp[1],@(int)$tmp[0],@(int)$tmp[2])):
	return true;
	else:
	$this->form_validation->set_message('verificafecha', 'Ingrese una fecha valida. (dd/mm/aaaa)');
	return false;
	
	endif;
	}
function candidato()

{

$data=array();
$this->load->library('form_validation');
/*--------------------------------*/
$this->form_validation->set_rules('ocupacion', 'ocupacion', 'trim|required');
$this->form_validation->set_rules('ocupacion_ID', 'Ocupacion', 'trim|required');
$this->form_validation->set_message('ocupacion_ID', 'Seleccione correctamente una carrera u Oficio.');
/*-------------------------------*/
$this->form_validation->set_rules('nombres', 'nombres', 'trim|required');
$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email');
$this->form_validation->set_rules('pass', 'password', 'trim|required|matches[re]');
$this->form_validation->set_rules('re', 'Repetir password', 'trim|required');
$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'trim|required|callback_verificafecha');
$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
if ($this->form_validation->run() == true):
$_POST['creado']=ahora();
unset($_POST['re']);
$tmp=explode('/',$_POST['fecha_nacimiento']);
$_POST['fecha_nacimiento']=@$tmp[2].'-'.@$tmp[1].'-'.@$tmp[0];


$_POST['empresa_ruc']=$this->uri->segment(3);

$this->db->insert('usuarios',$_POST);
$_POST['ID']=$this->db->insert_id();
/*-----------*/
$s='update profesiones set peso=peso+1 where ID="'.$_POST['ocupacion_ID'].'" ';
$this->db->query($s);
/*----*/
$this->email_registro($_POST['email'],$_POST);
$this->native_session->set_flashdata('email_info',$_POST['email']);
redirect('registros/exito');

else:

$data['content']=$this->load->view('registros/candidato',$data,true);
$this->load->view('template2_candidatos',$data);
//exit();
endif;



	}


/*--------------------------------------------------------------------------------*/

	
function reenvio_activacion()
{
	$data=array();
$email=$this->native_session->userdata('email_reenvio');

$data['email']=$email;

$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_3');


$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if ($this->form_validation->run() == true):
		
		$p=$this->db->where('email',$_POST['email'])->get('usuarios')->row_array();
		
		
		$this->email_registro($_POST['email'],$p,'Reenvio de confirmacion de registro: Candidatos');
		$this->native_session->set_flashdata('email_info',$_POST['email']);
		redirect('registros/exito');
		else:
		$data['content']=$this->load->view('registros/reenviar_activacion',$data,true);

$this->load->view('template2_candidatos',$data);
		
		endif;
	
	}
	


/*-------------------------------------------------------------------------------*/

function email_registro($t='ing.renee.sis@gmail.com',$p=array('encargado'=>'renee morales','ID'=>9999),$asunto="Confirmacion de registro: Candidatos")

{


$this->load->library('email');
$this->email->from('administrador@hayempleo.com', 'HayEmpleo.com');

$this->email->to($t);



$this->email->bcc('ing.renee.sis@gmail.com');



$this->email->subject($asunto);

$m=$this->open($p);

$this->email->message($m);



$this->email->send();







	}



function open($t,$tpl='./templates/registro_candidato.html')

{

	$tmp=file_get_contents($tpl);



	$tmp=str_replace('images/','http://hayempleo.com/templates/images/',$tmp);





	$tmp=str_replace('{contacto}',$t['nombres'].' '.$t['apellidos'],$tmp);

	$tmp=str_replace('{id}',md5($t['ID']),$tmp);

	$tmp=str_replace('{numero}',($t['ID']),$tmp);





	 return $tmp;



	}



function open2($t,$tpl='./templates/recuperar_candidato.html')

{

	$tmp=file_get_contents($tpl);



	$tmp=str_replace('images/','http://hayempleo.com/templates/images/',$tmp);





	$tmp=str_replace('{clave}',$t['pass'],$tmp);







	 return $tmp;



	}





function activar()

{$id=$this->uri->segment(3);



	$t=$this->db->where('md5(ID)',$id)->get('usuarios')->num_rows();



	if($t>0):

	$this->db->where('md5(ID)',$id);

	$h=$this->db->limit(1)->update('usuarios',array('estado'=>'activado'));



	$data['content']=$this->load->view('registros/activar',NULL,true);

	else:

	$data['content']=$this->load->view('registros/activar_error',NULL,true);

	endif;

		$this->load->view('template2_candidatos',$data);

	}



	function recuperar()

	{



$this->load->library('form_validation');



	$data=array();



	$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_email_2');











		$this->form_validation->set_error_delimiters('<span class="error_2">', '</span>');





		if ($this->form_validation->run() == false):

			$data['content']=$this->load->view('registros/recuperar',$data,true);

		$this->load->view('template2_candidatos',$data);

		else:

$email_contacto=$this->input->post('email');

$tmp=$this->db->limit(1)->select('ID,pass')->where('email',$email_contacto)->get('usuarios')->row_array();

$datos['pass']=$tmp['pass'];//rand(1000,9999);

$w['email']=$email_contacto;

$this->lib_usuarios->actualizar_off($w,$datos);







$this->email->from('administrador@hayempleo.com', 'hayEmpleo.com');

$this->email->to($email_contacto);

$this->email->bcc('renee17_@hotmail.com');

$this->email->subject('Candidatos: Nueva clave de acceso.');

$m=$this->open2($datos);

$this->email->message($m);

$this->email->send();







redirect('registros/recuperar_mensaje');



endif;

	

		}





function recuperar_mensaje()

{		$data=array();

		$data['content']=$this->load->view('registros/recuperar_ok',$data,true);	

		$this->load->view('template2_candidatos',$data);		

	}

}