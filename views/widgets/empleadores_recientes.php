<div class="bloque">
<div class="fila">

    <h1>Empresas</h1> <span class="tit01">Registradas recientemente</span>

    </div>
<div class="cuerpo_feed" >
<span class="tuercas"></span>
<ul>
<?PHP  foreach($filas->result_array() as $k => $v):?>
<?PHP if($v['tipo']!='interno'):?>
<li class="c2">
<a href="<?PHP echo site_url('empresa-'._titulo($v['nombre'],'').'-'.$v['ID'].'.html');?>"><?PHP echo ucwords(strtolower($v['nombre']));?></a> | <span style="font-size:11px; color:#0d90b3;"><?PHP echo $this->lib_empleador->rubro($v['rubro'])?>

</li>
<?PHP endif;?>
<?PHP endforeach;?>

</ul>
</div>
</div>