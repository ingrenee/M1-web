

<?PHP  
if(isset($modo_empresa) && $modo_empresa==true):
if(isset($info['ruc']) ): 
$ruc=$info['ruc'].'/';
else:
$ruc='';
endif; 
else:
$ruc='';
endif;
?>
<link href="<?PHP echo base_url('css/div.postula.css');?>" rel="stylesheet" type="text/css" />




<div class="empleo-descripcion">







  



  



  <div class="fila">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=335046663209679";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<fb:like  style="float:right;  z-index: 99999;" href="<?PHP echo  site_url($ruc.'trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>" send="true" layout="button_count" width="150" show_faces="false" action="recommend"></fb:like>
<script>
function o(){
var sharer = "https://www.facebook.com/sharer/sharer.php?u=";
window.open(sharer + location.href, 'sharer', 'width=626,height=436');
}

function r(){
var sharer = "https://www.facebook.com/sharer/sharer.php?u=";
window.open("http://www.facebook.com/plugins/like.php?href=<?PHP echo base_url().uri_string();?>&send=false&layout=button_count&width=450&show_faces=false&action=recommend&colorscheme=light&font&height=21", 'Recomerdar', 'width=626,height=436');
}



</script>
<style>div#sharebtn {

font-family:arial,helvetica,sans-serif; font-size:12px;
background:#3662a0;
border:1px solid #999;

padding:4px 4px 2px 2px;

width:52px; 
height:16px;

display:inline-block;
text-align:center;



}

div#sharebtn a {

color:#fff;

text-decoration:none;

background-image:none;

background-color:transparent;

}
</style>
<div class="" id="sharebtn">
  <a name="fb_share" href="javascript:void(0);" class="faceboton"  onclick="o()">Compartir</a> 
</div>



<!--
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 



        type="text/javascript">



</script>
-->














&nbsp;  <a href="https://twitter.com/share"   class="twitter-share-button" data-via="hayempleo" data-lang="es" data-hashtags="chamba,trabajo,empleo">Twittear</a>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



<!--

<iframe src="//www.facebook.com/plugins/like.php?href=<?PHP echo  site_url($ruc.'trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;action=recommend&amp;colorscheme=light&amp;font&amp;height=21&appId=335046663209679" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe>
-->

<br />
<br />



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
<h2>Lugar: <span><?PHP _extrae_lugar(@$v['departamento']);?></span></h2>

</div>






  <div class="fila" style="">

  

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
<ul>
<?PHP $t=desaplana($v['categoria']);?>
<?PHP foreach($t as $kk => $vv):?>
<li><?PHP echo $arr[$vv];?></li>
<?PHP endforeach;?>
</ul>
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
  
  
  <?PHP if($empleador['tipo']!='interno'):?>
  <div class="fila">
  <h2>Empresa: <a href="<?PHP echo site_url('empresa-'._titulo($empleador['nombre'],'').'-'.$v['empleador_ID'].'.html');?>"><?PHP echo $empleador['nombre'];?></a></h2>
  </div>
  <?PHP else:?>
  <div class="fila">
  <h2>Empresa: <?PHP echo $v['nombre_empresa'];?></h2>
  </div>
    <div class="fila">
  <h2>Publicado por: <a href="http://<?PHP 
   $x=$this->db->where('ID',$empleador['ruc'])->get('subdominios_base')->row_array();
   echo $x['nombre'];
  ?>.hayempleo.com"><?PHP echo $empleador['nombre'];?></a></h2>
  </div>
  <?PHP endif;?>
<?PHP endif;?>


  



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

<div class="postula">
<h1><a href="<?PHP echo site_url('postular/'.$v['ID']);?>">Postula a esta vacante</a></h1>
<p>Comunica a la empresa que deseas ser considerado en la seleccion de personal de esta oferta de empleo</p>
</div>




  







  



  



  



  



  



  



  



  



  



  



  



</div>



















































<br />



<br />



