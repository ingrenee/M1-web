<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	
	function candidatos($id=false)
	{
		$a=online_candidato();
		$b=online();
		
		$data=array();
		if(!$a):
			
			$this->load->view('portal/candidatos',$data);
			
			
		else:
			$this->load->view('portal/candidatos_on',$data);	
			
		
		
		endif;
		}
		
		
		function empresas($id=false)
	{
		//$a=online_candidato();
		$b=online();
		
		$data=array();
		if(!$b):
			
			$this->load->view('portal/empresas',$data);
		else:
			$this->load->view('portal/empresas_on',$data);
			
		endif;
		
		
		}

}