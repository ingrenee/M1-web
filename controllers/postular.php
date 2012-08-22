<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Postular extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 
	function index($oferta_id=false)
	{
		$data=array();
		
		
		$a=$this->native_session->userdata('login_candidatos');    
		
		if(!$a):
		
		redirect('postular/registrar');		
		endif;
		
		
		
		
$a=$this->native_session->userdata('login_data_candidatos');

$oferta_id=$this->uri->segment(2);
if(!$oferta_id):
redirect('error');
endif;

$obj=$this->db->limit(1)->select('ID,titulo')->where('ID',$oferta_id)->get('entradas');
if($obj->num_rows()>0):
$entrada=$obj->row_array();
$post=$this->db->where('usuarios_ID',$a['ID'])->where('entradas_ID',$entrada['ID'])->get('postulaciones');

if($post->num_rows()<=0):
$in['entradas_ID']=$entrada['ID'];
$in['usuarios_ID']=$a['ID'];
$in['creado']=ahora();
$this->db->insert('postulaciones',$in);
$s='update entradas set postulaciones=postulaciones+1 where ID="'.$entrada['ID'].'" ';
$this->db->query($s);


redirect('postular/mensaje/'.$entrada['ID']);
/*no ha postulado*/
else:
/*ya postulo*/
redirect('postular/yapostulo');
endif;


else:
redirect('error');
endif;

/*

$data['content']=$this->load->view('postular/index',$data,true);

$data['_titulo_']='Trabajo en tu web , trabajo en tu blog';
$data['_descripcion_']='publica ofertas de empleo en tu website/blog, dale a tus usuarios la oportunidad de encontrar empleo, configura y listo hay empleo';
		$this->load->view('template2',$data);
		*/
		}
		
		function  yapostulo()
		{$data=array();
			$data['content']=$this->load->view('postular/yapostulo',$data,true);



$data['_titulo_']='Trabajo en tu web , trabajo en tu blog';
$data['_descripcion_']='publica ofertas de empleo en tu website/blog, dale a tus usuarios la oportunidad de encontrar empleo, configura y listo hay empleo';
		$this->load->view('template2_candidatos',$data);
			
			}
			
			
			
			
			
				function mensaje($oferta_id=false)
	{
		$data=array();
		
		
		$a=$this->native_session->userdata('login_candidatos');      
		if(!$a):
		
		redirect('postular/registrar');		
		endif;
		
		
		
$a=$this->native_session->userdata('login_data_candidatos');


$oferta_id=$this->uri->segment(3);
if(!$oferta_id):
redirect('error');
endif;

$obj=$this->db->limit(1)->select('ID,titulo,salario,descripcion,creado,vacantes')->where('ID',$oferta_id)->get('entradas');
if($obj->num_rows()>0):
$entrada=$data['info']=$obj->row_array();
$post=$this->db->where('usuarios_ID',$a['ID'])->where('entradas_ID',$entrada['ID'])->get('postulaciones');

if($post->num_rows()<=0):
redirect('postular/'.$entrada['ID']);
endif;

$tmp=$post->row_array();
if(strlen($tmp['mensaje'])>0):
redirect('postular/yapostulo');
endif;


else:
redirect('error');
endif;





$this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required|min_length[80]|max_length[500]');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE):
		$data['content']=$this->load->view('postular/index',$data,true);
		else:
		$up['mensaje']=$this->input->post('mensaje',true);
		$up['modificado']=ahora();
		$this->db->where('usuarios_ID',$a['ID'])->where('entradas_ID',$entrada['ID'])->update('postulaciones',$up);
		_set_mensajes('Su  mensaje fue enviado.');
		redirect('postular/termino');
		endif;













$data['_titulo_']='Trabajo en tu web , trabajo en tu blog';
$data['_descripcion_']='publica ofertas de empleo en tu website/blog, dale a tus usuarios la oportunidad de encontrar empleo, configura y listo hay empleo';
		$this->load->view('template2',$data);

		}
			
			
			
			
			
			function termino()
			{
				
				$data=array();
			$data['content']=$this->load->view('postular/termino',$data,true);



$data['_titulo_']='Trabajo en tu web , trabajo en tu blog';
$data['_descripcion_']='publica ofertas de empleo en tu website/blog, dale a tus usuarios la oportunidad de encontrar empleo, configura y listo hay empleo';
		$this->load->view('template2_candidatos',$data);
				
				
				}
			
			
		
		function registrar()
		{
			$data=array();
			$data['content']=$this->load->view('postular/registrar',$data,true);



$data['_titulo_']='Trabajo en tu web , trabajo en tu blog';
$data['_descripcion_']='publica ofertas de empleo en tu website/blog, dale a tus usuarios la oportunidad de encontrar empleo, configura y listo hay empleo';
		$this->load->view('template2_candidatos',$data);
			
			}
		
	

	
	
}