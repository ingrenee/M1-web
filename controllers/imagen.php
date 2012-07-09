<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Imagen extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 function  __construct() {
        parent::__construct();  
		$a=$this->native_session->userdata('login_candidatos');      
		if(!$a):
		$this->native_session->flashdata('mensaje','No tiene permisos para entrar en esta seccion.');
		redirect('login/candidato');
		endif;
    }

	
		
	 
	function index()
	{$data=array();
		
	//	$this->form_validation->set_rules('file', 'imagen', 'trim|required');
		$config['upload_path'] = './usuarios/fotos/';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size']	= '900';
		$config['max_width']  = '2024';
		$config['max_height']  = '1768';
		$config['overwrite']  = true;
		$tmp['ID']=$this->lib_usuarios->obtener_campo('ID');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')):

			$error = array('error' => $this->upload->display_errors());
			$error['id']=$tmp['ID'];
		//	$data['content']=$this->load->view('perfil/logo', $error,true);
//		print_r($error);

		_set_mensajes($error['error']);
		$data['id']=$tmp['ID'];
		// $data['error']=$d;//$this->do_upload();
		$data['content']=$this->load->view('imagen/index',$data,true);
		$this->load->view('template_candidatos.php',$data);
		else:

			
			$file=$this->upload->data();
		

			$config['source_image'] = $file['full_path'];
$config['new_image'] = $file['file_path'].'/usuario_'.md5($tmp['ID']).'.jpg';
$config['create_thumb'] = false;
$config['maintain_ratio'] = TRUE;
$config['width'] = 100;
$config['height'] = 120;
			
$this->load->library('image_lib', $config);

$this->image_lib->resize();
			
			unlink($file['full_path']);
			
			
			
			
			$error = array('upload_data' => $this->upload->data());
			_set_mensajes(@$error['error']);
redirect('imagen');
			//$data['content']=$this->load->view('perfil/logo_mensajes', $data,true);
	endif;
		
		
		
		
		//endif;
	}
	
	

		
		
		
		
		

		
		
		
		
		
		
}