<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	function get_categoria()
	{
		$cat['']="selecciones una categoria";
		$cat[1]="Administración/Oficina";
$cat[2]='Arte/Diseño/Medios';
$cat[3]='Científico/Investigación';
$cat[4]='Informática/Telecom.';
$cat[5]='Dirección/Gerencia';
$cat[6]='Economía/Contabilidad';
$cat[7]='Educación/Universidad';
$cat[8]='Hostelería/Turismo';
$cat[9]='Ingeniería/Técnico';
$cat[10]='Legal/Asesoría';
$cat[11]='Márketing/Ventas';
$cat[12]='Medicina/Salud';
$cat[13]='Recursos Humanos';
$cat[14]='Otros';

return $cat;
		}
	
	
	function  get_fuentes($var=FALSE)
	{
		$fu[]='Arial';
		$fu[]='"Lucida Grande"';
		$fu[]='Tahoma';
		$fu[]='"Trebuchet MS"';
		$fu[]='Verdana';
		$fu[]='"MS Serif"';		
		
		if($var===FALSE):
	return $fu;								
		else:
	return $fu[$var];								
		endif;

						
		
		
		
		}
	function index()
	{
		$data=array();
		
		
	
		
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tipo', 'Tipo de widget', 'trim|required');
		
		if(isset($_POST['tipo']) && $_POST['tipo']==1):
		$this->form_validation->set_rules('categoria', 'categoria', 'trim|required');
		endif;
		
		if(isset($_POST['tipo']) && $_POST['tipo']==2):
		$this->form_validation->set_rules('claves', 'palabras', 'trim|required');
		endif;
		
		
		if(isset($_POST['widgets_contenido']) && $_POST['widgets_contenido']==1):
		$this->form_validation->set_rules('caracteres', 'caracteres', 'trim|required|numeric');
		endif;
		
		
		$this->form_validation->set_rules('ancho', 'ancho', 'trim|required|numeric');
		$this->form_validation->set_rules('alto', 'alto', 'trim|required|numeric');
			
		if(isset($_POST['tipo']) && $_POST['tipo']==3):
		$this->form_validation->set_rules('ruc', 'ruc', 'trim|required');
		endif;
		
		$this->form_validation->set_rules('empleos_numero', 'Numero de empleos', 'trim|required|numeric');
		$this->form_validation->set_rules('empleos_visibles', 'Empleos visibles', 'trim|required|numeric');
		
		
		
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		
$this->form_validation->set_rules('empleos_titulo', 'Titulo', 'trim|required');		


		if ($this->form_validation->run() == FALSE):

		
$data['cat']=$this->get_categoria();	
$data['fuente']=$this->get_fuentes();	

$data['content']=$this->load->view('widgets/index',$data,true);
else:

endif;



$this->load->view('template_solo',$data);
		
		}
	function iframe()
	{
//		$categoria=(int)$this->uri->segment(3);
		 
		 
		
		$data=array();
		$data['categoria']=$this->input->post('categoria',true);
		$data['alto']=$this->input->post('alto',true);
		$data['ancho']=$this->input->post('ancho',true);
		$data['caracteres']=$this->input->post('caracteres',true);
		$data['fecha']=$this->input->post('fecha',true);
		$data['contenido']=$this->input->post('contenido',true);
		$data['empleos_visibles']=$this->input->post('empleos_visibles',true);
		$data['empleos_numero']=$this->input->post('empleos_numero',true);
		$data['fuente']=$this->input->post('fuente',true);
		
		$this->load->view('widgets/iframe',$data);
		
		}
	
	
	function categoria()
	{
		
		$categoria=(int)$this->uri->segment(3);
		$empleos_numero=(int)$this->uri->segment(4);

		$data['caracteres']=(int)$this->uri->segment(8);
		$data['alto']=(int)$this->uri->segment(11);

		$data['contenido']=(int)$this->uri->segment(7);
		$data['fecha']=(int)$this->uri->segment(6);
		$data['empleos_visibles']=(int)$this->uri->segment(5);
	$data['fuente']=$this->get_fuentes((int)$this->uri->segment(9));
		
$cat[1]="Administración/Oficina";
$cat[2]='Arte/Diseño/Medios';
$cat[3]='Científico/Investigación';
$cat[4]='Informática/Telecom.';
$cat[5]='Dirección/Gerencia';
$cat[6]='Economía/Contabilidad';
$cat[7]='Educación/Universidad';
$cat[8]='Hostelería/Turismo';
$cat[9]='Ingeniería/Técnico';
$cat[10]='Legal/Asesoría';
$cat[11]='Márketing/Ventas';
$cat[12]='Medicina/Salud';
$cat[13]='Recursos Humanos';
$cat[14]='Otros';

		
		
		
		if($categoria>0):
			$data['categoria']=$categoria;
			$data['nombre_categoria']=$cat[$categoria];
			
			$data['feed']=$this->db->limit($empleos_numero)->where('categoria like','%-'.$categoria.'-%')->where('estado','publicado')->order_by('creado','desc')->get('entradas');
			else:
						$data['categoria']=0;
		$data['nombre_categoria']='Hayempleo.com | Oferta de empleo';
		$data['feed']=$this->db->limit($empleos_numero)->where('estado','publicado')->order_by('creado','desc')->get('entradas');
			endif;
			//echo $this->db->last_query();
			///exit();
			$data['content']=$this->load->view('widgets/categoria',$data);
//			$this->load->view('template_widgets.php',$data);
		
		
		}

}