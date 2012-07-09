<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suscripciones extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	
	function index()
	{
//		$id=$this->uri->segment(2);
		
		
	//	$data['v']=$this->db->limit(1)->where('ID',$id)->get('entradas')->row_array();
		//$data['empleador']=$this->db->limit(1)->where('ID',$data['v']['empleador_ID'])->get('empleador')->row_array();
		
		
		
		
		
		
		
		
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tags', 'Palabras de busqueda', 'trim|required');
		
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_verifica_email');
		$this->form_validation->set_rules('re_email', 're-email', 'trim|required|valid_email|callback_compara');
		
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


		if ($this->form_validation->run() == FALSE):
		
		
		
		
		$data['_titulo_']='Suscripciones trabajo y empleo en tu email';
		$data['_descripcion_']='Suscribete a hay empleo, y te enviaremos ofertas de trabajo  en tu bandeja de entrada / email ';
		
		$data['content']=$this->load->view('suscripciones/index',$data,true);
		$this->load->view('template2_candidatos.php',$data);
		else:
		
		$insert['email']=$this->input->post('email');
		$insert['tags']=$this->input->post('tags');
		$insert['nombres']='usuario'.rand(9999,999999);
		$insert['suscrito']=1;
		$insert['pass']=rand(1000,9999);
		$insert['creado']=ahora();
		
		
		$obj2=$this->db->where('email',$insert['email'])->get('usuarios');
		
		/* verificamos si el email ya esta registrado*/
		
		if($obj2->num_rows()<=0):
		
		$this->db->insert('usuarios',$insert);
		$id=$this->db->insert_id();
		else:
		$tmp=$obj2->result_array();
		
		
		$id=$tmp[0]['ID'];
		$this->db->where('ID',$id);
		$update['suscrito']=1;
		$update['tags']=$insert['tags'];
		$this->db->limit(1)->update('usuarios',$update);
		
		/* No es necesario enviarle una activacion */
		
		endif;
		
		if($id):
		/**exito :  enviar email para confirmar suscripcion */
		/* mostrar informacion sobre su suscripcion*/
		$info['{email}']=$insert['email'];
		$info['{tags}']=$insert['tags'];
		$info['{pass}']=$insert['pass'];
		$info['{ID}']=$id;
		$this->enviar_correo($info);
		/*enviar email*/
		
		redirect('suscripciones/exito/'.$id);
		else:
		/*error*/
	redirect('suscripciones/error/');
		endif;
		
		
		
		endif;
		}
		
		function verifica_email($str)
		{
			$obj=$this->db->select('ID,email,suscrito')->where('suscrito >=',2)->where('email',$str)->limit(1)->get('usuarios');
			
			if($obj->num_rows()>0):
			$this->form_validation->set_message('verifica_email', 'Este email ya esta suscrito. <br />
Si desea modificar las palabras de su suscripci&oacute;n  ingrese con tu email y contraseña. <b><a style="color:#ffff00" href="'.site_url('login/candidato').'">AQU&Iacute;</a></b> , si no recuerda su contraseña puede recuperarla <b><a style="color:#ffff00"  href="'.site_url('registros/recuperar').'">AQU&Iacute;</a></b>
');
			return false;
			else:
			
			return true;
			endif;
			
			}
			
					function compara($str)
		{
			
			
			if($str!=$_POST['email']):
			$this->form_validation->set_message('compara', 'Los correos electronicos no coinciden.');
			return false;
			else:
			
			return true;
			endif;
			
			}
			
		
		private function  enviar_correo($info)
		{
			$this->load->library('lib_correo');
			
			$conf['asunto']='Activacion de suscripcion.';
			$conf['destino']=$info['{email}'];
			
			$this->lib_correo->enviar($info,'./templates/suscripcion.html',$conf);
			}
		
		 private function verifica($id)
		 {
			$obj= $this->db->where('ID',$id)->limit(1)->get('usuarios');
			 
			 if($obj->num_rows()>0):
			 $info=$obj->result_array();

			 if($info[0]['estado']=='activado'):
			 /* no enviamos email*/
			 else:
			 /*enviamos email*/
			 endif;
			 
			 return $info;
			 
			 else:
			 return false;
			 endif;
			 }
		
		function exito()
		{
			$id=$this->uri->segment(3);
			
			if($data=$this->verifica($id)):
			
			/* mostrar informacion sobre la suscripcion*/
		$data['content']=$this->load->view('suscripciones/exito',$data,true);
		$this->load->view('template2_candidatos.php',$data);
		
			else:
			_set_mensajes('el usuario  no  se ha suscrito. ');
				redirect('error/mensajes');
			endif;
			
			
			}
			
			function activar()
			{$id=$this->uri->segment(3);
				
				$obj=$this->db->where('ID',$id)->limit(1)->get('usuarios');
				
				if($obj->num_rows()>0):
				
				$tmp=$obj->result_array();
			if((int)$tmp[0]['suscrito']>=2):
				/* ya  confirmo suscripcion*/
								_set_mensajes('El email ya está suscrito. ');
									redirect('error/mensajes');
				else:
				/*No  ha confirmdo suscripcion*/
				$u['estado']='activado';
				$u['suscrito']=2;
				$this->db->where('ID',$id)->update('usuarios',$u);

				$data['content']=$this->load->view('suscripciones/activar',$tmp[0],true);
				$this->load->view('template2_candidatos.php',$data);
				endif;
				

				

				
				
				else:
				// error
				
				_set_mensajes('El usuario  no  se ha suscrito. ');
				redirect('error/mensajes');
				endif;
				
				}

}