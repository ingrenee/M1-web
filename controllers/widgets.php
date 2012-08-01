<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	function get_categoria()
	{
		$cat[0]="Todas las categorias";
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
		$this->form_validation->set_rules('color', 'color', 'trim|required');
			
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
		
		function iframe_print()
		{
			$this->iframe(rand(9999,9999),true);
			}
	function iframe($aleatorio=false,$flag=false)
	{
//		$categoria=(int)$this->uri->segment(3);
		 
		
		
		$data=array();$data['flag2']=$flag;
		$data['categoria']=$this->input->post('categoria',true);
		$data['alto']=$this->input->post('alto',true);
		$data['ancho']=$this->input->post('ancho',true);
		$data['caracteres']=$this->input->post('caracteres',true);
		$data['fecha']=$this->input->post('fecha',true);
		$data['contenido']=$this->input->post('contenido',true);
		$data['empleos_visibles']=$this->input->post('empleos_visibles',true);
		$data['empleos_numero']=$this->input->post('empleos_numero',true);
		$data['fuente']=$this->input->post('fuente',true);
		$data['tipo']=$this->input->post('tipo',true);
		$data['color']=$this->input->post('color',true);
		
		
		$this->load->view('widgets/iframe',$data);
		
		}
	
	
	function categoria()
	{
		
		
		
		
		$empleos_numero=(int)$this->uri->segment(4);
$data['empleos_visibles']=(int)$this->uri->segment(5);
$data['fecha']=(int)$this->uri->segment(6);		
$data['contenido']=(int)$this->uri->segment(7);		
$data['caracteres']=(int)$this->uri->segment(8);		
$data['fuente']=$this->get_fuentes((int)$this->uri->segment(9));
$data['ancho']=(int)$this->uri->segment(10);	
$data['alto']=(int)$this->uri->segment(11);	

$data['tipo']=$tipo=((int)$this->uri->segment(12));
$categoria=(int)$this->uri->segment(3);
 //echo 'Tipo:'.$data['tipo'];
if($data['tipo']>=2):
 $categoria=$this->uri->segment(3);
endif;


$data['color']=($this->uri->segment(13));


		
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

		
		//echo $categoria;
		
		if(($categoria>0) || strlen($categoria)>2):
			$data['categoria']=$categoria;
			
			
			
			if($tipo==1):
			$data['nombre_categoria']=$cat[$categoria];
$data['feed']=$this->db->limit($empleos_numero)->where('categoria like','%-'.$categoria.'-%')->where('estado','publicado')->order_by('creado','desc')->get('entradas');
			elseif($tipo==2):
			$tmp=explode('__',$categoria);
			
			foreach($tmp as $k => $v):
			if(strlen($v)>2):
			$tmp2[]=$v;
			endif;
			endforeach;

if(count($tmp2)>1):			
			foreach($tmp2 as $k => $v):
			if($k==0):
			$this->db->where('(descripcion like','%'.$v.'%');
			elseif($k==count($tmp2)-1):
			$this->db->or_where('descripcion like','"%'.$v.'%")', false);
			else:
			$this->db->or_where('descripcion like','%'.$v.'%');
			endif;
			endforeach;
else:
			$this->db->where('descripcion like','%'.$tmp2[0].'%');
endif;			
$data['feed']=$this->db->limit($empleos_numero)->where('estado','publicado')->order_by('creado','desc')->get('entradas');


			elseif($tipo==3):
//			$this->db->where('ruc',$categoria);
			
			$s='select x.* from entradas as x, empleador as y where y.ruc="'.$categoria.'" and y.ID=x.empleador_ID order by  creado desc limit '.$empleos_numero.' ';
$data['feed']=$this->db->query($s);//$this->db->limit($empleos_numero)->where('estado','publicado')->order_by('creado','desc')->get('entradas');
			endif;
			
			else:
						$data['categoria']=0;
		$data['nombre_categoria']='Hayempleo.com | Oferta de empleo';
		$data['feed']=$this->db->limit($empleos_numero)->where('estado','publicado')->order_by('creado','desc')->get('entradas');
			endif;
			
	
		
		
		
		
			
			
			//echo $this->db->last_query();
			//exit();
			$data['content']=$this->load->view('widgets/categoria',$data);
//			$this->load->view('template_widgets.php',$data);
		
		
		}

}