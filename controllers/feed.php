<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }
	
	
	function categoria()
	{
		
		$categoria=(int)$this->uri->segment(3);
		
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

		
		
		
		
			$data['categoria']=$categoria;
			$data['nombre_categoria']=$cat[$categoria];
			
			$data['feed']=$this->db->limit(20)->where('categoria',$categoria)->where('estado','publicado')->get('entradas');
		
			$data['content']=$this->load->view('feed/categoria',$data);
//			$this->load->view('template2_candidatos.php',$data);
		
		
		}

}