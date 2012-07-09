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

    <div class="cv_descripcion">
    <?PHP echo $general['descripcion'];?>
    </div>

    <div class="cv_foto"><img src="<?PHP _imagen($ID);?>">
    </div>
</div>

</div>

<div id="cv_general">
<div class="cv_pagina">

<div class="cv_encabezado general_titulo">
<h2>Información general</h2>
</div>

<div class="cv_contenido general_contenido">

  <div class="fila"><span>Lugar de nacimiento:</span> <?PHP echo (tmp($general['pais']));?> - <?PHP echo tmp($general['departamento']);?>
          <?PHP 
if(!empty($general['distrito'])):
$h=tmp($general['distrito']);
 if(strlen($h)>0):
  echo ', '.$h;
 endif;
 endif;
 ?>
        </div>
        <div class="fila"><span>Lugar de residencia:</span> <?PHP echo tmp($general['pais2']);?> - <?PHP echo tmp($general['departamento2']);?>
          <?PHP $h=tmp($general['distrito2']);
 if(strlen($h)>0):
  echo ', '.$h;
 endif;
 ?>
        </div>
      <div class="fila"><span>Direcci&oacute;n:</span> <?PHP echo $general['direccion'];?> </div><div class="fila"><span>DNI:</span> <?PHP echo $general['dni'];?> </div>
      <div class="fila"><span>C&eacute;lular:</span> <?PHP echo $general['celular'];?> </div>
      <div class="fila"><span>T&eacute;lefono:</span> <?PHP echo $general['telefono'];?> </div>
      <div class="fila"><span>E-mail:</span> <?PHP echo $email;?> </div>
      
      </div>
</div>
</div>
    
    
    


<div class="cv_academico">
<div class="cv_pagina">

<div class="cv_encabezado academico_titulo">
<h2>Formaci&oacute;n Acad&eacute;mica</h2>
</div>


<div class="cv_contenido academico_contenido">
  
  
  <?PHP  if($formacion->num_rows()>0):?>
  <?PHP foreach($formacion->result_array() as $k => $v):?>
  <div class="item">
  <div class="fila"><span>Centro de estudios:</span> <?PHP  echo $v['cv_centros_nombre'];?></div>
  <div class="fila"><span>Carrera:</span> <?PHP  echo $v['carrera'];?></div>
  <div class="fila">
    <span>Desde:</span>  <?PHP echo temp_cortar($v['fecha_a']);?> | 
    <span>Hasta:</span>  <?PHP echo temp_cortar($v['fecha_b']);?>
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


<div class="cv_laboral">
<div class="cv_pagina">
<div class="cv_encabezado laboral_titulo">

<h2>Experiencia laboral</h2>
</div>

<div class="cv_contenido laboral_contenido">
  
  
  <?PHP  if($formacion->num_rows()>0):?>
  <?PHP foreach($experiencia->result_array() as $k => $v):?>
  <div class="item">
  <div class="fila"><span>Empresa: </span> <?PHP  echo $v['empresas_nombre'];?></div>
  <div class="fila"><span>Cargo:</span> <?PHP  echo $v['cargo'];?></div>
  <div class="fila"><p>
  <span>FUNCIONES:</span> <?PHP echo $v['funciones'];?></p>
    
  </div>
  <div class="fila">
    <span>Desde:</span> <?PHP echo temp_cortar($v['fecha_a']);?> | 
    <span>Hasta:</span> <?PHP echo temp_cortar($v['fecha_b']);?>
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
<div class="cv_informatica">
<div class="cv_pagina">
<div class="cv_encabezado informatico_titulo">
<h2>Inform&aacute;tica</h2>
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
  <div class="item" value="<?PHP echo $i++;?>">
    <span class="mayus"><?PHP echo strip_tags($v2);?></span> (<?PHP echo $meses[$k]; ?>)
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

<div class="cv_idiomas">
<div class="cv_pagina">
<div class="cv_encabezado idiomas_titulo">
<h2>Idiomas</h2>
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
  <span class="mayus"><?PHP echo strip_tags($v2);?></span> (<?PHP echo $meses[$k]; ?>)
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