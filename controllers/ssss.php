<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidatos extends CI_Controller {


  function  __construct() {
        parent::__construct();  
		$a=$this->native_session->userdata('login_candidatos');      
		if(!$a):
		$this->native_session->flashdata('mensaje','No tiene permisos para entrar en esta seccion.');
		redirect('login/candidato');
		endif;
    }
	
	
	function index()
	{
		$id=$this->uri->segment(2);
		$data=array();
		
		/* Extraemos  informacion del  usuario*/
$data['cv_general_estado']=$this->lib_usuarios->cv_general_estado();
		/**/
		
		/* Extraemos  informacion del  usuario*/
$data['cv_formacion_estado']=$this->lib_usuarios->cv_formacion_estado();
		/**/
		
		/* Extraemos  informacion del  usuario*/
$data['cv_experiencia_estado']=$this->lib_usuarios->cv_experiencia_estado();
		/**/		
		
		
		$data['content']=$this->load->view('candidatos/index',$data,true);
		$this->load->view('template_candidatos.php',$data);
		
		}
		
	function informacion_general()
	{	$data=array();

$tmp=NULL;
$tmp=$this->db->get('pais');
foreach($tmp->result_array() as $k => $v):
$pais[$v['ID'].':'.$v['nombre']]=$v['nombre'];
endforeach;
$tmp=$this->db->where('tipo','departamento')->get('ubigeo2006');
$departamento['']='Seleccione...';
foreach($tmp->result_array() as $k => $v):
$departamento[$v['coddpto'].':'.$v['nombre']]=$v['nombre'];
endforeach;

$tmp=$this->db->where('tipo','distrito')->where('codprov',151)->get('ubigeo2006');
$distrito['']='Seleccione...';
foreach($tmp->result_array() as $k => $v):
$distrito[$v['coddist'].':'.$v['nombre']]=$v['nombre'];
endforeach;

$tmp=$this->db->where('tipo','distrito')->where('codprov',71)->get('ubigeo2006');
$distrito_callao['']='Seleccione...';
foreach($tmp->result_array() as $k => $v):
$distrito_callao[$v['coddist'].':'.$v['nombre']]=$v['nombre'];
endforeach;





$this->load->library('form_validation');



	$this->form_validation->set_rules('nombres', 'nombre completo', 'required');
	$this->form_validation->set_rules('celular', 'celular', 'required');
	$this->form_validation->set_rules('dni', 'DNI', 'required');

	
	$this->form_validation->set_rules('direccion', 'direccion', 'required');




    $this->form_validation->set_rules('pais', 'pais', 'required');
    $this->form_validation->set_rules('pais2', 'pais', 'required');	

$i_pais=explode(':',$this->input->post('pais'));
$i_pais=$i_pais[0];
$i_departamento=explode(':',$this->input->post('departamento'));
$i_departamento=$i_departamento[0];
$data['i_departamento']=$i_departamento;


$i_distrito=explode(':',$this->input->post('distrito'));
$i_distrito=$i_distrito[0];

	if($i_pais==173):
	
	    $this->form_validation->set_rules('departamento', 'departamento', 'required');
		if($i_departamento==15 || $i_departamento==7):
 
	    $this->form_validation->set_rules('distrito', 'distrito', 'required');
		else:
		$_POST['distrito']='';
		endif;
	else:
	
				$_POST['distrito']='';
				$_POST['departamento']='';
	endif;

	/*----------------------*/
	
	
	
	
	
$i_pais2=explode(':',$this->input->post('pais2'));
$i_pais2=$i_pais2[0];
$i_departamento2=explode(':',$this->input->post('departamento2'));
$i_departamento2=$i_departamento2[0];
$i_distrito2=explode(':',$this->input->post('distrito2'));
$i_distrito2=$i_distrito2[0];
	
	$data['i_departamento2']=$i_departamento2;
	
		if($i_pais2==173):
	
	    $this->form_validation->set_rules('departamento2', 'departamento', 'required');
		if($i_departamento2==15 || $i_departamento2==7)	:
	    $this->form_validation->set_rules('distrito2', 'distrito', 'required');
		else:
		$_POST['distrito2']='';
		endif;
	else:
	
				$_POST['distrito2']='';
				$_POST['departamento2']='';
	endif;
	
	
	
	
	
	
	
	
	
	
	
	
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		
		/* Extraemos  informacion del  usuario*/
		$info=$this->native_session->userdata('login_data_candidatos');
		$data['usuario']=$this->db->where('usuarios_ID',$info['ID'])->get('cv_general')->row_array();
		/**/


			$data['pais']=$pais;
			$data['departamento']=$departamento;
			$data['distrito']=$distrito;
			$data['distrito_callao']=$distrito_callao;
		if ($this->form_validation->run() == false):
	


		$data['content']=$this->load->view('candidatos/informacion_general',$data,true);
		$this->load->view('template_candidatos.php',$data);
		else:
		
		$this->native_session->set_flashdata('mensaje','Tus datos de informaci&oacute;n general fueron actualizados.');
		
		$_POST['usuarios_ID']=$info['ID'];
		$_POST['modificado']=ahora();		
		$this->db->replace('cv_general',$_POST);
		
		//$data['content']=$this->load->view('candidatos/informacion_general',$data,true);
		//$this->load->view('template_candidatos.php',$data);
		redirect('candidatos/informacion_general');
		endif;
		}		
		

}