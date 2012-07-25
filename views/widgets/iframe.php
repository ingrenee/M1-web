<?PHP
$url='widgets/categoria/'.$categoria.'/'.$empleos_numero.'/';
$url.=$empleos_visibles.'/'.$fecha.'/'.$contenido.'/'.$caracteres.'/'.$fuente.'/'.$ancho.'/'.$alto;
?>
<iframe src="<?PHP echo  site_url($url);?>" width="<?PHP echo $ancho;?>" height="<?PHP echo $alto;?>" frameborder="1" scrolling="0">
</iframe>