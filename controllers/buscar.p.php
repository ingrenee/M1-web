<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	function busco()
	{
		$q=$this->uri->segment(3);
		$q=str_replace('.html','',$q);
		$q=str_replace('-',' ',$q);
		$this->native_session->set_userdata('q',$q);
redirect('buscar/index');
		}
		
		
		function  limpia($cadena)
		{
			$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
$cadena = strtr($cadena, $tofind, $replac);

$cadena = str_replace(
        array("\\", "¨", "º", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "<", ";", ",", ":",
             ".html", "."),
        '',
        $cadena
    );
$cadena=str_replace('-','%',$cadena);
$cadena=str_replace(' ','%',$cadena);

return $cadena;
			}
			
			
	

		
			
	function index()
	{
		$w1=array('estado ='=>'publicado');
		$opciones=array();
		
		
		

		
		$q1=$this->input->post('fecha');
	/* campo fecha */
		if($q1!=''):
		$opciones['creado >=']="DATE_SUB(CURDATE(),INTERVAL ".$q1." DAY)";
		endif;
		/**/
		
		
	$q1=$this->input->post('modalidades_ID');
	/* campo fecha */
		if($q1!=''):
		$opciones['modalidades_ID']=$q1;
		endif;
		/**/
		
		
		
		
		
		$q1=$this->input->post('departamento',true);
	/* campo fecha */
		if($q1!=''):
		$opciones['departamento']='"'.$q1.'"';
		endif;
		/**/
		
		
		$q1=$this->input->post('categoria',true);
	/* campo fecha */
		if($q1!=''):
		$opciones['categoria']='"'.$q1.'"';
		endif;
		/**/		
		
		
		
		
		
		
		
		
		$buscar=$this->input->post('buscar');
		
		if($buscar):
		//echo "usare form:_";
		
		/*-----------------------------------------*/
		//$q=$this->input->post('q');
		
		$q=$this->limpia($this->uri->segment(2));
		
//		exit();
		$q=trim($q);
		$q=str_replace('-','%',$q);
		$q=str_replace(' ','%',$q);
		/*-----------------------------------------*/
		if(strlen($q)<=0):
		$q='hayempleo';
		endif;
		
		
		
		$this->native_session->set_userdata('q',$q);
		/* agrego  la palabra al historial*/
		historial_busquedas($q,$opciones); 
		/**/

		
	
	//	print_r($opciones);
		else:
		//echo "usare session:_";
		
		
		
		
		$q=$this->native_session->userdata('q');
		
		$q2=$this->uri->segment(2);
		
		/* Si  hay una nueva palabra la reemplazamos*/
		$q2=$this->limpia($q2);
		if(!($q==$q2)):
		$q=$q2;
//		$this->native_session->set_userdata('q',$q);
		/* agrego  la palabra al historial*/
//		historial_busquedas($q,$opciones); 
		/**/
		endif;
		
		$opciones=obtener_historial($q);
		
		
		//print_r($opciones);
		endif;
		
		if($q=='hayempleo'):
		$q='';
		endif;
		
		
		$data['opciones']=$opciones;
		
		$w1['titulo like']='%'.$q.'%';
			
		
		

		
		
		
	
$config['uri_segment'] = 3;
$config['per_page']   = 10;
$config['num_links']   = 10;
$ur=str_replace('%','-',$q);
if($this->uri->segment(2)==''):
$ur='index';
endif;

$config['base_url'] = site_url('buscar/'.$ur);

$this->db->where($opciones,NULL,false);
$this->db->where($w1);
$config['total_rows'] = $this->db->get('entradas')->num_rows();
$this->pagination->initialize($config);

$this->db->where($opciones,NULL,false);
$this->db->where($w1);
$data["root"]=$cat1 = $this->db->order_by('creado','desc')->get('entradas',$config['per_page'],$this->uri->segment(3));






$data['index']=(int)$this->uri->segment(3);
 $data['paginacion']=$this->pagination->create_links();
 
/* datos  para SEO */
$nq=str_replace('%',' ',$q);
$data['_titulo_']='buscar empleo o trabajo de '.$nq;
$data['_descripcion_']='buscar empleo o trabajo de '.$nq.',  oferta laboral de '.$nq.', busco trabajo de '.$nq.', necesito trabajar de '.$nq.', quiero trabajar de '.$nq;
/**/
   // echo '<pre>';
   // print_r($this->db->last_query());
    //echo '</pre>';
$data['content']=$this->load->view('welcome/lista',$data,true);
		$this->load->view('home',$data);
		
		
		}

}