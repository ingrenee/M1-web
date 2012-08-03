
<div class="nav">
<a href="<?PHP echo site_url();?>" title="Volver al inicio">Inicio &raquo;</a>
<a href="<?PHP echo site_url('registros/candidato');?>" title="registro de candidato">Registro de candidato</a>

</div>


<div class="formulario">
<h2>Registro de candidato</h2>
<?PHP  echo form_open();?>

<div class="fila negro">
Informacion b&aacute;sica
</div>

<div class="fila">
<div class="caption">Nombres</div>
<?PHP  echo form_input('nombres',set_value('nombres'));?> <?PHP echo  form_error('nombres');?>
</div>

<div class="fila">
<div class="caption">Apellidos</div> <?PHP  echo form_input('apellidos',set_value('apellidos'));?> <?PHP echo  form_error('apellidos');?>
</div>

<div class="fila">
<div class="caption">Fecha de nacimiento</div> <?PHP  echo form_input('fecha_nacimiento',set_value('fecha_nacimiento'),' id="fecha_nacimiento" ');?> (dd/mm/aaaa)<?PHP echo  form_error('fecha_nacimiento');?>
</div>











<div class="fila negro">
Datos de acceso
</div>
<div class="fila">
<div class="caption"> E-mail</div> <?PHP  echo form_input('email',set_value('email'));?> 
<?PHP echo  form_error('email');?>
</div>
<div class="fila">
<div class="caption"> Password</div> <?PHP  echo form_password('pass',set_value('pass'));?> 
<?PHP echo  form_error('pass');?>
</div>

<div class="fila">
<div class="caption"> Re-Password</div> <?PHP  echo form_password('re',set_value('re'));?> 
<?PHP echo  form_error('re');?>
</div>



<div class="fila2"><input type="submit" value="Registrarse">
</div>
<?PHP echo form_close();?>
</div>
