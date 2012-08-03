<?PHP  

if(isset($info['ruc']) && $modo_empresa===true): 
$ruc=$info['ruc'].'/';
else:
$ruc='';
endif; 

?>



<div class="empleo-descripcion">







  



  



  <div class="fila">



  <div class="sociales">



<a name="fb_share" class="faceboton">Compartir</a> 



<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 



        type="text/javascript">



</script>















&nbsp;  <a href="https://twitter.com/share"   class="twitter-share-button" data-via="hayempleo" data-lang="es" data-hashtags="chamba,trabajo,empleo">Twittear</a>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



  </div>



  </div>



  



  <div class="fila">



  



  <h1><a href="<?PHP echo  site_url($ruc.'trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>"><?PHP echo $v['titulo'];?></a></h1>



  <h2>Publicado



    :<span>



    <!--  <?PHP echo $v['creado'];?> -->



  <?PHP 



echo date_format(date_create($v['creado']), 'd/m/y');



?></span></h2>



  </div>



  <div class="fila">



  <h2>Vacantes: <span><?PHP echo $v['vacantes'];?></span></h2>



  </div>



  



  <div class="fila">



  <h2>Salario: <span><?PHP echo _salario($v['salario_2'],$v['salario']);?> (<?PHP echo $v['salario_tipo'];?>)</span></h2>



  </div>



  







  



  



  



  



  <div class="fila">



  <h2>Sexo: <span><?PHP echo $v['sexo'];?></span></h2>



  </div>


<?PHP if($v['empleador_ID']!=3485):?>
  <div class="fila">
  <h2>Empresa: <a href="<?PHP echo site_url('empresa-'._titulo($empleador['nombre'],'').'-'.$v['empleador_ID'].'.html');?>"><?PHP echo $empleador['nombre'];?></a></h2>
  </div>
<?PHP endif;?>
  

  <div class="fila" style="display:none">

  

  <?PHP

  $arr['']='Cualquiera';







$arr[1]='Administración/Oficina';



$arr[2]='Arte/Diseño/Medios';



$arr[3]='Científico/Investigación';



$arr[4]='Informática/Telecom.';



$arr[5]='Dirección/Gerencia';



$arr[6]='Economía/Contabilidad';



$arr[7]='Educación/Universidad';



$arr[8]='Hostelería/Turismo';



$arr[9]='Ingeniería/Técnico';



$arr[10]='Legal/Asesoría';



$arr[11]='Márketing/Ventas';



$arr[12]='Medicina/Salud';



$arr[13]='Recursos Humanos';



$arr[14]='Otros';

  ?>



  <h2>Categoria: <?PHP //echo $arr[$v['categoria']];?></h2>



  </div>



  <div class="fila">



  <h2>Descripci&oacute;n</h2>



  <?PHP $t=($v['descripcion']);

  

  $t = eregi_replace('<li[^>]*>',"<li>",$t);

$t = eregi_replace('<ul[^>]*>',"<ul>",$t);

$t = eregi_replace('<p[^>]*>',"<p>",$t);

$exp_email = '[_a-z0-9\-]+(\.[_a-z0-9\-]+)*\@[_a-z0-9\-]+(\.[a-z]{1,4})+';
 echo preg_replace("/$exp_email/",' xxxxxxxx@xxxx.xxx ',$t);

  ?>

  <?PHP echo ($v['requisitos']);?>



  </div>



  



  



  



  <div class="fila">



  <h2 style=""><table border="0" cellpadding="0" cellspacing="0"><tr><td align="left" valign="middle">Email de contacto:</td><td valign="middle"> &nbsp; <?PHP //echo $v['email_contacto'];?>
 <?PHP $string = base64_encode($v['email_contacto']);

// colores de la imagen r= cantidad de rojo, g= cantidad de verde, 
// b= cantidad de azul, valor maximo 255
$email_encoded = '<img src="'.base_url('email_src.php').'?r=100&g=150&b=0&text='.$string.'">';

// escribe la imagen del correo electronico
echo $email_encoded;
?></td></tr></table>
  



  </h2>



  </div>

  

  <div class="fila">



  <h2>Poner en asunto: <span>

  <?PHP 

  if(empty($v['email_asunto'])):

  echo 'Hayempleo.com - ';

  echo $v['titulo'];

  else:

  echo 'HAYEMPLEO.COM - ';   echo strtoupper($v['email_asunto']);

  endif;

?></span>



  </h2>



  </div>





  







  



  



  



  



  



  



  



  



  



  



  



</div>



















































<br />



<br />



