<script type="text/javascript" src="<?PHP echo base_url('js/color/');?>/jquery.miniColors.min.js"></script>
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('js/color/');?>/jquery.miniColors.css" />

<script>


$(document).ready( function() {
				
				//
				// Enabling miniColors
				//
				
				$(".color").miniColors({
					letterCase: 'uppercase'		});
				
				
});
				
				
				
				

function opend(div)
{
	$('div.camp').hide();
	$('div#'+div).show();
	
	}
	var cadena='';
	function mostrarIframe()
	{
		categoria=false;
		tipo=$("input[name='tipo']:checked").val(); 
		
		
		
		switch(tipo){
			
			case "1":
		categoria=$('select#categoria').val();
		if(categoria=='')
		{
			categoria=0;
			}
		
			break;
			
				case "2":
		categoria=$('input#claves').val();
		if(categoria=='')
		{
			categoria=0;
			}
			
			break;
			
							case "3":
		categoria=$('input#ruc').val();
		if(categoria=='')
		{
			categoria=0;
			}
			
			break;
			
			
		}
			//alert(categoria);
/*
962208390

*/
		ancho=Number($('input#ancho').val());
		alto=Number($('input#alto').val());
		caracteres=parseInt($('input#caracteres').val(),10);
	
		w1=Number($('select#widgets_fecha').val());
		w2=Number($('select#widgets_contenido').val());
		
		//empleos_visibles
		visibles=Number($('input#empleos_visibles').val());
		numero=($('select#empleos_numero').val());
		fuente=($('select#empleos_fuente').val());
		color=($('input#color').val());

		//$('iframe#iframe').attr('src','<?PHP echo site_url('widgets/categoria/');?>/'+categoria);
		//$('iframe#iframe').attr('width',ancho);
		//$('iframe#iframe').attr('height',alto);
		
		cadenaup=''+categoria+color+caracteres+ancho+alto+w1+w2+visibles+numero+fuente;
		if(cadena!=cadenaup)
		{
		
		$("div#ajax").load('<?PHP echo site_url('widgets/iframe/');?>',{categoria:categoria,ancho:ancho,alto:alto,caracteres:caracteres,fecha:w1,contenido:w2,empleos_visibles:visibles,empleos_numero:numero,fuente:fuente,tipo:tipo,color:color});
		cadena=cadenaup;
		}
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


<div class="fila camp" id="d_categoria" <?PHP echo $d[1];?> ><strong>1.</strong>
<?PHP
$js=' onChange="mostrarIframe()"  id="categoria" ';
?>
Seleccione una categoria:
<?PHP echo form_dropdown('categoria',$cat,set_value('categoria'),$js);?>
<?PHP echo form_error('categoria');?>
</div>



<div class="fila camp" id="d_clave" 
<?PHP echo $d[2];?>
><strong>1.</strong> Ingrese las palabras claves: <?PHP echo form_input('claves',set_value('claves'),' id="claves"  onblur="mostrarIframe();" ');?>
<?PHP echo form_error('claves');?>
</div>



<div class="fila camp" id="d_empresa"  <?PHP echo $d[3];?> >1. 
Ingrese el ruc de la empresa:
<?PHP echo form_input('ruc',set_value('ruc'),' id="ruc"  onblur="mostrarIframe();" ');?>
<?PHP echo form_error('ruc');?>
</div>








<div class="fila"><strong>2. </strong> Ancho del widget:
<?PHP

if(!isset($_POST['ancho']) || (isset($_POST['ancho']) && ((int)$_POST['ancho'])<=0) ):
 $cant="350";
else:

$cant=set_value('ancho');
endif;
 echo form_input('ancho',$cant,'id="ancho"  onblur="mostrarIframe();" ');?>(px)
 <?PHP echo form_error('ancho');?>
</div>
<div class="fila"><strong>3. </strong> Alto del widget:
<?PHP

if(!isset($_POST['alto']) || (isset($_POST['alto']) && ((int)$_POST['alto'])<=0) ):
 $cant="250";
else:

$cant=set_value('alto');
endif;
 echo form_input('alto',$cant,'id="alto" onblur="mostrarIframe();"');?> (px)
  <?PHP echo form_error('alto');?>
</div>




<h3>Avanzado</h3>

<div class="fila">
Color del widget
<?PHP echo form_input('color',set_value('color'),'id="color" class="color"  " onBlur="mostrarIframe();"');?>
<?PHP echo form_error('color');?>
</div>


<div class="fila">
Tipo de letra
<?PHP echo form_dropdown('empleos_fuente',$fuente,set_value('empleos_fuente'),'id="empleos_fuente"  onChange="mostrarIframe();"');?>
<?PHP echo form_error('empleos_fuente');?>
</div>

<?PHP
$num[5]='5 empleos';
$num[10]='10 empleos';
$num[20]='20 empleos';
$num[30]='30 empleos';

?>
<div class="fila">
Numero de empleos 
<?PHP echo form_dropdown('empleos_numero',$num,set_value('empleos_numero'),'id="empleos_numero"  onChange="mostrarIframe();"');?>
<?PHP echo form_error('empleos_numero');?>
</div>

<?PHP

if(!isset($_POST['empleos_visibles']) || (isset($_POST['empleos_visibles']) && ((int)$_POST['empleos_visibles'])<=0) ):
 $cant=5;
else:

$cant=set_value('empleos_visibles');
endif;
?>
<div class="fila" style="display:none;">
Numero de empleos visibles
<?PHP echo form_input('empleos_visibles',$cant,'id="empleos_visibles"  onblur="mostrarIframe();"');?>
<?PHP echo form_error('empleos_visibles');?>
</div>
<?PHP

$op[1]='Sí mostrar';
$op[2]='No mostrar';

?>
<div class="fila">
Mostrar fecha de publicacion
<?PHP echo form_dropdown('widgets_fecha',$op,set_value('widgets_fecha'),'id="widgets_fecha"  onChange="mostrarIframe();"');?>
</div>
<div class="fila">
Mostrar contenido
<?PHP echo form_dropdown('widgets_contenido',$op,set_value('widgets_contenido'),'id="widgets_contenido"  onChange="mostrarIframe();"');?>
</div>
<div class="fila">
Cortar contenido a:
<?PHP

if(!isset($_POST['caracteres']) || (isset($_POST['caracteres']) && ((int)$_POST['caracteres'])<=0) ):
 $cant=150;
else:

$cant=set_value('caracteres');
endif;
 echo form_input('caracteres',$cant,' id="caracteres"  onblur="mostrarIframe();"');?>
 <?PHP echo form_error('caracteres');?>
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
