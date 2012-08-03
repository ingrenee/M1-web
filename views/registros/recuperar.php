<h2>Candidatos</h2>
<h1 class="titulo02">Recuperar contraseña</h1>
<div class="formulario">
<form method="post">
<?PHP echo form_error('email', '<div class="error">', '</div>')?>

<div class="fila">
<div class="caption">
Email
</div>
<input name="email" type="text"  class="largo" value="<?PHP echo set_value('email');?>"id="email">

</div>
<div class="fila2">
<input type="submit" class="button large orange" value="Enviar nueva contraseña">
</div>
</form>
</div>