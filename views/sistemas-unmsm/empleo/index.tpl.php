

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

  

  <h1><a href="<?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>"><?PHP echo $v['titulo'];?></a></h1>

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

  <div class="fila">

  <h2>Empresa: <a href="<?PHP echo site_url('empresa-'._titulo($empleador['nombre'],'').'-'.$v['empleador_ID'].'.html');?>"><?PHP echo $empleador['nombre'];?></a></h2>

  </div>

  <div class="fila">

  <h2>Descripci&oacute;n</h2>

  <?PHP echo ($v['descripcion']);?>

  <?PHP echo ($v['requisitos']);?>

  </div>

  

  

  

  <div class="fila">

  <h2>Email de contacto: <span><?PHP echo $v['email_contacto'];?></span>

  </h2>

  </div>
  
  <div class="fila">

  <h2>Poner en asunto: <span>
  <?PHP 
  if(empty($v['email_asunto'])):
  echo 'Hayempleo.com - ';
  echo $v['titulo'];
  else:
  echo 'HAYEMPLEO.COM - ';   echo $v['email_asunto'];
  endif;
?></span>

  </h2>

  </div>


  



  

  

  

  

  

  

  

  

  

  

  

</div>

























<br />

<br />

