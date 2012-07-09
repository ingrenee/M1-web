<?PHP
//print_r($competencia);
?>
<form action="<?PHP echo site_url('appgescom/agregar_competencia');?>" method="post" >
<div class="fila">
<span class="fila_legenda">Seleccione un  opci&oacute;n: </span>
<span class="fila_contenido">
<?PHP echo $e['elemento'];?>
</span>
</div>
<input name="competencias_id" type="hidden" value="<?PHP echo $competencias_id;?>">
<input name="valor_texto" id="valor_texto" type="hidden" value="">



<?PHP if($e['flag']):?>
<div class="fila">
<input type="submit" value="Agregar compentencia">
</div>
<?PHP endif;?>


</form>

