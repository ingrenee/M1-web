

<?PHP $this->load->view('info');?>

<div class="bloque formulario">
<h2 class="blanco">Cambiar imagen de currilum</h2>
<?PHP _mensajes();?>

<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
<div class="formu2">

<div class="fila">
<div class="caption">Seleccione una imagen</div>

<label for="file"></label>
<label for="file"></label>
<input type="file" name="file" id="file" />
<?PHP echo form_error('file');?>
</div>







<input name="" type="submit" value="Enviar" />

</div>


</form>


</div>



