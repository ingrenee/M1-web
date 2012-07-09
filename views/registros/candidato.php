	<script type='text/javascript' src='<?PHP echo base_url('js/autocomplete/jquery.autocomplete.js');?>'></script>
<link rel="stylesheet" href="<?PHP base_url('js/autocomplete/style.css');?>" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?PHP echo base_url('js/autocomplete/jquery.autocomplete.css');?>" />
	<script type="text/javascript">
	$(document).ready(function(){
		
		$("input#ocupacion").autocomplete("<?PHP echo base_url('profesiones/buscar');?>", {
		width: 260,
		selectFirst: false,
	/*	autoFill:true,*/
		mustMatch:true
	});
		

		$("input#ocupacion").result(function(event, data, formatted) {
		if (data)
			$("input#ocupacion_ID").val(data[1]);
	});
		
	})
	</script>
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


<div class="fila">
<div class="caption">Profesi&oacute;n / carrera / oficio / ocupaci&oacute;n</div> <?PHP  echo form_input('ocupacion',set_value('ocupacion'),' id="ocupacion" class="largo" ');?> <?PHP echo  form_error('ocupacion');?>

<?PHP echo  form_error('ocupacion_ID');?>

</div>
<div class="fila" style="display:none">
<div class="caption">ID</div> <?PHP  echo form_input('ocupacion_ID',set_value('ocupacion_ID'),' id="ocupacion_ID" ');?> <?PHP echo  form_error('ocupacion_ID');?>
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



<div class="fila2"><input type="submit"  class="button large orange"value="Registrarse">
</div>
<?PHP echo form_close();?>
</div>
