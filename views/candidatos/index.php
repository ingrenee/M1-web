<?PHP $this->load->view('info');?>

<div class="bloque area">
<div class="area_1">
<h2><a href="<?PHP echo site_url('candidatos/informacion_general');?>">1. Informaci&oacute;n general</a></h2>
<p>Ingresa datos como lugar de nacimiento, n&uacute;mero de identidad, n&uacute;meros de tel&eacute;fono,etc.</p>
</div>

<div class="area_2">
<div  class="fila">
<?PHP if($cv_general_estado<=0):?>
<span class="incompleto">No completado </span>
<?PHP else:?>
<span class="completo">Completado </span>
<?PHP endif;?>
</div>
<div class="fila"><a href="<?PHP echo site_url('candidatos/informacion_general');?>">

<?PHP if($cv_general_estado<=0):?>
+completar
<?PHP else:?>
+Actualizar
<?PHP endif;?>


</a></div>
</div>
</div>

<div class="bloque area">
<div class="area_1">
<h2><a href="<?PHP echo site_url('formacion');?>">2. Formación académica</a></h2>
<p>Registra  tus centros de estudios/capacitacion, carreras que cursaste y el periodos de estudio.</p>
</div>

<div class="area_2">
<div  class="fila"><span><?PHP echo (int)$cv_formacion_estado;?> items registrados</span></div>
<div class="fila"><a href="<?PHP echo site_url('formacion');?>">+Agregar</a></div>
</div>
</div>


<div class="bloque area">
<div class="area_1">
<h2><a href="<?PHP echo site_url('experiencia');?>">3. Experiencia laboral</a></h2>
<p>Ingresa los centros de trabajo donde laborastes, el cargo que ocupastes y tus funciones realizadas.</p>
</div>

<div class="area_2">
<div  class="fila"><span><?PHP echo (int)$cv_experiencia_estado;?> items registrados</span></div>
<div class="fila"><a href="<?PHP echo site_url('experiencia');?>">+Agregar</a></div>
</div>
</div>

<div class="bloque area">
<div class="area_1">
<h2><a href="<?PHP echo site_url('informatica');?>">4. Inform&aacute;tica</a>


</h2><p>Registra los programas y aplicaciones inform&aacute;ticas que has usado, o que dominas de una manera  sencilla.</p>
</div>

<div class="area_2">
<div  class="fila"><span>&nbsp;</span></div>
<div class="fila"><a href="<?PHP echo site_url('informatica');?>">+Agregar</a></div>
</div>
</div>

<div class="bloque area">
<div class="area_1">
<h2><a href="<?PHP echo site_url('idioma');?>">5. Idiomas</a></h2>
<p>Ingresa los idiomas que conoces o dominas.</p>
</div>

<div class="area_2">
<div  class="fila"><span>&nbsp;</span></div>
<div class="fila"><a href="<?PHP echo site_url('idioma');?>">+Agregar</a></div>
</div>
</div>