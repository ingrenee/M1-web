<h2>Empresas</h2>
<h1 class="titulo02">Recuperar contraseña</h1>

<form method="post">
<div class="fila">
<div class="caption">
Email
</div>
<input name="email_contacto" type="text"  value="<?PHP echo set_value('email_contacto');?>"id="email_contacto">
<?PHP echo form_error('email_contacto');?>
</div>
<input type="submit" value="Enviar nueva contraseña">
</form>