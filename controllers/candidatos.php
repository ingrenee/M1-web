<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Candidatos extends CI_Controller {





  function  __construct() {

        parent::__construct();  

		$a=$this->native_session->userdata('login_candidatos');      

		if(!$a):

		$this->native_session->flashdata('mensaje','No tiene permisos para entrar en esta seccion.');

		log_message('error', "redireccionando-no session-: ".$_SERVER['REMOTE_ADDR']);

		redirect('login/candidato');

		endif;

    }

	

	/*------------------------------------------------------*/

	function nosuscripcion()

	{

		$info=$this->native_session->userdata('login_data_candidatos');

		

		$op=(int)$this->uri->segment(3);

		if($op==1):

		$this->db->where('ID',$info['ID'])->update('usuarios',array('suscrito'=>1));

		elseif($op==2):

		$this->db->where('ID',$info['ID'])->update('usuarios',array('suscrito'=>0));

		endif;

		

		

		

		$tmp=$this->db->select(' ID, suscrito ')->limit(1)->where('ID',$info['ID'])->get('usuarios')->row_array();

		$data['suscrito']=$tmp['suscrito'];

		

		$data['content']=$this->load->view('candidatos/nosuscripcion',$data,true);

		$this->load->view('template_candidatos.php',$data);

		}

	

	/*----------------------------------------------------------------*/

	function suscripcion()

	{

//		$id=$this->uri->segment(2);

		

		

	//	$data['v']=$this->db->limit(1)->where('ID',$id)->get('entradas')->row_array();

		//$data['empleador']=$this->db->limit(1)->where('ID',$data['v']['empleador_ID'])->get('empleador')->row_array();

		

		

		

		

		

		$info=$this->native_session->userdata('login_data_candidatos');

		

		

		

		$this->load->library('form_validation');



		$this->form_validation->set_rules('tags', 'Palabras de busqueda', 'trim|required');

		

		

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');





		if ($this->form_validation->run() == FALSE):

		

		

		

		

		$data['_titulo_']='Suscripciones trabajo y empleo en tu email';

		$data['_descripcion_']='Suscribete a hay empleo, y te enviaremos ofertas de trabajo  en tu bandeja de entrada / email ';

		

		$tmp=$this->db->select(' ID, tags ')->limit(1)->where('ID',$info['ID'])->get('usuarios')->row_array();

		$data['tags']=$tmp['tags'];

		$data['content']=$this->load->view('candidatos/suscripcion',$data,true);

		$this->load->view('template_candidatos.php',$data);

		else:

		_set_mensajes('Tus palabras de b&uacute;squeda  se modificaron corr&eacute;ctamente.');

		///$insert['email']=$this->input->post('email');

		$insert['tags']=$this->input->post('tags');

		//$insert['nombres']='usuario'.rand(9999,999999);

		//$insert['suscrito']=1;

		//$insert['pass']=rand(1000,9999);

		//$insert['modificado']=ahora();

		

		

		//$obj2=$this->db->where('email',$insert['email'])->get('usuarios');

		

		/* verificamos si el email ya esta registrado*/

		

		//if($obj2->num_rows()<=0):

		

		//$this->db->insert('usuarios',$insert);

		//$id=$this->db->insert_id();

		//else:

		//$tmp=$obj2->result_array();

		

		

		$id=$info['ID'];

		$this->db->where('ID',$id);

		$update['suscrito']=1;

		$update['tags']=$insert['tags'];

		$update['modificado']=ahora();

		$this->db->limit(1)->update('usuarios',$update);

		redirect('candidatos/suscripcion');

		/* No es necesario enviarle una activacion */

		

		//endif;

		

		

		

		

		endif;

		}

	

	

	/*------------------------------------------------------------------*/

	function index()

	{

		$id=$this->uri->segment(2);

		$data=array();
		/* Extraemos  informacion del  usuario*/
$tmp=$data['cv_general_estado']=$this->lib_usuarios->cv_general_estado();
	_set_nivel_cv('general',$tmp);
	
		/**/
		/* Extraemos  informacion del  usuario*/
$tmp=$data['cv_formacion_estado']=$this->lib_usuarios->cv_formacion_estado();
	_set_nivel_cv('formacion',$tmp);
		/**/
	/* Extraemos  informacion del  usuario*/
$tmp=$data['cv_experiencia_estado']=$this->lib_usuarios->cv_experiencia_estado();
		/**/		
	_set_nivel_cv('laboral',$tmp);

unset($tmp);
		$data['content']=$this->load->view('candidatos/index',$data,true);
		$this->load->view('template_candidatos.php',$data);

		

		}



function verificafecha($str)

{

	$tmp=explode('/',$str);

	//$t=checkdate(@(int)$tmp[1],@(int)$tmp[2],@(int)$tmp[0]);

	//var_dump($t);

//	exit();

	if(checkdate(@(int)$tmp[1],@(int)$tmp[0],@(int)$tmp[2])):

	return true;

	else:

	$this->form_validation->set_message('verificafecha', 'Ingrese una fecha valida. (dd/mm/aaaa)');

	return false;

	

	endif;

	}

		

	function informacion_basica()

	{	$data=array();



$tmp=NULL;













$this->load->library('form_validation');







	$this->form_validation->set_rules('nombres', 'nombre completo', 'trim|required');

	$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');



	$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'trim|required|callback_verificafecha');





	

	





	

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		

		/* Extraemos  informacion del  usuario*/

		$info=$this->native_session->userdata('login_data_candidatos');

		$data['usuario']=$this->db->where('ID',$info['ID'])->get('usuarios')->row_array();

		/**/







		if ($this->form_validation->run() == false):

	





		$data['content']=$this->load->view('candidatos/informacion_basica',$data,true);

		$this->load->view('template_candidatos.php',$data);

		else:

		

		$this->native_session->set_flashdata('mensaje','Tus datos de informaci&oacute;n basica fueron actualizados.');

		

		

		$_POST['modificado']=ahora();		

		

		$tmp=explode('/',$_POST['fecha_nacimiento']);

		

		$_POST['fecha_nacimiento']=$tmp[2].'-'.$tmp[1].'-'.$tmp[0];

		

		

		$this->db->where('ID',$info['ID'])->limit(1)->update('usuarios',$_POST);

		$tmp=$this->db->where('ID',$info['ID'])->get('usuarios')->row_array();

		$this->native_session->set_userdata('login_data_candidatos',$tmp);



		

		//$data['content']=$this->load->view('candidatos/informacion_general',$data,true);

		//$this->load->view('template_candidatos.php',$data);

		redirect('candidatos');

		endif;

		}	

		

		

		

		/*------------------------------------*/

		

		

		

		function pass($str)

		{

				$info=$this->native_session->userdata('login_data_candidatos');

		$info=$this->native_session->userdata('login_data_candidatos');

		$tmp=$this->db->limit(1)->where('ID',$info['ID'])->get('usuarios')->row_array();

		$this->form_validation->set_message('pass', 'La contraseña es incorrecta.');

		return ($tmp['pass']==$str);

			}

		

		

function clave()

	{	$data=array();



$tmp=NULL;













$this->load->library('form_validation');







	

		

		/* Extraemos  informacion del  usuario*/

		$info=$this->native_session->userdata('login_data_candidatos');

		$data['usuario']=$this->db->where('ID',$info['ID'])->get('usuarios')->row_array();

		/**/

if(strlen($data['usuario']['pass'])>4):
$this->form_validation->set_rules('pass', 'clave antigua', 'trim|required|callback_pass');
endif;


	$this->form_validation->set_rules('pass2', 'nueva contraseña', 'trim|required');



	$this->form_validation->set_rules('re-pass2', 're-contraseña', 'trim|required|matches[pass2]');



	

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');





		if ($this->form_validation->run() == false):

	





		$data['content']=$this->load->view('candidatos/clave',$data,true);

		$this->load->view('template_candidatos.php',$data);

		else:

		

		//$this->native_session->set_flashdata('mensaje','Tus contraseña fue modificada');

		

		_set_mensajes('Tu clave ha sido modificada correctamente.',true);

		$up['modificado']=ahora();		

		$up['pass']=$this->input->post('pass2');

			

		

		

		$this->db->where('ID',$info['ID'])->limit(1)->update('usuarios',$up);

		$tmp=$this->db->where('ID',$info['ID'])->get('usuarios')->row_array();

		$this->native_session->set_userdata('login_data_candidatos',$tmp);



		

		//$data['content']=$this->load->view('candidatos/informacion_general',$data,true);

		//$this->load->view('template_candidatos.php',$data);

		redirect('candidatos/clave');

		endif;

		}	

		

		/*------------------------------------*/

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

		

			

		



		

	function informacion_general()

	{	$data=array();



$tmp=NULL;

$tmp=$this->db->get('pais');

foreach($tmp->result_array() as $k => $v):

$pais[$v['ID'].':'.$v['nombre']]=$v['nombre'];

endforeach;

$tmp=$this->db->where('tipo','departamento')->get('ubigeo2006');

$departamento['']='Seleccione...';

foreach($tmp->result_array() as $k => $v):

$departamento[$v['coddpto'].':'.$v['nombre']]=$v['nombre'];

endforeach;



$tmp=$this->db->where('tipo','distrito')->where('codprov',151)->get('ubigeo2006');

$distrito['']='Seleccione...';

foreach($tmp->result_array() as $k => $v):

$distrito[$v['coddist'].':'.$v['nombre']]=$v['nombre'];

endforeach;



$tmp=$this->db->where('tipo','distrito')->where('codprov',71)->get('ubigeo2006');

$distrito_callao['']='Seleccione...';

foreach($tmp->result_array() as $k => $v):

$distrito_callao[$v['coddist'].':'.$v['nombre']]=$v['nombre'];

endforeach;











$this->load->library('form_validation');







	$this->form_validation->set_rules('nombres', 'nombre completo', 'required');

	$this->form_validation->set_rules('celular', 'celular', 'required');

	$this->form_validation->set_rules('dni', 'DNI', 'required');



	

	$this->form_validation->set_rules('direccion', 'direccion', 'required');









    $this->form_validation->set_rules('pais', 'pais', 'required');

    $this->form_validation->set_rules('pais2', 'pais', 'required');	



$i_pais=explode(':',$this->input->post('pais'));

$i_pais=$i_pais[0];

$i_departamento=explode(':',$this->input->post('departamento'));

$i_departamento=$i_departamento[0];

$data['i_departamento']=$i_departamento;





$i_distrito=explode(':',$this->input->post('distrito'));

$i_distrito=$i_distrito[0];



	if($i_pais==173):

	

	    $this->form_validation->set_rules('departamento', 'departamento', 'required');

		if($i_departamento==15 || $i_departamento==7):

 

	    $this->form_validation->set_rules('distrito', 'distrito', 'required');

		else:

		$_POST['distrito']='';

		endif;

	else:

	

				$_POST['distrito']='';

				$_POST['departamento']='';

	endif;



	/*----------------------*/

	

	

	

	

	

$i_pais2=explode(':',$this->input->post('pais2'));

$i_pais2=$i_pais2[0];

$i_departamento2=explode(':',$this->input->post('departamento2'));

$i_departamento2=$i_departamento2[0];

$i_distrito2=explode(':',$this->input->post('distrito2'));

$i_distrito2=$i_distrito2[0];

	

	$data['i_departamento2']=$i_departamento2;

	

		if($i_pais2==173):

	

	    $this->form_validation->set_rules('departamento2', 'departamento', 'required');

		if($i_departamento2==15 || $i_departamento2==7)	:

	    $this->form_validation->set_rules('distrito2', 'distrito', 'required');

		else:

		$_POST['distrito2']='';

		endif;

	else:

	

				$_POST['distrito2']='';

				$_POST['departamento2']='';

	endif;

	

	

	

	

	

	

	

	

	

	

	

	

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		

		/* Extraemos  informacion del  usuario*/

		$info=$this->native_session->userdata('login_data_candidatos');

		$data['usuario']=$this->db->where('usuarios_ID',$info['ID'])->get('cv_general')->row_array();

		$data['usuario']['ocupacion']=$info['ocupacion'];

		$data['usuario']['ocupacion_ID']=$info['ocupacion_ID'];

		$data['usuario']['ocupacion_cv']=$info['ocupacion_cv'];

		

		/**/





			$data['pais']=$pais;

			$data['departamento']=$departamento;

			$data['distrito']=$distrito;

			$data['distrito_callao']=$distrito_callao;

		if ($this->form_validation->run() == false):

	





		$data['content']=$this->load->view('candidatos/informacion_general',$data,true);

		$this->load->view('template_candidatos.php',$data);

		else:

		

		/* guardaremos  el ocupaciontext, ocupacion_id, ocupacion_cv*/

		$tmp=NULL;

		$tmp['ocupacion']=$this->input->post('ocupacion');

		$tmp['ocupacion_ID']=$this->input->post('ocupacion_ID');		

		$tmp['ocupacion_cv']=$this->input->post('ocupacion_cv');		



		$this->db->where('ID',$info['ID'])->update('usuarios',$tmp);		

		

		$info['ocupacion']=$tmp['ocupacion'];

		$info['ocupacion_ID']=$tmp['ocupacion_ID'];

		$info['ocupacion_cv']=$tmp['ocupacion_cv'];

		$this->native_session->set_userdata('login_data_candidatos',$info);

		

		unset($_POST['ocupacion'],$_POST['ocupacion_ID'],$_POST['ocupacion_cv']);

//		$this->native_session->set_flashdata('mensaje','');

		_set_mensajes('Tus datos de informaci&oacute;n general fueron actualizados.',1);

		$_POST['usuarios_ID']=$info['ID'];

		$_POST['modificado']=ahora();		

		$this->db->replace('cv_general',$_POST);

		

		//$data['content']=$this->load->view('candidatos/informacion_general',$data,true);

		//$this->load->view('template_candidatos.php',$data);

		redirect('candidatos/informacion_general');

		endif;

		}		

		



}