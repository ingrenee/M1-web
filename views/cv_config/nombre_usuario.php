<link rel="stylesheet" href="<?PHP echo base_url('css/modelos-cv.css');?>" type="text/css" />
<div class="formulario">
<div class="bloque">
<h2 class="blanco cv_titulo_01">Nombre de usuario</h2>
<p>El nombre de usuario le servira para  poder crear y compartir el enlace a su curriculum ONLINE</p>
<?PHP if(isset($info['login']) && strlen($info['login']) >0):?>
<div class="fila">Usted ya seleccion&oacute;  un nombre de usuario</div>
<div class="fila">
<div id="enlace_cv">
<a  class=""href="<?PHP echo site_url('cv/'.$info['login'])?>" target="_blank" class="link">
http://www.hayempleo.com/cv/<b><?PHP echo $info['login'];?></b></a>
</div>
<p>Usted puede utilizar este enlace  para mostrar su curriculum a las empresas. Puede enviarlo via email.</p>
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
<?PHP if(isset($info['login']) && strlen($info['login']) >0):?>
<button class="button large orange">Modificar</button>
<?PHP else:?>
<button class="button large orange">Guardar</button>
<?PHP endif;?>
</div>
</form>


</div>
</div>