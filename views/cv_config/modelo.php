<link rel="stylesheet" href="<?PHP echo base_url('css/modelos-cv.css');?>" type="text/css" />
<div class="formulario">
<div class="bloque">
<h2 class="blanco cv_titulo_01">Seleccionar Plantilla de curriculum</h2>

<?PHP if(isset($info['cv_modelos_codigo']) && strlen($info['cv_modelos_codigo'])>0):?>
<div class="fila">

<table cellpadding="5" cellspacing="5">
<tr><td width="153">
Usted ya seleccion&oacute;  una plantilla para su curriculum on line. 
</td>
<td width="243" align="center">
<img src="<?PHP echo base_url('css/cv/'.strtolower($modelo_seleccionado['codigo']).'/preview.jpg');?>">
<h3><?PHP echo $modelo_seleccionado['titulo'];?></h3>
</td>
</tr>
</table>


</div>

<div class="fila">
<p>Puedes  compartir o ver tu curriculum por medio del siquiente enlace: </p>
<div id="enlace_cv">
<a href="<?PHP echo site_url('cv/'.$info['login'])?>" target="_blank"  class=" link">
http://www.hayempleo.com/cv/<b><?PHP echo $info['login'];?></b></a>
</div>
</div>




  <?PHP endif;?>
  </div>
  
<h2 class="cv_titulo_02">Plantillas disponibles</h2>

<div class="modelos">
<?PHP foreach($modelos->result_array()  as $k => $v):?>
<div class="fila"><img src="<?PHP echo base_url('css/cv/'.strtolower($v['codigo']).'/preview.jpg');?>">
<h3><?PHP echo $v['titulo'];?></h3>
<a href="<?PHP echo site_url('cv_config/modelo/'.$v['ID']);?>"> Seleccionar </a>
</div>

<?PHP endforeach;?>
</div>



</div>