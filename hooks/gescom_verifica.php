<?PHP if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Gescom_verifica
{
	function verifica()
	{
		$CI =& get_instance();

		$lang = $CI->native_session->userdata('idioma');
		if(empty($lang))
		{
			$lang = "spanish";
			$CI->native_session->set_userdata(array('idioma'=>'spanish'));
		}

		$CI->lang->load('global', $lang);
	}
	
	function  check()
	{$CI =& get_instance();
 		$controlador=$CI->uri->segment(1);
 
 
 if( in_array($controlador,array('appgescom'))):
		if (!$CI->redux_auth->logged_in()):

			
	        /*$data['profile'] = $this->redux_auth->profile();
	        $data['content'] = $this->load->view('profile', $data, true);
	        $this->load->view('template', $data);
			*/


	    
//			echo "no esta logeado";

	        redirect('welcome/login');

	    endif;
endif;		
		}
	
	
}
?>