<style>
*{
	font-family: <?PHP echo $fuente;?>;
	
}
div.bx-window
{
	height: <?PHP echo $alto-180;?>px;
}
</style>
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="http://bxslider.com/sites/default/files/jquery.bxSlider.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#slider1').bxSlider({mode: 'vertical',prevSelector:'#prev',nextSelector:'#next',displaySlideQty:<?PHP echo $empleos_visibles;?>});
  });
</script>
<link href="<?PHP echo base_url('css/widgets-azul.css');?>" rel="stylesheet" type="text/css" />

<div class="lista" style="height:<?PHP echo $alto-20;?>px">
<ul  id="slider1" >
<?PHP foreach($feed->result_array() as $k => $v):?>
<li>
<div class="item">
<h1><a href="<?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>"><?PHP echo $v['titulo'];?></a></h1>


<?PHP if((int)$fecha==1):?>

<span>  <?PHP //echo date_format(date_create($v['creado']), 'd/m/y H:i:s');
echo date('D, d M Y H:i:s O', strtotime($v['creado']))
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

</div><a href="#prev" id="prev"></a>
<a href="#next" id="next"></a>
<a href="<?PHP echo site_url();?>">Mas ofertas de empleo</a>