
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('/js/jquery.autocomplete.css');?>">
  <script type="text/javascript" src="<?PHP echo base_url('/js/jquery.autocomplete.js');?>"></script>

<?PHP $this->load->view('info');?>

<div class="bloque formulario">
<h2 class="blanco">5. Conocimientos de Idiomas</h2>
<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="caption">Aplicativo</div>
<?PHP echo form_input('aptitudes_nombre',set_value('aptitudes_nombre'),' ID="aptitudes_nombre" ');?>
<span>(p.e: office word, power point, mysql,etc)</span>
<?PHP //echo form_input('cv_centros_ID',set_value('cv_centros_ID'),' ID="cv_centros_ID" ');?>
<?PHP echo form_error('aptitudes_nombre');?>
</div>





<?PHP 

$meses['']='seleccione';
$meses[1]='B&aacute;sico';
$meses[2]='B&aacute;sico - Intermedio';
$meses[3]='Intermedio';
$meses[4]='Intermedio - Avanzado';
$meses[5]='Avanzado';

?>



<div class="fila">
<div class="caption">Nivel de dominio:</div>
<?PHP echo form_dropdown('nivel',$meses);?> 

<?PHP echo form_error('nivel');?>

</div>

<button> agregar </button>

</div>


</form>



</div>

<div class="bloque formulario">
<h1>Tus idiomas</h1>
<div id="nube">
<?PHP

if(is_array($aptitudes)):
krsort($aptitudes);
foreach($aptitudes as $k => $v):
?><div class="fila">
<h1 style=" margin-bottom:0px;"><?PHP echo $meses[$k]; ?></h1>
<?PHP
foreach($v as $k2 => $v2):
?>
<?PHP echo $v2;?>

<?PHP
endforeach;
?>

</div>
<?PHP
endforeach;
endif;
?>
</div>


</div>


<script  language="javascript">

$(function() {

 $("input#aptitudes_nombre").autocomplete({
        url: '<?PHP echo site_url('aptitudes/buscar/2');?>',
        useCache: false,
        filterResults: true,
		
        onItemSelect: function(item) {
            //var text = 'You selected <b>' + item.value + '</b>';
            //if (item.data.length) {
             //   text += ' <i>' + item.data.join(', ') + '</i>';
           // }
            //$("#last_selected").html(text);
			//$("#cv_centros_ID").val(item.data.join(', '));
        },
       
        maxItemsToShow: 5,
		mustMatch: true,
        selectFirst: false,
        autoFill: true,
        selectOnly: false
    
		
    });
	
});
</script>