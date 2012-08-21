<link href="<?PHP echo base_url('css/div.postula.pre.css');?>" rel="stylesheet" type="text/css" />
<div class="formulario">
<h2>Postular a oferta de empleo</h2>

<div class="empleo borde"><div class="info info_a">
<span class="titulo">vacantes</span>
<span class="dato"><?PHP echo $info['vacantes'];?></span>

<span class="titulo">publicado</span>
<span class="dato">
 <?PHP 



echo date_format(date_create($info['creado']), 'd/m/y');



?></span>

</div>
<div class="descripcion">

<h1><a><?PHP echo $info['titulo'];?></a></h1>


<p><?PHP echo _cortar($info['descripcion'])?></p><span  class="lugar"><?PHP _extrae_lugar(@$info['departamento']);?></span>
<span class="sueldo">S/.<?PHP echo $info['salario'];?></span>

</div>


</div>


<div class="fila">
 <h2> Muy bien! acabas de postular a esta oferta de empleo. </h2>
    </div>
   
   <h2> Deseas enviar un mensaje adicional?,</h2> 
   
   Este mensaje se mostrará junto a tu postulación y sera leida por el  personal de selección. 
   
   <form  method="post">
   <div class="fila">
   <textarea class="mensaje_postular" name="mensaje"><?PHP echo set_value('mensaje');?></textarea>
   <?PHP echo form_error('mensaje');?>
   </div>
	<input type="submit" value="enviar mensaje" class="button orange">
    <a href="<?PHP echo site_url();?>" class="button orange"><span>Volver a los empleos</span></a>
   </form>
</div>

