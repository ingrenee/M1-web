<div class="formulario">
<div class="bloque">
<h2 class="blanco cv_titulo_01">Seleccionar Plantilla de curriculum</h2>

<?PHP if(isset($info['cv_modelos_codigo'])):?>
<div class="fila">Usted ya seleccion&oacute;  una plantilla para su curriculum on line. </div>

<div class="fila"><img src="<?PHP echo base_url('css/cv/'.$modelo_seleccionado['codigo'].'/preview.jpg');?>">
<h3><?PHP echo $modelo_seleccionado['titulo'];?></h3>

</div>

<div class="fila">
<a href="<?PHP echo site_url('cv/'.$info['login'])?>" target="_blank" class="link">
htt://www.hayempleo.com/cv/<b><?PHP echo $info['login'];?></b></a>
</div>




  <?PHP endif;?>
  
<h2 class="cv_titulo_02">Plantillas disponibles</h2>

<div class="modelos">
<?PHP foreach($modelos->result_array()  as $k => $v):?>
<div class="fila"><img src="<?PHP echo base_url('css/cv/'.$v['codigo'].'/preview.jpg');?>">
<h3><?PHP echo $v['titulo'];?></h3>
<a href="<?PHP echo site_url('cv_config/modelo/'.$v['ID']);?>"> Seleccionar </a>
</div>

<?PHP endforeach;?>
</div>


</div>
</div>