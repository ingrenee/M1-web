<?PHP  

	function desaplana($str)

	{

		$arr=explode('--',$str);

		

$arr[0]=str_replace('-','',$arr[0]);

$k=count($arr)-1;

$arr[$k]=str_replace('-','',$arr[$k]);

return $arr;

		

		}

function _hoy()
{
	
	$dia=date('d');$mes=date('n');$ano=date('Y'); 
$meses=array('','Enero','Febrero', 
'Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 
'Noviembre','Diciembre'); 
return 'hoy es '.$dia.' de '.$meses[$mes].' de '.$ano; 
	}
function _vista($t)
{
	$ci =& get_instance();
 $dominio= $ci->native_session->userdata('dominio');	
 
 $dominio=str_replace('127.0.0.1','',$dominio);
 $dominio=str_replace('.hayempleo.com','',$dominio);
 $dominio=str_replace('www.','',$dominio);
 
 
	return $dominio.'/'.$t;
	}


function _borrar_array($t,$id)
{
	///echo $t;
	$tmp=explode('][',$t);
	//print_r($tmp);
	 $tmp[0]=str_replace('[','',$tmp[0]);
	 $tmp[count($tmp)-1]=str_replace(']','',$tmp[count($tmp)-1]);
	 
	$cad='';
	foreach($tmp as $k => $v):
	 $tmp2=explode(':',$v);
	 if($id!=$tmp2[0]):
	 //$ar[(int)$tmp2[0]]=$v;
	 $cad.='['.$v.']';
	 endif;
	endforeach;
//	unset($ar[$id]);

	return $cad;
	}

function _imagen($id)

{

	 $imagen=('./usuarios/fotos/usuario_'.md5($id).'.jpg');

	 if(file_exists($imagen)):

	 echo base_url('./usuarios/fotos/usuario_'.md5($id).'.jpg?'.rand(9,99999));

	 else:

//	 echo $imagen;

	 echo base_url('./usuarios/fotos/hayempleo.png');

	 endif;

	}

function _salario($tipo,$texto)

{

	if($tipo==1): echo 'A tratar.';

    elseif($tipo==2): echo 'Seg&uacute;n calificaci&oacute;n.';

	else:

	if($texto=='seg?n calificaci?n'):
	echo 'Seg&uacute;n calificaci&oacute;n.';
	else:
	echo $texto;	
	endif;


	endif;

	}

function _extrae_lugar($t,$txt=false)

{

	if(isset($t) && strlen($t)>2):

	$tmp=explode(':',$t);

	echo @$tmp[1].' '.$txt;

	else:

	echo '&nbsp;';

	endif;

	}

function _etiqueta_titulo($var='La web de empleos, oportunidad laboral, trabajo, bolsa de trabajo')

{

	 echo $var.' | '.'Hay Empleo';

	}

	

	

function _etiqueta_descripcion($var='La web de empleos, oportunidad laboral, trabajo, bolsa de trabajo')

{

	 echo str_replace('  ',' ',eregi_replace("[\n|\r|\n\r]", ' ',str_replace('&nbsp;',' ',trim(strip_tags($var)))));

	}	

function online()

{



$ci =& get_instance();



 $t= $ci->native_session->userdata('login_datos');	

 return (bool)($t);

	}

	

	

function online_candidato()

{



$ci =& get_instance();



 $t= $ci->native_session->userdata('login_data_candidatos');	



 return (bool)($t);

	}	



function _moneda($t)

{

	switch($t):

	case 'soles':

	return 'S/.';

	break;

	case 'dolares':

	return '$/.';

	break;	

	endswitch;

	

	}

 function historial_busquedas($q=false,$opciones=array())

{



$ci =& get_instance();



if($q):

$q=strip_tags($q);

$q=str_replace(' ','%',$q);

$q=strtolower($q);



$q=str_replace('-','%',$q);

$SESSION=$ci->native_session->userdata('historial_busquedas');

$SESSION['historial_busquedas'][$q]=$opciones;
/*echo "<pre>";
print_r($SESSION);
echo "</pre>";
*/
if(count($SESSION['historial_busquedas'])>5):

//array_splice($SESSION['historial_busquedas'],-4,1);

list($k,$v)=each(reset($SESSION));
 //echo "[$k]";
unset($SESSION['historial_busquedas'][$k]);
endif;
/*echo "<pre>";
print_r($SESSION);
echo "</pre>";*/
$ci->native_session->set_userdata('historial_busquedas',$SESSION);	

else:



return $ci->native_session->userdata('historial_busquedas');

endif;

}	







 function obtener_historial($q=false)

{



$ci =& get_instance();





$q=strip_tags($q);

$q=str_replace(' ','%',$q);

$q=str_replace('-','%',$q);

$q=strtolower($q);

$SESSION=$ci->native_session->userdata('historial_busquedas');

// echo "<pre>";

 //print_r($SESSION);

  //echo "</pre>";

if(isset($SESSION['historial_busquedas'][$q])):
return $SESSION['historial_busquedas'][$q];
else:
return false;
endif;





}	

	



	

function _cortar($texto)

{

	$MaxLENGTH=200;

	

	$texto=strip_tags($texto);

	return substr($texto,0,strrpos(substr($texto,0,$MaxLENGTH)," "));

	

	}



function _e($t=false,$c=false)

{

	 

	 

	

	if(isset($t[$c])):

	 return $t[$c];

	 else:

	 return set_value($c);

	endif;

	}

	

	

function _ep($t=false,$c=false)

{

	 



	if(isset($_POST[$c]) && strlen($_POST[$c])>0):





	return $_POST[$c];

	else:



	if(isset($t[$c])):

	 return $t[$c];

	 else:

	 return set_value($c);

	endif;



	endif;

	}	

function ahora()

{

	return date('Y-m-d H:i:s');

	}
		
		function  limpia($cadena)
		{
			$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
$cadena = strtr($cadena, $tofind, $replac);

$cadena = str_replace(
        array("\\", "¨", "º", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "<", ";", ",", ":",
             ".html", "."),
        '',
        $cadena
    );


return $cadena;
			}