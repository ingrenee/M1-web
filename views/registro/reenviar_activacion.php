<h2>Empresas</h2>

<h1 class="titulo02">Reenviar email de activación</h1>

<div class="formulario">

<form method="post">

<?PHP echo form_error('email', '<div class="error">', '</div>')?>



<div class="fila">

<div class="caption">

Email

</div>

<input name="email" type="text"  class="largo" value="<?PHP if(isset($_POST['email'])):
echo set_value('email'); else: echo $email; endif;?>"id="email">



</div>

<div class="fila2">

<input type="submit" class="button large orange" value="Reenviar email de activación">

</div>

</form>

</div>