
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('/js/jquery.autocomplete.css');?>">
  <script type="text/javascript" src="<?PHP echo base_url('/js/jquery.autocomplete.js');?>"></script>

<?PHP $this->load->view('info');?>

<div class="bloque formulario">
<h2 class="blanco">1. Formaci&oacute;n acad&eacute;mica</h2>
<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="caption">Centro de estudios</div>
<?PHP echo form_input('cv_centros_nombre',set_value('cv_centros_nombre'),' ID="cv_centros_nombre" ');?>
<?PHP //echo form_input('cv_centros_ID',set_value('cv_centros_ID'),' ID="cv_centros_ID" ');?>
<?PHP echo form_error('cv_centros_nombre');?>
</div>



<div class="fila">
<div class="caption">Carrera/estudios</div>
<?PHP echo form_input('carrera');?>
<?PHP echo form_error('carrera');?>
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

<input class="button large orange" type="submit" value="Agregar" />

</div>


</form>



</div>

<div class="bloque">
<h1>Tu formaci&oacute;n acad&eacute;mica</h1>

<?PHP  if($filas->num_rows()>0):?>
<?PHP foreach($filas->result_array() as $k => $v):?>
<div class="area item">
<h4><?PHP  echo $v['cv_centros_nombre'];?></h4>
<h3><?PHP  echo $v['carrera'];?></h3>
<h5>
  <span>Desde: <?PHP echo $v['fecha_a'];?></span>
  <span>Hasta: <?PHP echo $v['fecha_b'];?></span>
</h5>

<div class="area_3">
<div class="fila">
<a onclick="return confirm('Desea borrar el registro?');" href="<?PHP echo site_url('formacion/borrar/'.$v['ID']);?>">-Borrar</a>
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

 $("input#cv_centros_nombre").autocomplete({
        url: '<?PHP echo site_url('centros/buscar/');?>',
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