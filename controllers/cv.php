<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Cv extends CI_Controller {

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

	 
		
	 
	function index()
	{$data=array();
		
	
			$id=$this->uri->segment(2);
		
		if(false):
		$data=$this->lib_usuarios->obtener_info($id);

		$data['general']=$this->lib_usuarios->cv_general($id);	
		$data['formacion']=$this->lib_usuarios->cv_formacion($id);
		$data['experiencia']=$this->lib_usuarios->cv_experiencia($id);		
		$this->load->library('lib_aptitudes');
		$data['informatica']=$this->lib_aptitudes->corta($data['aptitudes'],1);			
		$data['idiomas']=$this->lib_aptitudes->corta($data['aptitudes'],2);			
		
		else:

		$info=$this->native_session->userdata('login_data_candidatos');
$id=$info['ID'];
		$data=$this->lib_usuarios->obtener_info($id);

		$data['general']=$this->lib_usuarios->cv_general($id);	
		$data['formacion']=$this->lib_usuarios->cv_formacion($id);
		$data['experiencia']=$this->lib_usuarios->cv_experiencia($id);		
		$this->load->library('lib_aptitudes');
		$data['informatica']=$this->lib_aptitudes->corta($data['aptitudes'],1);			
		$data['idiomas']=$this->lib_aptitudes->corta($data['aptitudes'],2);	
		endif;

		
		$data['content']=$this->load->view('cv/index',$data,true);
		$this->load->view('template_candidatos.php',$data);
		
	}
	
	function descargar()
	{$id=$this->uri->segment(3);
		
$info=$this->native_session->userdata('login_data_candidatos');
$id=$info['ID'];
		$data=$this->lib_usuarios->obtener_info($id);
header("Content-Type: application/vnd.ms-word");
   header("Expires: 0");
   header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
   header("Content-disposition: attachment; filename=\"cv_".$data['nombres'].".doc\"");


			
		
		$data['general']=$this->lib_usuarios->cv_general($id);	
		$data['formacion']=$this->lib_usuarios->cv_formacion($id);
		$data['experiencia']=$this->lib_usuarios->cv_experiencia($id);		
		$this->load->library('lib_aptitudes');
		$data['informatica']=$this->lib_aptitudes->corta($data['aptitudes'],1);			
		$data['idiomas']=$this->lib_aptitudes->corta($data['aptitudes'],2);	

   $output = $data['content']=$this->load->view('cv/index',$data,true);
   echo utf8_decode($output);
   exit;
		
		}

		
		
		
		function web($usuario=false)
		{
			$data=array();
		
	 
			$login=$this->uri->segment(2);
		
		$t=$this->db->where('login',$login)->limit(1)->get('usuarios')->row_array();
		
		if(count($t)>0):
		
		$info=$this->native_session->userdata('login_data_candidatos');
$id=$info['ID'];
 
		$data=$this->lib_usuarios->obtener_info($id);

		$data['general']=$this->lib_usuarios->cv_general($id);	
		$data['formacion']=$this->lib_usuarios->cv_formacion($id);
		$data['experiencia']=$this->lib_usuarios->cv_experiencia($id);		
		$this->load->library('lib_aptitudes');
		$data['informatica']=$this->lib_aptitudes->corta($data['aptitudes'],1);			
		$data['idiomas']=$this->lib_aptitudes->corta($data['aptitudes'],2);	
		$data['content']=$this->load->view('cv/web',$data,true);
		else:
		$data['content']=$this->load->view('cv/web_no_existe',$data,true);
		endif;

		

		$this->load->view('template_cv.php',$data);
			
			}
		

		
		
		
		
		
		
}