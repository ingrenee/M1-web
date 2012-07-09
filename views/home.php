<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?PHP _etiqueta_descripcion($_descripcion_);?>" />



<meta name="keywords" content="trabajo en lima, busco trabajo, trabajo de, Ofertas de trabajo, Bolsas de trabajo, avisos de trabajo, empleos lima, buscar empleo, hay empleo ,Ofertas de empleo, curriculum vitae, busco chamba, chamba, búsqueda de empleo, búsqueda de trabajo, empleo " />
<?PHP function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
return $url;
}?>
<title><?PHP _etiqueta_titulo($_titulo_); ?></title>
<meta property="og:title" content="<?PHP 

if(strlen($_SERVER['REQUEST_URI'])>1):
 _etiqueta_titulo($_titulo_); 
 else:
 echo 'HayEmpleo.com | Pagina web';
 endif;
 ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?PHP echo dameURL();?>" />
<meta property="og:image" content="http://www.hayempleo.com/images/icono_hayempleo.jpg" />
<meta property="og:site_name" content="Hay empleo" />
<meta property="fb:admins" content="100002181793032" />
<meta property="fb:app_id" content="335046663209679"/>
<meta property="fb:page_id" content="252503461487375"/>

<?PHP include(str_replace('system','',BASEPATH).'ga.php');?>



<link href="<?PHP echo base_url('html/css/empleate.css')?>" rel="stylesheet" type="text/css" />















</head>



<body>





<div id="cabeza">

<div class="pagina">


  <div id="subcabeza">

  <h1><a href="<?PHP echo site_url();?>">HayEmpleo.com</a></h1>

  <h2>La web de empleos del Perú</h2>
 

  </div>
<div class="lienzo_menu">

<a href="<?PHP echo site_url('hayempleo/about');?>">Sobre HayEmpleo.com</a> | 
<a href="<?PHP echo site_url('hayempleo/contacto');?>">Contáctanos</a> 

</div>
   <span class="fechasup"><?PHP echo _hoy();?></span>

  </div>

</div>

























<div id="cuerpo">







<div class="pagina">







<div  id="c1">













<script  type="text/javascript">

<!--

var amigable    = (function() {

    var tildes = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç",

        conver = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",

        cuerpo  = {};

 

    for (var i=0, j=tildes.length; i<j; i++ ) {

        cuerpo[tildes.charAt(i)] = conver.charAt(i);

    }

 

    return function(str) {

        var salida = [];

        for( var i = 0; i<str.length; i++) {

            var c = str.charAt( i );

            if(cuerpo.hasOwnProperty(str.charAt(i))) {

                salida.push(cuerpo[c]);

            } else {

                salida.push(c);

            }

        }

        return salida.join('').replace(/[^-A-Za-z0-9]+/g, '-').toLowerCase();

    }

})();

var normalize = (function() {
  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç",
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
 
  return function( str ) {
      var ret = [];
      for( var i = 0, j = str.length; i < j; i++ ) {
          var c = str.charAt( i );
          if( mapping.hasOwnProperty( str.charAt( i ) ) )
              ret.push( mapping[ c ] );
          else
              ret.push( c );
      }
      return ret.join( '' );
  }
 
})();
/**/

function ver(t)

{

	var q=document.getElementById('q').value;

	

	var url = amigable(q)

		.toLowerCase() // change everything to lowercase

		.replace(/^\s+|\s+$/g, "") // trim leading and trailing spaces		

		.replace(/[_|\s]+/g, "-") // change all spaces and underscores to a hyphen

		.replace(/[^a-z0-9-]+/g, "") // remove all non-alphanumeric characters except the hyphen

		.replace(/[-]+/g, "-") // replace multiple instances of the hyphen with a single instance

		.replace(/^-+|-+$/g, "") // trim leading and trailing hyphens				

		; 

	

	
if(url.length>0)
{
	t.action="<?PHP echo site_url('buscar');?>/"+url+".html";
}
else
{
	t.action="<?PHP echo site_url('buscar');?>/"+url;
	}
	
	}

	-->

</script>





<!--   incio  buscador -->



<div class="buscador borde"><form action="<?PHP echo site_url('buscar/');?>" onsubmit="ver(this)" method="post">

<div class="bloque">







<h1>Buscar trabajo</h1>



  <div class="fila">

  <input name="q" type="text" class="search" id="q" />

 

  <input name="buscar" type="submit"  class="botone1" id="buscar" value="     " />

  </div>





</div>

<div class="bloque">



<div class="bus_c2">

<div class="filax">

<?PHP 
 

$fecha['']='Cualquiera ';

$fecha[1]='hoy';

$fecha[2]='hoy y ayer';

$fecha[3]='hace 3 dias';

$fecha[7]='hace una semana';

$fecha[14]='hace 2 semanas';

$fecha[21]='hace 3 semanas';

$fecha[30]='hace 1 mes';



/**/

$f=str_replace('DATE_SUB(CURDATE(),INTERVAL ','',@$opciones['creado >=']);

$f=str_replace(' DAY)','',$f);

/**/



?>

  <label>Fecha</label>

<?PHP echo form_dropdown('fecha',$fecha,$f);?>

</div>

  <div class="filax">

    <label>Lugar</label>

    <select name="departamento">
<option value="">Seleccione ciudad</option>
<option value="888888:extranjero">Fuera del pais</option>
<option value="999999:todas">Todas las ciudades</option>
<option value="4080:Amazonas">Amazonas</option>
<option value="4081:Ancash">Ancash</option>
<option value="4082:Apurimac">Apurimac</option>
<option value="2891:Arequipa">Arequipa</option>
<option value="2906:Ayacucho">Ayacucho</option>
<option value="2908:Cajamarca">Cajamarca</option>
<option value="2894:Callao">Callao</option>
<option value="2911:Castilla">Castilla</option>
<option value="2893:Chiclayo">Chiclayo</option>
<option value="2896:Chimbote">Chimbote</option>
<option value="2907:Chincha Alta">Chincha Alta</option>
<option value="2899:Cusco">Cusco</option>
<option value="4083:Huancavelica">Huancavelica</option>
<option value="2897:Huancayo">Huancayo</option>
<option value="2905:Huanuco">Huanuco</option>
<option value="2902:Ica">Ica</option>
<option value="2895:Iquitos">Iquitos</option>
<option value="2904:Juliaca">Juliaca</option>
<option value="4084:Junin">Junin</option>
<option value="4085:La-libertad">La-libertad</option>
<option value="4086:Lambayeque">Lambayeque</option>
<option value="2890:Lima">Lima</option>
<option value="4087:Loreto">Loreto</option>
<option value="4088:Madre-de-Dios">Madre-de-Dios</option>
<option value="4089:Moquegua">Moquegua</option>
<option value="4090:Pasco">Pasco</option>
<option value="2898:Piura">Piura</option>
<option value="2900:Pucallpa">Pucallpa</option>
<option value="2909:Puno">Puno</option>
<option value="4091:San-Martin">San-Martin</option>
<option value="2903:Sullana">Sullana</option>
<option value="2901:Tacna">Tacna</option>
<option value="2892:Trujillo">Trujillo</option>
<option value="4092:Tumbes">Tumbes</option>
<option value="4093:Ucayali">Ucayali</option>
<option value="2910:Ventanilla">Ventanilla</option>
</select>

  </div>

</div>







<div class="bus_c3">

<div class="filax">

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

  <label >Categorias</label>
<?PHP $num=@str_replace('%','',$opciones['categoria like']);
$num=str_replace('"','',$num);
$num=str_replace('-','',$num);


?>
<?PHP echo form_dropdown('categoria',$arr,$num);?>

</div>

  <div class="filax">

  <?PHP 

  $arr=array();

  $arr['']='Cualquiera';

  $arr[1]='Tiempo completo';

  $arr[2]='Medio completo';

  $arr[3]='Por horas';  

  $arr[4]='Desde casa';

  $arr[5]='Por proyectos';    

  $arr[6]='Prácticas Pre-Profesionales';    

  $arr[9]='Prácticas Profesionales';        

  ?>

    <label >Tipo de empleo</label>

<?PHP echo form_dropdown('modalidades_ID',$arr,@$opciones['modalidades_ID']);?>

  </div>

  </div>

</div>



</form>



</div>

<script type="text/javascript">

document.getElementById('departamento').value=<?PHP echo @$opciones['departamento'];?>;

</script>



<!--   fin buscador -->





<?PHP

echo $content;

?>

</div>





<div id="c2">
 <?PHP

 //$ol_empresa=online();

 //$ol_candidato=online_candidato();

 ?>

<!-- Bloque de  redes sociales -->
<div class="bloque">
<div class="fila">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fhayempleo&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=lucida+grande&amp;height=21&amp;appId=335046663209679" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe>
</div>
<a href="http://facebook.com/hayempleo" target="_blank" class="sociales faceweb">S&iacute;guenos en facebook</a>
<a href="https://twitter.com/#!/hayempleo" target="_blank" class="sociales twiweb">S&iacute;guenos en twitter</a>

<a href="<?PHP echo site_url('suscripciones');?>" class="sociales suscripciones">Trabajo en tu E-mail</a>

</div>
<!-- fin bloque de redes sociales -->

  <div class="bloque divisor2">

  </div>


<!-- empresa activada -->


<!-- fin empresa activada -->



<!-- candidatos logeado -->


<!-- fin de candidatos logueado -->























<!--  bloque de historial -->


  <?PHP $hb=historial_busquedas();

  $hb=$hb['historial_busquedas'];

  ?>

   <?PHP  if(count($hb)>0): ?>

  <div class="bloque">

  <h1>Historial de busquedas</h1>

  <?PHP //$hb=array_reverse($hb); ?>

  <ol>

  <?PHP  while(list($k,$v)=each($hb)):?>

  <?PHP if(strlen($k)>0):?>

  <li><a href="<?PHP echo  site_url('buscar/'.str_replace('%','-',_titulo($k)));?>"><?PHP echo $k;?></a></li>

  <?PHP endif;?>

  <?PHP endwhile;?>

  </ol>



  

  </div>
  <div class="bloque divisor2"></div>
  <?PHP endif;?>
<!--  fin bloque de historial -->






    <!--   seccion de usuario  -->

  

    

    

    <div class="bloque portal">
<iframe src="<?PHP echo site_url('portal/candidatos');?>" class="fportal" allowtransparency="yes" scrolling="no" frameborder="0" height="" marginheight="0"></iframe>

    </div>

<div class="bloque divisor2"></div>
  


    <div class="bloque portal">

    <iframe src="<?PHP echo site_url('portal/empresas');?>" class="fportal"  scrolling="no"allowtransparency="yes" frameborder="0" height="" marginheight="0"></iframe>
    </div>

  <div class="bloque divisor2"></div>

  
   

  



  



    <!-- fin seccion empresa -->

  

  

  

  





























<!--  bloque  feed -->
  
<div class="bloque blogfeed">
  <h1><a href="http://www.hayempleo.com/blog">Visita el blog</a></h1>
  <div class="cuerpo_feed">
  <span class="tuercas"></span>
  <?php

header('Content-Type: text/html; charset=UTF-8');
$xmlStr = file_get_contents('http://www.hayempleo.com/blog/feed/');
$xml = new SimpleXMLElement($xmlStr);

$resultado = $xml->xpath("channel/item");
/*aprobado*/
echo "<ul>";
$temp=array();
foreach($resultado as $key => $val):
if($key<8):
$temp[]="<li class='c".$key."'><a href='".$resultado[$key]->link."'>".$resultado[$key]->title."</a></li>";
endif;
endforeach;
shuffle($temp);

echo $temp[0];
echo $temp[1];
echo $temp[2];
echo $temp[3];
echo $temp[4];
echo $temp[5];
echo $temp[6];

echo "</ul>";
/*aprobado*/
?></div>
  </div>
 
 <!--  bloque  de feed -->
 
 
<div class="bloque divisor2"></div>
  



  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

    

    

</div>



</div>

</div>



<div class="pie">





      

      

<div class="pagina">

<div class="menuinf">

@2012 <a href="http://www.hayempleo.com">HayEmpleo.com</a> | <a href="<?PHP echo site_url('hayempleo/about');?>"> Sobre HayEmpleo.com</a>

</div>
</div>

</div>

</body>

</html>