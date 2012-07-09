<?PHP 

$meses['']='seleccione';
$meses[1]='B&aacute;sico';
$meses[2]='B&aacute;sico - Intermedio';
$meses[3]='Intermedio';
$meses[4]='Intermedio - Avanzado';
$meses[5]='Avanzado';

?>



<?PHP echo form_dropdown('nivel',$meses,NULL,' id="" class="tag_select" ');?> 


<script>

$(function() {

$('.tag_select').change(function() 
{
	$('#<?PHP echo $id;?>').load('<?PHP echo site_url('aptitudes/actualizar/'.$id.'/');?>/'+$(this).attr('value'));
	$('#temp_<?PHP echo $id;?>').html('');
	  // alert('Value change to ' + $(this).attr('value'));
});

});


</script>
