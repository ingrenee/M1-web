<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleo extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	
	function index($id=false)
	{
		if(!$id):
		$id=$this->uri->segment(2);
		endif;
		
		$data['v']=$this->db->limit(1)->where('ID',$id)->get('entradas')->row_array();
		$data['empleador']=$this->db->limit(1)->where('ID',$data['v']['empleador_ID'])->get('empleador')->row_array();
		$data['_titulo_']=$data['v']['titulo'];
		$data['_descripcion_']=_cortar($data['v']['descripcion']).' ...';
		$data['content']=$this->load->view('empleo/index.tpl.php',$data,true);
		$this->load->view('home.php',$data);
		
		}

}
?>