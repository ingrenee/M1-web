<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Login extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	  function email($str)
	 {

		 $t=$this->db->where('email',$str)->get('usuarios');
		 
		 if($t->num_rows()<=0):
		 $this->form_validation->set_message('email', 'El email no existe.');		 
		 return false;
		 else:
		 
		 $tmp=$t->row_array();
		 if($tmp['estado']=='pendiente'):
		 //$this->form_validation->set_message('email', 'Tu cuenta aun no ha sido activada. Revisa tu bandeja de entrada o carpeta de spam.');		 
		 $num_reenvios=$this->native_session->userdata('num_reenvios')+1;
		 if($num_reenvios<10):
		 $this->native_session->set_userdata('num_reenvios',$num_reenvios);
		 $this->native_session->set_userdata('email_reenvio',$str);
		 redirect('registros/reenvio_activacion');
		 else:
		 $this->form_validation->set_message('email', 'Tu cuenta aun no ha sido activada. Revisa tu bandeja de entrada o carpeta de spam. Intenta m&aacute;s tarde.');	
		 return false;
		 endif;
		 
		 
		 
		 elseif($tmp['estado']=='activado'):
		return true;
		 elseif($tmp['estado']=='bloqueado'):
		 $this->form_validation->set_message('email', 'Tu cuenta ha sido inhabilitada.');		 
		 return false;
		 endif;
		 
		 endif;

		 }
		 

		 
function candidato()
{
	$data=array();
	





$this->load->library('form_validation');



	$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email');
	$this->form_validation->set_rules('pass', 'password', 'trim|required|callback_login');
	




		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


    if ($this->form_validation->run() == true):


			$email=$this->input->post('email',true);
			$pass=$this->input->post('pass',true);

			 $this->db->where('email',$email);
 			 $this->db->where('pass',$pass);
 			 $this->db->where('estado','activado');
			 $t=$this->db->limit(1)->get('usuarios');			 
			 
			 if($t->num_rows()>=1):
			 	log_message('error', "Ingreso-: ".$email);
			 $this->native_session->set_userdata('login_data_candidatos',$t->row_array());
			 $this->native_session->set_userdata('login_candidatos',true);
			 redirect('candidatos');			 
			 else:
			 	log_message('error', "Ingreso-Falla: ".$email);
			 $this->native_session->set_flashdata('mensaje','Los datos  ingresados no coinciden.');
			 redirect('login/candidato');
			 endif;

	log_message('error', "Ingreso-: ".$email);

	else:







$data['content']=$this->load->view('login/candidato',$data,true);

$this->load->view('template2_candidatos',$data);


		endif;





















	}
		
	
}