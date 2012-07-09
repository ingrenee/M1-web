<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Idioma extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 function  __construct() {
        parent::__construct();  
		$a=$this->native_session->userdata('login_candidatos');      
		if(!$a):
		$this->native_session->flashdata('mensaje','No tiene permisos para entrar en esta seccion.');
		redirect('login/candidato');
		endif;
    }

	function test()
	{
		 $t='Afrikaans,Albanés,Alemán,Amharico,Arabe,Armenio,Bengali,Bieloruso,Birmanés,Bulgaro,Catalan,Checo,Chino,Coreano,Croata,Danés,Dari,Dzongkha,Escocés,Eslovaco,Esloveniano,Español,Esperanto,Estoniano,Faroese,Farsi,Finlandés,Francés,Gaelico,Galese,Gallego,Griego,Hebreo,Hindi,Holandés,Hungaro,Inglés,Indonesio,Inuktitut(Eskimo),Islandico,Italiano,Japonés,Khmer,Kurdo,Lao,Laponico,Latviano,Lituano,Macedonio,Malayés,Maltés,Nepali,Noruego,Pashto,Polaco,Portugués,Rumano,Ruso,Serbio,Somali,Suahili,Sueco,Tagalog-Filipino,Tajik,Tamil,Tailandés,Tibetano,Tigrinia,Tonganés,Turco,Turkmenistano,Ucraniano,Urdu,Uzbekistano,Vasco,Vietnamés';
		
		 $num=explode(',',$t);
		 
		 foreach($num as $k => $v):
		  echo '("'.$v.'",2),';
		 endforeach;
		 exit();
		}
		
	 
	function index()
	{$data=array();
		
		$this->form_validation->set_rules('aptitudes_nombre', 'Nombre del idioma', 'trim|required');
	//	$this->form_validation->set_rules('nivel', 'Nivel de dominio', 'trim|required');		

						
	 	
	    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	    

	$user=$info=$this->native_session->userdata('login_data_candidatos');
	$this->load->library('lib_aptitudes');
	    if ($this->form_validation->run() == false):
	   
		
			$data['aptitudes']=$this->lib_aptitudes->corta($this->lib_usuarios->obtener_campo('aptitudes'),2,'idioma/borrar/',$info['ID']);
			
		$data['content']=$this->load->view('idioma/index',$data,true);
		$this->load->view('template_candidatos.php',$data);
		else:

		$aptitudes_nombre=$this->input->post('aptitudes_nombre',true);
		
		$tmp=explode(',',$aptitudes_nombre);
		//$aptitudes_nombre=$tmp[0];
		
	


	foreach($tmp as $k => $aptitudes_nombre):
	
	$aptitudes_ID=$this->lib_aptitudes->agregar_si_no_existe($aptitudes_nombre,array('categorias_ID'=>2));
//	$nivel=$this->input->post('nivel');	
	
	$tag='['.$aptitudes_ID.':'.$aptitudes_nombre.':2:2]';

	
	if(strpos($user['aptitudes'],'['.$aptitudes_ID.':')===false):
	
	$user['aptitudes']=$tag.$user['aptitudes'];
	
	$up['aptitudes']=$user['aptitudes'];
	
		$this->native_session->set_userdata('login_data_candidatos',$user);
		$this->lib_usuarios->actualizar($up);
	else:
	
	
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':2:1]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':2:2]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':2:3]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':2:4]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':2:5]';
	$user['aptitudes']=$tag.(str_replace($tags,'',$user['aptitudes']));
	
	endif;
	/*
			
	*/
	
	
	
	endforeach;
	
		
	//	_set_mensajes('Se agrego un nuevo registro de experiencia laboral.');
		 redirect('idioma');
		endif;
	}
	
	
	function borrar()
	{

	 $id=($this->uri->segment(3));
		$user=$info=$this->native_session->userdata('login_data_candidatos');
		
//$user['aptitudes']=(str_replace('['.$id.']','',$user['aptitudes']));
	
	
	$user['aptitudes']=$up['aptitudes']=_borrar_array($user['aptitudes'],$id);
	
		$this->native_session->set_userdata('login_data_candidatos',$user);
		$this->lib_usuarios->actualizar($up);
		
		redirect('idioma');
		
		}
}