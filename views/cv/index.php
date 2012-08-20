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
<link href="<?PHP echo base_url('css/cv.css')?>" rel="stylesheet" type="text/css" />


<div class="curriculum">
<div class="fila titulo  titulo02" style="padding-bottom:0px; display:block;  text-align:center;">
  <h2>&nbsp; </h2></div>
<div class="fila  titulo " style="padding-bottom:10px; display:block;  text-align:center;"><h1 style="font-size:17px;"><a href="<?PHP echo site_url('candidatos/informacion_general');?>" class="titulo_cv_01"><?PHP echo $general['nombres'];?></a></h1> 
<h3>
<?PHP
echo $ocupacion_cv;
?>
</h3>
<h4><?PHP echo $ocupacion;?></h4>

</div>
<div class="bloque">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="108" valign="top">
      
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
      <div class="fila"><span>E-mail:</span> <?PHP echo $email;?> </div></td>
    <td width="108" align="center" valign="top"><img src="<?PHP _imagen($ID);?>">
    </td>
  </tr>
</table>


</div>
<div class="bloque">
<div class="item">
<p class="sobremi" >
<?PHP echo $general['descripcion'];?></p>
</div>
</div>

<h2><a href="<?PHP echo site_url('formacion');?>" class="titulo_cv_01">Formaci&oacute;n Acad&eacute;mica</a></h2>



<div class="bloque">


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





<h2><a href="<?PHP echo site_url('experiencia');?>" class="titulo_cv_01">Experiencia laboral</a></h2>




<div class="bloque">


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

<?PHP 

$meses['']='seleccione';
$meses[1]='B&aacute;sico';
$meses[2]='B&aacute;sico - Intermedio';
$meses[3]='Intermedio';
$meses[4]='Intermedio - Avanzado';
$meses[5]='Avanzado';

?>

<h2><a href="<?PHP echo site_url('informatica');?>" class="titulo_cv_01">Inform&aacute;tica</a></h2>
<div class="bloque">

<!--
<?PHP print_r($informatica);?>
-->

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



<h2><a href="<?PHP echo site_url('idioma');?>" class="titulo_cv_01">Idiomas</a></h2>

<div class="bloque">

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
