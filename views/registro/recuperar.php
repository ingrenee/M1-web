<h2>Empresas</h2>
<h1 class="titulo02">Recuperar contraseña:</h1>
<p>A continuaci&oacute;n ingrese su email, y le enviaremos su clave de acceso a su bandeja de entrada y podrá empezar a publicar gratis! </p>
<p>&nbsp;</p>
<div class="formulario">
<form method="post"><?PHP echo form_error('email_contacto', '<div class="error">', '</div>');?>
<div class="fila">

<div class="caption">
Email
</div>


<input name="email_contacto" type="text" class="largo"  value="<?PHP 

$email_contacto=$this->native_session->userdata('email_recuperacion');
if($email_contacto):
echo $email_contacto;
else:
echo set_value('email_contacto');
endif;

?>"id="email_contacto">



</div>

<div class="fila2">
<input type="submit" class="button large orange" value="Enviar nueva contraseña">
</div>
</form>
</div><br />

<div class="fila"><a href="<?PHP echo site_url('registro/registrar');?>" class="flecha boton01">No estas registrado?  reg&iacute;strate es r&aacute;pido</a>.</div>