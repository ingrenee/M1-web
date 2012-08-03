<h2>Candidatos</h2>
<h1 class="titulo02">Recuperar contraseña</h1>

<form method="post">
<div class="fila">
<div class="caption">
Email
</div>
<input name="email" type="text"  value="<?PHP echo set_value('email');?>"id="email">
<?PHP echo form_error('email');?>
</div>
<input type="submit" value="Enviar nueva contraseña">
</form>