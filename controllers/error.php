<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Error extends CI_Controller {





  function  __construct() {

        parent::__construct();        

    }

	

	

	function mensajes()

	{

		

		$data=array();

		$data['mensaje']=_mensajes(true);

		

			$data['content']=$this->load->view('error/mensajes',$data,true);

				$this->load->view('template2_candidatos.php',$data);

		

		

		}

function page_404()
{
	 $data=array();
	$data['content']=$this->load->view('error/404',$data,true);

				$this->load->view('template2_candidatos.php',$data);
	}

}