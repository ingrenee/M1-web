<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?PHP if(isset($_titulo_) && $_titulo_):?>
<meta name="description" content="<?PHP _etiqueta_descripcion(@$_descripcion_);?>" />
<meta name="keywords" content="trabajo en lima, busco trabajo, trabajo de, Ofertas de trabajo, Bolsas de trabajo, avisos de trabajo, empleos lima, buscar empleo, hay empleo ,Ofertas de empleo, curriculum vitae, busco chamba, chamba, búsqueda de empleo, búsqueda de trabajo, empleo " />
<title><?PHP _etiqueta_titulo($_titulo_); ?></title>



<?PHP else:?>
<meta name="description" content="oferta de empleo,  aqui encontraras trabajo, las empresas publican sus ofertas y avisos, crea tu curriculum vitae gratis, hector doy trabajo recuerda hay empleo y hay trabajo" />
<meta name="keywords" content="trabajo en lima, busco trabajo, trabajo de, Ofertas de trabajo, Bolsas de trabajo, avisos de trabajo, empleos lima, buscar empleo, hay empleo ,Ofertas de empleo, curriculum vitae, busco chamba, chamba, búsqueda de empleo, búsqueda de trabajo, empleo " />

<title>Hay empleo en <?PHP echo $info['nombre'];?></title>
<?PHP endif;?>


<link href="<?PHP echo base_url('css/empleate_web.css')?>" rel="stylesheet" type="text/css" />
<?PHP if(file_exists('css/webs/'.$info['ruc'].'.css')):?>
<link href="<?PHP echo base_url('css/webs/'.$info['ruc'].'.css')?>" rel="stylesheet" type="text/css" />
<?PHP endif;?>








<script type="text/javascript" src="<?PHP echo base_url('html/jquery-1.7.min.js')?>"></script>

<script type="text/javascript" src="<?PHP echo base_url('html/funciones.js')?>"></script>

<?PHP include(str_replace('system','',BASEPATH).'ga.php');?>
</head>



<body>
<div class="he_lienzo_main">
<div class="he_lienzo_super">
<div class="he_lienzo">


<div id="cabeza">

<div class="pagina">
<div id="logo">

</div>
<div id="he_banner">
<?PHP if(file_exists('./uploads/banner_'.md5($info['ruc']).'.jpg')):?>
  

 <?PHP if(isset($info['website'])):?>
<a class="principal" title="Ir a página principal" href="<?PHP  echo 'http://'.str_replace('http://','',$info['website']); ?>">

<img  border="0"class="he_logo" src="<?PHP echo base_url('uploads/banner_'.md5($info['ruc']).'.jpg');?>"  />
</a>
<?PHP else: ?>
<img  border="0"class="he_logo" src="<?PHP echo base_url('uploads/banner_'.md5($info['ruc']).'.jpg');?>"  />
 
<?PHP endif;?>
 
  <?PHP else:?>
  
  
 <?PHP if(file_exists('./uploads/logo_'.md5($info['ruc']).'.jpg')):?>
<img class="he_logo" src="<?PHP echo base_url('uploads/logo_'.md5($info['ruc']).'.jpg');?>"  />
<?PHP else:?>
<img class="he_logo" src="<?PHP echo base_url('uploads/logo_empresa.jpg');?>" alt="Logo de la empresa"  />
<?PHP endif;?>


   <h1><a href="<?PHP 
   
 
   echo site_url($info['ruc']);

   ?>"><?PHP echo $info['nombre'];?></a></h1>

<?PHP if(isset($info['lema']) && $info['lema']):?>
  <h2><?PHP echo $info['lema'];?></h2>
<?PHP endif;?>

  <?PHP endif;?>

  



 </div>


  </div>

</div>
<div id="menu">
<div class="pagina">
<a href="<?PHP  echo site_url($info['ruc']);?>" class="menu_primero"><span>Bolsa de trabajo</span></a> <span class="divisor">&nbsp;</span>
<a href="<?PHP  echo site_url($info['ruc'].'/empresa');?>" class="menu_segundo"><span>Sobre la empresa</span></a>
<?PHP if(isset($info['website'])):?>
<a class="principal" href="<?PHP  echo 'http://'.str_replace('http://','',$info['website']); ?>">Inicio</a>
<?PHP endif;?>

</div>
</div>
























<div ID="cuerpo">
<div class="pagina">
<div  id="c1">

<script>

var amigable    = (function() {

    var tildes = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç",

        conver = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",

        cuerpo  = {};

 

    for (var i=0, j=tildes.length; i<j; i++ ) {

        cuerpo[tildes.charAt(i)] = conver.charAt(i);

    }

 

    return function(str) {

        var salida = [];

        for( var i = 0, j = str.length; i < j; i++) {

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

	

	

	t.action="<?PHP echo site_url('buscar');?>/"+url;

	}

</script>





<!--   incio  buscador --><!--   fin buscador -->





<?PHP

echo $content;

?>

</div>





<div id="c2">

  
  
<?PHP $personal=$this->db->select('encargado,cargo,email_contacto')->where('ruc',$info['ruc'])->get('empleador');?>
  

<div class="bloque">
<div class="encargados">
<div class="fila">
<h1>Personal encargado del área</h1>
</div>

<?PHP foreach($personal->result_array() as $k => $v2):?>
<div class="fila concargo">
<h2 class="encargado"><?PHP 
if(isset($v2['encargado'])):
echo $v2['encargado'];
else:
echo 'No espefica.';
endif;
?></h2>
<h3 class="cargo"><?PHP if(isset($v2['cargo'])):
echo $v2['cargo'];
else:
echo 'No menciona.';
endif;?></h3>


<h3 class="cargo"><?PHP if(isset($v2['email_contacto'])):
echo $v2['email_contacto'];
else:
echo 'No mensiona.';
endif;?></h3>

</div>
<?PHP endforeach;?>
</div>

</div>

    

<div class="bloque">

    

    
<div class="he_publicar">
    <div class="fila">
    <h1>Empresa</h1>
<span class="tit01">Publicar ofertas de empleo</span>
    </div>
    
    <div class="fila">
    <a href="<?PHP echo base_url('admin.php');?>" class="boton01 flecha">Ingresar</a>
    <a href="<?PHP echo base_url('');?>" class="boton01 flecha">Empleos/trabajos</a>
    <a href="<?PHP echo site_url('registro/recuperar');?>" class="boton01 flecha">Recuperar contraseña</a>
    </div>
    
    </div>

</div>


  <div class="bloque">

    

    
<div class="he_publicar">
    <div class="fila">
    <h1>Candidatos</h1>

    </div>
    
    <div class="fila">
    <?PHP  $u='http://www.hayempleo.com/';
	$u=site_url();
	?>
    <a href="<?PHP echo ($u.'login/candidato');?>" class="boton01 flecha">Ingresar</a>
    <a href="<?PHP echo ($u.'registros/candidato/'.$info['ruc']);?>" class="boton01 flecha">Reg&iacute;strate</a>
    <a href="<?PHP echo ($u.'suscripciones');?>" class="boton01 flecha">Suscr&iacute;bete</a>    
    <a href="<?PHP echo ($u.'registros/recuperar');?>" class="boton01 flecha">Recuperar contrase&ntilde;a</a>
    <a href="<?PHP echo ($u.'');?>" class="boton01 flecha">Todos los trabajos</a>

    </div>
    
    </div>

</div>



  

  

  

  

  

  

  

  

  

  

  

  

  

  

    

    <div class="bloque divisor2">

    </div>


<div class="widgets">
<?PHP if(isset($widgets)):?>
<?PHP echo $widgets;?>
<?PHP endif;?>

</div>



</div>



</div>

</div>



<div id="pie">

<div class="pagina">

<div class="menuinf">

@2012 <a href="http://www.hayempleo.com">HayEmpleo.com</a> | <a href="<?PHP echo site_url('hayempleo/about');?>"> Sobre HayEmpleo.com</a> | <a href="<?PHP echo site_url('hayempleo/tu_bolsa_de_trabajo');?>"> Obten tu bolsa de empleo</a>

</div>





</div>

</div>
</div>
</div>
</div>
</body>

</html>