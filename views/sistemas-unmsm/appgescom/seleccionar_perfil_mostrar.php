
<div class="fila">
<span class="fila_lengenda">Perfil seleccionado :</span>
<span class="fila_contenido"><?PHP  echo $perfil_seleccionado->nombre;?></span>
<a href="<?PHP echo  site_url('appgescom/borrar_perfil/'.$perfil_seleccionado->id);?>" class="fila_borrar"><span>Borrar</span></a> 
</div>

<div class="fila">
<span class="fila_legenda">
Descripcion:
</span>
<div class="fila_contenido">
<?PHP echo $perfil_seleccionado->descripcion;?>
</div>


</div>