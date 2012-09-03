<?PHP
function _set_nivel_cv($k,$v)
{$ci= &get_instance();
	$general=$ci->native_session->set_userdata('cv_inf_'.$k,$v);
	}

function _nivel_cv()
{	$total=0;
$ci= &get_instance();
	
	$general=$ci->native_session->userdata('cv_inf_general');
	$formacion=$ci->native_session->userdata('cv_inf_formacion');
	$laboral=$ci->native_session->userdata('cv_inf_laboral');
	$informatica=$ci->native_session->userdata('cv_inf_informatica');
	$idiomas=$ci->native_session->userdata('cv_inf_idiomas');
	
	if($general):
	$total+=20;
	endif;
	
	if($formacion):
	$total+=20;
	endif;
	
	if($laboral):
	$total+=20;
	endif;
	
	if($informatica):
	$total+=20;
	endif;
	
	if($idiomas):
	$total+=20;
	endif;
	
	return $total;
	}
function _mensajes($r=false)
{
	$ci= &get_instance();
	
	$t=$ci->native_session->flashdata('mensaje');
	$tipo=$ci->native_session->flashdata('mensaje_tipo');
	if($t):
	if(!$r):
	if(($tipo!=0) || ($tipo===true)):
	echo '<div class="emensajes tipo_mensaje_e'.$tipo.'  ">';
	else:
		echo '<div class="emensajes  mensaje_sistema">';
	endif;
	echo $t;
	echo '</div>';
	else:

	_set_mensajes($t);
	return $t;
	endif;
	
	
	endif;
	}
	
	
function _set_mensajes($str,$tipo=0)
{
	$ci= &get_instance();
	
	$ci->native_session->set_flashdata('mensaje',$str);
	$ci->native_session->set_flashdata('mensaje_tipo',$tipo);

	}	