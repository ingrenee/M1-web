<?PHP
$url='widgets/categoria/'.$categoria.'/'.$empleos_numero.'/';
$url.=$empleos_visibles.'/'.$fecha.'/'.$contenido.'/'.$caracteres.'/'.$fuente.'/'.$ancho.'/'.$alto;
?>
<script>
function ini() {
//document.getElementById("prueba").height = window.frames.prueba.document.body.offsetHeight + window.frames.prueba.document.body.scrollHeight;

alert(window.frames.prueba.document.body.offsetHeight);
}
</script>
<iframe src="<?PHP echo  site_url($url);?>"  id="prueba"  name="prueba"  height="<?PHP echo $alto;?>"
 width="<?PHP echo $ancho;?>" frameborder="0"  scrolling="no">
</iframe>
<!-- 
height="<?PHP echo $alto;?>"  -->