<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Experiencia extends CI_Controller {

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

		function fechas($str)
		{
			$mes1=$_POST['fecha_a_1'];
			$anio1=$_POST['fecha_a_2'];			
			
			$mes2=$_POST['fecha_b_1'];
			$anio2=$_POST['fecha_b_2'];
			
			if($anio1<=$anio2):
			
			if($anio1==$anio2):
			
			
			if($mes1<$mes2):
			
			return true;
			else:
			$this->form_validation->set_message('fechas', 'Verifique los meses seleccionados.');
			return false;			
			endif;
			
			
			else:
			return true;
			
			endif;
			
			
			else:
			$this->form_validation->set_message('fechas', 'El año de termino no puede ser menor');
			return false;
			
			endif;
			
			
			
			
			
			}
	
		
	 
	function index()
	{$data=array();
		
		$this->form_validation->set_rules('empresas_nombre', 'nombre de empresa', 'trim|required');
		$this->form_validation->set_rules('funciones', 'funciones', 'trim|required');		
	    $this->form_validation->set_rules('cargo', 'cargo ', 'trim|required');
	    $this->form_validation->set_rules('fecha_a_1', 'mes', 'trim|required|numeric');
	    $this->form_validation->set_rules('fecha_b_1', 'mes', 'trim|required|numeric');
	    $this->form_validation->set_rules('fecha_a_2', 'a&ntilde;o', 'trim|required|numeric');
	    $this->form_validation->set_rules('fecha_b_2', 'a&ntilde;o', 'trim|required|numeric|callback_fechas');
						
	 	
	    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	    

		$this->load->library('lib_experiencia');

	    if ($this->form_validation->run() == false):
	    
			$data['filas']=$this->lib_experiencia->obtener_todos();
			$data['content']=$this->load->view('experiencia/index',$data,true);
		$this->load->view('template_candidatos.php',$data);
		else:

		$nombre_empresa=$this->input->post('empresas_nombre',true);
		
		
		$this->load->library('lib_empresas');


		$_POST['empresas_ID']=$this->lib_empresas->agregar_si_no_existe($nombre_empresa);
		
		/* ordenamos las fechas */
		$_POST['fecha_a']=$this->input->post('fecha_a_2',true).'-'.$this->input->post('fecha_a_1',true).'-01';
		$_POST['fecha_b']=$this->input->post('fecha_b_2',true).'-'.$this->input->post('fecha_b_1',true).'-01';		
		unset($_POST['fecha_a_1'],$_POST['fecha_b_1'],$_POST['fecha_a_2'],$_POST['fecha_b_2']);
		/* --------------------------- */
		
		$this->lib_experiencia->agregar($_POST);
		
		_set_mensajes('Se agrego un nuevo registro de experiencia laboral.');
		 redirect('experiencia');
		endif;
	}
	
	
	function borrar()
	{
		$this->load->library('lib_experiencia');
		$id=(int)$this->uri->segment(3);
		$this->lib_experiencia->borrar($id);
		_set_mensajes('El registro de experiencia laboral ha sido borrado.');
		redirect('experiencia');
		
		}
}