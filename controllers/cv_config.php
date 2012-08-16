<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Cv_config extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 function  __construct() {
        parent::__construct();  
		$a=$this->native_session->userdata('login_candidatos');
		$b=online();      
		if($a || $b ):
		
		else:
		$this->native_session->flashdata('mensaje','No tiene permisos para entrar en esta seccion.');
		redirect('login/candidato');
		endif;
    }

	
		
	 
	function nombre_usuario()
	{$data=array();
		
	

		$info=$this->native_session->userdata('login_data_candidatos');
$id=$info['ID'];
$info=array();
		$info=$this->lib_usuarios->obtener_info($id);

		
		$this->form_validation->set_rules('login', 'nombre de usuario', 'trim|required|alpha_numeric|is_unique[usuarios.login]');

	    
						
	 	
	    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	    
$data['info']=$info;

	
	    if ($this->form_validation->run() == false):
		$data['content']=$this->load->view('cv_config/nombre_usuario',$data,true);
		else:
		$arr['login']=$this->input->post('login',true);
		$this->lib_usuarios->actualizar($arr);
		$this->lib_usuarios->actualizar_info();
		redirect('cv_config/nombre_usuario');
		endif;
		$this->load->view('template_candidatos.php',$data);
		
	}
	
	function modelo()
	{$id=$this->uri->segment(3);
		
		$info=$this->native_session->userdata('login_data_candidatos');
		$id=$info['ID'];
		
		
		
		$this->form_validation->set_rules('login', 'nombre de usuario', 'trim|required|alpha_numeric|is_unique[usuarios.login]');

	    
						
	 	
	    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	    
$data['info']=$info;
$data['modelos']=$this->db->get('cv_modelos');

if(isset($info['cv_modelos_codigo'])):

$data['modelo_seleccionado']=$this->db->limit(1)->where('codigo',$info['cv_modelos_codigo'])->get('cv_modelos')->row_array();

endif;


	  
		$data['content']=$this->load->view('cv_config/modelo',$data,true);
		
		$modelo_id=$this->uri->segment(3);
		if(isset($modelo_id)):
		
		$tmp=$this->db->where('ID',$modelo_id)->get('cv_modelos');
		
		if($tmp->num_rows() >0):
		$tmp2=$tmp->row_array();
		$arr['cv_modelos_codigo']=$tmp2['codigo'];
		
		$this->lib_usuarios->actualizar($arr);
		$this->lib_usuarios->actualizar_info();
		redirect('cv_config/modelo');
		else:
		_set_mensajes('La plantilla de curriculum no existe.');
		endif;
		
		endif;
		$this->load->view('template_candidatos.php',$data);
		
		
		
		}

		
		
		
		function privacidad()
		{
			$data=array();
		
	
			$id=$this->uri->segment(2);
		
		
		
		$info=$this->native_session->userdata('login_data_candidatos');
$id=$info['ID'];
		$data=$this->lib_usuarios->obtener_info($id);
$this->load->library('form_validation');
		
		$this->form_validation->set_rules('privacidad', 'privacidad', 'trim|required');
	
	$this->form_validation->set_rules('b2', 'opciones de vista previa', 'required');

						
	 	
	    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	    
$data['info']=$info;

	
	    if ($this->form_validation->run() == false):

		$data['config']=unserialize($data['config']);
		$data['content']=$this->load->view('cv_config/privacidad',$data,true);
		else:
		//print_r($_POST);
		
		//print_r($_POST['b2']);
	
		//$string=aplana($_POST['b2']);
		$config['op1']=$_POST['privacidad'];
		$config['op2']=implode(',', $_POST['b2'] );
		$w['config']=serialize($config);
		
		
		$this->db->where('ID',$info['ID'])->limit(1)->update('usuarios',$w);
		$tmp=$this->db->where('ID',$info['ID'])->get('usuarios')->row_array();
		$this->native_session->set_userdata('login_data_candidatos',$tmp);
				$data['content']=$this->load->view('cv_config/privacidad',$data,true);
				_set_mensajes('La configuración fue guardada correctamente.',1);
				redirect('cv_config/privacidad');
		endif;
		$this->load->view('template_candidatos.php',$data);
			//exit(); 
			}
		

		
		
		
		
		
		
}