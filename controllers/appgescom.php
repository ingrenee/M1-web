<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appgescom extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	

	
	
	function info()
	{

		$data['content']=	$this->load->view('appgescom/info',NULL,true);
		
			$this->load->view('template',$data);

		}
	
	
	
	function seleccionarperfil ()
	{
		$id=$data['profile'] = $this->redux_auth->profile()->id;
		$this->db->where('usuarios_id',$id);
		$perfil_seleccionado=$this->db->get('view_usuarios_has_perfiles_info')->row();

if(count($perfil_seleccionado)<=0):
		$data['perfiles']=$this->db->get('perfiles');
		$data['content']=	$this->load->view('appgescom/seleccionarperfil',$data,true);
else:
//  print_r($data['perfil_seleccionado']=$perfil_seleccionado->row());
$data['perfil_seleccionado']=$perfil_seleccionado;
		$data['content']=	$this->load->view('appgescom/seleccionar_perfil_mostrar',$data,true);
endif;
		$this->load->view('template',$data);
		
		}
function listar_competencias_perfil()
{
		$id=$data['profile'] = $this->redux_auth->profile()->id;
		$this->db->where('usuarios_id',$id);
		$perfil_seleccionado=$this->db->get('view_usuarios_has_perfiles_info')->row();
		$this->db->where('usuarios_id',$id);
		$data['perfil_competencias']=$perfil_competencias=$this->db->get('view_usuarios_has_competencias_info');
		
		
		
		$data['perfil_seleccionado']=$perfil_seleccionado;
		/* verificamos  si  el usuario ha selecionado algun perfil previamente*/
		if(count($perfil_seleccionado)<=0):
			redirect('appgescom/selecionarperfil/');
		else:
			$this->db->where('perfiles_id',$perfil_seleccionado->perfiles_id);
			$data['competencias']=$competencias=$this->db->get('view_perfiles_has_competencias_info');
			$data['content']=	$this->load->view('appgescom/listar_competencias_listar',$data,true);
		endif;
	
		$this->load->view('template',$data);
	
	}
	
	  function  agregar_competencia()
	  {
 $id = $this->redux_auth->profile()->id;
$_POST['usuarios_id']=$id;
$this->db->insert('usuarios_has_competencias', $_POST);	
//print_r($_POST);
		  redirect('appgescom/listar_competencias_perfil');
		  }
	function  desplegar_competencia()
	{
		
		$competencias_id=(int)$_POST['campo'];
		$data['valor_texto']=$_POST['campo_label'];
		$data['competencias_id']=$competencias_id;
		
		
		
		
		
		$id=$data['profile'] = $this->redux_auth->profile()->id;
		$this->db->where('usuarios_id',$id);
		$perfil_seleccionado=$this->db->get('view_usuarios_has_perfiles_info')->row();
		$data['perfil_seleccionado']=$perfil_seleccionado;
		
		
		$this->db->where('perfiles_id',$perfil_seleccionado->perfiles_id);
		$this->db->where('competencias_id',$competencias_id);

		$data['competencia']=$competencia=$this->db->get('view_perfiles_has_competencias_info')->row();
		
		
		/*
		
		tipo 1 :  campo de texto
		tipo 2 :  lista de opciones
		tipo 3 : radio buttons
		*/
//$data['elemento']='Error en el ingreso de valores';	

if(count($competencia)>0):
		$data['array_valores']=$array_valores=json_decode(str_replace("'",'"',$competencia->valores));
			
		switch($competencia->tipo):
		
		case 2: // crear lista
		$e=$this->crear_select($array_valores,'valor');		
		break;
		
		case 3:
		$e=$this->crear_radio($array_valores,'valor');		
		break;
		
		default:
		$e=array('elemento'=>'','flag'=>false);
		break;		
		
		endswitch;
else:
$e=array('elemento'=>'Error en el ingreso de datos','flag'=>false);			
endif;			
		$data['e']=$e;
		
	
				$this->load->view('appgescom/desplegar_competencia',$data);
		
		 
		
		}
	
	
	
	function crear_select($array,$name)
	{	$e=array();
		$e['flag']=true;	
		if(count($array)>0):
		
		$e['elemento']='<select id="'.$name.'" name="'.$name.'" onchange="copiarselect()"> ';
		foreach($array   as $k => $v):
		$e['elemento'].='<option value="'.$v.'">'.$k.'</option>';
		endforeach;
		$e['elemento'].='</select>';
		
		else:
		$e['flag']=false;
		$e['elemento']='No se han definido valores para esta competencia.';
		endif;
		
		
		return $e;
		
		
		}
		
		function crear_radio($array,$name)
		{
			$e=array();
if(count($array)>0):
$i=0;
$e['elemento']='';
$e['flag']=true;
		foreach($array   as $k => $v):
        $e['elemento'].='<label>  <input type="radio"   onclick="copiarradio(\''.$k.'\')"  name="'.$name.'" value="'.$v.'" id="'.$name.'_'.$i++.'" /> '.$k.'</label>';
		endforeach;
		else:
		$e['elemento']='No se han definido valores para esta competencia';
		$e['flag']=false;
		endif;
  return $e;
			}
		
function borrar_perfil()
{
$id=(int)$this->uri->segment(3);
$usuarios_id=$this->redux_auth->profile()->id;
$this->db->where('usuarios_id', $usuarios_id);
$this->db->where('id', $id);
$this->db->delete('usuarios_has_perfiles'); 
		redirect('appgescom/seleccionarperfil/');
	}

		
		 function agregar_perfil()
		 {
		
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'required|trim');	

		if($this->form_validation->run()==true):
		
$id = $this->redux_auth->profile()->id;

$_POST['usuarios_id']=$id;
$this->db->insert('usuarios_has_perfiles', $_POST);	
	
	
	
		redirect('appgescom/seleccionarperfil/');
		else:
		
//		$this->db->insert('competencias', $_POST);
		redirect('appgescom/seleccionarperfil/');
		
        endif;
			 
			 }
			 
			 
			 
			 
		function load_info_perfil()
		{
			$perfil_id=$_POST['campo'];
			
			 $this->db->where('id',$perfil_id);
		 $data['perfil']=$this->db->get('perfiles')->row();
			
		$this->load->view('appgescom/load_info_perfil',$data);
			
			

			}
		
		
			
			
			function eliminar_competencias()
			{
$id=(int)$this->uri->segment(3);
$usuarios_id=$this->redux_auth->profile()->id;
$this->db->where('usuarios_id', $usuarios_id);
$this->db->where('id', $id);
$this->db->delete('usuarios_has_competencias'); 
		redirect('appgescom/listar_competencias_perfil/');
				
				}

		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */