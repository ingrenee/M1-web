<div class="formulario">
<div class="bloque_config">
<h2 class="blanco cv_titulo_01">Configuracion de privacidad</h2>
 En esa seccion puede definir  lo siguiente:
 
 
 <h3>1. Quienes pueden ver tu curriculum</h3>
 <form method="post" name="form">

 <div class="fila">
 <label class="">
 <?PHP echo form_radio('privacidad', 1);?>
Todos, mi curiculum es publico: Si marcas esta opcion tu curriculum podra ser visto por cualquier usuario ya se  una empresa u otro candidato.</label> </div>
 <div class="fila"><label> 
   <input type="radio" name="privacidad" id="privacidad2" value="2" />
Solo las empresas: Si marcas esta opcion solo las empresas  podran ver tu curriculum, para ello les pediremos que inicien sesion. </label></div>
 <div class="fila"><label> 
   <input type="radio" name="privacidad" id="privacidad3" value="3" />
Todos los que tengan una clave que yo les proporcionare: Si marcas esta clave tu curriculum solo sera visible para aquellas personas a quienes les has dado una clave secreta. </label>
 </div>

 <div class="fila">sss<?PHP echo '145'.form_error('privacidad');?></div>
<?php echo validation_errors(); ?>
 <h3>2. Sobre la vista previa de mi curriculum</h3>

 <p>La vista previa de tu curriculum es la informacion basica sobre tu curriculum a la que todos pueden acceder.</p>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1"> Pueden ver mi foto</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1"> Pueden ver mi numero de telefono</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1"> Pueden ver mi fecha de nacimiento</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1"> Pueden ver mi lugar de residencia</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1"> Pueden ver mi presentacion</label></div>
 <div class="fila"><label><input name="b2[]" type="checkbox" value="1"> Pueden ver mi ocupacion o titulo profesional</label></div> 
 
 <input class="button large orange"  type="submit"value="Actualizar">
 </form>
</div>
</div>