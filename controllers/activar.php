<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Activar extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 function  __construct() {
        parent::__construct();  
		
    }

	
		
	 
	function registro()
	{$data=array();
		$email=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$email= str_replace('_a_','@',$email);
		$this->db->where('email_contacto',trim($email));
		$h=$this->db->get('empleador');		
		$t=$h->row_array();

		if($h->num_rows()>0):
		//echo 'actualizando';
		
		$this->db->where('ID',$t['ID']);
		
		
		
		$this->db->update('empleador',array('estado'=>'activo','acepta'=>1));
		
		
		
		
		
		
		
		redirect('activar/mensaje/'.$t['ID']);
		else:
		// echo "creado...";
		$t=@file_get_contents('http://www.unmsm.edu.pe/BolsaUnmsm/tmp/'.$id.'.txt');
		$array=unserialize($t);
		
		$array['nombre']=utf8_encode($array['nombre']);
		$array['direccion']=utf8_encode($array['direccion']);		
		$array['encargado']=utf8_encode($array['encargado']);				
		$array['descripcion']=utf8_encode($array['descripcion']);			
		$array['cargo']=utf8_encode($array['cargo']);			
		$array['nombre_comercial']=utf8_encode($array['nombre_comercial']);			
		$array['nombre_gerente']=utf8_encode($array['nombre_gerente']);	
				
		if(is_array($array) && count($array)>5):
		//unset($array['ID']);
		$array['acepta']=1;
		$this->db->insert('empleador',$array);
		$id=$this->db->insert_id();
		redirect('activar/mensaje/'.$id);
		else:
		echo 'Ocurrio un problema, intentelo otra vez.';
		endif;
		
		endif;
		
		
		
		
	}
	
	function mensaje()
	{
		$data=array();
$data['content']=$this->load->view('activar/mensaje',$data,true);
$this->load->view('template2',$data);
		
		}


	function publimensaje()
	{
		
		$id=$this->uri->segment(3);
		$this->db->where('ID',$id);
		$h=$this->db->select('ID,titulo')->limit(1)->get('entradas');
		if($h->num_rows()>0):
		
		$t=$h->row_array();
$data['titulo']=$t['titulo'];
$data['ID']=$t['ID'];
$data['content']=$this->load->view('activar/publimensaje',$data,true);
$this->load->view('template2',$data);
		endif;
		}	
	
	
	function publi()
	{$data=array();
		$email=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$email= str_replace('_a_','@',$email);
		$this->db->where('email_contacto',trim($email));
		$h=$this->db->select('ID')->limit(1)->get('empleador');		
	

		if($h->num_rows()>0):
		//echo 'actualizando';
	
		foreach($h->result_array() as $k => $v);
		
		
	
	
		
				// echo "creado...";
		$t=file_get_contents('http://www.unmsm.edu.pe/BolsaUnmsm/tmp/empleo_'.$id.'.txt');
		$array=unserialize($t);
		
		
		$array['titulo']=utf8_encode($array['titulo']);
		$array['email_asunto']=utf8_encode($array['email_asunto']);		
		
		
		if(is_array($array) && count($array)>5):
	

	
		 $array['empleador_ID']=$v['ID'];
		 $array['estado']='publicado';
		$array['exportado']=1;
		
		$this->db->insert('entradas',$array);
		$id=$this->db->insert_id();
		
		actualizar_index_cache();
		redirect('activar/publimensaje/'.$id);
		else:
		echo 'Ocurrio un problema, intentelo otra vez.';
		endif;
		
		else:
		echo '';
		
		endif;
		
		
		
		
	}
	
	
	
	
	function publi2()
	{$data=array();
		$email=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$email= str_replace('_a_','@',$email);
		$this->db->where('email_contacto',trim($email));
		$h=$this->db->select('ID')->limit(1)->get('empleador');		
	

		if($h->num_rows()>0):
		//echo 'actualizando';
	
		foreach($h->result_array() as $k => $v);
		
		
	
	
		
				// echo "creado...";
		$t=file_get_contents('http://www.unmsm.edu.pe/BolsaUnmsm/tmp/empleo_ee8dca136b55720526e1fbe2981520c1.txt');
		$array=unserialize($t);
		
		$array['titulo']=utf8_encode($array['titulo']);
		$array['email_asunto']=utf8_encode($array['email_asunto']);		
	//	print_r($array);
		if(is_array($array) && count($array)>5):
	

	
		 $array['empleador_ID']=$v['ID'];
		 $array['estado']='pendiente';
		$array['exportado']=1;
		
		//$this->db->insert('entradas',$array);
		//$id=$this->db->insert_id();
		//redirect('activar/publimensaje/'.$id);
		else:
		echo 'Ocurrio un problema, intentelo otra vez.';
		endif;
		
		else:
		echo '';
		
		endif;
		
		
		
		
	}
	
	
	
	
	
	
	
	
}