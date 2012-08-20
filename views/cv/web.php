<?PHP function temp_cortar($t)
{
	$h=explode('-',$t);
	return $h[1].'/'.$h[0];
	}
	
	function tmp($t)
{
	$h=explode(':',$t);
	return (isset($h[1]))?$h[1]:false;
	}
	
	
	?> 
    
<div id="cv_superior">

<div class="cv_pagina"> 
    <div class="cv_nombres">
    <h1><?PHP echo $general['nombres'];?></h1>
    </div>
<div class="cv_ocupacion">
<h2><?PHP echo $ocupacion_cv;?></h2>
    <h3><?PHP echo $ocupacion;?></h3>
</div>

    <div class="cv_descripcion">
    <?PHP echo $general['descripcion'];?>
    </div>

    <div class="cv_foto"><img src="<?PHP _imagen($ID);?>">
    </div>
</div>

</div>

<div id="cv_general" class="cv_seccion">
<div class="cv_pagina">

<div class="cv_encabezado general_titulo">
<h2>Información general
<div class="cv_titulo_exterior"></div>
</h2>
</div>

<div class="cv_contenido general_contenido">

  <div class="fila"><span class="enc nacimiento">Lugar de nacimiento:</span> <?PHP echo (tmp($general['pais']));?> - <?PHP echo tmp($general['departamento']);?>
          <?PHP 
if(!empty($general['distrito'])):
$h=tmp($general['distrito']);
 if(strlen($h)>0):
  echo ', '.$h;
 endif;
 endif;
 ?>
        </div>
        <div class="fila"><span class="enc residencia">Lugar de residencia:</span> <?PHP echo tmp($general['pais2']);?> - <?PHP echo tmp($general['departamento2']);?>
          <?PHP $h=tmp($general['distrito2']);
 if(strlen($h)>0):
  echo ', '.$h;
 endif;
 ?>
        </div>
      <div class="fila"><span class="enc direccion">Direcci&oacute;n:</span> <?PHP echo $general['direccion'];?> </div><div class="fila"><span class="enc identificacion">DNI:</span> <?PHP echo $general['dni'];?> </div>
      <div class="fila"><span class="enc celular">C&eacute;lular:</span> <?PHP echo $general['celular'];?> </div>
      <div class="fila"><span class="enc telefono">T&eacute;lefono:</span> <?PHP echo $general['telefono'];?> </div>
      <div class="fila"><span class="enc email">E-mail:</span> <?PHP echo $email;?> </div>
      
      </div>
</div>
</div>
    
    
    


<div id="cv_academico" class="cv_seccion">
<div class="cv_pagina">

<div class="cv_encabezado academico_titulo">
<h2>Formaci&oacute;n Acad&eacute;mica<div class="cv_titulo_exterior"></div></h2>
</div>


<div class="cv_contenido academico_contenido">
  
  
  <?PHP  if($formacion->num_rows()>0):?>
  <?PHP foreach($formacion->result_array() as $k => $v):?>
  <div class="item pos_<?PHP echo $k;?>">
  <div class="fila centro"><span class="enc">Centro de estudios:</span> <span class="cont">
  <?PHP  echo $v['cv_centros_nombre'];?></span></div>
  <div class="fila carrera"><span class="enc">Carrera:</span> 
  <span class="cont"><?PHP  echo $v['carrera'];?></span></div>
  <div class="fila fechas">
    <span class="enc desde">Desde:</span>  <?PHP echo temp_cortar($v['fecha_a']);?> | 
    <span class="enc hasta">Hasta:</span>  <?PHP echo temp_cortar($v['fecha_b']);?>
  </div>
    
    
  </div>
  <?PHP endforeach;?>
  <?PHP else:?>
  <div  class="fila">
    No has  ingresado ninguna informaci&oacute;n sobre tu formaci&oacute;n acad&eacute;mica.
  </div>
  <?PHP endif;?>
  
  
  
</div>


</div>
</div>

<!-- -->


<div id="cv_laboral" class="cv_seccion">
<div class="cv_pagina">
<div class="cv_encabezado laboral_titulo">

<h2>Experiencia laboral<div class="cv_titulo_exterior"></div></h2>
</div>

<div class="cv_contenido laboral_contenido">
  
  
  <?PHP  if($formacion->num_rows()>0):?>
  <?PHP foreach($experiencia->result_array() as $k => $v):?>
  <div class="item pos_<?PHP echo $k;?>">
  <div class="fila empresa"><span class="enc ">Empresa: </span> <span class="cont"><?PHP  echo $v['empresas_nombre'];?></span></div>
  <div class="fila cargo"><span class="enc ">Cargo:</span> <span class="cont"><?PHP  echo $v['cargo'];?></span></div>
  <div class="fila funciones"><p>
  <span class="enc">Funciones:</span> <?PHP echo $v['funciones'];?></p>
    
  </div>
  <div class="fila fechas">
    <span class="enc desde">Desde:</span> <?PHP echo temp_cortar($v['fecha_a']);?> | 
    <span class="enc hasta">Hasta:</span> <?PHP echo temp_cortar($v['fecha_b']);?>
  </div>
    
    
  </div>
  <?PHP endforeach;?>
  <?PHP else:?>
  <div  class="fila">
    No has  ingresado ninguna informaci&oacute;n sobre tu formaci&oacute;n acad&eacute;mica.
  </div>
  <?PHP endif;?>
  
  
  
</div>




</div>
</div>















<?PHP 

$meses['']='seleccione';
$meses[1]='B&aacute;sico';
$meses[2]='B&aacute;sico - Intermedio';
$meses[3]='Intermedio';
$meses[4]='Intermedio - Avanzado';
$meses[5]='Avanzado';

?>
<div id="cv_informatica" class="cv_seccion">
<div class="cv_pagina">
<div class="cv_encabezado informatico_titulo">
<h2>Inform&aacute;tica<div class="cv_titulo_exterior"></div></h2>
</div>


<div class="cv_contenido informatica_contenido">
  

  <?PHP

if($informatica):
krsort($informatica);
$i=1;
foreach($informatica as $k => $v):
?>
  
  <?PHP
foreach($v as $k2 => $v2):
?>
  <div class="item pos_<?PHP echo $k.$k2;?>" value="<?PHP echo $i++;?>">
    <span class="enc mayus"><?PHP echo str_replace($meses[$k],'',strip_tags($v2));?></span>
    <span class="niveles "> 
    <span  class="nivel nivel_<?PHP echo $k;?>"></span>
     <span class="cont">(<?PHP echo $meses[$k]; ?>)</span>
     </span>
  </div>
  <?PHP
endforeach;
?>
  
  
  <?PHP
endforeach;
else:
?>
  <div  class="fila">
    No has  ingresado ninguna informaci&oacute;n sobre informatica.
  </div>
  <?PHP
endif;
?>
  
  
  
</div>





</div>
</div>




<!-- -->

<div id="cv_idiomas" class="cv_seccion">
<div class="cv_pagina">
<div class="cv_encabezado idiomas_titulo">
<h2>Idiomas<div class="cv_titulo_exterior"></div></h2>
</div>
<div class="cv_contenido idiomas_contenido">

  <?PHP
if($idiomas):

krsort($idiomas);
$i=1;
foreach($idiomas as $k => $v):
?>
  
  <?PHP
foreach($v as $k2 => $v2):
?>
  <div class="item" value="<?PHP echo $i++;?>">
  <span class="enc mayus"><?PHP echo str_replace($meses[$k],'',strip_tags($v2));?></span> <span class="niveles nivel_<?PHP echo $k;?>">(<?PHP echo $meses[$k]; ?>)</span>
  </div>
  <?PHP
endforeach;
?>
  
  
  <?PHP
endforeach;
else:
?>
<div  class="fila">
No has  ingresado ninguna informaci&oacute;n sobre tus idiomas.
</div>
<?PHP
endif;
?>


</div>

</div>
</div>