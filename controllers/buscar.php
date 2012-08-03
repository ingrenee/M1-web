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

//$cadena=str_replace('%20','-',$cadena);



 $cadena=urldecode($cadena);



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

// echo $cadena;

return $cadena;

			}

			

			

	



		

			

	function index()

	{

		$w1=array('estado ='=>'publicado');

		$opciones=array();

		$w2=array();

		

		



		

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

		$opciones['categoria like']='"%-'.$q1.'-%"';

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

		// echo "[".$q."]";

		/*-----------------------------------------*/

		if((strlen($q)<=0) || $q=="0"):

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



		 

			/* si Q2 es  cero o esta vacio sera hayempleo*/		

			if((strlen($q2)<=0) || $q2=="0.html" || $q2=='0'):

			$q2='hayempleo';

			endif;

		

		

		/* Si  hay una nueva palabra la reemplazamos*/

		$q2=$this->limpia($q2);

		

	//	echo "[".$q2."-".$q."]";

		

		//echo $q2;

			if(!($q==$q2)):

			$q=$q2;

			

				/*	$this->native_session->set_userdata('q',$q);

			/* agrego  la palabra al historial*/

			//historial_busquedas($q,$opciones); 

			

			//else:

		

			

			endif;

			$this->native_session->set_userdata('q',$q);

				if(!obtener_historial($q)):

				

			/* agrego  la palabra al historial*/

			historial_busquedas($q,$opciones); 

			

			

			endif;

			

		

		$opciones=obtener_historial($q);

		

		

	//	print_r($opciones);

		endif;

		

		if($q!='hayempleo'):

		$w1['(titulo like']='%'.$q.'%';

		$w2['descripcion like ']='"%'.$q.'%")';

		

		endif;

		

		

		$data['opciones']=$opciones;

		

		

			

		

		



		

		

		

	

$config['uri_segment'] = 3;

$config['per_page']   = 10;

$config['num_links']   = 10;

$config['first_link'] = 'Inicio';
$config['last_link'] = 'Final';


$ur=str_replace('%','-',$q);

if($this->uri->segment(2)==''):

$ur='hayempleo';

endif;



$config['base_url'] = site_url('buscar/'.$ur);



$this->db->where($opciones,NULL,false);

$this->db->where($w1);

$this->db->or_where($w2,NULL,false);

$config['total_rows'] = $this->db->get('entradas')->num_rows();

$this->pagination->initialize($config);



$this->db->where($opciones,NULL,false);

$this->db->where($w1);

$this->db->or_where($w2,NULL,false);

$data["root"]=$cat1 = $this->db->order_by('creado','desc')->get('entradas',$config['per_page'],$this->uri->segment(3));













$data['index']=(int)$this->uri->segment(3);

 $data['paginacion']=$this->pagination->create_links();

 

/* datos  para SEO */

$nq=str_replace('%',' ',$q);

$data['_titulo_']='buscar empleo o trabajo de '.$nq;

$data['_descripcion_']='buscar empleo o trabajo de '.$nq.',  oferta laboral de '.$nq.', busco trabajo de '.$nq.', necesito trabajar de '.$nq.', quiero trabajar de '.$nq;



/*

    echo '<pre>';

    print_r($this->db->last_query());

    echo '</pre>';

	*/



	

	

$data['content']=$this->load->view('welcome/lista',$data,true);

		$this->load->view('home',$data);

		

		

		}



}