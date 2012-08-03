
<div class="fila">
<span class="fila_legenda">Perfil:</span>
<span class="fila_contenido"><?PHP echo $perfil_seleccionado->nombre;?></span>
</div>



<select name="competencias_id"id="competencias_id" onChange="rloadChange('<?PHP echo site_url('appgescom/desplegar_competencia')?>','ajax_div','competencias_id')">
<option  value="0">Seleccione una competencia</option>
<?PHP  foreach($competencias->result() as $v):?>
<option value="<?PHP echo $v->competencias_id;?>"><?PHP echo $v->nombre;?></option>
<?PHP endforeach;?>

</select>


<div  id="ajax_div"class="ajax">
::

</div>

<div class="fila">
<table class="comp">

<tr>
<th>Competencia</th>
<th>Valor</th>
<th>Puntaje</th>
<th>&nbsp;</th>

</tr>
<?PHP foreach($perfil_competencias->result() as $v):?>
<tr>
<td><?PHP echo $v->nombre;?></td>
<td><?PHP echo $v->valor_texto;?></td>
<td><?PHP echo $v->valor;?></td>
<td><a href="<?PHP echo site_url('appgescom/eliminar_competencias/'.$v->id);?>">Quitar </a></td>

</tr>
<?PHP endforeach;?>
</table>
</div>