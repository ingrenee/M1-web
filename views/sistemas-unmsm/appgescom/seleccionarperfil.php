


<?php echo validation_errors('<div class="error">','</div>') ?>

<?php //echo form_error('perfil_id', '<div class="error">', '</div>'); ?>







<form action="<?PHP  echo site_url('appgescom/agregar_perfil');?>" method="post"  >
 
<div class="fila">
<label for="perfiles_id">

Seleccionar perfil


<select name="perfiles_id" id="perfiles_id" onChange="rloadChange('<?PHP echo site_url('appgescom/load_info_perfil/');?>','ajax','perfiles_id');">
  <option >Seleccione un perfil</option>
  
  
  <?PHP foreach($perfiles->result() as $v):?>
    <option value="<?PHP  echo $v->id;?>"><?PHP echo $v->nombre;?></option>
    <?PHP endforeach;?>
</select></label>
<label> <input type="submit" value="Seleccionar perfil"></label>

</div>



<div class="fila">

<div id="ajax">
---
</div>

</div>


</form>