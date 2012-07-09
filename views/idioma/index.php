<!--
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('/js/jquery.autocomplete.css');?>">
  <script type="text/javascript" src="<?PHP echo base_url('/js/jquery.autocomplete.js');?>"></script>
-->
<script src="<?PHP echo base_url('js/jquery.tagsinput.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?PHP echo base_url('css/jquery.tagsinput.css');?>" />
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
    
    
<script src="<?PHP echo base_url('js/jquery.simpletip-1.3.1.pack.js')?>"></script>    



<?PHP $this->load->view('info');?>

<div class="bloque formulario">
<h2 class="blanco">5. Conocimientos de Idiomas</h2>
<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="">Idioma: <span>(p.e: ingles, frances, aleman)</span></div>
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


<!--
<div class="fila">
<div class="caption">Nivel de dominio:</div>
<?PHP echo form_dropdown('nivel',$meses);?> 

<?PHP echo form_error('nivel');?>

</div>
-->


<div class="fila2">
<input type="submit" class="button large orange" value="agregar">
</div>
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

<!--
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
-->
<script>


$(function() {

	




$('#aptitudes_nombre').tagsInput({
				width: 'auto',

				//autocomplete_url:'test/fake_plaintext_endpoint.html' //jquery.autocomplete (not jquery ui)
				autocomplete_url:'<?PHP echo site_url('aptitudes/buscar2/2');?>' // jquery ui autocomplete requires a json endpoint
				,
				autocomplete:{selectFirst:true,width:'100px',autoFill:true},
				 'defaultText':'Escribe un idioma',
				 'minChars' : 4
				
			});




/*
$("span.tagger").simpletip({
   onBeforeShow: function(){
      // Note this refers to the API in the callback function
      this.load("<?PHP echo site_url('aptitudes/vista/');?>/"+$(this).attr('id'));
   }
});

*/

$(".tag_ajax").click(function() {
  id=$(this).attr('id');
  
  
  //$('#div_'+id).load('<?PHP echo site_url('aptitudes/vista/');?>/'+id);

	$('#temp_'+id).load('<?PHP echo site_url('aptitudes/vista/');?>/'+id);
});




});



</script>