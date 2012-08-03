<script src="<?PHP echo base_url('js/jquery.tagsinput.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?PHP echo base_url('css/jquery.tagsinput.css');?>" />

<form action="" method="post">

<div class="bloque">

<h1>Ofertas de trabajo/empleo en tu e-mail</h1>

<div class="fila">

1. Ingresa  tu direcci&oacute;n de e-mail, por favor verifica que este bien escrito.

</div>

<div class="fila campos">

<?PHP echo form_input('email',set_value('email'),' class="largo" ');?>

<?PHP echo form_error('email');?>

</div>



<div class="fila">

2. A continuaci&oacute;n escribe <b>las palabras </b>que deseas que contengan <b>las ofertas de trabajo que llegar&aacute;n a tu email</b>. <br />
Por ejemplo: administracion,practicante,autocad,costos,supervisor.

</div>

<div class="fila">

<input name="tags" id="tags">

<?PHP echo form_error('tags');?>

</div>





<div class="fila2">

<input name="Enviar"  class="button large orange"type="submit" value="Suscribirme">



</div>







</div>

</form>

<script>

$(function() {

	

$('#tags').tagsInput({'defaultText':'Escribe','maxChars' : 20});



});

</script>

