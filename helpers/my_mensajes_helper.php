<?PHP

function _mensajes($r=false)
{
	$ci= &get_instance();
	
	$t=$ci->native_session->flashdata('mensaje');
	$tipo=$ci->native_session->flashdata('mensaje_tipo');
	if($t):
	if(!$r):
	
	echo '<div class="mensaje_sistema tipo_'.$tipo.'">';
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