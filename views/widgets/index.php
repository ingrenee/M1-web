<style>
/* Z-index of #mask must lower than #boxes .window */
#mask {
  position:absolute;
  z-index:9000;
  background-color:#000;
  display:none;
}
#boxes .window {
	position:absolute;
	width:440px;
	height:200px;
	display:none;
	z-index:9999;
	padding:20px;
}
/* Customize your modal window here, you can add background image too */
#boxes #dialog {
	width:375px;
	height:203px;
	background-color: #FFF;
	color: #333;
	border: 1px solid #069;
}
#boxes #dialog  h1
{
	display: block;
	font-size: 18px;
}
#boxes #dialog a.close
{
	display: inline-block;
	background-color: #09C;
	color: #FFF;
	padding-top: 3px;
	padding-right: 5px;
	padding-bottom: 3px;
	padding-left: 5px;
	text-decoration: none;
}
#boxes #dialog p
{}
#boxes #dialog textarea
{
	display: block;
	width: 95%;
	border: 1px solid #CCC;
	height: 110px;
	font-size: 12px;
	color: #000;
	margin-top: 5px;
	margin-bottom: 5px;
}
</style>

<script type="text/javascript" src="<?PHP echo base_url('js/color/');?>/jquery.miniColors.min.js"></script>
		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('js/color/');?>/jquery.miniColors.css" />
        		<link type="text/css" rel="stylesheet" href="<?PHP echo base_url('css/');?>/miniform2012.css" />

<script>
var flag=false;

$(document).ready( function() {
				$('#code').click(function (){
				$(this).select();
					
					});
				//
				// Enabling miniColors
				//
				
				$(".color").miniColors({
					letterCase: 'uppercase'		});
				
				
				
				
				
				
				//select all the a tag with name equal to modal
	$('button[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		//Get the A tag
		var id = '#dialog';//$(this).attr('id');
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		//Set height and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight,'top':0,'left':0});
		//transition effect
		$('#mask').fadeIn(500);
		$('#mask').fadeTo("slow",0.8);
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
		//Set the popup window to center
		$(id).css('top',  winH*0.5 - $(id).height()*0.5);
		$(id).css('left', winW*0.5 - $(id).width()*0.5);
		//transition effect
		$(id).fadeIn(500);
		flag=3;
		mostrarIframe();
		flag=false;
	});
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		$('#mask, .window').hide();
	});
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});
				
				
				
				
				
				
				
				
				
				
				
				
				
				
});
				
				
				
				

function opend(div)
{
	$('div.camp').hide();
	$('div#'+div).show();
	
	}
	var cadena='';
	
	
	function actualizar()
	{
		flag=true;
		mostrarIframe();
		flag=false;
		}
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
		if((cadena!=cadenaup) || (flag!=false))
		{
		opciones={categoria:categoria,ancho:ancho,alto:alto,caracteres:caracteres,fecha:w1,contenido:w2,empleos_visibles:visibles,empleos_numero:numero,fuente:fuente,tipo:tipo,color:color};
		
		var aleatorio = Math.floor(Math.random() * 51) + 25;
		
		if(flag!=3){
		$("div#ajax").load('<?PHP echo site_url('widgets/iframe/');?>'+'/'+aleatorio,opciones,function(){
			
			$('iframe#prueba').attr("src", $('iframe#prueba').attr("src"));
			});
		}else
		{
					$("#code").load('<?PHP echo site_url('widgets/iframe_print/');?>'+'/'+aleatorio,opciones,function(text){ $('#code').val(text).select();
					
					
					});
			}
		cadena=cadenaup;
		}
		}
</script>
<div class="c1" style="width:43%; float:left; ">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.hayempleo.com%2Fwidgets&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=335046663209679" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
<form method="post" >
<div class="form">

<h1>
Crear widget de empleos
</h1> 

<div class="form_contenido">

<div class="fila3">
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


<div class="fila">
<button onclick="actualizar()" type="button">Actualizar/ver widget</button> <button name="modal" type="button">Obtener código</button> 

</div>

<h3>Avanzado</h3>

<div class="fila">
4. Color del widget
<?PHP echo form_input('color',set_value('color'),'id="color" class="color"  " onblur="mostrarIframe();"');?>
<?PHP echo form_error('color');?>
</div>


<div class="fila">
5. Tipo de letra
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
6. Número de empleos 
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
7. Mostrar fecha de publicación
<?PHP echo form_dropdown('widgets_fecha',$op,set_value('widgets_fecha'),'id="widgets_fecha"  onChange="mostrarIframe();"');?>
</div>
<div class="fila">
8. Mostrar contenido
<?PHP echo form_dropdown('widgets_contenido',$op,set_value('widgets_contenido'),'id="widgets_contenido"  onChange="mostrarIframe();"');?>
</div>
<div class="fila">
9. Cortar contenido a:
<?PHP

if(!isset($_POST['caracteres']) || (isset($_POST['caracteres']) && ((int)$_POST['caracteres'])<=0) ):
 $cant=100;
else:

$cant=set_value('caracteres');
endif;
 echo form_input('caracteres',$cant,' id="caracteres"  onblur="mostrarIframe();"');?>
 <?PHP echo form_error('caracteres');?>
</div>




<div class="fila">
<button onclick="actualizar()" type="button">Actualizar/ver widget</button> <button name="modal" type="button">Obtener código</button> 

</div>



</div>

</div>


</form>


	









</div>
<div class="c1" style="width:56%; float:right">
<div id="ajax">
  <h2>Oportunidad</h2>
  <p> Ahora puedes tener un widget con ofertas de empleo en tu  website o blog, y mostrar  ofertas  laborales para tus usuarios.</p>
  <p>&nbsp;</p>
  <h2> Personalizable:</h2>
  <p> Puedes mostrar empleos de una determinada categoría,  filtradas por palabras claves, o los trabajos que  publica una determinada empresa.</p>
  <p>
Esto te permitirá publicar ofertas de empleo según  la temática de tu website o blog. </p>


<iframe width="100%" height="315" src="http://www.youtube.com/embed/SHHJ9srZXYU?rel=0" frameborder="0" allowfullscreen></iframe>
</div>


</div>
<div id="boxes">
	<!-- #Aqui personalizas tu ventana modal -->
	<div id="dialog" class="window">
	<h1>Tu c&oacute;digo para el widget de empleos</h1> 
    <p>Copia y pega el siguiente c&oacute;digo en  alg&uacute;n lugar de tu p&aacute;gina:</p>
	<!-- el botón close está definido como clase close-->
    <textarea id="code"></textarea>
    <div id="ajax_box">
    </div>
    <a href="#" class="close">Cerrar ventana</a>
  </div>

    <!-- No elimines el div#mask, porque lo necesitarás para rellenar la pantalla -->
    
	<div id="mask"></div>
</div>