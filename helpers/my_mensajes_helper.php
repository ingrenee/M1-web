<?PHP

function _mensajes($r=false)
{
	$ci= &get_instance();
	
	$t=$ci->native_session->flashdata('mensaje');
	if($t):
	if(!$r):
	echo '<div class="mensaje_sistema">';
	echo $t;
	echo '</div>';
	else:

	_set_mensajes($t);
	return $t;
	endif;
	
	
	endif;
	}
	
	
function _set_mensajes($str)
{
	$ci= &get_instance();
	
	$ci->native_session->set_flashdata('mensaje',$str);

	}	