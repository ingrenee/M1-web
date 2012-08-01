<?PHP
$categoria=str_replace(',','__',$categoria);


$url='widgets/categoria/'.$categoria.'/'.$empleos_numero.'/';
$url.=$empleos_visibles.'/'.$fecha.'/'.$contenido.'/'.$caracteres.'/'.$fuente.'/'.$ancho.'/'.$alto.'/'.$tipo.'/'.str_replace('#','',$color);
 //echo $url;
 //var_dump($flag2);
?><?PHP if($flag2==false):?>
<iframe src="<?PHP echo  site_url($url);?>"  id="prueba"  name="prueba"  height="<?PHP echo $alto;?>"
 width="<?PHP echo $ancho;?>" frameborder="0"  scrolling="no">
</iframe>
<?PHP else:
$tmp='<iframe src="'.site_url($url).'"  id="widget"  name="widget"  height="'.$alto.'"
 width="'.$ancho.'" frameborder="0"  scrolling="no"></iframe>';
 echo ($tmp);
endif; ?>
