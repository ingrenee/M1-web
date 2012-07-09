<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HayEmpleo.com</title>

<link href="<?PHP echo base_url('html/css/empleate.css')?>" rel="stylesheet" type="text/css" />
<link href="<?PHP echo base_url('html/s2/empleate.css')?>" rel="stylesheet" type="text/css" />
<link href="<?PHP echo base_url('css/contenidos.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?PHP echo base_url('html/jquery-1.7.min.js')?>"></script>
<script type="text/javascript" src="<?PHP echo base_url('html/funciones.js')?>"></script>
</head>

<body>


<div id="cabeza">
<div class="pagina">
  <div id="subcabeza">
  <h1><a href="<?PHP echo base_url('index.php');?>">HayEmpleo.com</a></h1>
  <h2>El portal de empleos del Perú
  </h2>
  </div>
  
  
  
  <div class="lienzo_menu">

<a href="<?PHP echo site_url('hayempleo/about');?>">Sobre HayEmpleo.com</a> | 
<a href="<?PHP echo base_url('/hayempleo/contacto');?>">Contáctanos</a> 

</div>

  
  
  
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
  
    
    <div class="bloque">
    
    
        <div class="fila">
    <h1>Empresa</h1> <span class="tit01">Quieres publicar ?</span>
    </div>
    

      <div class="fila"> 


<?PHP $h=$this->uri->segment(1);?>
<?PHP if($h=='welcome'):?>
    <a href="<?PHP echo base_url('index.php/registro/registrar');?>" class="boton01 flecha">Registrate</a>
    <?PHP else:?>
    <a href="<?PHP echo site_url('welcome/login');?>" class="boton01 flecha">Ingresa</a>
    
    <?PHP endif;?>
    
     <a href="<?PHP echo base_url('');?>" class="boton01 flecha">Empleos/trabajos</a>
     
     
     
     
      </div>
      <div class="fila">
      <a href="<?PHP echo base_url('index.php/registro/recuperar');?>" class="boton02">Recuperar contraseña</a>
      </div>
    </div>
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    <div class="bloque divisor2">
    </div>
</div>

</div>
</div>

<div class="pie">
<div class="pagina">
@2012 hayEmpleo.com
</div>
</div>
</body>
</html>