<link href="<?PHP echo base_url('css/widgets-azul.css');?>" rel="stylesheet" type="text/css" />
<div class="lista">
<?PHP foreach($feed->result_array() as $k => $v):?>
<div class="item">
<h1><a href="<?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>"><?PHP echo $v['titulo'];?></a></h1>

<span>  <?PHP //echo date_format(date_create($v['creado']), 'd/m/y H:i:s');
echo date('D, d M Y H:i:s O', strtotime($v['creado']))
?></span>




<div class="descripcion">

<?PHP _extrae_lugar(@$v['pais'],',');?> <?PHP _extrae_lugar(@$v['departamento']);?>  | Moneda: <?PHP  echo _moneda($v['salario_tipo']);?> 
Salario: <?PHP echo _salario($v['salario_2'],$v['salario']);?> |
<?PHP echo _cortar($v['descripcion']).'...';?>

</div>


</div>
<?PHP endforeach;?>

</div>