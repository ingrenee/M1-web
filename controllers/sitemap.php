<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	
	function index($id=false)
	{

			$w1['estado']='publicado';


$data['rango']=30;

if($id):
$id=$id-1;
$data['filas'] = $this->db->order_by('creado','desc')->limit($data['rango'],$id)->select('ID,titulo')->get_where('entradas',$w1);
$this->load->view('sitemap-filas',$data);
else:
$data['total'] = $this->db->order_by('creado','desc')->select('ID')->get_where('entradas',$w1)->num_rows();
$this->load->view('sitemap',$data);
endif;







		}

}