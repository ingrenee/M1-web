<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<meta name="description" content="oferta de empleo,  aqui encontraras trabajo, las empresas publican sus ofertas y avisos, crea tu curriculum vitae gratis, hector doy trabajo recuerda hay empleo y hay trabajo" />
<meta name="keywords" content="trabajo en lima, busco trabajo, trabajo de, Ofertas de trabajo, Bolsas de trabajo, avisos de trabajo, empleos lima, buscar empleo, hay empleo ,Ofertas de empleo, curriculum vitae, busco chamba, chamba, búsqueda de empleo, búsqueda de trabajo, empleo " />

<title>hayEmpleo.com</title>

<link href="<?PHP echo base_url('html/css/empleate.css')?>" rel="stylesheet" type="text/css" />
<link href="<?PHP echo base_url('css/contenidos.css')?>" rel="stylesheet" type="text/css" />

<link href="<?PHP echo base_url('css/candidatos.css')?>" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?PHP echo base_url('html/jquery-1.7.min.js')?>"></script>
<script type="text/javascript" src="<?PHP echo base_url('html/funciones.js')?>"></script>

<?PHP include(str_replace('system','',BASEPATH).'ga.php');?>
</head>

<body>


<div id="cabeza">
<div class="pagina">
  <div id="subcabeza">
  <h1><a href="<?PHP echo site_url();?>">HayEmpleo.com</a></h1>
  <h2>El web de empleos del Perú
  </h2>
  </div>
  
  
  
  <div class="lienzo_menu">

<a href="<?PHP echo site_url('hayempleo/about');?>">Sobre HayEmpleo.com</a> | 
<a href="<?PHP echo site_url('hayempleo/contacto');?>">Contáctanos</a> 

</div>
   <span class="fechasup"><?PHP echo _hoy();?></span>
  
  
  
  
  </div>
</div>












<div ID="cuerpo">



<div class="pagina">



<div  ID="c1">






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
  
  <?PHP $this->load->view('candidatos/logeado');?>
  <div class="bloque divisor2">
  </div>

<?PHP 
$info=$this->native_session->userdata('login_data_candidatos');?>
    
    <div class="bloque area " style="width:95%">

  <a class="tool cv" href="<?PHP  echo site_url('cv/'.$info['ID']);?>">Ver mi curriculum</a>    
   
    </div>
    
        <div class="bloque area " style="width:95%">

  <a class="tool descargar" href="<?PHP  echo site_url('cv/descargar/'.$info['ID']);?>">Descargar curriculum</a>    
   
    </div>
    
      
        <div class="bloque area " style="width:95%">

  <a class="tool descargar" href="<?PHP  echo site_url('candidatos/suscripcion/'.$info['ID']);?>">Suscripci&oacute;n: modificar palabras</a>    
   
    </div>
  <div class="bloque area " style="width:95%">

  <a class="tool descargar" href="<?PHP  echo site_url('candidatos/nosuscripcion/'.$info['ID']);?>">Suscripci&oacute;n: suspender suscripci&oacute;n</a>    
   
    </div>
    
   <div class="bloque area " style="width:95%">

  <a class="tool descargar" href="<?PHP  echo site_url('candidatos/clave/'.$info['ID']);?>">Modificar contrase&ntilde;a</a>    
   
    </div> 

  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    <div class="bloque divisor2">
    </div>
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