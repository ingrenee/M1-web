<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Empleo extends CI_Controller {





  function  __construct() {

        parent::__construct();        

    }

	

	

	function index($id=false,$ruc=false,$modo=true)

	{

		if(!$id):
		$id=$this->uri->segment(2);
		endif;
		
		/*  si la oferta es visualida en modo de empresa*/
		if($ruc):
		//$ruc=$this->uri->segment(2);
		 //echo $ruc;
		$empresa=$this->db->limit(1)->where('ruc',$ruc)->get('empresas');
		$data['modo_empresa']=$modo;
			if($empresa->num_rows()>0):
			$data['info']=$empresa->row_array();
				
	$s='update  subdominios set contador=contador+1 where  ruc="'.$ruc.'" ';			
	$this->db->query($s);
				
			else:
			redirect('error/oferta_no_existe');			
		//	echo "40";
			
			endif;
		
		endif;
		
		

		

		if(isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING'])>2):
		$s='update usuarios set envio_revisa=envio_revisa+1 where ID="'.(int)$_SERVER['QUERY_STRING'].'" ';
		$this->db->query($s);
		endif;
		

		$obj=$this->db->limit(1)->where('ID',$id)->get('entradas');

		

		if($obj->num_rows()>0):

		$data['v']=$obj->row_array();

		$this->db->limit(1)->where('ID',$id)->update('entradas',array('contador'=>($data['v']['contador']+1)));

		$data['empleador']=$this->db->limit(1)->where('ID',$data['v']['empleador_ID'])->get('empleador')->row_array();

//print_r($data['empleador']);
		$data['_titulo_']=$data['v']['titulo'].' - '._titulo($data['empleador']['nombre'].' - '.$id,'');

		$data['_descripcion_']=_cortar($data['v']['descripcion']).' ...';

		$data['content']=$this->load->view('empleo/index.tpl.php',$data,true);

		
//exit();
		//$this->output->cache(30);

		/* si es enviado un ruc, se muestra la oferta en modo empresa, si el ruc  no existe  se lanza  error*/
		if(!$ruc):
		$this->load->view('home.php',$data);
		else:
		$this->load->view('template_web.php',$data);
		endif;
		
		else:

		redirect('error/oferta_no_existe');

		endif;

		}





function _remap($method,$params=array())
{
if($_SERVER['SERVER_NAME']!= 'localhost' && $_SERVER['SERVER_NAME'] != 'hayempleo.com'):
$tmp=$this->db->limit(1)->where('nombre',$_SERVER['SERVER_NAME'])->where('estado','publicado')->get('subdominios');

	if($tmp->num_rows()>0):
		$tmp2=$tmp->row_array();
	$ruc=$tmp2['ruc'];
	$params[]=$ruc;
	$params[]=false;
	//exit();
	//$this->index($empleo_id,$tmp2['ruc']);

    endif;
	

	
	
endif;
		//print_r($_SERVER);
		
      if (method_exists($this, $method))
    {
        return call_user_func_array(array($this, $method), $params);
    }    
	
	
    }		











}