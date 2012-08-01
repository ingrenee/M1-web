<style>
*{
	font-family: <?PHP echo $fuente;?>;
	color:#<?PHP echo $color;?>;
	
}
div.bx-window
{
	height: <?PHP echo $alto-180;?>px;
}

</style>

<script src="<?PHP echo base_url('js/jquery-1.3.2.min.js');?>" type="text/javascript"></script>
<script src="<?PHP echo base_url('js/jquery.bxSlider.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">

 
   



  $(document).ready(function(){
    $('#slider1').bxSlider({mode: 'vertical',prevSelector:'#prev',auto:true,nextText:'Siguiente &raquo;',prevText:'&laquo; Anterior',nextSelector:'#next',displaySlideQty:<?PHP echo $empleos_visibles;?>,autoHover:true});
	
  });
</script>
<link href="<?PHP echo base_url('css/widgets-azul.css');?>" rel="stylesheet" type="text/css" />
<div class="lienzo">
<div class="sup">
<span class="a1">
</span>
<div class="sup_b">
<span class="a2"></span>
<span class="a3"></span>


</div>
</div>

<div class="cuerpo_a">
<div class="cuerpo_b">
<div class="lista" style="height:<?PHP echo $alto-66;?>px">


<?PHP if($feed->num_rows()>0):?>
<ul  id="slider1" >
<?PHP foreach($feed->result_array() as $k => $v):?>
<li>
<div class="item">
<h1><a href="<?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>" target="_blank"><?PHP echo $v['titulo'];?></a></h1>


<?PHP if((int)$fecha==1):?>

<span>  <?PHP //echo date_format(date_create($v['creado']), 'd/m/y H:i:s');
echo date('d/m/Y', strtotime($v['creado']))
?></span>
<?PHP endif;?>



<?PHP if((int)$contenido==1):?>
<div class="descripcion">

<?PHP _extrae_lugar(@$v['pais'],',');?> <?PHP _extrae_lugar(@$v['departamento']);?>  | Moneda: <?PHP  echo _moneda($v['salario_tipo']);?> 
Salario: <?PHP echo _salario($v['salario_2'],$v['salario']);?> |
<?PHP echo _cortar($v['descripcion'],$caracteres).'...';?>

</div>
<?PHP endif;?>

</div>
</li>
<?PHP endforeach;?>
</ul>
<?PHP else:?>
<p>Los valores ingresados no generan ning&uacute;n resultado</p>

<?PHP if($tipo==3):
?><p>
No se ha publicado ningun empleo con el ruc [<?PHP echo $categoria;?>].</p>
<?PHP
endif;?>

<?PHP if($tipo==2):
?><p>
No se ha publicado ningun empleo con las palabras claves [<?PHP echo str_replace('%20',' ',$categoria);?>]. Escriba las palabras claves separadas por  una coma (,). Ejemplos: 
</p>
<p>1. administracion,marketing,gerente</p>
<p>2. contabilidad, asistente contable,auxiliar contable</p>
<p>3. sistemas,java,php,visual basic,.net</p>
<?PHP
endif;?>


<?PHP endif;?>


</div>



<div class="enlaces">
<a href="#prev" id="prev"></a>
<a href="#next" id="next"></a>

</div>

</div>
</div>

<div class="inf">

<div class="inf_b">
<span class="c2"></span>
<span class="c3"></span>


</div>
</div>


</div>