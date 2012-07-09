<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Hayempleo extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 
	function about()
	{
		$data=array();
$data['content']=$this->load->view('hayempleo/about',$data,true);
		$this->load->view('template2',$data);
		}
		
		function tu_bolsa_de_trabajo()
		{
			$data=array();
$data['content']=$this->load->view('hayempleo/tu_bolsa_de_trabajo',$data,true);
		$this->load->view('template2',$data);
		
			}
		
			function b01()
	{
		$id=$this->uri->segment(3);
		$data=array();
$data['content']=$this->load->view('hayempleo/b01',$data,true);
		
		$data['content']=str_replace('{email}',$id,$data['content']);
		$this->load->view('template_solo',$data);
		}
	function contacto()
	{
		$data=array();
		
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('asunto', 'asunto', 'trim|required');
		$this->form_validation->set_rules('sugerencia', 'mensaje', 'trim|required');		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


		if ($this->form_validation->run() == FALSE):
		$data['content']=$this->load->view('hayempleo/contacto',$data,true);
		$this->load->view('template2',$data);
		else:
		$_POST['creado']=ahora();
		$this->db->insert('feedback',$_POST);
		_set_mensajes('Su mensaje fue enviado. Gracias por comunicarse');
		redirect('hayempleo/contacto');
		endif;
		}
		
	

	
	
}