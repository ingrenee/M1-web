
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('/js/jquery.autocomplete.css');?>">
  <script type="text/javascript" src="<?PHP echo base_url('/js/jquery.autocomplete.js');?>"></script>

<?PHP $this->load->view('info');?>

<div class="bloque formulario">
<h2 class="blanco">3. Experiencia Laboral</h2>
<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="caption">Centro de trabajo</div>
<?PHP echo form_input('empresas_nombre',set_value('empresas_nombre'),' ID="empresas_nombre" ');?>
<?PHP //echo form_input('cv_centros_ID',set_value('cv_centros_ID'),' ID="cv_centros_ID" ');?>
<?PHP echo form_error('empresas_nombre');?>
</div>



<div class="fila">
<div class="caption">Cargo</div>
<?PHP echo form_input('cargo',set_value('cargo'));?>
<?PHP echo form_error('cargo');?>
</div>

<div class="fila">
<div class="caption" style="width:80%">
Funciones: escribe tus funciones , separandolas con  una coma (,)</div>
<?PHP 
$text=array('name'=>'funciones','rows'=>4, 'value'=>set_value('funciones'));
echo form_textarea($text);?>
<?PHP echo form_error('funciones');?>
</div>

<?PHP 
$anios['']='Seleccione';
for($i=1960;$i<=date('Y');$i++):
$anios[$i]=$i;
endfor;


$meses['']='seleccione';
$meses[1]='enero';
$meses[]='febrero';
$meses[]='marzo';
$meses[]='abril';
$meses[]='mayo';
$meses[]='junio';
$meses[]='julio';
$meses[]='agosto';
$meses[]='setiembre';
$meses[]='octubre';
$meses[]='noviembre';
$meses[]='diciembre';

?>

<div class="fila">
<div class="caption">Fecha desde:</div>
<?PHP echo form_dropdown('fecha_a_1',$meses);?> de 
<?PHP echo form_dropdown('fecha_a_2',$anios);?>
<?PHP echo form_error('fecha_a_1');?>
<?PHP echo form_error('fecha_a_2');?>
</div>

<div class="fila">
<div class="caption">Fecha hasta:</div>
<?PHP echo form_dropdown('fecha_b_1',$meses);?> de 
<?PHP echo form_dropdown('fecha_b_2',$anios);?>
<?PHP echo form_error('fecha_b_1');?>
<?PHP echo form_error('fecha_b_2');?>
</div>

<button> agregar </button>

</div>


</form>



</div>

<div class="bloque">
<h1>Tu experiencia laboral.</h1>

<?PHP  if($filas->num_rows()>0):?>
<?PHP foreach($filas->result_array() as $k => $v):?>
<div class="area item">
<h4><?PHP  echo $v['empresas_nombre'];?></h4>
<h3><?PHP  echo $v['cargo'];?></h3>
<p><?PHP  echo $v['funciones'];?></p>
<h5>
  <span>Desde: <?PHP echo $v['fecha_a'];?></span>
  <span>Hasta: <?PHP echo $v['fecha_b'];?></span>
</h5>

<div class="area_3">
<div class="fila">
<a onclick="return confirm('Desea borrar el registro?');" href="<?PHP echo site_url('experiencia/borrar/'.$v['ID']);?>">-Borrar</a>
</div>
</div>
</div>
<?PHP endforeach;?>
<?PHP else:?>
<div  class="fila">
No has  ingresado ninguna informaci&oacute;n sobre tu formaci&oacute;n acad&eacute;mica.
</div>
<?PHP endif;?>



</div>


<script  language="javascript">

$(function() {

 $("input#empresas_nombre").autocomplete({
        url: '<?PHP echo site_url('empresas/buscar/');?>',
        useCache: false,
        filterResults: false,
		
        onItemSelect: function(item) {
            //var text = 'You selected <b>' + item.value + '</b>';
            //if (item.data.length) {
             //   text += ' <i>' + item.data.join(', ') + '</i>';
           // }
            //$("#last_selected").html(text);
			//$("#cv_centros_ID").val(item.data.join(', '));
        },
       
        maxItemsToShow: 5,
        selectFirst: false,
        autoFill: false,
        selectOnly: false
    
		
    });
	
});
</script>