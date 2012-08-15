<div class="formulario">
<div class="bloque_config">
<h2 class="blanco cv_titulo_01">Configuracion de privacidad</h2>
 En esa seccion puede definir  lo siguiente:
 
<?PHP
echo _mensajes();
?>
 <h3>1. Quienes pueden ver tu curriculum</h3>
 <form method="post" name="form">

<div class="fila">
  <label class="">
<input type="radio" name="privacidad" id="privacidad1" value="1" <?PHP 

if(isset($_POST['privacidad'])):
echo set_radio('privacidad','1');
elseif(isset($config['op1']) && $config['op1']==1):
 echo "checked=checked";
endif;
?> />
Todos, mi curiculum es publico: Si marcas esta opcion tu curriculum podra ser visto por cualquier usuario ya se  una empresa u otro candidato.</label> </div>
 <div class="fila"><label> 
   <input type="radio" name="privacidad" id="privacidad2" value="2" <?PHP 
   
   if(isset($_POST['privacidad'])):
echo set_radio('privacidad','2');
elseif(isset($config['op1']) && $config['op1']=='2'):
 echo "checked=checked";
endif;
   
   
   ?> />
Solo las empresas: Si marcas esta opcion solo las empresas  podran ver tu curriculum, para ello les pediremos que inicien sesion. </label></div>
 <div class="fila"><label> 
   <input type="radio" name="privacidad" id="privacidad3" value="3"  <?PHP 
   
   if(isset($_POST['privacidad'])):
echo set_radio('privacidad','3');
elseif(isset($config['op1']) && $config['op1']==3):
 echo "checked=checked";
endif;
   
   ?>/>
Todos los que tengan una clave que yo les proporcionare: Si marcas esta clave tu curriculum solo sera visible para aquellas personas a quienes les has dado una clave secreta. </label>
 </div>

 <div class="fila">sss<?PHP echo form_error('privacidad');?></div>
<?php echo validation_errors(); ?>
 <h3>2. Sobre la vista previa de mi curriculum</h3>
<?PHP
$op2=false;
 if(isset($_POST['b2'])):
 $op2=explode(',',$_POST['b2']);
 else:
 $op2=explode(',',$config['op2']);
 endif;
 foreach($op2 as $k=>$v):
 ${'op2'.$v}=true;

 endforeach;

?>
 <p>La vista previa de tu curriculum es la informacion basica sobre tu curriculum a la que todos pueden acceder.</p>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1" 
 <?PHP
if(isset($op21)):
 echo "checked=checked";
endif;
 ?>
 
 > Pueden ver mi foto</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="2"
 <?PHP
if(isset($op22)):
 echo "checked=checked";
endif;
 ?>
 > Pueden ver mi numero de telefono</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="3"
 <?PHP
if(isset($op23)):
 echo "checked=checked";
endif;
 ?>
 > Pueden ver mi fecha de nacimiento</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="4"
 <?PHP
if(isset($op24)):
 echo "checked=checked";
endif;
 ?>
 
 > Pueden ver mi lugar de residencia</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="5"
 <?PHP
if(isset($op25)):
 echo "checked=checked";
endif;
 ?>
 
 > Pueden ver mi presentacion</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="6"
 
 <?PHP
if(isset($op26)):
 echo "checked=checked";
endif;
 ?>
 
 > Pueden ver mi ocupacion o titulo profesional</label></div> 
 
 <input class="button large orange"  type="submit"value="Actualizar">
 </form>
</div>
</div>