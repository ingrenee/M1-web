<div class="formulario">
<div class="bloque">
<h2 class="blanco cv_titulo_01">Nombre de usuario</h2>

<?PHP if(isset($info['login'])):?>
<div class="fila">Usted ya seleccion&oacute;  un nombre de usuario</div>
<div class="fila">
<a href="<?PHP echo site_url('cv/'.$info['login'])?>" target="_blank" class="link">
htt://www.hayempleo.com/cv/<b><?PHP echo $info['login'];?></b></a>
</div>

<h2 class="cv_titulo_02">Cambiar nombre de usuario</h2>


  <?PHP endif;?>
  

<form method="post">
  <div class="fila">
A continuaci&oacute;n ingrese un nombre de usuario( Solo puede usar n&uacute;meros y/o letras):
</div>

<div class="fila">
htt://www.hayempleo.com/cv/<?PHP echo form_input('login');?>
<?PHP echo form_error('login');?>
</div>

<div class="fila">
<button class="button large orange">Guardar</button>
</div>
</form>


</div>
</div>