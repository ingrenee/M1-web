<?PHP

class Auth extends CI_Controller
{
    public function fb()
    {
		$config['appId']='525008557516332';
		$config['secret']='573207fd2eb3e9f885352823375a02ae';
        $this->load->library('facebook',$config);
		
// Get User ID
$user = $this->facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $this->facebook->api('/me');
	
	/*Vamos a veririfacr si ya esta  registrado en hayempleo.com*/
	if(!$this->es_usuario($user_profile['email'])):
	//echo 'Aun no e susuario';
	$in['nombres']=$user_profile['first_name'];
	$in['apellido_pa']=$user_profile['last_name'];
	$in['apellidos']=$user_profile['last_name'];
	$in['email']=$user_profile['email'];
	$in['auth']='fb';
	$in['fbid']=$user_profile['id'];
	$tmp=$user_profile['birthday'];
	$tmp=explode('/',$tmp);
	$in['fecha_nacimiento']=$tmp[2].'-'.$tmp[0].'-'.$tmp[1];
	
	$in['estado']='activado';
	$in['creado']=date('Y-m-d  H:i:s');
	$in['pass']=rand(1000,9999);
	$this->db->insert('usuarios',$in);


	$this->facebook->api("/".$user_profile['id']."/feed", 'post', array(
				'message'		=> $user_profile['first_name'].', ya es parte de la comunidad laboral de Hayempleo.com| Perú. Únete!.',
				'link'			=> 'http://www.hayempleo.com/auth/fb/',
				'picture'		=> 'http://www.hayempleo.com/images/facebook/inicio/hayempleo_logo.png',
				'name'			=> 'Hayempleo.com',
				'caption'		=> 'Hayempleo.com',
				'description'		=> 'Hayempleo.com, portal de  ofertas de empleo del Perú, es una plataforma para la búsqueda  y publicación de ofertas de empleo gratis.',
				));



	$in['ID']=$this->db->insert_id();
	//$in['ID']=123;
	$this->native_session->set_userdata('login_data_candidatos',$in);
	 $this->native_session->set_userdata('login_candidatos',true);
	endif;
	
	/**/
	
	
	
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $this->facebook->getLogoutUrl();
} else {
  $loginUrl = $this->facebook->getLoginUrl(array('scope'=> 'read_stream, publish_stream, user_birthday, user_location,  user_hometown, email'
		)
		
		
		);
		
		 echo("<script> top.location.href='" . $loginUrl . "'</script>");
		exit();	
}

// This call will always work since we are fetching public data.
//$naitik = $this->facebook->api('/naitik');
		
		
		
		
		
		
		
		
		
		
		
		$this->load->view('facebook/primer_login',$in);
		//exit();
    }

function es_usuario($email=false)
{
	$obj=$this->db->where('email',$email)->get('usuarios');
	
	if($obj->num_rows()<=0)://No esta registrado
	return false;
	else:
	 	log_message('error', "Ingreso-: ".$email);
			 $this->native_session->set_userdata('login_data_candidatos',$obj->row_array());
			 $this->native_session->set_userdata('login_candidatos',true);
			 redirect('candidatos');	
	endif;
	
	
	
	
	}
	
	function test()
	{
		$this->load->view('facebook/primer_login',false);
		}
}