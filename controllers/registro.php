<?php

/*

 * ----------------------------------------------------------------------------

 * "THE BEER-WARE LICENSE" :

 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you

 * can do whatever you want with this stuff. If we meet some day, and you think

 * this stuff is worth it, you can buy me a beer in return Mathew Davies

 * ----------------------------------------------------------------------------

 */

class Registro extends CI_Controller {



	/**

	 * index

	 *

	 * @return void

	 * @author Mathew

	 **/





	 function email($str)

	 {

		 $this->form_validation->set_message('email', 'El email ya esta en uso.');

		 return !(bool)$this->db->where('email_contacto',$str)->get('empleador')->num_rows();



		 }



	 function email_contacto($str)

	 {



		 $this->form_validation->set_message('email_contacto', 'El email no existe.');

		 return (bool)$this->db->where('email_contacto',$str)->get('empleador')->num_rows();



		 }



		 function exito()

		 {

			 $email=$this->uri->segment(3);

			 $data=array();

			 $data['email']=$email;



$data['content']=$this->load->view('registro/exito',$data,true);

$this->load->view('template2',$data);



			 }

			 

/*-----------------------------------------*/			 

function registrar()

{

	$data=array();

	$tmp=$this->db->get('rubros');



foreach($tmp->result_array() as $k => $v):

$rubros[$v['ID']]=$v['rubro'];

endforeach;

$tmp=NULL;

$tmp=$this->db->get('pais');

foreach($tmp->result_array() as $k => $v):

$pais[$v['ID']]=$v['nombre'];

endforeach;

$tmp=$this->db->where('tipo','departamento')->get('ubigeo2006');

$departamento['']='Seleccione...';

foreach($tmp->result_array() as $k => $v):

$departamento[$v['coddpto']]=$v['nombre'];

endforeach;



$tmp=$this->db->where('tipo','distrito')->where('codprov',151)->get('ubigeo2006');

$distrito['']='Seleccione...';

foreach($tmp->result_array() as $k => $v):

$distrito[$v['coddist']]=$v['nombre'];

endforeach;



$tmp=$this->db->where('tipo','distrito')->where('codprov',71)->get('ubigeo2006');

$distrito_callao['']='Seleccione...';

foreach($tmp->result_array() as $k => $v):

$distrito_callao[$v['coddist']]=$v['nombre'];

endforeach;











$this->load->library('form_validation');







	$this->form_validation->set_rules('nombre', 'nombre de la empresa', 'required');

	$this->form_validation->set_rules('ruc', 'ruc', 'trim|required|numeric');

	$this->form_validation->set_rules('email_contacto', 'email', 'trim|required|valid_email|callback_email');

	$this->form_validation->set_rules('pass', 'password', 'trim|required|matches[re]');

	$this->form_validation->set_rules('re', 'Repetir password', 'required');

	$this->form_validation->set_rules('rubro', 'rubro', 'required');

	$this->form_validation->set_rules('direccion', 'direccion', 'required');



	$this->form_validation->set_rules('encargado', 'nombre de contacto', 'required');

    $this->form_validation->set_rules('cargo', 'cargo en la empresa', 'required');



    $this->form_validation->set_rules('pais', 'pais', 'required|numeric');



	if($this->input->post('pais')==173)

	{

	    $this->form_validation->set_rules('departamento', 'departamento', 'required|numeric');

		if((int)$this->input->post('departamento')==15 || (int)$this->input->post('departamento')==7)	:

	    $this->form_validation->set_rules('distrito', 'distrito', 'required|numeric');

		else:

		$_POST['distrito']='';

		endif;

		}else

		{

					$_POST['distrito']='';

					$_POST['departamento']='';

			}









		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		$data['content']=array();



		if ($this->form_validation->run() == true):



	$_POST['creado']=ahora();

	unset($_POST['re']);



	$this->db->insert('empleador',$_POST);
	$_POST['ID']=$this->db->insert_id();

		$this->email_registro($_POST['email_contacto'],$_POST);


		/*Si la empresa no existe la creamos*/
		
		$empresas=$this->db->where('ruc',$_POST['ruc'])->get('empresas');
		if($empresas->num_rows()>0):
		//$data['info']=$empresas->row_array();
		else:
		$up['ruc']=$_POST['ruc'];
		$up['nombre']=$_POST['nombre'];
		$up['creado']=ahora();
		$up['rubro']=$_POST['rubro'];
		//$up['website']=$_POST['website'];
	//	$up['descripcion']=$_POST['descripcion'];
		$up['direccion']=$_POST['direccion'];
		$up['pais']=$_POST['pais'];				
		$up['departamento']=$_POST['departamento'];
		$up['distrito']=$_POST['distrito'];	
		
//		$this->empresas->agregar($up);	
		$this->db->insert('empresas',$up);	
		//$data['info']=$up;
		endif;
		
		/**/


	redirect('registro/exito');

		else:

$data['rubros']=$rubros;

$data['pais']=$pais;

$data['departamento']=$departamento;

$data['distrito']=$distrito;

$data['distrito_callao']=$distrito_callao;

$wid['filas']=$this->lib_empleador->obtener(10);

$data['widgets']=$this->load->view('widgets/empleadores_recientes',$wid,true);

$data['content']=$this->load->view('registro/registrar',$data,true);

$this->load->view('template2',$data);


		endif;



	}









/*-----------------------------------------------------------------------*/

 function email_3($str)



	 {



		 $t=$this->db->select('email_contacto,ID,estado')->where('email_contacto',$str)->limit(1)->get('empleador');

		 if($t->num_rows()):



				$h=$t->row_array();



				//print_r($h);



				if($h['estado']=='activo' ):

				$this->form_validation->set_message('email_3', 'Tu cuenta ya esta activada.');

				return false;

				elseif($h['estado']=='pendiente'):

				return true;



				else:



				



				$this->form_validation->set_message('email_3', 'Tu cuenta parece estar bloqueada.');



				return false;



				



				endif;



					 



		 else:



 		 $this->form_validation->set_message('email_3', 'El email no existe.');



		 return false;



		 endif;



		// exit();







		 }







/*-----------------------------------------------------------------------*/





/*--------------------------------------------------------------------------------*/



	

function reenvio_activacion()

{

	$data=array();

$email=$this->native_session->userdata('email_reenvio');



$data['email']=$email;



$this->load->library('form_validation');

$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_3');





$this->form_validation->set_error_delimiters('<span class="error">', '</span>');



		if ($this->form_validation->run() == true):

		

		$p=$this->db->where('email_contacto',$_POST['email'])->get('empleador')->row_array();

		

		

		$this->email_registro($_POST['email'],$p,'Reenvio de confirmacion de registro: Empresa');

		$this->native_session->set_flashdata('email_info',$_POST['email']);

		redirect('registro/exito');

		else:

		$data['content']=$this->load->view('registro/reenviar_activacion',$data,true);



$this->load->view('template2',$data);

		

		endif;

	

	}

	





/*-------------------------------------------------------------------------------*/











































function email_registro($t='ing.renee.sis@gmail.com',$p=array('encargado'=>'renee morales','ID'=>9999),$s='Confirmacion de registro: Empresas')

{

$this->email->from('administrador@hayempleo.com', 'HayEmpleo.com');

$this->email->to($t);

$this->email->bcc('ing.renee.sis@gmail.com');

$this->email->subject($s);

$m=$this->open($p);

$this->email->message($m);

$this->email->send();

}







function open($t,$tpl='./templates/registro.html')

{

	$tmp=file_get_contents($tpl);



	$tmp=str_replace('images/','http://hayempleo.com/templates/images/',$tmp);





	$tmp=str_replace('{contacto}',$t['encargado'],$tmp);

	$tmp=str_replace('{id}',md5($t['ID']),$tmp);

	$tmp=str_replace('{numero}',($t['ID']),$tmp);





	 return $tmp;



	}



function open2($t,$tpl='./templates/recuperar.html')

{

	$tmp=file_get_contents($tpl);



	$tmp=str_replace('images/','http://hayempleo.com/templates/images/',$tmp);





	$tmp=str_replace('{clave}',$t['pass'],$tmp);







	 return $tmp;



	}





function activar()

{$id=$this->uri->segment(3);



	$t=$this->db->where('md5(ID)',$id)->get('empleador');



	if($t->num_rows()>0):
	
	$info=$t->row_array();
	if($info['estado']=='pendiente'):
	$this->db->where('md5(ID)',$id);

	$this->db->update('empleador',array('estado'=>'activo'));
$data['content']=$this->load->view('registro/activar',NULL,true);
	elseif($info['estado']=='bloqueado'):
	$data['detalles']=$info['detalles'];
	
	$data['content']=$this->load->view('registro/bloqueado',$data,true);
	else:
	$data['content']=$this->load->view('registro/activar',NULL,true);
	endif;
	


	

	else:

	$data['content']=$this->load->view('registro/activar_error',NULL,true);

	endif;

		$this->load->view('template2',$data);

	}

/*---------------------------------------------------------*/

	function recuperar()

	{



$this->load->library('form_validation');



	$data=array();



	$this->form_validation->set_rules('email_contacto', 'Email', 'trim|required|callback_email_contacto');











		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');





		if ($this->form_validation->run() == false):

			$data['content']=$this->load->view('registro/recuperar',$data,true);

		$this->load->view('template2',$data);

		else:

$email_contacto=$this->input->post('email_contacto');



$tmp=$this->db->limit(1)->select('ID,pass,email_contacto')->where('email_contacto',$email_contacto)->get('empleador')->row_array();



$datos['pass']=$tmp['pass'];//rand(1000,9999);



//$datos['pass']=rand(1000,9999);

$w['email_contacto']=$email_contacto;

$this->lib_empleador->actualizar($w,$datos);







$this->email->from('administrador@hayempleo.com', 'HayEmpleo.com');

$this->email->to($email_contacto);

$this->email->bcc('renee17_@hotmail.com');

$this->email->subject('Nueva clave de acceso.');

$m=$this->open2($datos);

$this->email->message($m);

$this->email->send();







redirect('registro/recuperar_mensaje');



endif;

	

		}





function recuperar_mensaje()

{		$data=array();

		$data['content']=$this->load->view('registro/recuperar_ok',$data,true);	

		$this->load->view('template2',$data);		

	}

}