<!--
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('/js/jquery.autocomplete.css');?>">
  <script type="text/javascript" src="<?PHP echo base_url('/js/jquery.autocomplete.js');?>"></script>
-->
<script src="<?PHP echo base_url('js/jquery.tagsinput.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?PHP echo base_url('css/jquery.tagsinput.css');?>" />
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />


<?PHP $this->load->view('info');?>

<div class="bloque formulario">
<h2 class="blanco">4. Conocimientos de informatica</h2>
<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="">Aplicativo: por ejemplo. Excel, word, autocad,java</div>

<?PHP echo form_input('aptitudes_nombre',set_value('aptitudes_nombre'),' ID="aptitudes_nombre" ');?>

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



	

<button class="button large orange"> agregar </button>

</div>


</form>



</div>

<div class="bloque formulario">
<h1>Tus conocimientos de inform&aacute;tica</h1>
<div id="nube">
<?PHP
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
?>
</div>


</div>

<!--
<script  language="javascript">

$(function() {

 $("input#aptitudes_nombre").autocomplete({
        url: '<?PHP echo site_url('aptitudes/buscar/1');?>',
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

$('#aptitudes_nombre').tagsInput({'autocomplete_url':'<?PHP echo base_url('fake_json_endpoint.html');?>', 'autocomplete':{'selectFirst':true,'width':'100px','autoFill':true},'defaultText':'Escribe'});
-->

<script>


$(function() {

	




$('#aptitudes_nombre').tagsInput({
				width: 'auto',

				//autocomplete_url:'test/fake_plaintext_endpoint.html' //jquery.autocomplete (not jquery ui)
				autocomplete_url:'<?PHP echo site_url('aptitudes/buscar2/1');?>' // jquery ui autocomplete requires a json endpoint
			});


$(".tag_ajax").click(function() {
  id=$(this).attr('id');
  
  
  //$('#div_'+id).load('<?PHP echo site_url('aptitudes/vista/');?>/'+id);

	$('#temp_'+id).load('<?PHP echo site_url('aptitudes/vista/');?>/'+id);
});



});



</script>