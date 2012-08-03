<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Profesiones extends CI_Controller {





  function  __construct() {

        parent::__construct();        

    }

	

	

	function buscar()

	{


//

$q=@$_GET['q'];

$items=$this->db->like('nombre',$q)->where('estado','publicado')->order_by('peso','desc')->limit(30)->get('profesiones');

$data['items']=$items;
$this->load->view('profesiones/buscar',$data);


		}



}