<script>
function opend(div)
{
	$('div.camp').hide();
	$('div#'+div).show();
	
	}
	
	function mostrarIframe()
	{
		categoria=$('select#categoria').val();
		

		ancho=Number($('input#ancho').val())+6;
		alto=Number($('input#alto').val())+6;
		
		
		//$('iframe#iframe').attr('src','<?PHP echo site_url('widgets/categoria/');?>/'+categoria);
		//$('iframe#iframe').attr('width',ancho);
		//$('iframe#iframe').attr('height',alto);
		
		$("div#ajax").load('<?PHP echo site_url('widgets/iframe/');?>',{categoria:categoria,ancho:ancho,alto:alto});

		}
</script>
<div class="c1" style="width:42%; float:left; ">

<form method="post" >
<div class="formulario">
<div class="fila3">
<div class="caption">
Tipo de widgets:Mostrar empleos
</div> <br />

<label><input type="radio" name="tipo"  onclick="opend('d_categoria')"  value="1" <?php 

if(isset($_POST['tipo'])):
echo set_radio('tipo', '1');
else:
echo 'checked=checked';
endif;
 ?> >
Por categorias</label> |
<label><input type="radio" name="tipo" onclick="opend('d_clave')" value="2" <?php echo set_radio('tipo', '2'); ?> >
Por palabras claves</label> |

<label><input type="radio" name="tipo" onclick="opend('d_empresa')" value="3" <?php echo set_radio('tipo', '3'); ?> >
Por empresa</label>

</div>

<?PHP
$d[1]=$d[2]=$d[3]=' style="display:none" ';
?>
<?PHP if(isset($_POST['tipo'])):?>
<?PHP $d[$_POST['tipo']]=''; ?>
<?PHP else:?>
<?PHP $d[1]='';?>
<?PHP endif;?>


<div class="fila camp" id="d_categoria" <?PHP echo $d[1];?> >

<?PHP
$js=' onChange="mostrarIframe()"  id="categoria" ';
?>
Seleccione una categoria:
<?PHP echo form_dropdown('categoria',$cat,set_value('categoria'),$js);?>
<?PHP echo form_error('categoria');?>
</div>



<div class="fila camp" id="d_clave" 
<?PHP echo $d[2];?>
>
Ingrese las palabras claves:
<?PHP echo form_input('claves');?>
<?PHP echo form_error('claves');?>
</div>



<div class="fila camp" id="d_empresa"  <?PHP echo $d[3];?> >
Ingrese el ruc de la empresa:
<?PHP echo form_input('ruc');?>
<?PHP echo form_error('ruc');?>
</div>



<?PHP

$num[10]='10 empleos';
$num[20]='20 empleos';
$num[30]='30 empleos';

?>
<div class="fila">
Numero de empleos 
<?PHP echo form_dropdown('empleos_numero',$num);?>
<?PHP echo form_error('empleos_numero');?>
</div>

<?PHP

if(!isset($_POST['empleos_visibles']) || (isset($_POST['empleos_visibles']) && ((int)$_POST['empleos_visibles'])<=0) ):
 $cant=5;
else:

$cant=set_value('empleos_visibles');
endif;
?>
<div class="fila">
Numero de empleos visibles
<?PHP echo form_input('empleos_visibles',$cant);?>
<?PHP echo form_error('empleos_visibles');?>
</div>
<?PHP

$op[1]='Sí mostrar';
$op[2]='No mostrar';

?>
<div class="fila">
Mostrar fecha de publicacion
<?PHP echo form_dropdown('widgets_fecha',$op);?>
</div>
<div class="fila">
Mostrar contenido
<?PHP echo form_dropdown('widgets_contenido',$op);?>
</div>
<div class="fila">
Cortar contenido a:
<?PHP

if(!isset($_POST['caracteres']) || (isset($_POST['caracteres']) && ((int)$_POST['caracteres'])<=0) ):
 $cant=150;
else:

$cant=set_value('caracteres');
endif;
 echo form_input('caracteres',$cant);?>
 <?PHP echo form_error('caracteres');?>
</div>


<div class="fila">
Ancho del widget:
<?PHP

if(!isset($_POST['ancho']) || (isset($_POST['ancho']) && ((int)$_POST['ancho'])<=0) ):
 $cant="350";
else:

$cant=set_value('ancho');
endif;
 echo form_input('ancho',$cant,'id="ancho"  onblur="mostrarIframe();" ');?>(px)
 <?PHP echo form_error('ancho');?>
</div>
<input onblur="">
<div class="fila">
Alto del widget:
<?PHP

if(!isset($_POST['alto']) || (isset($_POST['alto']) && ((int)$_POST['alto'])<=0) ):
 $cant="250";
else:

$cant=set_value('alto');
endif;
 echo form_input('alto',$cant,'id="alto" onblur="mostrarIframe();"');?> (px)
 <?PHP echo form_error('alto');?>
</div>


<div class="fila">
<button>Obtener codigo</button>

</div>


</div>


</form>


</div>
<div class="c1" style="width:56%; float:right">
<div id="ajax">


</div>


</div>
